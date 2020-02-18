<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "datalayer.php";
    $valid = true;
    if (empty($_POST["list_name"])) {
        $list_nameErr = "name is required";
        $valid = false;
    } else {
        $_POST["list_name"] = CleanupInput($_POST["list_name"]);

        if ($valid == true) {
            addlist($_POST);
            header("Location: ListIndex.php");
        }
    }
}
?>
<?php
include "include/header.php";
?>
<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
    <p><span class="error">* required field</span></p>
    <form method="post" action="ListCreate.php" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
        <p>list name </p><input type="text" placeholder="list name" name="list_name" value="<?= $_POST["list_name"] ?>">
        <span class="error">* <?php echo $list_nameErr; ?></span>
        <input type="submit" name="create">
    </form>
</div>

<?php
include "include/footer.php";
?>

index.php