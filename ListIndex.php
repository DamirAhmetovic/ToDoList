<?php
include "datalayer.php";

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
        </tr>
        <?php foreach ($lists as $list) { ?>
            <tr>
                <td><?php echo $list['list_id']; ?></td>
                <td><?php echo $list['list_name']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php
include "include/footer.php";
?>