import numpy as np
import xlrd
import requests
from requests.auth import HTTPBasicAuth

def rank(Array):                                                        #returns sorted list
    i = 0
    Top = -99999
    TopIndex = 0
    higher = 99999
    j = 1
    RankList=[0 for x in range(len(Array))]
    while j <= 100:
        while i < len(Array):
            if Array[i] > Top:
                if Array[i] < higher:
                    Top = Array[i]
                    TopIndex = i
            i += 1
        RankList[TopIndex]=j
        j = j + 1
        i = 0
        higher = Top
        Top = -99999
    return RankList


EventCodes = []
Week = []

loc = 'D:\xampp\htdocs\RedAlliance\EventCodes.xlsx'  #this is where event codes are stored, as well as the week of the event
wb = xlrd.open_workbook(loc)
sheet = wb.sheet_by_index(0)                                            #parse through the excel file
sheet.cell_value(0, 2)
for i in range(sheet.nrows):
    if sheet.cell_value(i,2):
        EventCodes.append(sheet.cell_value(i, 2))

for i in range(sheet.nrows):
    if sheet.cell_value(i,3):
        Week.append(sheet.cell_value(i, 3))


redScores=[]
blueScores=[]
redTeams=[]
blueTeams=[]
weight=[]
Teams=[]
numMatches=0
count = 0
ev=0
for Event in EventCodes:

    count = count + 1
    print(count)
    address = 'https://frc-api.firstinspires.org/v2.0/2019/matches/'+Event+'?????'

    resp = requests.get(address, auth = HTTPBasicAuth('lapickett', 'redacted')) #CHANGE THIS RIGHT HERE I AM MAKING THIS BIG SO YOU CAN SEE IT CHANGE THIS
    a=str(resp.content)

                                                                        #Parse through data
                                                                        #Gather: Red Score, Blue Score, Red and Blue teams in each match.
                                                                        #DQ's are unaccounted for, because we are simply concerned with
                                                                        #robot performance, not safety or ethical mishaps made in a match
    b1 = a.split('scoreRedFinal":')
    i=1
    while i<len(b1):
        redScores.append(int(b1[i].split(',"scoreRedFoul')[0]))
        i=i+1
        count = count + 1
        print(count*len(Teams))
    b = a.split('scoreBlueFinal":')
    i=1
    while i<len(b):
        blueScores.append(int(b[i].split(',"scoreBlueFoul')[0]))
        i=i+1

    b = a.split('teamNumber":')
    i=1
    d=[]
    while i<len(b):
        d.append(b[i].split(',"station')[0])
        i=i+1
        if i%6==1:
            blueTeams.append(d)
            d=[]
        elif i%3==1:
            redTeams.append(d)
            d=[]
                                                                        #Make a list of all the teams at the event
    i=1
    while i<len(b1):
        weight.append(pow(1.095, Week[ev]-1+i/len(b1)))
        i=i+1


    for a in redTeams:
        for b in a:
            if b not in Teams:
                Teams.append(b)
    for a in blueTeams:
        for b in a:
            if b not in Teams:
                Teams.append(b)
    ev = ev + 1


print("Teams: " + str(Teams))
                                                                        #Make the matricies involved in the equations
