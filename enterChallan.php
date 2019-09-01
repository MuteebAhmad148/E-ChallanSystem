<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
    
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            #leftdiv{
                background-color: transparent;
            }
            form p{
                padding-left: 70px;
            }    
        </style>   
        <?php
        $value=0;
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        $vehicleNo=$_GET['vid'];
        if($_REQUEST["btn"])
        {
            $veh=$_POST['vehicleName'];
           $_SESSION['vehicleName']=$_POST['vehicleName'];
            $_SESSION['amount']=$_POST['amount'];
            $host="localhost";
            $username="root";
            $password="";
            $dbname="dbs";
            $conn = mysqli_connect($host, $username, $password,$dbname);
            
            $query="select * from vehicle where Vehicle_No='$veh'";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
            if($count==0)
            {
                $value=1;
            }
            else
            {
                $query="select * from challan where Vehicle_No='$veh' and C_Status='UnPaid'";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
                if($count==0)
                     header('Location: challanForm.php');
                else
                    $value=2;
            }
        
        }
        ?>
    </head>
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <a href="wardon.php">Home</a>
            <a>About</a>
            <a>Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>
        <div id="leftdiv">
            
        </div>
        <div id="centerdiv">
                    <form   method="post">
                        <h1>Enter Challan</h1>
                        <?php
                         echo "<input type='text' name='vehicleName' placeholder='Vehicle Number' value=".$vehicleNo." readonly><br<br>"
                        ?>    
                        <input type="text" name="amount" placeholder="Amount" required><br><br>
                        <input type="submit" name="btn" value="Generate Challan">
                        <?php
                            if($value==2)
                            {
                                echo "<p >Challan already Generated on this Vehicle</p>";
                            }
                            else if($value==1)
                            {
                                echo "<p >Wrong Vehicle Number</p>";
                            }

                        ?>
                    </form>
        </div>
        
    </body>
</html>