<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >
 
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Add New Bird</h2>

 	<div class="col-md-6">
      
      <?php
      if(isset($_POST['submit']))
      {
		  $n_birdno = $_POST['birdno'];
		  $n_weight = $_POST['weight'];
		  $n_breed = $_POST['breed'];
		  $n_batch = $_POST['batch'];
		  $n_status = $_POST['status'];
		  $n_gender = $_POST['gender'];
      	

      	$insert = $db->query("INSERT INTO birds(birdno,weight,breed_id,batch_id,health_status,gender) VALUES('$n_birdno','$n_weight','$n_breed','$n_batch','$n_status','$n_gender') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Bird successfully created <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error creatiing bird data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>




 		<form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
	 			<label class="control-label">Bird No.</label>
	 			<input type="text" name="birdno" class="form-control" value="bird-fms-<?php echo mt_rand(0000,9999); ?>" readonly="on" required>
	 		</div>

			 <div class="form-group">
	 			<label class="control-label">Batch</label>
	 			<select name="batch" class="form-control" required>
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
	 			<label class="control-label">Bird Weight in Kg</label>
	 			<input type="text" name="weight" class="form-control" required>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Gender</label>
	 			<select name="gender" class="form-control" required>
	 				<option value="M">Male</option>
	 				<option value="F">Female</option>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Health Status</label>
	 			<select name="status" class="form-control" required>
	 				<option value="healthy">Healthy</option>
	 				<option value="on treatment">On treatment</option>
	 				<option value="sick">Sick</option>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Breed</label>
	 			<select name="breed" class="form-control" required>
	 				<?php
	                   $getBreed = $db->query("SELECT * FROM breed");
	                   $res = $getBreed->fetchAll(PDO::FETCH_OBJ);
	                   foreach($res as $r){ ?>
	                     <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>   
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Update</button>
 		</form>
 	</div>
 </div>
</div>

</div>
<?php include 'theme/foot.php'; ?>