<!DOCTYPE html>
<html>
    <head>
        <title>
            PROFILE
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    
        <?php
        require "config.php";
        use App\User;
        if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
            header('Location: login.php');
        }
        $table = User::profile();

        echo "<div align='center'>";
        echo "<table border='1' class='pf_tbl'>";
        echo "<tr>";
            echo "<th class='pf'>Username</th>";
            echo "<th class='pf'>Subject</th>";
            echo "<th class='pf'>Score</th>";
            echo "<th class='pf'>Saved_at</th>";
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

    <body class="pf-body">
        <img src="images/logo_bw.png" alt="logo" class="pf-logo">
            <div class="user">
                <h4 class="user"><?php echo $_SESSION['user']['username'] ?></h4>
            </div>
            <br>
            <div class="email">
                <h4 class="email"><?php echo $_SESSION['user']['email'] ?></h4>
            </div>
            <br>
            <img src="images/LB_CROWN.png" alt="logo" class="crowny">
            <div>
                <button class="leaderboard" onclick = "window.location.href='leaderboard.php';">
                    <span class="btn-txt">
                        VIEW LEADERBOARDS
                    </span>
                </button>
            </div>
            <input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
            <label for="menu-icon"></label>
            <nav class="nav"> 		
                <ul class="pt-5">
                <img class="ddlogo" src="images/logo_bw.png">
                    <li><a href="selection.php">Selection</a></li>
                    <li><a href="leaderboard.php">Leaderboard</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="about_us.php">About us</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </nav>
    </body>
</html>