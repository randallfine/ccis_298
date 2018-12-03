<!DOCTYPE html>
<html lang="en">
<!-- 
Randall Fine
CISS 298 
Web Programming
11/18/2018
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Experience</title>
</head>

<body>
    <header>
        <h1>Randall Fine</h1>
        <h2>Not all who wander are lost</h2>
        <nav>
            <ul>
                <li><a href="./home.html">Home</a></li>
                <li><a href="./education.html">Education</a></li>
                <li><a href="./work.html">Work</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <h4>My Work Experience</h4>
        <ol>
            <?php
             $conn = mysqli_connect('localhost', 'root', '', 'workDB');
             if($conn){
                $query = "SELECT * FROM worklist";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){
                    $display = "";
                    while($row = mysqli_fetch_assoc($result)){
                        $display .= "<li>".$row['listitem']."</li>";
                    }
                    
                } else {
                    $display = "<li> No Content in the table</li>";
             } 
             echo $display;
             }
            ?>
        </ol>
    </div>
    <aside id="projects">
        <h4>Personal Projects</h4>
        <p><a href="https://randallfine.github.io">My Personal Site</a></p>
    </aside>
    <aside id="classes">
        <h4>Classes I Am Currently Taking</h4>
        <p><a href="http://www.ccis.edu/syllabi/syllabus_master.asp?PREFIX=CISS&COURSENUM=298">CCIS_298 Web Programming</a></p>
        <p><a href="http://www.ccis.edu/syllabi/syllabus_master.asp?PREFIX=CISS&COURSENUM=241">CCIS_241 Programming I</a></p>
    </aside>
    <footer>
        <p>COPYWRITE &copy; 2018 Randall Fine visit me on <a href="https://www.linkedin.com/in/randall-fine-755018117/">LinkedIn</a></p>
    </footer>
</body>

</html>