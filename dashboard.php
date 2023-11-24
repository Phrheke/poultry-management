<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main section-container" >

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Dashboard</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Recent Birds</h2>
 <div class="table-responsive">
 	<table class="table table-hover" id="table">
 		<thead>
 			<tr>
 				<th>S/N</th>
 				<th>Bird No.</th>
 				<th>Batch No.</th>
 				<th>Breed</th>
 				<th>Weight (Kg)</th>
 				<th>Gender</th>
 				<th>Arrived</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
               $qpi = $db->query("SELECT * FROM birds ORDER BY id");
               $result = $qpi->fetchAll(PDO::FETCH_OBJ);
               $c = $qpi->rowCount();
               foreach ($result as $j) {
               	 $birdname = $j->birdno;
               	 $breed_id = $j->breed_id;
               	 $batch_id = $j->batch_id;
               	 $weight = $j->weight;
               	 $gender = $j->gender;

               	 $k = $db->query("SELECT * FROM breed WHERE id = '$breed_id' ");
               	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
               	 foreach ($ks as $r) {
               	 	$breed_name = $r->name;

					$q = $db->query("SELECT * FROM batch WHERE id = '$batch_id' ");
					$qs = $q->fetchAll(PDO::FETCH_OBJ);
					foreach ($qs as $d) {
						$batch_no = $d->batch_no;
						$arr = $d->arrived;
               	 ?>
                  <tr>
                  	<td id="existingTdId">
						
                  	</td>
                  	<td><?php echo $birdname; ?></td>
                  	<td><?php echo $batch_no; ?></td>
                  	<td><?php echo $breed_name; ?></td>
                  	<td><?php echo $weight; ?>Kg</td>
                  	<td><?php echo $gender; ?></td>
                  	<td><?php echo $arr; ?></td>
                  </tr>
               	 <?php
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