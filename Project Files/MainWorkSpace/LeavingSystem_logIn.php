

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="frontEndCssFiles/logInDecoration.css">
    <title>Log In Page</title>

    <script>
 
        function validate()
        {
           if( document.loginForm.email.value == "" )
           {
             alert( "Please provide your Email!" );
             document.loginForm.email.focus() ;
             return false;
           }
           if( document.loginForm.psw.value == "" )
           {
             alert( "Please Enter your Password!" );
             document.myForm.psw.focus() ;
             return false;
           }
       

           return( true );
        }
         
        </script>
</head>
<body>

    <div id="box">
      
        <form action="backendPart/CheckLogInandDirectPage_BackEnd.php" method="POST" name = "loginForm" onsubmit="return(validate());" >
          <label id="UserLable">UserName</label>
          <input type="text" class="userNameInput" name="userName" placeholder="userName">
      
          <label>Password</label> 
          <input type="password" class="PasswordInput" name="password" placeholder="Enter Your Password">
        
          <input type="submit" value="Submit" id="subnitButton"/>
          
        </form>

       </div>
</body>
</html>