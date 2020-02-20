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
					var genID = ["demo",i,j].join(""); 
					console.log(genID);
					document.getElementById( genID ).innerHTML = points[i][j];
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
