function refresh() {
	var req = new XMLHttpRequest();
	console.log("Grabbing Value");
	req.onreadystatechange = function () {
		if (req.readyState == 4 && req.status == 200) {
			var contents = req.responseText;
			var tdata = contents.replace("\r","").split("\n");
			var i;
			var points = [];
			console.log(tdata);
			for (i=0; i<tdata.length; i++){
				var p = tdata[i].split(" ");
				points.push(p);
			}
			var j;
			console.log(points);
			for (i=0; i<points.length; i++){
				console.log(i);
				console.log(points[i].length);
				for (j=0; j<points[i].length; j++){
					console.log(i,j);
					var genID = ["data",i,j].join("_"); 
					console.log(genID);
					if (j>3){
						document.getElementById(genID).style.fontWeight = 'bold';
						if(parseFloat(points[i][j])<-0.5){
							document.getElementById( genID ).innerHTML = "Below Avg";
							document.getElementById(genID).style.color = '#cf0a0a';
						}else if(parseFloat(points[i][j])<0.5){
							document.getElementById( genID ).innerHTML = "Average";
							document.getElementById(genID).style.color = '#cf800a';
						}else if(parseFloat(points[i][j])<1.5){
							document.getElementById( genID ).innerHTML = "Above Avg";
							document.getElementById(genID).style.color = '#ebe70c';
						}else if(parseFloat(points[i][j])<2){
							document.getElementById( genID ).innerHTML = "Good";
							document.getElementById(genID).style.color = '#99eb0c';
						}else if(parseFloat(points[i][j])<2.5){
							document.getElementById( genID ).innerHTML = "Great";
							document.getElementById(genID).style.color = '#31eb0c';
						}else if(parseFloat(points[i][j])<3){
							document.getElementById( genID ).innerHTML = "Excellent";
							document.getElementById(genID).style.color = '#0cebeb';
						}else if(parseFloat(points[i][j])<3.5){
							document.getElementById( genID ).innerHTML = "Superior";
							document.getElementById(genID).style.color = '#082ec4';
						}else{
							document.getElementById( genID ).innerHTML = "Perfect";
							document.getElementById(genID).style.color = '#b628de';
						}
					}
					else{
						document.getElementById( genID ).innerHTML = points[i][j];
					}
					
				}
          			
			}
        	}
      	}
	req.open("GET", 'Bridge.txt', true);
	req.send(null);
}

function init() {
	refresh()

	//var some_var = self.setInterval(function () {
	//	refresh()
	//}, 1000);
}