<html>
<head>
	<title>This is title</title>
	<meta charset="utf-8" /> <!-- standard practice to declare character set of webpage-->
	<link rel="stylesheet" type="text/css" href="css/style.css" />
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
					for($i = 0; $i < 100; $i++){
						$j=$i+1;
						echo "<tr>\n<td>{$j}</td>\n";
						echo "<td>{$j}</td>";
						for($x = 0; $x <= 6; $x++){
							$number = "data_{$i}_{$x}";
							echo "<td id={$number}></td>\n";
						}
						echo "</tr>";
					}
				?>
			</table>
		</div>
		<script src="./js/Main.js"></script>
		<script>init();</script>
		<div id="footer">
			Copyright &copy; 2020 The Red Alliance.
		</div>
	</div>
</body>
</html>