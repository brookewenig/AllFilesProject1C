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
		Show Movie Information<br>
		<!--php -->
		Actors in this movie<br>
		<!--php -->
		User Review<br>
		<!--php -->
		<hr></hr>
		<form method="GET" ACTION="B1.php">
			Search for other actors/movies<br>
                        Search: <input type="text" name="keyword"></input>
                        <input type="submit" value="Search"/>
		</form>
	</div>

</html>
HTMLCODE;
mysql_close($db_connection);
?>