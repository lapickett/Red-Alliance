f<html>
<head>
	<title>This is title</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta charset="utf-8" /> <!-- standard practice to declare character set of webpage-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery could be useful in the future 0.0-->
</head>
<body>
	<div class="navbar">
			<div id=image>
				<img src="Lamp.png" alt="Italian Trulli">
			</div>
			<div id=links>
				<a href="#home">The Red Alliance Alpha</a>
				<a href="#tbd1">TBD</a>
				<a href="#tbd2">TBD</a>
			</div>
	</div>
	<div id="container">
		<div id="content">
			<button type="button" id="button" onclick="init()">Refresh</button>
			<script src="./MyScript.js"></script>
			<script>init();</script>
			<script src="./MyScript.js"></script>
			<table style="width:100%">
				<tr>
					<th>Rank</th>
					<th>Team</th>
					<th>Wins</th>
					<th>Lossses</th>
					<th>RA Rating</th>
					<th>Pt-Diff Rating</th>
					<th>Win Rating</th>
					<th>OPR Rating</th>
				</tr>

<?php
$i=0;
while($i<100){
	$j=$i+1;
	echo "<tr>".PHP_EOL;
	echo "<td>".$j."</td>".PHP_EOL;
	$number = "data_".$i."_0";
	echo "<td id='".$number."'>hi</td>".PHP_EOL;
	$number = "data_".$i."_1";
	echo "<td id='".$number."'>hi</td>".PHP_EOL;
	$number = "data_".$i."_2";
	echo "<td id='".$number."'>hi</td>".PHP_EOL;
	$number = "data_".$i."_3";
	echo "<td id='".$number."'>hi</td>".PHP_EOL;
	$number = "data_".$i."_4";
	echo "<td id='".$number."'>hi</td>".PHP_EOL;
	$number = "data_".$i."_5";
	echo "<td id='".$number."'>hi</td>".PHP_EOL;
	$number = "data_".$i."_6";
	echo "<td id='".$number."'>hi</td>".PHP_EOL;
	echo "</tr>".PHP_EOL;
	$i+=1;
}
?>

			</table>
			
		</div>
		<div id="footer">
			Copyright &copy; 2020 Lucas Pickett.
		</div>
	</div>
</body>
</html>