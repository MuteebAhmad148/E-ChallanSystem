<html>
    <?php
    $host="localhost";
        $username="root";
        $password="";
        $dbname="dbs";
        $conn = mysqli_connect($host, $username, $password,$dbname);
       $query="Update license,challan Set License_Status='Inactive' where challan.Due_Date<sysdate() ";
        $result=mysqli_query($conn,$query);
     session_start();
    $_SESSION['STATUS']="";
    $value=false;
	error_reporting(E_ERROR | E_PARSE);
	if($_POST["btn"])
	{
        $email=$_POST['email'];
        $code=$_POST['passwd'];  
        
        $query="select * from e_user where E_mail='$email'and password='$code' ";
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if($count==1){
           
            $_SESSION['email']=$email;
            $_SESSION['password']=$code;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id']=$row['User_ID'];
            $_SESSION['user_name']=$row['User_Name'];
            
            $_SESSION['auser_id']=1;
            $_SESSION['aemail']="admin@gmail.com";
            
            $type=$row['Status'];
            $_SESSION['STATUS']="Online";
            if($type=="User")
            {
                 $_SESSION['user']="User";
                header('Location: user.php');
            }
            else if($type=="Wardon")
            {
                 $_SESSION['user']="Wardon";
                header('Location: wardon.php');
            }
            else if($type=="Admin")
            {
                 $_SESSION['user']="Admin";
                header('Location: admin.php');
            }
        }
        else
            $value=true;
	}
?>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="loginstyle.css">
        <style>
            background{
                background-image: url(bridge_sunset_sky_marking_116218_2400x1600.jpg);
            }
            form p{
                color: red;
                font-size: 16px;
            }
            h2{
                font-family: sans-serif;
            }
            img{
                float: left;
                margin-right: 50px;
            }
            li{
                margin-top: 30x;
            }
            ul li{
                
               padding-left: 30px;
                padding-right: 30px;
                margin-left: 50px;
                font-family: sans-serif;
                font-size: 20px;
                text-align: center;
                display: inline;
                border-bottom: 2px solid yellow;
                color: green;
                
            }
            ul li:hover{
                height: 50px;
                border-radius: 10px;
                border: none;
                background-color: #acac10;
                color:white;
                transition: 0.3s;
            }
            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div id="menu">
            <img  src=logo.PNG height="80px" width="200px" >
            <ul>
                <a href="contact.html"><li>   Contact Us     </li></a>
            <a href="faq.html"> <li>   FAQs     </li></a>
            </ul>
        </div>
        <div id="div2">
            <fieldset>
                
               
                <form   method="post" >
                    <h2>Login</h2>
                    <br>
                    <i class="fa fa-user icon"></i>
                    <input type=text name="email" placeholder="   Email" >
                    <br>
                    
                    <i class="fa fa-key icon"></i>
                    <input type ="password" name="passwd" placeholder="  Password" required>
                    <br>
                    
                    <input id="button" type='submit' name="btn" value="SIGN IN " required>
                    <br>
                    <?php
                    if($value==true)
                    {
                       echo" <p>Wrong username or password</p>";
                    }
                    ?>
                </form>
            </fieldset>
        </div>
    </body>
   
</html>