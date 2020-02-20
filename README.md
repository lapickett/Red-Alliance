# Red-Alliance
Oh ho ho im lapickett and i like *data science*
# How to run this webpage locally to avoid Cross Origin Resource Sharing (CORS) errors
Assuming you have Linux or Windows Subsystem for Linux (WSL) installed, you can install a webserver program like nginx or apache with your package manager.
 
For the following command line snippet, we assume you are running Ubuntu and want to use the nginx webserver.
 
1. Install the nginx webserver.
```console
    sudo apt update

    sudo apt install nginx -y
```
2. Start the nginx webserver.
```console
    service nginx status

    sudo service nginx start
```
3. Open `localhost:80` in your web browser to see if nginx installed and run properly. You should see a webpage that thanks you for using nginx.

4. Copy the website files over to the /var/www/html/ folder.
```console
    cd Red-Alliance/

    sudo cp * /var/www/html/
```
5. Reload the web page, you should see your index.html hosted.

6. That's all! If you want to update your webpage, just repeat Step 4 to update the webserver files.