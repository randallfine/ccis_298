<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>workDB</title>
</head>
<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '');
    if($conn)
        echo "<p> Connection is set up successfully</p>";
    $query = "DROP DATABASE IF EXISTS workDB";
    mysqli_query($conn, $query);
    $query = "CREATE DATABASE workDB";
    if(mysqli_query($conn, $query))
        echo "<p>Database Created Successfully</p>";
    mysqli_select_db($conn, "workDB");
    $query = "CREATE TABLE worklist
    (
        listId INTEGER AUTO_INCREMENT;
        listitem VARCHAR(200) NOT NULL,
        PRIMARY KEY (listId)
    )";
    if(mysqli_query($conn, $query))
        echo "<p>Table Created Successfully</p>";
     mysqli_close($conn)   
    ?>
</body>
</html> 