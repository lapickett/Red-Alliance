<html>

<head>
	<title>The Red Alliance Alpha</title>
	<meta charset="utf-8" /> <!-- standard practice to declare character set of webpage-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/teamStyle.css" />
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- jQuery could be useful in the future 0.0-->
</head>

<body>
	<nav class="nav bg-red">
		<ul class="nav-container">
			<div class="nav-start">
				<span class="nav-title">The Red Alliance Alpha</span>
				<li class="nav-item hover"><a href="#Rankings">Rankings</a></li>
				<li class="nav-item hover"><a href="#Fantasy">Fantasy</a></li>
				<li class="nav-item hover"><a href="#Lab">Lab</a></li>
			</div>
			<div class="nav-right">
				<li class="nav-item">
					<form action="" class="nav-search">
						<button type="submit">Search</button>
						<input type="search" name="" id="">
					</form>
				</li>
			</div>
		</ul>
	</nav>
	<div id="container">
		<button type="button" class="button" onclick="init()">Refresh</button>
		<div id="content">
			<div id="left">
				<div id="TeamNO"> <h1 id = "data_0"></h1> </div>
				<div id="TeamWL"><p id = "data_2"></p></div>
				<table style="width:100%">
					<tr>
						<td>RA Rating:</td>
						<td id=data_3>HI</td>
					</tr>
					<tr>
						<td>Pt-diff:</td>
						<td id=data_4>HI</td>
					</tr>
					<tr>
						<td>WL:</td>
						<td id=data_5>HI</td>
					</tr>
					<tr>
						<td>OPR:</td>
						<td id=data_6>HI</td>
					</tr>
				
				</table>
			</div>
			<div id="right">
				<div id="chartContainer" style="height: 370px; width: 90%;"></div>
				<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				<p>London is the capital city of England.</p>
			</div>
		</div>
		<script src="./js/TeamLoad.js"></script>
		<script>init(<?php echo $_GET['team']?>);</script>
		<div id="footer">
			Copyright &copy; 2020 The Red Alliance.
		</div>
	</div>
</body>

</html>