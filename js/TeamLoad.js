function refresh(teamNO) {
	var req = new XMLHttpRequest();
	console.log("Grabbing Value");
	var colors = {
		belowAverage: "#cf0a0a",
		average: "#cf800a",
		aboveAverage: "#ebe70c",
		good: "#99eb0c",
		great: "#31eb0c",
		excelent: "#0cebeb",
		superior: "#082ec4",
		perfect: "#b628de"
	}
	req.onreadystatechange = function () {
		if (req.readyState == 4 && req.status == 200) {
			var contents = req.responseText;
			var tdata = contents.replace("\r", "").split("\n");
			var i;
			var points = [];
			console.log(tdata);
			for (i = 0; i < tdata.length; i++) {
				var p = tdata[i].split(" ");
				points.push(p);
			}
			var j;
			console.log(points);
			for (i = 0; i < points.length; i++) {
				console.log(i);
				console.log(points[i].length);
				if(points[i][0] == teamNO){
					for (j = 0; j < points[i].length; j++) {
						var _points = parseFloat(points[i][j]);
						console.log(i, j);
						var genID = ["data", j].join("_");
						if (j > 3) {
							$(`#${genID}`).css("font-weight", "bold")
							if (_points < -0.5) { // Below Average
								$(`#${genID}`).text("Below Avg").css("color", colors.belowAverage);
							} else if (_points < 0.5) { // Average
								$(`#${genID}`).text("Average").css("color", colors.average);
							} else if (_points < 1.5) { // Above Average
								$(`#${genID}`).text("Above Avg").css("color", colors.aboveAverage);
							} else if (_points < 2) { // Good
								$(`#${genID}`).text("Good").css("color", colors.good);
							} else if (_points < 2.5) { // Great
								$(`#${genID}`).text("Great").css("color", colors.great);
							} else if (_points < 3) { // Excellent
								$(`#${genID}`).text("Excellent").css("color", colors.excelent);
							} else if (_points < 3.5) { // Superior
								$(`#${genID}`).text("Superior").css("color", colors.superior);
							} else { // Perfect
								$(`#${genID}`).text("Perfect").css("color", colors.perfect);
							}
						} else if (j == 2) {
							var str1 = points[i][1];
							var str2 = "-";
							var str3 = points[i][2];
							var fin = str1.concat(str2, str3);
							$(`#${genID}`).text(fin).css("font-size", "54px");
						} else if (j == 0){
							$(`#${genID}`).text(points[i][j]).css("font-size", "96px");
						} else if (j == 3){
							$(`#${genID}`).text(points[i][j]);
						}
					}
				}
			}
		}
	};
	req.open("GET", "Bridge.txt", true);
	req.send(null);
}

function makeChart(){
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Matrix determined PT Difference"
	},
	axisX:{
		interval: 1
	},
	axisY2:{
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		title: "Points"
	},
	data: [{
		type: "column",
		name: "companies",
		axisYType: "primary",
		color: "#014D65",
		dataPoints: [
			{ y: 2, label: "-5" },
			{ y: 0, label: "0" },
			{ y: 1, label: "5" },
			{ y: 3, label: "10" },
			{ y: 7, label: "15" },
			{ y: 4, label: "20" },
			{ y: 1, label: "25" },
		]
	}]
});
chart.render();
}

function init(a) {
	refresh(a);
	makeChart();
	//var some_var = self.setInterval(function () {
	//	refresh()
	//}, 1000);
}