numMatches = len(redScores)
matrix1=np.array([[0 for x in range(len(Teams))] for y in range(numMatches)])
matrixWin=np.array([0 for x in range(len(Teams))])
matrixLoss=np.array([0 for x in range(len(Teams))])
matrixDiff=np.array([0 for x in range(numMatches)])
matrixWL=np.array([0 for x in range(numMatches)])
matrixOPR=np.array([[0 for x in range(len(Teams))] for y in range((numMatches)*2)])
matrixOPR2=np.array([0 for x in range((numMatches)*2)])
matrixGP = np.array([0 for x in range(len(Teams))])
i=0
while i<numMatches:                                                     #this is where the magic happens and matricies are filled
    j=0
    while j<3:
        matrix1[i][Teams.index(redTeams[i][j])] = weight[i]
        matrixOPR[i][Teams.index(redTeams[i][j])] = weight[i]
        matrixGP[Teams.index(redTeams[i][j])] += 1
        j = j + 1
    j = 0
    while j < 3:
        matrix1[i][Teams.index(blueTeams[i][j])] = -weight[i]
        matrixOPR[i+numMatches-1][Teams.index(blueTeams[i][j])] = weight[i]
        matrixGP[Teams.index(blueTeams[i][j])] += 1
        j = j + 1
    matrixDiff[i]=(int(redScores[i])-int(blueScores[i]))*weight[i]
    matrixOPR2[i]=int(redScores[i])*weight[i]
    matrixOPR2[i+numMatches-1] = int(blueScores[i]) * weight[i]
    if redScores[i]>blueScores[i]:
        matrixWL[i] = weight[i]
        matrixWin[Teams.index(redTeams[i][0])] += 1
        matrixWin[Teams.index(redTeams[i][1])] += 1
        matrixWin[Teams.index(redTeams[i][2])] += 1

        matrixLoss[Teams.index(blueTeams[i][0])] += 1
        matrixLoss[Teams.index(blueTeams[i][1])] += 1
        matrixLoss[Teams.index(blueTeams[i][2])] += 1
    elif redScores[i]<blueScores[i]:
        matrixWL[i] = -weight[i]
        matrixWin[Teams.index(blueTeams[i][0])] += 1
        matrixWin[Teams.index(blueTeams[i][1])] += 1
        matrixWin[Teams.index(blueTeams[i][2])] += 1

        matrixLoss[Teams.index(redTeams[i][0])] += 1
        matrixLoss[Teams.index(redTeams[i][1])] += 1
        matrixLoss[Teams.index(redTeams[i][2])] += 1
    i=i+1

#Solve the matrix
print(weight)
c = np.linalg.lstsq(matrix1, matrixDiff, rcond=None)[0]                 #matricies are solved
d = np.linalg.lstsq(matrix1, matrixWL, rcond=None)[0]
OPR = np.linalg.lstsq(matrixOPR, matrixOPR2, rcond=None)[0]


cstd=np.std(c)                                                          #data is put in terms of standard deviations away from the mean
cmean=np.mean(c)
c=(c-cmean)/cstd
cmax = np.amax(c)                                                       #added math to where the more games you play, the more deviated you can be
cmin = np.amin(c)
c = ((c*matrixGP)+cmax-cmin)/(matrixGP+2)

dstd=np.std(d)
dmean=np.mean(d)
d=(d-dmean)/dstd
dmax = np.amax(d)
dmin = np.amin(d)
d = ((d*matrixGP)+dmax-dmin)/(matrixGP+2)

OPRstd=np.std(OPR)
OPRmean=np.mean(OPR)
OPR=(OPR-OPRmean)/OPRstd
OPRmax = np.amax(OPR)
OPRmin = np.amin(OPR)
OPR = ((OPR*matrixGP)+OPRmax-OPRmin)/(matrixGP+2)

i=0
e=[]
while i<len(c):                                                         #e=c+d+OPR, or total=ptDiff+WL+OPR
    e.append(c[i] + d[i] + OPR[i])
    i+=1
print (e[0])
i=0
Top=-99999
TopIndex=0
higher=99999
j=1
while j<=100:                                                           #outputs top 100 in order
    while i<len(Teams):
        if e[i]>Top:
            if e[i]<higher:
                Top = e[i]
                TopIndex=i
        i+=1

    print(str(Teams[TopIndex])+" "+str(matrixWin[TopIndex])+" "+str(matrixLoss[TopIndex])+" "+str(	"{:.3f}".format(e[TopIndex]))+" "+str(c[TopIndex])+" "+str(d[TopIndex])+" "+str(OPR[TopIndex]))
    j=j+1
    i=0
    higher=Top
    Top=-99999