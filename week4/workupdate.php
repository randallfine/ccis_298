<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Work</title>
</head>
<body>
    <h1>Update Work Experience</h1>
    <?php
        //connect to DB
        $conn = mysqli_connect('localhost', 'root', '', 'workDB');
        if($conn){
            //connected
            //find update
            $listId = mysqli_real_escape_string($conn, $_GET['id']);
            //retrieve record
            $query = "SELECT * FROM worklist WHERE listId = $listId";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                echo "<form  method='post'>
                        <textarea name='work'>".$row['listitem']."</textarea>
                        <br>
                        <input type='submit' name = 'update' value ='Update'>
                      </form>";
            } else{
                echo "<p>No Content in the table</p>";
            }
            //update button clicked
            if(isset($_POST['update'])){
                //get values from form
                $listitem = mysqli_real_escape_string($conn, $_POST['work']);
                //update
                $query = "UPDATE worklist SET listitem = '$listitem'";
                $query .= "WHERE listId = '$listId";
                if((mysqli_query($conn, $query)) && 
                        mysqli_affected_rows($conn) > 0){
                            header("Location: workmanage.php");
                        } else {
                            echo "<p>Update failed</p>";
                        }          
                     }
        mysqli_close($conn);             
        }
    ?>
</body>
</html>