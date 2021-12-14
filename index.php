<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>SoloJobStarted</title>

    <style>
        #ptable
         {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #ptable
         td, #ptable
         th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #ptable
         tr:nth-child(even){
            background-color: #f2f2f2;
        }

        #ptable
         tr:hover {
            background-color: #ddd;
        }

        #ptable
         th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
    <?php
        include("conf.php");
        $conn = new mysqli(HOST,USERNAME,DB_PWD,DATABASE);
        
        mysqli_set_charset($conn,"utf8");
        $sqlcommand = "SELECT * FROM players ORDER BY PID";

        $result = mysqli_query($conn,$sqlcommand);

        //anti gia auto mporw na to kanw se Object Oriented tropo ---> $result = $con->query($sqlcommand);
        echo "<table id=ptable
        >";
        echo "<tr><th>PID</th><th>FirstName</th><th>LastName</th><th>Email</th></tr>";
        while($row = $result->fetch_assoc()){ //To row 8a einai ena associative array gia ka8e grammh p.x row['PID'] exei timh 
            echo "<tr>";
            echo "<td>".$row['PID']."</td>";
            echo "<td>".$row['FirstName']."</td>";
            echo "<td>".$row['LastName']."</td>";
            echo "<td><a href='mailto:".$row['E-mail']."'>".$row['E-mail']."</a></td>";
            echo "</tr>";
 
        }
        echo "</table>";
        echo "<br><br>Synolo: ".$result->num_rows;
        $conn->close();
    ?>
</body>
</html>