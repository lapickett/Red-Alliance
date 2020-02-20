function refresh() {
	var req = new XMLHttpRequest();
	console.log("Grabbing Value");
	req.onreadystatechange = function () {
		if (req.readyState == 4 && req.status == 200) {
			var contents = req.responseText;
			var tdata = contents.split("\n");
			var i;
			var points = [];
			for (i=0; i<tdata.length; i++){
				var p = tdata[i].split(" ");
				points.push(p);
			}
			var j;
			for (i=0; i<points.length; i++){
				for (j=0; j<points[i].length; j++){
					document.getElementById("demo"+str(i)+str(j)).innerHTML = points[i][j];
				}
          			
			}
        	}
      	}
	req.open("GET", 'Bridge.txt', true);
	req.send(null);
}

function init() {
	refresh()
	var int = self.setInterval(function () {
		refresh()
	}, 1000);
}