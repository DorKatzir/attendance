<?php 
    $title = 'Edit Record';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    
    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        include 'includes/errormsg.php';
        header('Location: viewrecords.php');
        
    } else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    
    ?>

            <h1 class="text-center">Edit Record</h1>
            
            <form method="POST" action="successedit.php">
                <input type="hidden" name="id" value="<?= $attendee['attendee_id'] ?>">
                
                <div class="mb-3"> <!-- First Name -->
                    <label for="firstname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $attendee['firstname'] ?>">
                </div>
            
                <div class="mb-3"> <!-- Last Name -->
                    <label for="lastname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $attendee['lastname'] ?>">
                </div>

                <div class="mb-3"> <!-- Date of Birth -->
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?= $attendee['dateofbirth'] ?>">

                </div>
                
                <div class="mb-3"> <!-- Specialty -->
                    <label for="specialty" class="form-label">Area of Expertise</label>
                    <select class="form-select" id="specialty" name="specialty">
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        
                        <option value="<?= $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?> >
                            <?= $r['name']; ?>
                        </option>

                    <?php } ?>       

                    </select>   
                </div>

                <div class="mb-3"> <!-- Email -->
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $attendee['emailaddress'] ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                
                <div class="mb-3"> <!-- Phone -->
                    <label for="phone" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone" value="<?= $attendee['contactnumber'] ?>">
                    <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
                </div>

                
                <div class="row">
                    <div class="col-6 d-grid gap-2">
                        <a href="viewrecords.php" class="btn btn-outline-info">Back to List</a>
                    </div>
                    <div class="col-6 d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>   
                    </div>
                </div>
                    

            </form>


    <?php } ?> <!-- End of else condition -->



<?php require_once 'includes/footer.php'; ?>

   