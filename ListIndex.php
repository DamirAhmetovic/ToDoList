<?php
include "datalayer.php";
$data = GetAllLists($_GET["list_id"]);
$lists = GetAllLists();
$tasks = GetAllTasks();
?>

<?php
include "include/header.php";
?>
<!-- First Grid -->
<form action="TaskAdd.php?list_id=" method="post">
    <button class="w3-button w3-green">Add</button>
</form>
<?php foreach ($lists as $list) { ?>
    <div class="list_name">
        <h2> <?php echo $list['list_name']; ?> </h2>
        <div class="w3-row-padding w3-padding-64 w3-container">
            <table class="w3-table-all w3-small">
                <thead>
                    <tr class="w3-red">
                        <th>id</th>
                        <th>task</th>
                        <th>duration</th>
                        <th>status</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                    <?php foreach ($tasks as $task) { ?>
                        <tr>
                            <td><?php echo $task['task_list_id']; ?></td>
                            <td><?php echo $task['task_name']; ?></td>
                            <td><?php echo $task['task_duration']; ?></td>
                            <td><?php echo $task['task_status']; ?></td>
                            <td>
                                <form action="ListEdit.php?list_id=" method="post">
                                    <button class="w3-button w3-red">+</button>
                                </form>
                            </td>
                            <td>
                                <form action="#?list_id=<?php echo $list['list_id']; ?>" method="post">
                                    <button class="w3-button w3-red">-</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
        </div>
        <form action="ListDelete.php?list_id=<?php echo $list['list_id']; ?>" method="post">
            <button class="w3-button w3-red">delete</button>
        </form>
    </div>
<?php } ?>

<?php
include "include/footer.php";
?>