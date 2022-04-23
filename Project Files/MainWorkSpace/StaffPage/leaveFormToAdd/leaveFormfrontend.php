<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Form</title>
    <style>
        /* body{
            background-color: rgb(245, 245, 245);
        } */
        #container{
            height: 100%;
            width: 100%;
            display: block;
            position: absolute;
            background-color: rgb(245, 245, 245);
            left: 0;
            top: 0;
        }
        #theForm{
            position:absolute;
            top: 35%;
            left: 36%;
            height: 60%;
            width: 30%;
            border: 1px solid black;
            /* background-color: rgb(77, 152, 218); */
            background-color: rgb(255, 255, 255);
            border-radius: 1%;
            box-shadow:5px 5px #888888 ;
            padding: 10px;
        }
        input{
            margin: 10px;
            left: 20%;
            top: 20%;
            position: relative;
        }

        /* #header{
            position: absolute;
            height: 15%;
            left: 0;
            top: 0;
            width: 100%;
            background-color: lightblue;
            color: black;
            text-align: center;

        } */
        #menuBar{
            position: absolute;
            top: 0%;
            height: 15%;
            width: 100%;
            background-color: aqua;

        }
        a{
        padding: 10px 16px;
        margin: 10px;
        position: relative;
        top: 50%;
        left: 43%;
        }
        a#mainPage > img{
            height: 45%;
        }
        div >h1{
            position: absolute;
            left: 0;
            border: 1px solid black;
            padding: 10px;
        }
    
    </style>
    <script src="leaveFormV.js"></script>
</head>
<body>

    <div id="container">
        
        <div id="menuBar">
            <h1>Leave Form</h1>
            <a href="../staffMainPage.php" id="mainPage">
                <img src="../../Images/home-24.png" alt="home button">
            </a>

            <a href="../ViewProfilePageStaff/ViewProfilestaff.php" id="proPage">
                <img src="../../Images/male-user-48.png" alt="Profile buttom">
            </a>
        </div>
        <div id="theForm">
    <form action="leaveForm.php" method="post" name="leaveForm" onsubmit="return VerifyForm()">
        
        
        <label for="timeOff">Request Date: </label>
        <input type="date" name="timeOff" id="timeOff">
        <br>
        <br>
        <label for="beginOn">Begining on: </label>
        <input type="date" name="beginOn" id="beginOn">
        <br>
        <br>
        <label for="endOn">Ending on: </label>
        <input type="date" name="endOn" id="endOn">
        <br>
        <br>
        <label for="leave">reason for Leave:</label>
        <select name="leaveReason" id="leave">
            <option disabled selected value> -- select an option -- </option>
            <option value="vacation">Vacation</option>
            <option value="personal">Personal Leave</option>
            <option value="funeral">Funeral</option>
            <option value="family">Family reason</option>
            <option value="medical">Medical</option>
            <option value="other">Others</option>
        </select>
        <!-- <input type="radio" name="reason" id="vac" value="vacation">
        <label for="vac">Vacation </label>
        <input type="radio" name="reason" id="personal" value="personal">
        <label for="personal">Personal leave </label>
        <input type="radio" name="reason" id="funeral" value="funeral">
        <label for="funeral">funeral</label>
        <br>
        <input type="radio" name="reason" id="family" value="family">
        <label for="family">Family Reason</label>
        <input type="radio" name="reason" id="medical" value="medical">
        <label for="medical">medical Leave</label>
        <input type="radio" name="reason" id="other" value="other">
        <label for="other">other</label>
        <input type="text" name="otherReason" id="otherReason"> -->
        <br>
        <br>
        <label for="description">Description: </label>
        <br>
        <textarea name="description" id="description" cols="50" rows="6"></textarea>
        <br>
        <br>
        <button type="submit" value="submit">Submit</button>


            </div>
    </div>
    </form>
    
</body>
</html>