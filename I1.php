<?php
$db_connection = mysql_connect("localhost", "cs143", "") or die('Could not connect'.mysql_error());
if (!db_connection) {
	$errmsg=mysql_error($db_connection);
	print "Connection failed <br>";
	exit(1);
}
mysql_select_db("CS143", $db_connection);
function insertActor($last, $first, $sex, $dob, $dod)
{
		$existQuery = "SELECT * FROM Actor WHERE last = '$last' AND first = '$first' AND  sex = '$sex' AND dob = '$dob'";
		$existResult = mysql_query($existQuery);
		if ($existResult && mysql_fetch_row($existResult))
			//Actor already exists in actor table.
		{
			print ("Actor already exists, no records updated.");
			return;
		}

		$existQuery = "SELECT id FROM Director WHERE last = '$last' AND first = '$first' AND dob = '$dob'";
		$existResult = mysql_query($existQuery);
			//Actor already exists in director table.
		$idNumber = mysql_fetch_row($existResult); //get id number of director
		if ($idNumber[0]) //if able to fetch a row
		{
			$query = "INSERT INTO Actor VALUES ($idNumber[0], '$last', '$first', '$sex', '$dob', '$dod')";
			$queryResults = mysql_query($query);
			if ($queryResults)
			{
				print ("Existing director added to actor table.");
				return;
			}
		}

		else
		{
			$query = "UPDATE MaxPersonID  SET id =id+1 WHERE id >= 0";
			$queryResult = mysql_query($query);
			$query = "SELECT id FROM MaxPersonID";
			$queryResult = mysql_query($query);
			$idNumber = mysql_fetch_row($queryResult);
			$query = "INSERT INTO Actor VALUES ($idNumber[0], '$last', '$first', '$sex', '$dob', '$dod')";
			$queryResult = mysql_query($query);
			echo $query;
			echo "<br>";
			echo $idNumber[0];
			if ($queryResult)
			{
				print ("New actor successfully added into Actor table");
			}
			else
			{
				print ("Oh no!");
			}
		}
}

function insertDirector($last, $first, $dob, $dod)
{
		$existQuery = "SELECT * FROM Director WHERE last = '$last' AND first = '$first' AND dob = '$dob'";
		$existResult = mysql_query($existQuery);
		if ($existResult && mysql_fetch_row($existResult))
			//Director already exists in Director table.
		{
			print ("Director already exists, no records updated.");
			return;
		}

		$existQuery = "SELECT id FROM Actor WHERE last = '$last' AND first = '$first' AND dob = '$dob'";
		$existResult = mysql_query($existQuery);
		$idNumber = mysql_fetch_row($existResult);
		if ($idNumber[0])
		{
			$query = "INSERT INTO Director VALUES ($idNumber[0], '$last', '$first', '$dob', '$dod')";
			$queryResult = mysql_query($query);
			if ($queryResult)
			{
				print ("Existing actor added to director table.");
				return;
			}
		}

		else
		{
			$query = "UPDATE MaxPersonID  SET id = (id + 1)";
			$queryResult = mysql_query($query);
			$query = "SELECT id FROM MaxPersonID";
			$queryResult = mysql_query($query);
			$idNumber = mysql_fetch_row($queryResult);
			$query = "INSERT INTO Director VALUES ($idNumber[0], '$last', '$first', '$dob', '$dod')";
			$queryResult = mysql_query($query);
			if ($queryResult)
			{
				print ("New director successfully added into Director table");
			}
			else
			{
				print ("Oh no!");
			}
		}
}



$identity = $_GET['identity'];
$last = $_GET['last'];
$first = $_GET['first'];
$sex = $_GET['sex'];
$dob = $_GET['dob'];
$dod = $_GET['dod'];

if ($identity && $first && $last && $sex && $dob)
{
	if ($identity == 'actor')
		insertActor($last, $first, $sex, $dob, $dod);
	else
		insertDirector($last, $first, $dob, $dod);
}
else
{
	echo "No query was input";
}



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
		Add New Actor/Director:<br>
		<form method="GET" ACTION="I1.php">
			Identity: 
			<input type="radio" value="actor" name="identity" checked="true">Actor
			<input type="radio" value="director" name="identity" >Director<br>
			<hr></hr>
			First Name: <input type="text" maxlength="20" name="first"><br>
			Last Name: <input type="text" maxlength="20" name="last"><br>
			Sex: 
			<input type="radio" value="female" name="sex" checked="true">Female
			<input type="radio" value="male" name="sex">Male<br>
			Date of Birth: <input type="text" name="dob"><br/>
			Date of Death: <input type ="text" name="dod"> (leave blank if still alive)<br/>
			<hr></hr>
			<input type="submit" value="Submit!">
			

		</form>
	</div>

</html>
HTMLCODE;
mysql_close($db_connection);
?>