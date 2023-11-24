<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >

 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Create New Batch</h2>

 	<div class="col-md-6">
      
      <?php
      if(isset($_POST['submit']))
      {
		  $n_batch_no = $_POST['batch_no'];
		  $n_arrived = $_POST['arrived'];
		  $n_source = $_POST['source'];
      	

      	$insert = $db->query("INSERT INTO batch(batch_no,arrived,source) VALUES('$n_batch_no','$n_arrived','$n_source') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Batch successfully created <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error creating batch. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>


 		<form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
	 			<label class="control-label">Batch No.</label>
	 			<input type="text" name="batch_no" class="form-control" value="batch-pms-<?php echo mt_rand(0000,9999); ?>" readonly="on" required>
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Arrival date</label>
	 			<input type="text" name="arrived" class="form-control" required>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Source</label>
	 			<select name="source" class="form-control" required>
	 				<option value="hatchery">Hatchery</option>
	 				<option value="purchase">Purchase</option>
	 			</select>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Update</button>
 		</form>
 	</div>
 </div>
</div>

</div>
<?php include 'theme/foot.php'; ?>