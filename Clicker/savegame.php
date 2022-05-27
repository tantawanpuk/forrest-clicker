<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])){

    include "db_conn.php";

    $progress=$_POST['data']; 
    $seeds = $_POST['seeds'];

    $id = $_SESSION['id'];

    $sql = "SELECT progress
                FROM users WHERE 
                id='$id'";
                
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET progress='$progress',seeds='$seeds'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
                print_r($progress);
	        exit();

        }
}
