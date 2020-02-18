<?php
include "datalayer.php";
$list_test = GetAllLists($_GET["list_id"]);
$lists = GetAllLists();
?>

<?php
include "include/header.php";
?>
<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
    <table class="w3-table w3-striped w3-border">
        <tr>
            <th>id</th>
            <th>list name</th>
            <!-- <th>to do</th>
            <th>duration</th>
            <th>status</th> -->
        </tr>
        <?php foreach ($lists as $list) { ?>
            <tr>
                <td><?php echo $list['list_id']; ?></td>
                <td><?php echo $list['list_name']; ?></td>
                <!-- <td> <button class="w3-button w3-xlarge w3-circle w3-red w3-card-4">+</button> </td> -->
                <td>
                    <form action = "list_delete.php?list_id=<?php echo $list['list_id']; ?>" method="post">
			        <button class="w3-button w3-red">-</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php
include "include/footer.php";
?>