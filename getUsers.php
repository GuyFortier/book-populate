<?php
include "config.php";

$departid = 0;

if(isset($_POST['depart'])){
   $departid = mysqli_real_escape_string($con,$_POST['depart']); // department id
}

$books_arr = array();

if($departid > 0){
    $sql = "SELECT id,name FROM books WHERE author=".$departid;

    $result = mysqli_query($con,$sql);
    
    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['id'];
        $name = $row['name'];
    
        $users_arr[] = array("id" => $userid, "name" => $name);
    }
}

// encoding array to json format
echo json_encode($users_arr);