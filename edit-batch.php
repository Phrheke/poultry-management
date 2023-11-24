<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbarphp'; ?>
<?php include 'session.php'; ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-bird.php');

 }else{
 	
 	$batch_no = $arr = $source = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM batch WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $batch_no = $obj->batch_no;
	   $arr = $obj->arrived;
	   $source = $obj->source;
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
      	$n_batch_no = $_POST['batch_no'];
      	$n_arrived = $_POST['arrived'];
      	$n_source = $_POST['source'];

      	$n_id = $_GET['id'];

      	$update_query = $db->query("UPDATE batch SET batch_no = '$n_batch_no',arrived = '$n_arrived', source = '$n_source' WHERE id = '$n_id' ");

      	if($update_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Batch details successfully updated <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error updating batch data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>




 		<h2>Edit Batch Data</h2>
	 	<form method="post">
	 		<div class="form-group">
	 			<label class="control-label">Batch No.</label>
	 			<input type="text" name="batch_no" class="form-control" value="<?php echo $batch_no; ?>">
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Arrival date</label>
	 			<input type="text" name="arrived" class="form-control" value="<?php echo $arr; ?>">
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
 <!-- <div class="col-md-4 col-md-offset-2">
 	<a class="btn btn-danger btn-md" onclick="return confirm('Continue delete batch ?')" href="delete.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i> Delete Batch</a>
 </div> -->
</div>
</div>
</div>


<?php include 'theme/foot.php'; ?>