<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-bird.php');

 }else{
 	
 	$birdno = $weight = $gender = $bname = $b_id = $health = $batch_no = $batch_id ="";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM birds WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $birdno = $obj->birdno;
       $weight = $obj->weight;
	   $gender = $obj->gender;
	   $b_id = $obj->breed_id;
	   $batch_id = $obj->batch_id;
	   $health = $obj->health_status;

	     $k = $db->query("SELECT * FROM breed WHERE id = '$b_id' ");
       	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
       	 foreach ($ks as $r) {
       	 	$bname = $r->name;

				$q = $db->query("SELECT * FROM batch WHERE id = '$batch_id' ");
       	 		$qs = $q->fetchAll(PDO::FETCH_OBJ);
       	 		foreach ($qs as $d) {
       	 			$batch_no = $d->batch_no;
       	 }
       	 }
 	}
 }

?>
<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >
 
<div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
  
 	<div class="col-md-6">

     <?php
      if(isset($_POST['submit']))
      {
      	$n_birdno = $_POST['birdno'];
      	$n_weight = $_POST['weight'];
      	$n_breed = $_POST['breed'];
      	$n_batch = $_POST['batch'];
      	$n_status = $_POST['status'];

      	$n_id = $_GET['id'];

      	$update_query = $db->query("UPDATE birds SET birdno = '$n_birdno',weight = '$n_weight', breed_id = '$n_breed', batch_id = '$n_batch' ,health_status = '$n_status' WHERE id = '$n_id' ");

      	if($update_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Bird details successfully update <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error updating bird data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>




 		<h2>Edit Bird</h2>
	 	<form method="post">
	 		<div class="form-group">
	 			<label class="control-label">Bird No.</label>
	 			<input type="text" name="birdno" class="form-control" value="<?php echo $birdno; ?>" readonly>
	 		</div>
			
			<div class="form-group">
	 			<label class="control-label">Batch</label>
				<input type="text" name="batch" class="form-control" value="<?php echo $batch_no; ?>" readonly>	 			
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Bird Weight in Kg</label>
	 			<input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
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
	 			<select name="breed" class="form-control">
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
 <!-- <div class="col-md-4 col-md-offset-2">
 	<a class="btn btn-danger btn-md" onclick="return confirm('Continue delete bird ?')" href="delete.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i> Delete Bird</a>
 </div> -->
</div>
</div>
</div>


<?php include 'theme/foot.php'; ?>