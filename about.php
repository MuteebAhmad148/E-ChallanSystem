<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css"  />
        <style>
            #centerdiv {
                 width: 96%;
                height: 100%;
                text-align: justify;
                padding-left: 40px;
                padding-right: 40px!important;
             }
            p{
                //font-family: serif;
                font-size: 20px;
            }
        </style>
</head>
    
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <?php
             error_reporting(E_ERROR | E_PARSE);
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
        
        <div id="centerdiv">
            <center> <h1 style="font-size:350%;color:black;font-family:Arial">About<br> </h1> </center> 
            <p >
                E_Challan system was developed to automate the challan sytem of Pakistan. Pakistan is the sixth most populated country in the world. Heavy Traffic is one of the biggest problems of Pakistan. Uptil now Challan was calculated manually which consumed resources like paper, pen and human labour. E_Challan system automates this system saving these valuable resources. 
            </p> 
            <p > 
                In its developing country, this system is a huge step forward in the country's progress. Pakistan is currently faced with heavy debts and is looking for cost effective solutions in every part of life. This system is a very helpful step in this direction.
            </p> 
            <p> 
                E_Challan system not only facilitates challan generation but also its delivery. It also faciliates the common public, giving them the facility to view infomation regaring their vehicles & challans. For challans that have exceeded their due date, Licences are cancelled automatically without requiring human labour.</p> 
            <p > 
                E_Challan system also ensures security and integrity of this data. Its security system protects it from any sort of hacking attempts. Data is periodically backed up for safe keeping for use in case of unfortunate mishaps. So you need not worry about your data.
            </p> 
            <p > 
                The maintainence of this system is a continous process that will continue to take place along with time to make it compatible with the needs and requirements of that era.
            </p> 
            <p > 
                We are hopeful that this system will facilitate Pakistani public in a huge way and play its role in Pakistan's journey towards progress.
            </p>
            
        </div>
    </body>
</html>