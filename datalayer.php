<?php
 	function DBconnect(){
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$database = "ToDoList";
	
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

    function CleanupInput($data) {
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

    function GetAllLists(){
        $conn = DBconnect();
        $query = $conn->prepare("SELECT * FROM lists");
        $query->execute();
        $result = $query->fetchAll();
        return $result;  
    }

    function deletelists($data){
        $conn = DBconnect();
        $query = $conn->prepare("DELETE FROM `lists` WHERE `list_id`=". $data);
        $query->bindParam(":list", $data);
        $query->execute();
    }

    function deletetask($data){
        $conn = DBconnect();
        $query = $conn->prepare("DELETE FROM `tasks` WHERE `task_list_id`=". $data);
        $query->bindParam(":list", $data);
        $query->execute();
        deletelists($data);
    }

    function GetAllTasks(){
        $conn = DBconnect();
        $query = $conn->prepare("SELECT * FROM tasks");
        $query->execute();
        $result = $query->fetchAll();
        return $result;  
    }

    function addtask($data){
        $conn = DBconnect();
        $query = $conn->prepare("INSERT INTO tasks (task_list_id, task_name, task_duration, task_status) VALUES (:task_list_id, :task_name, :task_duration, :task_status)");
        $query->bindParam(":task_list_id", $data['task_list_id']);
        $query->bindParam(":task_name", $data['task_name']);
        $query->bindParam(":task_duration", $data['task_duration']);
        $query->bindParam(":task_status", $data['task_status']);
        $query->execute();
    }