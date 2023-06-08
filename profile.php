
<html>
    <head>
        <style>
            body {
                background-image: url(images/PROFILE_BG.png);
                background-position: bottom;
                background-repeat: no-repeat;
                background-size: cover;
            }
            img {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 30%;
            }
            table {
                margin: auto;
                border-collapse: collapse;
                width: 80%;
                max-width: 800px;
                border: 1px solid #ccc;
                font-family: Arial, sans-serif;
                position: center;
                border-radius: 10px;
                border-style: hidden; /* hide standard table (collapsed) border */
                box-shadow: 0 0 0 1px #666; /* this draws the table border  */ 
                background-color: white;
                overflow: hidden;
                text-align: center;
                font-size: 20px;
            }
            th{
                background-color: skyblue;
            }
            div.user {
                height: 50px;
                width: 160px;
                position: relative;
                background-color: #6578BB;
                border: 2px solid white; /*BORDER COLOR*/
                overflow: hidden;
                border-radius: 30px;
                color: white;             /*FONT COLOR AT EASE*/
                transition: all 0.5s ease-in-out;
                font-size: 20px;
                margin: auto;
                right: 19%;
                } 
            h4.user{
                position:absolute; 
                bottom:-13px; 
                left:39%;
            }
            div.email{
                height: 50px;
                width: 300px;
                position: relative;
                background-color: #60750B;
                border: 2px solid white; /*BORDER COLOR*/
                overflow: hidden;
                border-radius: 30px;
                color: white;             /*FONT COLOR AT EASE*/
                transition: all 0.5s ease-in-out;
                font-size: 20px;
                margin: auto;
                right: 15%;
            }
            h4.email{
                position:absolute; 
                bottom:-14px; 
                left:18%;
            }
            button.leaderboard {
                height: 50px;
                width: 220px;
                position: absolute;
                background-color: #CA9721;
                cursor: pointer;
                border: 2px solid white; /*BORDER COLOR*/
                overflow: hidden;
                border-radius: 30px;
                color: white;             /*FONT COLOR AT EASE*/
                transition: all 0.5s ease-in-out;
                top:28%;
                left:60.5%;
            }
            .btn-txt {
                z-index: 1;
                font-weight: 800;
                letter-spacing: 0px;
            }

            .leaderboard::after {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                transition: all 0.5s ease-in-out;
                background-color: yellow;  /*COLOR FILL UP THE BUTTON*/
                border-radius: 30px;
                visibility: hidden;
                height: 10px;
                width: 10px;
                z-index: -1;
            }
        
            .leaderboard:hover {
                box-shadow: 1px 1px 200px #CA9721; /* SHADOW COLOR */
                color: white; /* FONT COLOR CHANGE COLOR WHEN HOVER*/
                border: none;
            }
            img.crown{
                display: block;
                left: 64.4%;
                top: 19.5%;
                width: 5%;
                position: absolute;
            }
        </style>
    </head>
    
<?php
require "config.php";
use App\User;

$table = User::profile();

echo "<div align='center'>";
echo "<table border='1'>";
echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Subject</th>";
    echo "<th>Score</th>";
    echo "<th>Saved_at</th>";
echo "</tr>";
foreach($table as $data){
    echo "<tr>";
    foreach ($data as $columnName => $Value){
        echo "<td>" . $Value . "</td>";
    }
    echo "<tr>";
}
echo "</div>";
?>
<body>
        <img src="images/logo_bw.png" alt="logo" >
        <div class="user">
        <h4 class="user"><?php echo $_SESSION['user']['username'] ?></h4>
        </div>
        <br>
        <div class="email">
        <h4 class="email"><?php echo $_SESSION['user']['email'] ?></h4>
        </div>
        <br>
        <img src="images/LB_CROWN.png" alt="logo" class="crown">
        <div>
        <button class="leaderboard" onclick = "window.location.href='leaderboard.php';"><span class="btn-txt">VIEW LEADERBOARDS</span></button>
        </div>
</body>