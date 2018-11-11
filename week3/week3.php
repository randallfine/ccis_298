<!DOCTYPE html>
<html lang="en">
<!-- 
Randall Fine
CCIS 298
Web Programming
11/11/2018
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DocumentGuest Book</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form/data">
        <p>
            Your name:
            <br/>
            <input type="text" name="name" size="30" maxlength="30" />
        </p>
        <p>
            Your content:
            <br/>
            <textarea name="comment" rows="7" cols ="35"></textarea>
        </p>
        <label for="myPhoto">Upload file:</label>
        <input type="file" id="myPhoto" name="myPhoto">
        <br/>
        <input type="submit" name="submit" value="Submit">
        <input type="submit" name="view" value="View">
    </form>
    <?php error_reporting (E_ALL ^ E_NOTICE); ?>
    <?php 
    if(isset($_POST['submit']))
    {
        //upload file
        $destination = "";
        move_uploaded_file($_FILES["myPhoto"]["tmp_name"],
            $destination.$_FILES["myPhoto"]["name"]);
        //save to file
        $myFile= "week3.txt";
        //write
        if(is_writable($myFile)){
            file_put_contents($myFile, $_POST["name"].PHP_EOL, FILE_APPEND);
            file_put_contents($myFile, $_POST["myPhoto"]["name"].PHP_EOL, FILE_APPEND);
            file_put_contents($myFile, $_POST["comment"].PHP_EOL,FILE_APPEND);
            echo "<p>Thank You!</p>";
        }else {
            echo "<p>Did not submit correctly</p>";
        }
        
    }
    if(isset($_POST['view']))
    {
        $allComments=file("week3.txt");
        for ($i=0; $i < count($allComments); $i+=3) { 
            echo $allComments[$i];
            echo "<br/>";
            $image = $allComments[$i+1];
            echo "<img src=\"$image\" width=\"100\" height=\"100\">";
            echo "<br\>";
            echo "<br\>";
            echo $allComments[$i+2]   ;
            echo "<br/>";
    }
    }
    
    ?>
</body>
</html>