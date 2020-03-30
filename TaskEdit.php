<?php
include "datalayer.php";
$AllLists = GetAllLists();
$tasks = GetSpecificTask($_GET["task_id"]);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;
    if (empty($_POST["task_list_id"])) {
        $task_list_idErr = "list is required";
        $valid = false;
    } else {
        $_POST["task_list_id"] = CleanupInput($_POST["task_list_id"]);
    }
    if (empty($_POST["task_name"])) {
        $task_nameErr = "name is required";
        $valid = false;
    } else {
        $_POST["task_name"] = CleanupInput($_POST["task_name"]);
    }
    if (empty($_POST["task_duration"])) {
        $task_durationErr = "duration is required";
        $valid = false;
    } else {
        $_POST["task_duration"] = CleanupInput($_POST["task_duration"]);
    }
    if (empty($_POST["task_status"])) {
        $task_statusErr = "status is required";
        $valid = false;
    } else {
        $_POST["task_status"] = CleanupInput($_POST["task_status"]);
    }
    if ($valid == true) {
        EditTask($_POST);
        header("Location: ListIndex.php");
    }
}
?>
<?php
include "include/header.php";
?>

<div class="w3-container w3-red">
    <h2>edit task</h2>
</div>

<form class="w3-container" method="post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
    <input type="hidden" name="task_id" value="<?= $AllLists["task_id"] ?>">
    <div class="TaskAddForm">
        <select class="mdb-select md-form" name="task_list_id">
            <?php foreach ($AllLists as $AllList) { ?>
                <option value=<?php echo $AllList["list_id"] ?>><?php echo $tasks["list_id"] . " " . $AllList["list_name"] ?> </option>
            <?php } ?>
        </select>

        <label class="w3-text-red"><b>task</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="task_name" value="<?php echo $tasks["task_name"] ?>">
        <span class="error"> <?php //echo $task_nameErr; 
                                ?></span>

        <label class="w3-text-red"><b>duration task</b></label>
        <input class="w3-input w3-border w3-light-grey" type="number" name="task_duration" value="<?php echo $tasks["task_duration"] ?>">
        <span class="error"> <?php //echo $task_durationErr; 
                                ?></span>

        <select class="mdb-select md-form" name="task_status">
            <option value="to do"> to do </option>
            <option value="done"> done </option>
        </select>



    </div>
    <div class="TaskAddSubmit">
        <button type="submit" class="w3-btn w3-blue-grey">Edit task</button>
    </div>
</form>

<?php
include "include/footer.php";
?>