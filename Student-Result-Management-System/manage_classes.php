<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>SSRMS</title>
</head> 
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading" style="background:brown; color:white">Class Section</span>
        <a href="logout.php" style="color: white; text-decoration:none;"><span class="fa fa-sign-out"></span> Logout</a>
    </div>
    <hr style="border:3px solid black">

    <marquee>
    <div class="floating" style=
            "height: 30px; width: 550px; color:red;
            background: rgb(200, 255, 200);
            padding: 10px">
        *Click on the 'Remove' button to remove the class data from the database*
    </div>
    </marquee>

    <div class="nav">
        <ul>
            <li>
                <a href="dashboard.php" style="font-size:30px;">Dashboard</a>
            </li>

            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn" style="font-size:30px;">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn" style="font-size:30px;">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn" style="font-size:30px;">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <?php
            include('init.php');
            include('session.php');
            $db = mysqli_select_db($conn,'simplestresult');

            $sql = "SELECT `name`, `id` FROM `class`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption style='color:white; background:brown;'>Manage Classes</caption>
                <tr>
                <th>#</th>
                <th>NAME</th>
                <th>ACTION</th>
                </tr>";

                $cnt=1;
                while($row = mysqli_fetch_array($result))

                  {
                  echo "<tr>";
                  echo "<td>$cnt</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td><a href='delete-class.php?id=".$row['id']."' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";
    
                  echo "</tr>";

                 $cnt++; }

                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
        
    </div>

</body>
</html>

