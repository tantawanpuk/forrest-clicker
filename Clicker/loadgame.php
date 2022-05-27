<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])){

    include "db_conn.php";

    $id = $_SESSION['id'];

    $sql = "SELECT progress
                FROM users WHERE 
                id='$id'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){

        	$row = mysqli_fetch_assoc($result);
        	$data = $row['progress'];
            echo $data;
	        exit();
            
        }
}
