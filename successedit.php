<?php 
    require_once 'db/conn.php'; 
    //Get values from post/edit operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];

        //Call crud function
        $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $phone, $specialty);
        //Redirect to viewrecords.php
        if($result){
            header('Location: viewrecords.php');
        }
        else{
            include 'includes/errormsg.php';
        }  
    }
    else {
        include 'includes/errormsg.php';
    }

?>


    



    



   