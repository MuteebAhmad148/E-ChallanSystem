<html>
            <?php
                error_reporting(E_ERROR | E_PARSE);
                session_start();
                $value=0;
                if($_POST["btn"] )
                {      
                    $value=2;
                      if($_POST['passwrd']== $_SESSION['password'])
                      {  
                          if($_SESSION['option']=='A')
                            header('Location : editpassword.php');
                          else  if($_SESSION['option']=='B')
                              header('Location : editphone.php');
                      }     
                }
            ?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <a href="user.php">Home</a>
            <a>About</a>
            <a>Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>
        <div id="leftdiv">
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
                    </table>";
                ?>
        </div>
        <div id="centerdiv">
            <form  method="post">
                        <h1>Edit Profile</h1>
                        <input type="password" name="passwrd" placeholder="Current Password" required><br><br>
                        <input type="submit" name="btn" value="Next">
                <?php
                if($value==2)
                    echo "<p style='color:red;'>Wrong Password</p>";
            ?>
               
            </form>
            
        </div>
        <div id="rightdiv">
        </div>
    </body>
</html>