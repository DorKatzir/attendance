<?php  
    require_once 'db/conn.php'; 

    if( !$_GET['id'] ){
        include 'includes/errormsg.php';
    }

    else {
        //Get ID values
        $id = $_GET['id'];
        
        //Call Delete function
        $result = $crud->deleteAttendee($id);

        //Redirect to list
        if($result){
            header('Location: viewrecords.php');
        }
        else{
            include 'includes/errormsg.php';
        }
    }


    
?>
