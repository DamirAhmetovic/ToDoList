<?php
require "datalayer.php";
deletetask($_GET["list_id"]);
header("Location: ListIndex.php");
