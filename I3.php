<?php
$db_connection = mysql_connect("localhost", "cs143", "");
if (!db_connection) {
	$errmsg=mysql_error($db_connection);
	print "Connection failed <br>";
	exit(1);
}
mysql_select_db("CS143", $db_connection);

echo <<<HTMLCODE
<html>
<title>Add Actor/Director</title>
<link rel="stylesheet" type="text/css" href="Project1C.css">

	<div id="sidebar">
		<ul>Add New Content:<br>
			<li><a href="I1.php">Add Actor/Director</a></li>
			<li><a href="I2.php">Add Movie Information</a></li>
			<li><a href="I3.php">Add Comments</a></li>
			<li><a href="I4.php">Add Movie/Actor Relation</a></li>
			<li><a href="I5.php">Add Movie/Director Relation</a></li>
		</ul>
		<ul>Browsing Content:<br>
			<li><a href="B1.php">Show Actor Information</a></li>
			<li><a href="B2.php">Show Movie Information</a></li>
		</ul>
		<ul>Search Interface:<br>
			<li><a href="S1.php">Search Actor/Movie</a></li>
		</ul>
	</div>
	<div id="main">
		Add new comment: <br/>
		<form action="I3.php" method="GET">			
			Movie:	<select name="mid">
					<!-- PHP Needed to get movie names -->
					</select>
			<br/>
			Your Name:	<input type="text" name="yourname" maxlength="20"><br/>
			Rating:	<select name="rating">
						<option value="5"> 5 - Excellent </option>
						<option value="4"> 4 - Good </option>
						<option value="3"> 3 - It's ok~ </option>
						<option value="2"> 2 - Not worth </option>
						<option value="1"> 1 - I hate it </option>
					</select>
			<br/>
			Comments: <br/>
			<textarea name="comment" cols="80" rows="10"></textarea>
			<br/>
			<input type="submit" value="Rate!"/>
		</form>
		<hr/>
	</div>

</html>
HTMLCODE;
mysql_close($db_connection);
?>