<html>
  <head>
    <title>Enter New Company Information</title>
  </head>
  <body>
    <h1 align="center">New Company Entry Form:</h1>
    <form action="company_form.php" align= "center" method="POST">
      Enter Company Name: <input type="text" name="companyNameEntry" align= "center" required="required"/> <br/><br/>
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

      $bool = true;     //This company has not been added to the database previously

      $companyName = mysql_real_escape_string($_POST['companyNameEntry']);

      $query = mysql_query("SELECT * from companies");
      while($row = mysql_fetch_array($query)){
        if ($companyName == $row['companyName'])
        {
          $bool = false;
          echo $companyName." has already been added to the database previously.<br/>";
        }
      }
      if ($bool){
        mysql_query("INSERT INTO companies(companyName) VALUES ('$companyName')");
        echo $companyName." has been added to the database.<br/>";
      }

    }
  ?>

</html>
