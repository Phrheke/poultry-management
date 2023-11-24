<?php
 $birdsCount = $usersCount = $breedCount = $quarantinedCount = $batchesCount = '';

 $query = $db->query("SELECT * FROM birds");
 $birdsCount = $query->rowCount();

 $sumQuery = $db->query("SELECT SUM(eggs_collected) as total_eggs_collected FROM eggInventory");
 $result = $sumQuery->fetch(PDO::FETCH_ASSOC);
 $eggsCount = $result['total_eggs_collected'];
 

 $que = $db->query("SELECT * FROM quarantine");
 $quarantinedCount = $que->rowCount();

 $qu = $db->query("SELECT * FROM batch");
 $batchesCount = $qu->rowCount();

 $q = $db->query("SELECT * FROM admin");
 $userCount = $q->rowCount();

?>


<div class="w3-row-padding w3-margin-bottom">

    <a href="manage-birds.php" class="w3-quarter">
      <div class="w3-container data-card ">
        <div class="w3-left">
          <img src="./img/chicken.png" />
        </i></div>
        <div class="w3-right">
          <h3><?php echo $birdsCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Birds</h4>
      </div>
    </a>


    <a href='manage-eggs.php' class="w3-quarter">
      <div class="w3-container data-card">
        <div class="w3-left">
          <img src="./img/eggs.png" />
        </div>
        <div class="w3-right">
          <h3><?php echo $eggsCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Eggs
        </h4>
      </div>
    </a>

    <a href ='manage-batches.php' class="w3-quarter">
      <div class="w3-container data-card">
        <div class="w3-left">
          <img src="./img/batches.png" />
        </div>
        <div class="w3-right">
          <h3><?php echo $batchesCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Batches
        </h4>
      </div>
    </a>

    <a href="manage-quarantine.php" class="w3-quarter">
      <div class="w3-container data-card">
        <div class="w3-left">
          <img src="./img/quarantine.png" />
        </i></div>
        <div class="w3-right">
          <h3><?php echo $quarantinedCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Quarantine</h4>
      </div>
    </a>
    
    <!-- <div class="w3-quarter">
      <div class="w3-container data-card">
        <div class="w3-left">
          <img src="./img/users.png" />
        </i></div>
        <div class="w3-right">
          <h3><?php echo $uCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div> -->
  </div>