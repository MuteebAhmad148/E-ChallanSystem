<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<?php
     error_reporting(E_ERROR | E_PARSE);
    $name=$_POST['usrname'];
    $code=$_POST['passwd'];  
    $host="localhost";
    $username="root";
    $password="";
    $dbname="dbs";
    $conn = mysqli_connect($host, $username, $password,$dbname);
    session_start();
    if($_POST["btn"])
    {
        $stime = strtotime($_POST['sdate']); 
        $etime = strtotime($_POST['edate']);
        $sdate = date('Y-m-d', $stime);
        $edate = date('Y-m-d', $etime);
                $id= $_SESSION['user_id'];
                $query="
                select * 
                from challan 
                where Vehicle_No=ANY
                (
                    select Vehicle_No
                    from Vehicle
                    where User_ID='$id'
                ) and Issue_Date>'$sdate' and Issue_Date<'$edate'
                ";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
    }
    else
    {
        
                $id= $_SESSION['user_id'];
                $query="
                select * 
                from challan 
                where Vehicle_No=ANY
                (
                    select Vehicle_No
                    from Vehicle
                    where User_ID='$id'
                )
                ";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
    }
    
    
?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        
        form{
            width: 413px;
            left: 24%;
            border: none;
        }
        form input[type="date"] {
                border: 2px solid!important;   
                border-bottom: 2px solid black!important;
                padding: 6px!important;
               // margin-left: -100px !important;
                margin-bottom: 25px!important;
                font-family: sans-serif!important;
                font-size: 15px!important;
            }
            form input[type="submit"] {
                margin-left: 40px!important;
                background-color: black!important;
                width: 101px!important;
                font-size: 15px!important;   
            }
        #centerdiv table{
           margin-top: 12%;
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

                <form id="formlist" method="post">
                    <input type="date" name="sdate" />
                     <input type="date" name="edate" />
                <input id="formbutton" type="submit" name="btn" value="Filter Record">
            </form>
           <?php
                echo "<table >
                            <tr>
                                <th>Challan No</th>
                                <th>Vehicle No   </th>
                                <th>Amount </th> 
                                <th>Issue Date </th>
                                <th>Due Date    </th>  
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {     
                    echo    "<tr>
                                <td>". $row['Challan_No'] ."</td>".
                                "<td>".$row['Vehicle_No']. "</td>".
                                "<td>". $row['Amount'] ."</td>".
                                "<td>".$row['Issue_Date']. "</td>".
                                "<td>".$row['Due_Date']. "</td>
                            </tr>";
                }  
            
            echo "</table>";
	       
            ?>
          
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