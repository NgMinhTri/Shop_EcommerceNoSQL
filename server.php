<?php

require_once 'vendor/autoload.php';

    use Laudis\Neo4j\Databags\Statement;


    $client = Laudis\Neo4j\ClientBuilder::create()
        ->addHttpConnection('backup', 'http://neo4j:123@localhost')
        ->addBoltConnection('default', 'bolt://neo4j:123@localhost:7687')
        ->setDefaultConnection('default')
        ->build();
session_start();
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "e_commercenosql");

$name = "";
$city = "";
$country = "";
$zipcode = "";
$email = "";
$phone = "";
$address = "";
$username="";
$pass="";
$error= array();
if (isset($_POST['register'])){
	$name = $_POST['Name'];
	$city = $_POST['City'];
	$country = $_POST['Country'];
	$zipcode = $_POST['Zip-Code'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$phone = $_POST['Phone']; 
	$address = $_POST['Address'];
	if(empty($name)){
		array_push($error, 'The username can not be empty');
	}
	if(empty($city)){
		array_push($error, 'The city can not be empty');
	}
	if(empty($country)){
		array_push($error, 'The country can not be empty');
	}
	if(empty($zipcode)){
		array_push($error, 'The zipcode can not be empty');
	}
	if(empty($email)){
		array_push($error, 'The email can not be empty');
	}
	if(empty($password)){
		array_push($error, 'The password can not be empty');
	}
	if(empty($phone)){
		array_push($error, 'The phone can not be empty');
	}
	if(empty($address)){
		array_push($error, 'The address can not be empty');
	}
	if (count($error)==0){
		$password1=md5($password);
		$sql = "INSERT INTO `Customer`(Username, `Password`, Email, `Address`, City, Country, Zipcode, Phone) VALUES ('$name', '$password1','$email','$address','$city','$country','$zipcode','$phone')";
		mysqli_query($conn, $sql);
		$_SESSION['username']=$name;
		$_SESSION['success']= 'You are logged in';
		$client->run("CREATE(n:Customer {name: '$name', password: '$password1'})");
		header('Location: products.php');
	}
}
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	if(empty($username)){
		array_push($error, 'The username can not be empty');
	}
	if(empty($pass)){
		array_push($error, 'The password can not be empty');
	}
	if(count($error)==0){
		$pass=md5($pass);
		$sql = "Select Username,`Password` from Customer where Username='$username' and Password='$pass'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)==1){
			$_SESSION['username']=$username;
			$_SESSION['success']= 'You are logged in';
			$results = $client->run("MATCH (a:Customer {name: '$username'})-[:HasCart]->(b)
									RETURN b.name, b.Price");
			$i = 0;
			foreach($results as $key=>$value){
				$_SESSION['cart'][$i] = array('name'=>$value['b.name'], 'Price'=>$value['b.Price'], 'Quantity'=>1);
				$i++;
			}
			header('Location: products.php');
			
		}
		else{
			array_push($error, 'The password or username is not correct');
			//header('Location: login.php');

		}
	}
}

if (isset($_POST['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('Location: login.php');
}
?> 