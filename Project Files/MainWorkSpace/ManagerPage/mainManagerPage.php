<?php 

session_start(); 
require('../backendPart/config.php');




  if (isset($_POST['old'])) {
    $_SESSION["Sorting"] ="old"; 
  }else if (isset($_POST['new'])){
   $_SESSION["Sorting"] ="new"; 
  }

  if(isset($_POST['searchWord'])){
    $_SESSION['Search'] = $_POST['searchWord'];
  }
  else{
    $_SESSION['Search'] = null;
  }

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<link rel="stylesheet" href="../frontEndCssFiles/ManagerPageStyles.css">  
 
</head>
<body>
 
<div class="navbar">
    <a href="ViewProfilePageManager/ViewProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a> 
    <a class="active" href="mainManagerPage.php"><i class="fa fa-fw fa-home"></i> Home</a> 
    <a>Manager Page </a> 
</div>                
 
 <br>
<h2><span class="title">Latest Leave Applications</span></h2>
<br>
<br>
 <form method="post">
<input type="text" name ="searchWord" id="myInput" onkeyup="myFunction1()" placeholder="Search for names..." title="Type in a name">
<button name ="search" style="border : none; background-color: #f1f1f1; 
    font-size: 17px; border-bottom: solid 1px black; margin-top : 3px; width: 10%;">Search</button>
</form>

<div class="dropdown">
  
  <button onclick="myFunction()" class="dropbtn" >Sort by</button>
  <div id="myDropdown" class="dropdown-content">
    <form method="post">
    <button name ="new" style="border : none; background-color: #f1f1f1; 
    font-size: 17px; border-bottom: solid 1px black; margin-top : 3px; width: 100%;">New request</button>
    <button name ="old"  style="border : none; background-color: #f1f1f1; 
    font-size: 17px; border-bottom: solid 1px black; margin-top : 3px; width: 100%;" >Old request</button>
    </form>
  </div>
</div>
 
<table id="myTable">
  <tr>
     
    <th>Application ID</th>
    <th>Employe Name</th>
    <th>Leave Type</th>
    <th onclick="myFunction()">Requesting Date</th>
    <th>Status</th>
    <th>Action</th>
    <th>Description</th>
  </tr>


  <?php
if ($_SESSION["Sorting"] =="new" && $_SESSION["Search"] == null){
$records = mysqli_query($conn,"SELECT leavingapplication.AppID , CONCAT_WS(' ', staff.FName , staff.LName) AS fullName,
 leavingapplication.leavingReason,
 leavingapplication.RequestTime,leavingapplication.applicationStatus, leavingapplication.applicationDescription
FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
ORDER BY leavingapplication.RequestTime DESC"); // fetch data from database
}
else if($_SESSION["Sorting"] =="new" && isset($_SESSION["Search"])){
  $search = $_SESSION['Search'];
  $records = mysqli_query($conn,"SELECT CONCAT_WS(' ', staff.FName , staff.LName)AS fullName, leavingapplication.AppID, leavingapplication.leavingReason, leavingapplication.RequestTime,leavingapplication.applicationStatus
  , leavingapplication.applicationDescription
  FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID WHERE UPPER(CONCAT_WS(' ', staff.FName , staff.LName)) LIKE UPPER('%$search%')
  ORDER BY leavingapplication.RequestTime DESC");

}

if ($_SESSION["Sorting"] =="old" && $_SESSION['Search'] == null){
  $records = mysqli_query($conn,"SELECT leavingapplication.AppID , CONCAT_WS(' ', staff.FName , staff.LName) AS fullName,
   leavingapplication.leavingReason,
   leavingapplication.RequestTime,leavingapplication.applicationStatus, leavingapplication.applicationDescription
  FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
  ORDER BY leavingapplication.RequestTime ASC"); // fetch data from database
  }
  else if ($_SESSION["Sorting"] =="old" && isset($_SESSION['Search'])){
    $search = $_SESSION['Search'];
    $records = mysqli_query($conn,"SELECT CONCAT_WS(' ', staff.FName , staff.LName)AS fullName, leavingapplication.AppID, leavingapplication.leavingReason, leavingapplication.RequestTime,leavingapplication.applicationStatus
    , leavingapplication.applicationDescription
    FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID WHERE UPPER(CONCAT_WS(' ', staff.FName , staff.LName)) LIKE UPPER('%$search%')
    ORDER BY leavingapplication.RequestTime ASC");
  
    }


while($data = mysqli_fetch_array($records))
{
  if(isset( $data['applicationStatus']) && $data['applicationStatus'] =="approved")
  {
    $colorOfstauts = "blue";
    $statusVariable = $data['applicationStatus'];
  }
  else if (isset( $data['applicationStatus']) && $data['applicationStatus'] =="Not Approve"){
    $colorOfstauts = "red";
    $statusVariable = $data['applicationStatus'];
  }
  else{
    $colorOfstauts = "black";
    $statusVariable = "waiting descision";
  }
?>

  <tr>
     <td> <b><?php echo $data['AppID']; ?></b></td>
     <td><?php echo $data['fullName'];?></td>
     <td><?php echo $data['leavingReason'];?><</td>
     <td><?php echo $data['RequestTime'];?></td>    
      <td><span style="color: <?php echo $colorOfstauts;?>"><?php echo $statusVariable;?></span></td>
         <td><button class="button button1">Approve</button>
           <button class="button button1">Not Approve</button></td>
           <td><?php echo $data['applicationDescription'];?></td>  
  </tr>
  <?php
  }
  ?>
   
</table>

<script>


function myFunction1() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

 
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}





</script>
<?php  mysqli_close($conn);?>
</body>
</html>
 