<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
            <?php
                $value=0;
                error_reporting(E_ERROR | E_PARSE);
                if($_POST["btn"])
                {
                    $value=2;
                    $phone=$_POST['phone'];
                    error_reporting(E_ERROR | E_PARSE); 
                    $host="localhost";
                    $username="root";
                    $password="";
                    $dbname="dbs";
                    $conn = mysqli_connect($host, $username, $password,$dbname);
                    session_start();
                    $id= $_SESSION['user_id'];
                    $query="
                    update E_User 
                    set PhoneNumber='$phone'
                    where User_ID='$id';
                    ";
                    $result=mysqli_query($conn,$query);
                }   
            ?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css">
     <style>
        #leftdiv{
            background-color: transparent;
        }
 #rightdiv{
            background-color: transparent;
        }    
    </style>
</head>
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <?php
             session_start();
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
            <form  method="post">
                        <h1>Edit Profile</h1>
                        <input type="text" name="phone" placeholder="New Phone Number" required><br><br>
                        <input type="submit" name="btn" value="Confirm">
                 <?php
                if($value==2)
                {
                    echo "<p >Phone Number Changed</p>";
                }
           
            ?>
            </form>
           
               
        </div>
        <div id="rightdiv">
            
        </div>
    </body>
</html>