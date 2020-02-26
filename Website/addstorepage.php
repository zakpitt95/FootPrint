<?php
session_start();
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <html lang="en">

  </html>
  <title>FootPrint</title>
  <!--CSS Link-->
  <link rel="stylesheet" href="css/styleaddstore.css">

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
        if (!isset($_SESSION["loggedin"])) {
          echo "<li><a href=\"login.php\">Login</a></li>";
        }
        ?>
        <?php
        if (!isset($_SESSION["loggedin"])) {
          echo "<li><a href=\"register.php\">Register</a></li>";
        }
        ?>
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
          echo "<li><a href=\"logout.php\">Log Out</a></li>";
        }
        ?>
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
          echo "<li><a href=\"addstorepage.php\">Add Store</a></li>";
        }
        ?>
      </ul>
    </div>
  </nav>
  <main>
    <div class="container">
      <form id="form" action="addstoreconfirmation.php">
        <h1>Location:<h1> <input type="text" name="storelocation"><br>
            <input type="submit" id="submitbutton1" name="submit" value="Submit">

      </form>


    </div>
  </main>
  <footer>
    <div class="container">

    </div>
  </footer>
</body>

</html>