<?php 

session_start(); 
require('../backendPart/config.php');

?>


<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>               
      <link rel="stylesheet" href="../frontEndCssFiles/StaffPageStyles.css">  
          
    </head>
    <body>
                
                           
                         
 
                     
                
      <div class="navbar">
      <a href="ViewProfilePageStaff/ViewProfilestaff.php"><i class="fa fa-fw fa-user"></i>Profile</a> 
        <a class="active" href="staffMainPage.php"><i class="fa fa-fw fa-home"></i> Home</a> 
        <a>Staff Page </a> 
      </div>
      
         
 
                   
 <div class="col s12 m12 l12">
 <div class="card1">
 <div class="card1-content">
<h2><span class="title">Leave History</span></h2>
 <table id="example" class="display responsive-table ">
 <thead>
<tr>
    <th width="50">Application ID</th>
    <th width="120">Leave Type</th>
    <th width="120">From</th>
    <th width="120">To</th>
    <th width="120">Requesting Date </th>
    <th width="120">Status</th>
    </tr>
    </thead>
                                 
    <tbody>
    <?php


    $temp = $_SESSION["USERNAME"];
    $tempdata= "SELECT leavingapplication.AppID,leavingapplication.leavingReason, 
    leavingapplication.BeginingDate, leavingapplication.EndingDate, leavingapplication.RequestTime, 
    leavingapplication.applicationStatus FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
    WHERE staff.St_UserName ='$temp'";

$records = mysqli_query($conn,$tempdata); // fetch data from database


while($dataset = mysqli_fetch_array($records) )
{
  if(isset( $dataset['applicationStatus']) && $dataset['applicationStatus'] =="approved")
  {
    $colorOfstauts = "blue";
    $statusVariable = $dataset['applicationStatus'];
  }
  else if (isset( $dataset['applicationStatus']) && $dataset['applicationStatus'] =="Not Approve"){
    $colorOfstauts = "red";
    $statusVariable = $dataset['applicationStatus'];
  }
  else{
    $colorOfstauts = "black";
    $statusVariable = "waiting descision";
  }
?>
    <tr>
    <td><?php echo $dataset['AppID'];?></td>
    <td><?php echo $dataset['leavingReason'];?></td>
    <td><?php echo $dataset['BeginingDate'];?></td>
    <td><?php echo $dataset['EndingDate'];?></td>
    <td><?php echo $dataset['RequestTime'];?></td>
     
    <td><span style="color: <?php echo $colorOfstauts;?>"><?php echo $statusVariable;?></span></td>
          
    </tr>
                                           
<?php }?>
 
</tbody>
</table>
</div>
</div>
</div>
</div>
</main>        
</div>
<div class="left-sidebar-hover"></div>
      
<form action="leaveFormToAdd/leaveFormfrontend.php">
<button class="button button1">Add New Application</button>  
</form>
<?php  mysqli_close($conn);?>
</body>
</html>