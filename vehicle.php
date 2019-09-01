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
                $row = mysqli_fetch_assoc($result);
                $id= $_SESSION['user_id'];
                if($_POST["btn"])
                {
                    
                     $key=$_POST['searchKeyword'];
        
            $query="select * from vehicle where user_id='$id' and Vehicle_No like'$key%' ";
                     $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
                }
                else{
                $query="select * from vehicle where user_id='$id'  ";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
                }
    ?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      form input[type="text"] {
                border: 2px solid!important;   
                border-bottom: 2px solid black!important;
                padding: 6px!important;
                margin-left: -37%!important;
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
            <form id="formForButton" method="post" >
                <input type="text" placeholder="Vehicle Number" name="searchKeyword"/>
                <input type="submit"  value="Search" name="btn">
            </form>
           <?php
                echo "<table >
                            <tr>
                                <th>Vehicle No          </th>
                                <th>Model               </th>
                                <th>Type                </th> 
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {     
                    echo    "<tr>
                                <td>". $row['Vehicle_No'] ."</td>".
                                "<td>". $row['Model'] ."</td>".
                                "<td>".$row['Type']. "</td>
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