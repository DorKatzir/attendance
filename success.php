<?php 
    $title = 'Success';

    require_once 'includes/header.php';
    require_once 'db/conn.php'; 
    
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];
        //Call function to insert and check if success or not
        $isSuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$phone,$specialty);
        // here i need to insert a call function to get the specialty name from database

        if($isSuccess){
            include 'includes/successmsg.php';
        }
        else {
            include 'includes/errormsg.php';
        }
    }
?>


    
<!-- This prints out values that where passed to this action page using method="POST" -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?= $_POST['firstname'] .' ' . $_POST['lastname'] ?>
            </h5>
            <h6 class="card-subtitle">
                <?= $_POST['specialty'] ?>
            </h6>  
        </div>
        
        <div class="card-body">
            <p class="card-text">Date of Birth: <?= $_POST['dob'] ?></p>
            <p class="card-text">Email Address: <?= $_POST['email'] ?></p>
            <p class="card-text">Contact: <?= $_POST['phone'] ?></p>
        </div>
            
    </div>

    


<?php require_once 'includes/footer.php'; ?>

   