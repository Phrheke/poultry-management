<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >

 <div class="w3-container" style="padding-top:22px">
 <div>
 	<h2>Manage Batches</h2>
  <a href="add-batch.php" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New Batch</a><br><br>
 <div class="table-responsive">
 	<table class="table table-hover table-striped" id="table">
 		<thead>
 			<tr>
 				<th>S/N</th>
 				<th>Batch No.</th>
 				<th>Date of Arrival</th>
 				<th>Source</th>
        <th></th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
       $all_batch = $db->query("SELECT * FROM batch ORDER BY id DESC");
       $fetch = $all_batch->fetchAll(PDO::FETCH_OBJ);
       foreach($fetch as $data){
        ?>
          <tr>
            <td id="existingTdId"></td>
            <td><?php echo $data->batch_no ?></td>
            <td><?php echo $data->arrived ?></td>
            <td><?php echo $data->source ?></td>
            <td>
               <div>
                  <a
                    style="padding:3px 5px; background-color:blue; color:white; border-radius:3px" 
                    href="edit-batch.php?id=<?php echo $data->id ?>"><i class="fa fa-edit"></i> Edit</a>

                </div> 
            </td>
          </tr>    
      <?php 
      }
      ?>
 		</tbody>
 	</table>
 </div>
 </div>
</div>


</div>

<script>
  let rowsWithId = document.querySelectorAll("tr #existingTdId");

  rowsWithId.forEach((existingTd, index) => {
    existingTd.textContent = `${index + 1}`;
  });
</script>


<?php include 'theme/foot.php'; ?>