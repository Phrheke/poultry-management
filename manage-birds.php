<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >
 
 <div class="w3-container" style="padding-top:22px">
  <div>
    <h2>Manage Birds</h2>
    <a href="add-bird.php" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New Bird</a><br><br>
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="table">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Bird No.</th>
            <th>Batch No.</th>
            <th>Breed</th>
            <th>Weight (Kg)</th>
            <th>Gender</th>
            <th>Arrived</th>
            <th>Feeding time</th>
            <th>Feed Type</th>
            <th>Feed Qty (Kg)</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $all_bird = $db->query("SELECT * FROM birds ORDER BY id DESC");
          $fetch = $all_bird->fetchAll(PDO::FETCH_OBJ);
          foreach($fetch as $data){ 
              $get_breed = $db->query("SELECT * FROM breed WHERE id = '$data->breed_id'");
              $breed_result = $get_breed->fetchAll(PDO::FETCH_OBJ);
              foreach($breed_result as $breed){
                $get_batch = $db->query("SELECT * FROM batch WHERE id = '$data->batch_id'");
                $batch_result = $get_batch->fetchAll(PDO::FETCH_OBJ);
                foreach($batch_result as $batch){
                  $get_fs = $db->query("SELECT * FROM feedingschedule WHERE batch_id = '$data->batch_id'");
                  $fs_result = $get_fs->fetchAll(PDO::FETCH_OBJ);
                  foreach($fs_result as $fs){
            ?>
              <tr>
                <td id="existingTdId">
                </td>
                <td><?php echo $data->birdno ?></td>
                <td><?php echo $batch->batch_no ?></td>
                <td><?php echo $breed->name ?></td>
                <td><?php echo $data->weight ?>Kg</td>
                <td><?php echo $data->gender ?></td>
                <td><?php echo $batch->arrived ?></td>
                <td><?php echo $fs->feeding_time ?></td>
                <td><?php echo $fs->feed_type ?></td>
                <td><?php echo $fs->feed_qty ?>Kg</td>
                <td>
                  <div class="dropdown">
                      <button style="padding:1px" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="edit-bird.php?id=<?php echo $data->id ?>"><i class="fa fa-edit"></i> Edit</a></li>
                        <!-- <li><a onclick="return confirm('Continue delete bird ?')" href="delete.php?id=<?php echo $data->id ?>"><i class="fa fa-trash"></i> Delete</a></li> -->
                        <li><a onclick="return confirm('Continue quarantine bird ?')" href="quarantine.php?id=<?php echo $data->id; ?>"><i class="fa fa-paper-plane"></i> Quarantine Bird</a></li>
                      </ul>
                    </div> 
                </td>
              </tr>    
          <?php 
          }
          }
          }
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