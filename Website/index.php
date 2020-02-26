<?php
  session_start();
  
            //Hide charts if not logged in
            if (!isset($_SESSION["loggedin"])) {
                ?>
                <style type="text/css">#chart-container1{
                display:none;
                }</style>
                <style type="text/css">#chart-container2{
                display:none;
                }</style>
                <style type="text/css">#graph1but{
                display:none;
                }</style>
                <style type="text/css">#graph2but{
                display:none;
                }</style>
                <style type="text/css">#form{
                display:block;
                }</style>
                </script>
                <?php
            }
            //Show form telling user to log in
            if (isset($_SESSION["loggedin"])) {
                ?>
                <style type="text/css">#form{
                display:none;
                }</style>
                </script>
                <?php
            }
           
  ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <html lang="en">

    </html>
    <title>FootPrint</title>
    <!--CSS Link-->
    <link rel="stylesheet" href="css/styleindex.css">

</head>

<body>
    <header>

        <div class="container">
            <div id="titlebox"> FootPrint </div>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul id="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="journeytracker.php">Journey Tracker</a></li>
                <?php
                if(!isset($_SESSION["loggedin"])){
                    echo "<li><a href=\"login.php\">Login</a></li>";
                }
          ?>
                <?php
                if(!isset($_SESSION["loggedin"])){
                    echo "<li><a href=\"register.php\">Register</a></li>";
                }
      ?>
                <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    echo "<li><a href=\"logout.php\">Log Out</a></li>";
                }
                ?>
                <?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                echo "<li><a href=\"addstorepage.php\">Add Store</a></li>";
                
                }
                ?>
            </ul>
        </div>
    </nav>
    <main>
        <div class="container">
        <button id="graph1but">Your Monthly Carbon Output</button>
        <button id="graph2but">Carbon Output to Distance Travelled</button>
            <div id="chart-container1">
                <canvas id="mycanvas"></canvas>
            </div>
            <div id="chart-container2" style="display:none">
                <canvas id="mycanvas2"></canvas>
            </div>
            
            <form id="form">
                <h1>
                    You Are Not Logged In
                </h1>
                <a id="loginlink" href="login.php">Login</a>
                <br>
                <br>
                <br>
                <a id="loginlink" href="register.php">Register</a>
            </form>
            <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
            <script type="text/javascript" src="js/graphapp.js"></script>
            <script type="text/javascript" src="js/graphapp2.js"></script>
            <script>
                $(document).ready(function(){
                    $("#graph1but").click(function(){
                        $("#chart-container1").show();
                        $("#chart-container2").hide();
                    });
                    $("#graph2but").click(function(){
                        $("#chart-container1").hide();
                        $("#chart-container2").show();
                    })

                })
            </script>
        </div>


    </main>
    <footer>
        <div class="container">

        </div>
    </footer>
</body>

</html>