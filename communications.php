<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/navbar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->

<div class="section-container communications-container">
    <div class="table-responsive" style="flex-basis:55%">
 	    <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Phone No.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $qpi = $db->query("SELECT * FROM contactbook ORDER BY id");
                    $result = $qpi->fetchAll(PDO::FETCH_OBJ);
                    $c = $qpi->rowCount();
                    foreach ($result as $j) {
                        $name = $j->name;
                        $phoneNumber = $j->phoneNumber;
                        $emailAddress = $j->emailAddress;
                        ?>
                        <tr>
                            <td id="existingTdId">
                                
                            </td>
                            <td><?php echo $name; ?></td>
                            <td>+234<?php echo $phoneNumber; ?></td>
                            <td>
                                <a style="margin-right:2px" href="https://wa.me/+234<?php echo $phoneNumber; ?>" target="_blank">
                                    <img src="./img/whatsapp.png" />
                                </a>
                                <a href="https://mailto:<?php echo $emailAddress; ?>" target="_blank">
                                    <img src="./img/email.png" />
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
 		    </tbody>
 	    </table>
    </div>


    <!-- <div class="contact-list" >
        <div class="contact-card">
            <div class="contact-card__header" >
                <h2>Vet</h2>
                <p>+2349013253100</p>
                <p>egaiosowor@yahoo.com</P>
            </div>
            <ul class="contact-links" >
                <li>
                    <a href="https://wa.me/+2349013253100" target="_blank">
                        <img src="./img/whatsapp.png" />
                    </a>
                </li>
                <li>
                    <a href="https://mailto:egaiosowor@yahoo.com" target="_blank">
                        <img src="./img/email.png" />
                    </a>
                </li>
            </ul>
        </div>
    </div> -->
   
    <div class="contact-form">
        <div class="w3-row">
            <h2>Create New Contact</h2>
            <div>
            
                <?php
                if(isset($_POST['submit']))
                {
                    $n_name = $_POST['name'];
                    $n_phoneNumber = $_POST['phoneNumber'];                    
                    $n_emailAddress = $_POST['emailAddress'];                    
                    
            
                    $insert = $db->query("INSERT INTO contactbook(name,phoneNumber, emailAddress) VALUES('$n_name','$n_phoneNumber', '$n_emailAddress') ");
            
                    if($insert){?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Contact successfully created <i class="fa fa-check"></i></strong>
                    </div>
                <?php
                    }else{ ?>
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error creatiing contact. Please try again <i class="fa fa-times"></i></strong>
                    </div>
                    <?php
                }
                
                }
            
                ?>
        
    
        
                <form method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label class="control-label">Phone Number</label>
                        <input type="text" name="phoneNumber" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input type="text" name="emailAddress" class="form-control" required>
                    </div>
        
                    <button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Create</button>
                </form>
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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<?php include 'theme/foot.php'; ?>