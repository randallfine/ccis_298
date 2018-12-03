<?php 
    //set connection
    $conn = mysqli_connect('localhost', 'root', '', 'workDB');
    if($conn){
        //connection good
        //find and delete
        $listId = mysqli_real_escape_string($conn, $_GET['id']);
        //delete
        $query = "DELETE FROM worklist WHERE listID = '$listId'";
        if((mysqli_query($conn, $query)) && 
                mysqli_affected_rows($conn) >0){
                    header("Location: workmanage.php");
                }
    }
    mysqli_close($conn);
?>