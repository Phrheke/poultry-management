<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >

 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Create New Feeding Schedule</h2>

 	<div class="col-md-6">
      
      <?php
      if(isset($_POST['submit']))
      {
		  $n_batch_id = $_POST['batch_id'];
		  $n_feeding_time = $_POST['feeding_time'];
		  $n_feed_type = $_POST['feed_type'];
		  $n_feed_qty = $_POST['feed_qty'];
      	

      	$insert = $db->query("INSERT INTO feedingschedule(batch_id,feeding_time,feed_type,feed_qty) VALUES('$n_batch_id','$n_feeding_time','$n_feed_type','$n_feed_qty') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Schedule successfully created <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error creating schedule. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>


 		<form method="post" autocomplete="off" enctype="multipart/form-data">
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

	 		<div class="form-group">
	 			<label class="control-label">Feeding Time</label>
	 			<select name="feeding_time" class="form-control" required>
	 				<option value=""></option>
	 				<option value="06:00 AM">06:00 AM</option>
	 				<option value="06:00 PM">06:00 PM</option>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Feed Type</label>
	 			<select name="feed_type" class="form-control" required>
	 				<option value=""></option>
	 				<option value="starter">Starter</option>
	 				<option value="grower">Grower</option>
	 				<option value="layer">Layer</option>
	 				<option value="finisher">Finisher</option>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Feed Qty</label>
	 			<select name="feed_qty" class="form-control" required>
	 				<option value=""></option>
	 				<option value="5">5Kg</option>
	 				<option value="10">10Kg</option>
	 				<option value="20">20Kg</option>
	 			</select>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Update</button>
 		</form>
 	</div>
 </div>
</div>

</div>
<?php include 'theme/foot.php'; ?>