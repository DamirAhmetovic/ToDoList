<?php
 	function DBconnect(){
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$database = "GameDag";
	
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $conn;
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }	
    };
    
    function getList($id){
        $conn = DBconnect();
        $query = $conn->prepare("SELECT * FROM lists WHERE id=:id");
        $query->bindParam(":list_id", $list_id);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function requiredForm($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    function addlist($data){
        $conn = DBconnect();
        $query = $conn->prepare("INSERT INTO lists (list_name) VALUES (:list_name)");
        $query->bindParam(":list_name", $data['list_name']);
        $query->execute();
    }