<html>

<head>
	<title>This is title</title>
	<meta charset="utf-8" /> <!-- standard practice to declare character set of webpage-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- jQuery could be useful in the future 0.0-->
</head>

<body>
	<nav class="nav bg-red">
		<ul>
			<span class="nav-title">The Red Alliance Alpha</span>
			<li><a href="#">TBD</a></li>
			<li><a href="#">TBD</a></li>
		</ul>
	</nav>
	<div id="container">
		<div id="content">
			<button type="button" class="button" onclick="init()">Refresh</button>
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
	</div>
</body>

</html>