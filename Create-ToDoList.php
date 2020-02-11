<?php
    include "datalayer.php"; 
    include "include/header.php";
?>


<?php
    $list_nameErr = "";
    $list_name = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid = true;
            if (empty($_POST["list_name"])) {
                $list_nameErr = "name is required";
                $valid = false;
            } 
            else {
                $_POST["list_name"] = requiredForm($_POST["list_name"]);

            if($valid == true){
                addlist($_POST);
                header("Location: index.php");
            }
        }
    }
?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
    <p><span class="error">* required field</span></p>
    <form method="post" action= "Create-ToDoList.php" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
        <p>list name </p><input type="text" name="list_name" value="<?= $_POST["list_name"] ?>"> 
        <span class="error">* <?php echo $list_nameErr;?></span>
        <input type="submit" name="create">
    </form>
</div>

<?php
    include "include/footer.php";
?> 