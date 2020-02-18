<?php
    foreach($lists as $list){ 
    	?>
    	<div class="list_styling">
    	<?php printf("<h3>%s</h3>", $list["list_name"]);
		?>
			<!-- <div class="delete">
  				<a class="DeleteLink" href="deleteConfirmation.php?id=<?php echo $list['id']; ?>/">delete</a>
			</div> -->
    	      
    	    <!-- <a class="Update" href="update.php?id=<?php echo $list['id']; ?>/">update</a> -->
        </div>
<?php }; ?>