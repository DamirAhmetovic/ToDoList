<?php
	require "datalayer.php";
    delete1task($_GET["task_id"]);
	header("Location: ListIndex.php");
?>