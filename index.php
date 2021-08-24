<?php 
    $title = 'Index';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    
    $results = $crud->getSpecialties();
?>


    <h1 class="text-center">Registration for IT Conference</h1>
    
    <form method="POST" action="success.php">
        
        <div class="mb-3"> <!-- First Name -->
            <label for="firstname" class="form-label">First name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
    
        <div class="mb-3"> <!-- Last Name -->
            <label for="lastname" class="form-label">Last name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>

        <div class="mb-3"> <!-- Date of Birth -->
            <label for="dob" class="form-label">Date of Birth</label>
            <input required type="date" class="form-control" id="dob" name="dob">
        </div>
        
        <div class="mb-3"> <!-- Specialty -->
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select required class="form-select" id="specialty" name="specialty">


            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                
                <option value="<?= $r['specialty_id']; ?>"><?= $r['name']; ?></option>

            <?php } ?>       

            </select>   
        </div>

        <div class="mb-3"> <!-- Email -->
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        
        <div class="mb-3"> <!-- Phone -->
            <label for="phone" class="form-label">Contact Number</label>
            <input required type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </div> 

    </form>



<?php require_once 'includes/footer.php'; ?>

   