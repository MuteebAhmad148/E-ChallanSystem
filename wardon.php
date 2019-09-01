<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<?php
    error_reporting(E_ERROR | E_PARSE);
   
    $host="localhost";
    $username="root";
    $password="";
    $dbname="dbs";
    $conn = mysqli_connect($host, $username, $password,$dbname);
    session_start();
    if($_POST["btn"])
    {
        $key=$_POST['searchKeyword'];
        $query="select *
                      from vehicle where Vehicle_No Like '%".$key."%';";
        $result=mysqli_query($conn,$query);

    }else{
        $query="select *
                      from vehicle;";
        $result=mysqli_query($conn,$query);
    }
 
?>
 

<html>
    
    <head>
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
            a{
                //border: 2px solid black;
               // text-decoration: none;
                color: black;
                width: 30px;
            }
            a:hover{
                color: red;
            }
            #centerdiv table{
                margin-top: 10%;
            }
        
        </style>
    <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <a href="wardon.php">Home</a>
            <a href="about.php">About</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>
        <div id="leftdiv">
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
        
        <div id="centerdiv">
             <form id="formForButton" method="post" >
                <input type="text" placeholder="Search Vehicle" name="searchKeyword"/>
                <input type="submit" id="submit" value="Search" name="btn">
            </form>
                <?php
                echo "<table >
                            <tr>
                                <th>Vehicle No</th>
                                <th></th> 
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {     
                    echo    "<tr>
                                <td>". $row['Vehicle_No'] ."</td>".
                                "<td>  <a href='enterChallan.php?vid=".$row['Vehicle_No']."'>Generate Challan</a></td></tr>";
                }  
            
            echo "</table>";
           ?>	       
        </div>
          
    </body>

</html>