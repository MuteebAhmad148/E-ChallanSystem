<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $id=$_SESSION['user_id'];
    $host="localhost";
    $username="root";
    $password="";
    $dbname="dbs";
    $conn = mysqli_connect($host, $username, $password,$dbname);
    $query="select min(Due_Date) AS date from challan where Vehicle_No=ANY(
    select Vehicle_No
    from vehicle
    where User_ID=$id
    )";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
     $lastDate=$row['date'];
    if($_GET["optA"])
        header('Location: vehicle.php');
    else if($_GET["optC"])
        header('Location: challan.php');
    else if($_GET["optD"])
    {
        session_destroy();
        header('Location: login.php');
    }
?>
    

<head>
     <link rel="stylesheet" type="text/css" href="style.css"  />
        <style>
            
            #submit
            {
                margin-top: 2px;
                margin-left: 10px;
                margin-top: 10px;
            }
        </style>
</head>
    
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <a href="user.php">Home</a>
            <a href="about.php">About</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>
        <?php
        if($count==1 and $lastDate!=null)
        {
                echo "<div id='noticediv'>
                <marquee direction='left'>";
                echo " Last day to pay your Challan is ".$lastDate." .Kindly Pay your Challan before it to avoid Lisence cancellation.";
                echo "</marquee>
                </div>";
        }
        ?>
        <div id="leftdiv">
            <ul>
                <li >Vehicle
                  <ul>
                      <a href="vehicle.php"> <li>Veiw Vehicles</li></a>

                    </ul></li>
                  
                <li >Challan
                <ul>
                    <a href="challan.php"><li>View Challan</li></a>

                    </ul></li>
                
                <li >Profile
                <ul>
                    <a href="profile.php"> <li>View Profile </li></a>
                    <a href="editpassword.php">  <li>Change Password</li></a>
                    <a href="editphone.php"> <li>Change Phone Number</li></a>
                    </ul></li>
                

            </ul>
        </div>
        
        <div id="centerdiv">
            <img src="logo.png">
        </div>
        <div id="rightdiv">
            <img src="user.png">
                 <?php
                    session_start();
                    echo "<table>
                        <tr>
                            <td id='usertable'>"."User_ID : "."</td> 
                            <td id='usertable'>". $_SESSION['user_id'] ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Name : "."</td> 
                            <td id='usertable'>". $_SESSION['user_name'] ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Email : "."</td> 
                            <td id='usertable'>". $_SESSION['email'] ."</td> 
                        </tr>
                    </table>";
                ?>
        </div>
    </body>
</html>