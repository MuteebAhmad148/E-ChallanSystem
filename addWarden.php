
<?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?><html>
    <html>
    <?php
    error_reporting(E_ERROR | E_PARSE);
         $host="localhost";
        $username="root";
            $password="";
            $dbname="dbs";
            $conn = mysqli_connect($host, $username, $password,$dbname);
        $sql = mysqli_query($conn, "SELECT Area_Name From area");
    if($_REQUEST["btn"])
                {
                    $value=1;            
                    $name=$_REQUEST['name'];
                    $area=$_REQUEST['area'];
                    $phone=$_REQUEST['pNum'];
                    $email=$_REQUEST['email'];
                    
                    
        $sql = mysqli_query($conn, "SELECT Area_code From area WHERE Area_Name='$area' ");
                        
                        $row=mysqli_fetch_assoc($sql);
        var_dump($sql);
                    session_start();
                    $areaID=$row['Area_code'];
                    $_SESSION['areaid']=$areaID;
                    
                    var_dump($areaID);

                    if($area!="" and $name!="" and $phone!="" and $email!="")
                    {
                        $value=2;
                        error_reporting(E_ERROR | E_PARSE);
                        $st="123";
                        $query= "INSERT INTO `e_user` (`User_ID`, `User_Name`, `Password`, `Area_code`, `PhoneNumber`, `E_mail` , `Status`) 
                        VALUES (NULL, '$name', '$st', '$areaID', '$phone', '$email', 'Wardon');" ;
                        $result=mysqli_query($conn,$query); 
                        echo"tatti is tatti";
                        var_dump($query);
                        $query="SELECT User_ID FROM `e_user` ORDER BY User_ID DESC LIMIT 1;";
                        $result=mysqli_query($conn,$query); 
                        $row=mysqli_fetch_assoc($result);
                        $uid=$row['User_ID'];
                        $_SESSION['uid']=$uid;
                        
                         $to = $email;
                $subject = "E_Challan System";
                $amount=$_SESSION['amount'] ;
                $message = "
                  Hello ,".$name .".This mail is to inform you that your account has been created on E_Challan System .Now can can  generate challan.We hope you will performe your duties very well.Behalf of the Team Shield I welcome you on board. <br> <br><br><br>
                  <p style='color:red;'>Email : $email <br>
                                         Password: 123</p>
                                         <br>Regards: Team Shield
                  ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($to,$subject,$message,$headers);
                    }
                }
        
    ?>
        <head>
              
    <link rel="stylesheet" type="text/css" href="style.css">
               <style>
        select{
            margin-bottom: 90px;
            margin-top: 10px;
            font-size: 15px;
            font-family:sans-serif;
            margin-left: 81px;
            margin-right: 60px;
            width: 58%;
            height: 6%;
            border: 2px solid black;
        }
        
       
    </style>
            
        </head>
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
           <a href="admin.php">Home</a>
            <a href="about.php">About</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>   <div id="leftdiv">
            <ul>
                <li >Wardon
                  <ul>
                      <a href="addWarden.php" ><li>Add Wardon</li></a>
                      <a href="removeWarden.php" > <li>Remove Wardon</li></a>
                      <a href="changeArea.php" > <li>Change Area</li></a>
                      <a href="listWardon.php" > <li>List Wardons</li></a>

                    </ul>
                </li>
                  
                <li >Vehicle
                <ul>
                    <a href="add.php" ><li>Add Vehicle</li></a>
                    <a href="removeVehicle.php" ><li>Remove Vehicle</li></a>
                    <a href="listVehicle.php" ><li>List All Vehicle</li></a>

                    </ul>
                </li>
                
                <li >User
                <ul>
                    <a href="removeUser.php" ><li>Remove User</li></a>
                    <a href="listUser.php" ><li>List all User</li></a>

                    </ul></li>
                <li >Area
                  <ul>
                       <a href="listArea.php" ><li>List all Areas</li></a>
                      <a href="addArea.php" ><li>Add New Area</li></a>

                    </ul></li>
                <li >Challan
                <ul>
                      <a href="listChallan.php" ><li>List all Challan</li></a>
                    <a href="changeChallanStatus.php" ><li>Change Status</li></a>

                    </ul>
                
                </li>
                 
            </ul>
        </div>
        <div id="centerdiv">
            <form method="POST"> 
                <h1>Add Wardon</h1>
       
            <input id="button" type="text" placeholder="Warden Name" name="name"  required> <br>
            <input id="button" type="text" placeholder="Phone Number" name="pNum"  required> <br>
            <input id="button" type="text" placeholder="E-Mail" name="email"  required> <br>
            <select name="area">
                        <?php

                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value='". $row['Area_Name'] ."'>" .$row['Area_Name'] ."</option>" ;
                        }
                        ?>
                    </select> <br>
            <input id="button" type='submit' name="btn" value="Submit "><br>
                <?php
                if($value==2)
                {
                    echo "<p style='color:red;'>Wardon Created</p>";
                    header('Location: viewWarden.php');
            }
                else if($value==1)
                    echo "<p style='color:red;'>Invalid Input</p>";
           
            ?>
        </form>
            
            
        </div>
        
        <div id="rightdiv">
            <img src="user.png">
                 <?php
                    session_start();
                    echo "<table>
                        <tr>
                            <td id='usertable'>"."User_ID : "."</td> 
                            <td id='usertable'>". $_SESSION['auser_id'] ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Name : "."</td> 
                            <td id='usertable'>". $_SESSION['user_name'] ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Email : "."</td> 
                            <td id='usertable'>". $_SESSION['aemail'] ."</td> 
                        </tr>
                    </table>";
                ?>
            
        </div>
    </body>
</html>
</html>