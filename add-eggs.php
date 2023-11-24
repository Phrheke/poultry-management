<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >

 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Create New Egg Record</h2>

 	<div class="col-md-6">
      
      <?php
      if(isset($_POST['submit']))
      {
		  $n_eggs_collected = $_POST['eggs_collected'];
		  $n_batch_id = $_POST['batch_id'];
		  $n_date_collected = $_POST['date_collected'];
      	

      	$insert = $db->query("INSERT INTO egginventory(eggs_collected,batch_id,date_collected) VALUES('$n_eggs_collected','$n_batch_id','$n_date_collected') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Egg record successfully created <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error creating record. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>


 		<form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
	 			<label class="control-label">Total Eggs</label>
	 			<input type="text" name="eggs_collected" class="form-control" required>
	 		</div>

 			<div class="form-group">
	 			<label class="control-label">Batch</label>
	 			<select name="batch_id" class="form-control" required>
	 				<option value=""></option>
	 				<?php
	                   $getBatch = $db->query("SELECT * FROM batch");
	                   $dat = $getBatch->fetchAll(PDO::FETCH_OBJ);
	                   foreach($dat as $d){ ?>
	                     <option value="<?php echo $d->id; ?>"><?php echo $d->batch_no; ?></option>   
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Date of Collection</label>
	 			<input type="text" name="date_collected" class="form-control" required>
	 		</div>


	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Update</button>
 		</form>
 	</div>
 </div>
</div>

</div>
<?php include 'theme/foot.php'; ?>