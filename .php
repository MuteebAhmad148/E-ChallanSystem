<html>
    <?php
            error_reporting(E_ERROR | E_PARSE);
            $value=false;
            session_start();
            $vehicle= $_SESSION['vehicleName'];
            $amount=$_SESSION['amount'];
            $id= $_SESSION['user_id'];
            $host="localhost";
            $username="root";
            $password="";
            $dbname="dbs";
            $conn = mysqli_connect($host, $username, $password,$dbname);
            $query="
            select *
            from e_user
            where User_ID=(
            select User_ID
            from vehicle
            where Vehicle_No='$vehicle'
            )
             ";
            $result=mysqli_query($conn,$query);
             $row = mysqli_fetch_assoc($result);
            $name=$row['User_Name'];
			$email=$row['E_mail'];
            $query="select * from area where Area_Code=(
            select Area_Code
            from e_user
            where User_ID=$id
            ) ";
            $result=mysqli_query($conn,$query);
             $row = mysqli_fetch_assoc($result);
            $areacode=$row['Area_code'];
            $areaname=$row['Area_Name'];
            if($_REQUEST["btnG"])
            {
                $query="
                INSERT INTO challan (Challan_No, Amount, Issue_Date, Due_Date, User_ID, Vehicle_No, Status) VALUES (NULL, '$amount', sysdate(),  adddate(sysdate(),interval 14 day), '$id', '$vehicle', 'UnPaid')";
                $result=mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($result);
				$is_d=$row['Issue_Date'];
				$du_d=$row['Due_Date'];
                $value=true;
				$msg="Dear Mr. '.$name' This is to inform you that you have been issued a challan on your vahicle with number '.$vehicle' of RS '.$amount'.This challan was issued on '$is_d' and must be paid before '$du_d'"; 
				$subject="challan issued";
				$header="From: E_Challan System Management. \r\n";
                echo $email;
				mail($email,$subject,$msg,$header);
            }
    ?>
     <head>
             <link rel="stylesheet" type="text/css" href="style.css"  />
         <style>
             h2{
                 font-family: monospace;
                 text-align: center;
                 padding-top: 10px;
                 font-size: 40px;
             }
             #centerdiv tr td{
                 font-size: 20px;
                 font-family:serif;
             }
             #leftdiv {
                 background-color: transparent;
             }
            form{
                border: none;
                padding-top: 400px;
                
            }
            form input{
                float: left;
                margin-top:   5px;
            }
        </style>
    </head>
    <body>
           <div id="menu">
            <img src="logo.PNG" >
        <nav>
           <a href="wardon.php">Home</a>
           <a>About</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>
        <div id="leftdiv">
            
        </div>
        <div id="centerdiv">
            <h2>Challan Form</h2>
             <?php
                    session_start();
                    echo "<table>
                        <tr>
                            <td id='usertable'>"."Vehicle Number : "."</td> 
                            <td id='usertable'>". $vehicle ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Vehicle owner : "."</td> 
                            <td id='usertable'>". $name ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Wardon Name : "."</td> 
                            <td id='usertable'>". $_SESSION['user_name'] ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Voilation Area : "."</td> 
                            <td id='usertable'>". $areaname ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Amount : "."</td> 
                            <td id='usertable'> RS ". $_SESSION['amount'] ."</td> 
                        </tr>
                    </table>";
                ?>
            <form id="formForButton" method="post" >
                 <input type="submit" name="btnG" value="Generate and Email Challan">
                <br>
                <?php
                if($value)
                    echo "<p >Challan Generated</p>";
            ?>
            </form>
        </div>
          
    </body>    
    </html>