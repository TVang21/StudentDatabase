<?php

$pid = $_POST['professorID'];
$name = $_POST['name'];

$servername = "ecs-pd-proj-db.ecs.csus.edu";
$username = "CSC1741532";
$password = "123456";
$db = "classDB";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$statement = $conn->prepare("insert into PROFESSOR(pid,name) values(?,?)");

$statement->bind_param("is",$pid,$name,);

$statement->execute();

echo "ADDED: ".$pid.", ".$name."<br>";

$statement->close();
$conn->close();

?>