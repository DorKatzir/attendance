<?php 
    $title = 'View Record';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    // Get attendee by id
    if( ! isset($_GET['id']) ) {   
        include 'includes/errormsg.php';
    }
    else {
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    
    ?>


    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?= $result['firstname'] .' ' . $result['lastname'] ?>
            </h5>
            <h6 class="card-subtitle">
                <?= $result['name'] ?>
            </h6>  
        </div>
        
        <div class="card-body">
            <p class="card-text">Date of Birth: <?= $result['dateofbirth'] ?></p>
            <p class="card-text">Email Address: <?= $result['emailaddress'] ?></p>
            <p class="card-text">Contact: <?= $result['contactnumber'] ?></p>
        </div>

        <div class="card-body">
            <a href="viewrecords.php" class="btn btn-info">Back to List</a>
            <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
            <a onClick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
        </div>
            
    </div>


    <?php } ?>
   

<?php require_once 'includes/footer.php'; ?>