<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Experience Page Management</title>
</head>
<body>
    <h1> Work Experience Page Management</h1>
    <form action="" method="post">
    <textarea name="work" id="work" placeholder="Work Experience" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" name="insert" value="Add Work Experience">
    <input type="submit" name="view" value="View All">
    </form>
    <?php
        //create db connection
        $conn = mysqli_connect('localhost', 'root', '','workDB');
        if($conn)
        {
            //good connection
            //insert button is cliched and experience is not empty
            if((isset($_POST['insert'])) && !empty($_POST['work']))
            {
                //retrieve values from form
                $listitem = mysqli_real_escape_string($conn, $_POST['work']);
                //insert into db
                $query = "INSERT INTO worklist
                (listitem)
                VALUES ('$listitem')";
                if(mysqli_query($conn, $query))
                    echo "<p>Insert Successful<p>";
                else
                    echo "<p>Insert Failed</p>" ;   
            }
            //view button
            if(isset($_POST['view']))
            {
                //select from db
                $query = "SELECT * FROM worklist";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    $display = "<h3>All Work Experience</h3>";
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $display .= "ID:".$row["listId"]."<br>";
                            $display .="WorkExperience: ".$row["listID"]."<br>";
                               $display .= "<a href='workupdate.php?id=".$row["listId"]."'>Update</a><br>";
                                $display .= "<a href='workdelete.php?id=".$row["listId"]."'>Delete</a><br>";
                    }
                } else {
                    $display = "<p>No content in the table</p>";
                }
                echo $display;
        }
        mysqli_close($conn);
    }
    else {
        echo "<p>Connection Failed<p>";
    }
    ?>
</body>
</html>