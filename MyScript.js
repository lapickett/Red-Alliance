function refresh() {
	var req = new XMLHttpRequest();
	console.log("Grabbing Value");
	req.onreadystatechange = function () {
		if (req.readyState == 4 && req.status == 200) {
          		document.getElementById("demo").innerHTML = req.responseText;
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