<html>
  <head>
    <title>Enter New Actor Information</title>
  </head>
  <body>
    <h1 align="center">New Actor Entry Form:</h1>
    <form action="actor_form.php" align= "center" method="POST">
      Enter Actor Full Name: <input type="text" name="fullNameEntry" align= "center" required="required"/> <br/><br/>
      Enter Actor Base Pay: <input type="text" name="basePayEntry" align= "center" required="required"/> <br/><br/>
      <input type="submit" value="Submit"/>
    </form>
    <div align="center">
      <a href="index.php">Back to Home</a>
    </div>
  </body>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      mysql_connect("localhost", "root", "") or die(mysql_error()); //Connects to server
      mysql_select_db("first_db") or die ("Cannot connect to database"); //Connects to database

      $bool = true;

      $fullName = mysql_real_escape_string($_POST['fullNameEntry']);
      $basePay = mysql_real_escape_string($_POST['basePayEntry']);

      $query = mysql_query("SELECT * from actors");
      while($row = mysql_fetch_array($query)){
        if ($fullName == $row['fullName'])
        {
          $bool = false;
          echo $fullName." has already been added to the database previously.<br/>";
        }
      }
      if ($bool){
        mysql_query("INSERT INTO actors(fullName,basePay) VALUES ('$fullName','$basePay')");
        echo $fullName." has been added to the database.<br/>";
      }
    }
  ?>

</html>
