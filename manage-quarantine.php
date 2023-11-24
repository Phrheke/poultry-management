<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>



<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >

 <div class="w3-container" style="padding-top:22px">
	 <div class="w3-row">
		<div class='flex-header'>
			<h2>Quarantine List</h2>
			<a title="Check to delete from list" data-toggle="modal" data-target="#_remove" id="delete"  class="btn-delete">Discharge</i></a>
		</div>
	 	<div class="col-md-12">
	 		<form method="post" action="remove_quarantine.php">
	 		<table class="table table-hover" id="table">
	 			<thead>
	 				<tr>
	 					<th></th>
	 					<th>Bird No</th>
	 					<th>Date quarantined</th>
	 					<th>Breed</th>
	 					<th>Reason</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php

	 				$get = $db->query("SELECT * FROM quarantine");
	 				$res = $get->fetchAll(PDO::FETCH_OBJ);
	 				foreach($res as $n){ ?>
                         <tr>
                         	<td>
                         		<input type="checkbox" name="selector[]" value="<?php echo $n->id ?>">
                         	</td>
                         	<td> <?php echo $n->bird_no; ?> </td>
                         	<td>  <?php echo $n->date_q; ?> </td>
                         	<td><?php echo $n->breed; ?> </td>
                         	<td> <?php echo $n->reason; ?> </td>
                         </tr> 
	 				<?php }

	 				?>
	 			</tbody>
	 		</table>

	 		<?php include('inc/modal-delete.php'); ?>
	 	</form>
	 	</div>
	 	 </div>
</div>

</div>

<?php include 'theme/foot.php'; ?>