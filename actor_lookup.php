<html>
  <head>
    <title>Actor Lookup</title>
  </head>
  <body>

      <form action="actor_lookup.php" align="center" method="POST">
        Enter Actor Full Name: <input type="text" align="center" name="fullNameSearch" required="required"/> <br/><br/>
        <input type="submit" value="Submit"/> <br/><br/>
        <div align="center">
          <a href="index.php">Back to Home</a>
        </div>
      </form>
  </body>

</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $fullName = mysql_real_escape_string($_POST['fullNameSearch']);
  $bool = false;

  mysql_connect("localhost", "root", "") or die(mysql_error()); //Connects to server
  mysql_select_db("cbsi_movies_db") or die ("Cannot connect to database"); //Connects to database

  $actor_query = mysql_query("SELECT * FROM actors WHERE fullName = '$fullName' LIMIT 1"); //Query the actors table
  $row = mysql_fetch_array($actor_query);
  if($fullName == $row['fullName'])
  {
    $bool = true;
    print "<b>Actor's Full Name: </b>".$row['fullName']."<br/><br/>";
    $aim_query = mysql_query("SELECT * FROM movies ORDER BY title ASC");//Actor In Movie (aim) Query
    if($aim_query === FALSE)
    {
      die(mysql_error());
    }
    while ($aim_row = mysql_fetch_array($aim_query)){
      switch ($fullName) {
        case $aim_row['actor1']:
          print "Actor starred in: <b>".$aim_row['title']."</b><br/>";
          print "The actor was paid a base amount of <b>$"
          .$aim_row['base1']."</b> and received <b>$"
          .number_format($aim_row['rev1']*$aim_row['revenue']/100.00,2)
          ."</b> from revenue shares.<br/><br/>";
          break;
        case $aim_row['actor2']:
          print "Actor starred in: <b>".$aim_row['title']."</b><br/>";
          print "The actor was paid a base amount of <b>$"
          .$aim_row['base2']."</b> and received <b>$"
          .number_format($aim_row['rev2']*$aim_row['revenue']/100.00,2)
          ."</b> from revenue shares.<br/><br/>";
          break;
        case $aim_row['actor3']:
          print "Actor starred in: <b>".$aim_row['title']."</b><br/>";
          print "The actor was paid a base amount of <b>$"
          .$aim_row['base3']."</b> and received <b>$"
          .number_format($aim_row['rev3']*$aim_row['revenue']/100.00,2)
          ."</b> from revenue shares.<br/><br/>";
          break;
        case $aim_row['actor4']:
          print "Actor starred in: <b>".$aim_row['title']."</b><br/>";
          print "The actor was paid a base amount of <b>$"
          .$aim_row['base4']."</b> and received <b>$"
          .number_format($aim_row['rev4']*$aim_row['revenue']/100.00,2)
          ."</b> from revenue shares.<br/><br/>";
          break;
        default:
          break;
      }
    }

  }
  if(!$bool){
    echo "Actor <b>(".$fullName.")</b> not found!<br/>";
  }



}
?>
