<?php
$db_connection = mysql_connect("localhost", "cs143", "") or die('Could not connect'.mysql_error());
if (!db_connection) {
	$errmsg=mysql_error($db_connection);
	print "Connection failed <br>";
	exit(1);
}
mysql_select_db("CS143", $db_connection);

$title = $_GET['title'];
$company = $_GET['company'];
$year = $_GET['year'];
$mpaarating = $_GET['mpaarating'];
$genre = $_GET['genre'];
if ($title && $company && $year && $mpaarating)
{
	//If the title, company, and year match, then update Table
	//Otherwise, add new record using maxMovieIdTable.
}
echo <<<HTMLCODE
<html>
<title>Add Movie Info</title>
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
		Add New Movie Info<br>
		<form method="GET" ACTION="I2.php">
		
				Title : <input type="text" name="title" maxlength="20"><br/>
					Company: <input type="text" name="company" maxlength="50"><br/>
					Year : <input type="text" name="year" maxlength="4"><br/>	<!-- Todo: validation-->	
					MPAA Rating : 
					<select name="mpaarating">
							<option value="G">G</option>
							<option value="NC-17">NC-17</option>
							<option value="PG">PG</option>
							<option value="PG-13">PG-13</option>
							<option value="R">R</option>
							<option value="surrendere">Surrendere</option>
					</select>
		<br>
			Genre : 
					<input type="checkbox" name="genre" value="Action">Action</input>
					<input type="checkbox" name="genre" value="Adult">Adult</input>
					<input type="checkbox" name="genre" value="Adventure">Adventure</input>
					<input type="checkbox" name="genre" value="Animation">Animation</input>
					<input type="checkbox" name="genre" value="Comedy">Comedy</input>
					<input type="checkbox" name="genre" value="Crime">Crime</input>
					<input type="checkbox" name="genre" value="Documentary">Documentary</input>
					<input type="checkbox" name="genre" value="Drama">Drama</input>
					<input type="checkbox" name="genre" value="Family">Family</input>
					<input type="checkbox" name="genre" value="Fantasy">Fantasy</input>
					<input type="checkbox" name="genre" value="Horror">Horror</input>
					<input type="checkbox" name="genre" value="Musical">Musical</input>
					<input type="checkbox" name="genre" value="Mystery">Mystery</input>
					<input type="checkbox" name="genre" value="Romance">Romance</input>
					<input type="checkbox" name="genre" value="Sci-Fi">Sci-Fi</input>
					<input type="checkbox" name="genre" value="Short">Short</input>
					<input type="checkbox" name="genre" value="Thriller">Thriller</input>
					<input type="checkbox" name="genre" value="War">War</input>
					<input type="checkbox" name="genre" value="Western">Western</input>
			<br>
			
			<input type="submit" value="Submit!"/>	

		</form>
	</div>

</html>
HTMLCODE;
mysql_close($db_connection);
?>