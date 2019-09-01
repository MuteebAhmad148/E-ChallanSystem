<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    if($_GET["optB"])
    {
        $_SESSION['option']='A';
        header('Location: editpassword.php'); 
    }
    else if($_GET["optC"])
    {
        $_SESSION['option']='B';
        header('Location: editphone.php');
    }
    $id=$_SESSION['user_id'];
    $host="localhost";
    $username="root";
    $password="";
    $dbname="dbs";
    $conn = mysqli_connect($host, $username, $password,$dbname);
    if($_SESSION['user']=='User')
    {
        $query="select * from vehicle where User_ID='$id' ";
        $result=mysqli_query($conn,$query);
        $VehicleCount=mysqli_num_rows($result);
  
    }
    else if($_SESSION['user']=='Wardon')
    {
        $query="select * from area where Area_Code=(
        select Area_Code
        from e_user
        where User_ID=$id
        ) ";
        $result=mysqli_query($conn,$query);
         $row = mysqli_fetch_assoc($result);
        $areacode=$row['Area_code'];
        $areaname=$row['Area_Name'];
    }
        $query="select * from e_user where User_ID='$id' ";
        $result=mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $phone=$row['PhoneNumber'];
    
?>
    

<head>
     <link rel="stylesheet" type="text/css" href="style.css"  />
        <style>
            table {
    margin-top: -40px;
}
            
            form {
    border: none;
    padding-top: 450px;
}
            form input{
                float: left;
                margin-top:   7px;
            }
            #centerdiv img{
                padding-left: 5%;
            }
            #leftdiv {
               background-color: transparent;
            }
        </style>
</head>
    
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <?php
            if($_SESSION['user']=='User')
               echo" <a href='user.php'>Home</a>";
            else if($_SESSION['user']=='Wardon')
                echo" <a href='wardon.php'>Home</a>";
            else if($_SESSION['user']=='Admin')
                echo" <a href='admin.php'>Home</a>";
            ?>
            <a href="about.php">About</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>
        <div id="leftdiv">
            
        </div>
        
        <div id="centerdiv">
            <img src="user.png">
                <?php
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
                        <br>
                        <tr>";
                        if($_SESSION['user']=='User')
                        {
                           echo" <td id='usertable'>"."Number of Vehicles : "."</td> 
                            <td id='usertable'>". $VehicleCount ."</td>" ;
                        }
                        else if($_SESSION['user']=='Wardon')
                        {
                             echo" <td id='usertable'>"."Area Name : "."</td> 
                            <td id='usertable'>". $areaname ."</td>" ;
                        }
                        echo "
                        </tr
                        <br>
                        <tr>
                            <td id='usertable'>"."Phone Number : "."</td> 
                            <td id='usertable'>". $phone ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Status : "."</td> 
                            <td id='usertable'>". $_SESSION['user'] ."</td> 
                        </tr>
                    </table>";
                ?>
             <form  method="get">
                <input id="submit" type="submit" name="optB" value="Change Password" >
                 <input id="submit" type="submit" name="optC" value="Change Phone Number" >
            </form>
        </div>
    </body>
</html>