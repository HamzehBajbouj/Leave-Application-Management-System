<?php 
session_start(); // Start up your PHP Session
 
require('config.php');//read up on php includes https://www.w3schools.com/php/php_includes.asp

// username and password sent from form
$myusername=$_POST["userName"];
$mypassword=$_POST["password"];


//this part is to check if there is exsiting row for these table (employee && admin)
//for the admin table
$adminTable="SELECT * FROM admin WHERE A_UserName='$myusername' and A_Password='$mypassword'";
$adminTableResult =  mysqli_query($conn, $adminTable);
$adminTableRows=mysqli_fetch_assoc($adminTableResult);
// $adminUser_name=isset($adminTableRows['A_UserName']) ? $adminTableRows['A_UserName']:'UnKnown';
// $adminUser_password=isset($adminTableRows['A_Password']) ? $adminTableRows['A_Password']:'UnKnown';
$adminCount= mysqli_num_rows($adminTableResult);

//  this is for employee table 
// this will only return the employee who is not managers
$employeeTable="SELECT * FROM staff LEFT JOIN manager ON staff.StaffID = manager.manager_ID 
WHERE manager.manager_ID IS null AND St_UserName ='$myusername' AND St_Password = '$mypassword'";

$employeeTableResult =  mysqli_query($conn, $employeeTable);
$employeeTableRows=mysqli_fetch_assoc($employeeTableResult);
// $employeeUser_name=isset($employeeTableRows['St_UserName']) ? $employeeTableRows['St_UserName']:'UnKnown';
// $employeeUser_password=isset($employeeTableRows['St_Password']) ? $employeeTableRows['St_Password']:'UnKnown';
$employeeTableCount= mysqli_num_rows($employeeTableResult);



//  this is for manager table 
// this will only return the managers only

$managerTable="SELECT * FROM staff INNER JOIN manager ON staff.StaffID = manager.manager_ID
WHERE  St_UserName ='$myusername' AND St_Password = '$mypassword'";

$managerTableResult =  mysqli_query($conn, $managerTable);
$managerTableRows=mysqli_fetch_assoc($managerTableResult);
// $managerUser_name=isset($managerTableRows['St_UserName']) ? $managerTableRows['St_UserName']:'UnKnown';
// $managerUser_password=isset($managerTableRows['St_Password']) ? $managerTableRows['St_Password']:'UnKnown';
$managerTableCount= mysqli_num_rows($managerTableResult);


if($adminCount ==1)
{
    echo "test successful"; 


$_SESSION["Login"] = "YES";
$_SESSION["USERNAME"] = isset($adminTableRows['A_UserName']) ? $adminTableRows['A_UserName']:'UnKnown';
$_SESSION["FIRSTNAME"] = isset($adminTableRows['FName']) ? $adminTableRows['FName']:'UnKnown';
$_SESSION["LASTNAME"] =isset($adminTableRows['LName']) ? $adminTableRows['LName']:'UnKnown';
$_SESSION["EMAIL"] = isset($adminTableRows['sEmail']) ? $adminTableRows['sEmail']:'UnKnown';
$_SESSION["PHONENUMBER"] = isset($adminTableRows['PhoneNumber']) ? $adminTableRows['PhoneNumber']:'UnKnown';
$_SESSION["LEVEL"] =1;

    
   header("Location: ../AdminMainPage/mainAdminPage.php");
} else if ($employeeTableCount==1)
{
    
    echo "test successful"; 
    $_SESSION["Login"] = "YES";
    $_SESSION["USERNAME"] = isset($employeeTableRows['St_UserName']) ? $employeeTableRows['St_UserName']:'UnKnown';
    $_SESSION["FIRSTNAME"] =isset($employeeTableRows['FName']) ? $employeeTableRows['FName']:'UnKnown'; 
    $_SESSION["LASTNAME"] = isset($employeeTableRows['LName']) ? $employeeTableRows['LName']:'UnKnown';
    $_SESSION["EMAIL"] = isset($employeeTableRows['sEmail']) ? $employeeTableRows['sEmail']:'UnKnown';
    $_SESSION["PHONENUMBER"] = isset($employeeTableRows['PhoneNumber']) ? $employeeTableRows['PhoneNumber']:'UnKnown';
    $_SESSION["LEVEL"] =3;

    //this will be for the staff main page
    header("Location: ../StaffPage/staffMainPage.php");
}else if ($managerTableCount==1)
{

    echo "test successful";
    $_SESSION["Login"] = "YES";
    $_SESSION["USERNAME"] = isset($managerTableRows['St_UserName']) ? $managerTableRows['St_UserName']:'UnKnown';
    $_SESSION["FIRSTNAME"] =isset($managerTableRows['FName']) ? $managerTableRows['FName']:'UnKnown'; 
    $_SESSION["LASTNAME"] = isset($managerTableRows['LName']) ? $managerTableRows['LName']:'UnKnown';
    $_SESSION["EMAIL"] = isset($managerTableRows['sEmail']) ? $managerTableRows['sEmail']:'UnKnown';
    $_SESSION["PHONENUMBER"] = isset($managerTableRows['PhoneNumber']) ? $managerTableRows['PhoneNumber']:'UnKnown';
    $_SESSION["LEVEL"] =2;
    $_SESSION["Sorting"] ="new";

    //this will be for the mamager main page
    header("Location: ../ManagerPage/mainManagerPage.php");
}
else{
    echo "no data field";
    $_SESSION["Login"] = "NO";
    header("Location: ../LeavingSystem_logIn.php");
}



	

 mysqli_close($conn);

?>
