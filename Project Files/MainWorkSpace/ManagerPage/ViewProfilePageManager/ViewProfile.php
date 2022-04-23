<?php
    session_start();
    require_once('../../backendPart/config.php');


    ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <link rel="stylesheet" href="../../frontEndCssFiles/ProfilePageStyle.css">
</head>
<body>



    <div class="navbar">
    <a href="ViewProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a> 
    <a class="active" href="../mainManagerPage.php"><i class="fa fa-fw fa-home"></i> Home</a> 
        <a>Staff Page </a> 
      </div>

   
    <div class="profile-container">
        <div class="profile">
            <p>Profile Page</p><br>
            <a><img src="../../Images/profile-user.png"/></a><br>

            <?php 

                 $username = $_SESSION["USERNAME"];          
                 $mysql = "SELECT Fname, LName, sEmail, PhoneNumber, St_UserName
                FROM Staff
                WHERE St_UserName = $username";


               $result = mysqli_query($conn, $mysql);
              // $row = mysqli_fetch_array($result);

               ?>

            <form action="update.php" method="POST">
                <label for="Fname">First Name</label>
                 <input type="text" class="input" name="fname" value = "<?php echo $_SESSION["FIRSTNAME"]?>"   > </input>
                 <label for="Lname">Last Name</label> 
               <input type="text" class="input" name="lname" value = "<?php echo $_SESSION["LASTNAME"]?>"  > </input><br>
               <label for="Uname">User Name</label>
                <input type="text" class="input" name="userName" value = "<?php echo $_SESSION["USERNAME"] ?>" readonly > </input><br>
                <label for="Email">Email</label>
                <input type="email" class="input" name="email" value = "<?php echo $_SESSION["EMAIL"]?>"readonly  > </input><br>
                <label for="PhoneNo"> Phone Number</label>
               <input type="text" class="input" name="phoneNo" value = "<?php echo $_SESSION["PHONENUMBER"]?>" > </input><br>
                
                       
                <button type = "submit" value="Update" class="update"  >Update</button>
                 
            </form>
        
        </div>
       
    </div>

    <footer id=footer>

    </footer>



</body>

</html>