<html>
  <head>
    <title>Enter New Actor Information</title>
  </head>
  <body>
    <h1 align="center">New Movie Entry Form:</h1>

    <form action="movie_form.php" method="POST">

      Enter Movie's Title: <input type="text" name="movieTitleEntry" required="required"/> <br/><br/>
      Enter Movie's Production Company Name: <input type="text" name="companyEntry" required="required"/> <br/><br/>
      Enter Movie's Revenue: $<input type="number" name ="revenueEntry" required="required"/> <br/><br/>
      Enter Movie's Cost: $<input type="number" name ="costEntry" required="required"/> <br/><br/>

      Enter Movie's First Actor's Full Name: <input type="text" name="actor1Entry" required="required"/> <br/>
      Enter Movie's First Actor's Base Payment: $<input type="number" name="actor1BaseEntry" required="required"/> <br/>
      Enter Movie's First Actor's Revenue Share Percentage: <input type="number" name="actor1RevEntry" required="required"/>% <br/><br/>

      Enter Movie's Second Actor's Full Name: <input type="text" name="actor2Entry" required="required"/> <br/>
      Enter Movie's Second Actor's Base Payment: $<input type="number" name="actor2BaseEntry" required="required"/> <br/>
      Enter Movie's Second Actor's Revenue Share Percentage: <input type="number" name="actor2RevEntry" required="required"/>% <br/><br/>

      Enter Movie's Third Actor's Full Name: <input type="text" name="actor3Entry" required="required"/> <br/>
      Enter Movie's Third Actor's Base Payment: $<input type="number" name="actor3BaseEntry" required="required"/> <br/>
      Enter Movie's Third Actor's Revenue Share Percentage: <input type="number" name="actor3RevEntry" required="required"/>% <br/><br/>

      Enter Movie's Fourth Actor's Full Name: <input type="text" name="actor4Entry" required="required"/> <br/>
      Enter Movie's Fourth Actor's Base Payment: $<input type="number" name="actor4BaseEntry" required="required"/> <br/>
      Enter Movie's Fourth Actor's Revenue Share Percentage: <input type="number" name="actor4RevEntry" required="required"/>% <br/><br/>

      <input type="submit" value="Submit"/>

    </form>

    <div><a href="index.php">Back to Home</a></div><br/>
  </body>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //Connects to server
      mysql_connect("localhost", "root", "") or die(mysql_error());

      //Connects to database
      mysql_select_db("cbsi_movies_db")
       or die ("Cannot connect to database.<br/>");

      //Basic information about the company itself
      $movieTitle = mysql_real_escape_string($_POST['movieTitleEntry']);
      $movieCompany = mysql_real_escape_string($_POST['companyEntry']);
      $movieRevenue = mysql_real_escape_string($_POST['revenueEntry']);
      $movieCost = mysql_real_escape_string($_POST['costEntry']);

      //Variables for the full names of the actors
      $movieActor1 = mysql_real_escape_string($_POST['actor1Entry']);
      $movieActor2 = mysql_real_escape_string($_POST['actor2Entry']);
      $movieActor3 = mysql_real_escape_string($_POST['actor3Entry']);
      $movieActor4 = mysql_real_escape_string($_POST['actor4Entry']);

      //Variables for the base payments of the actors
      $movieBase1 = mysql_real_escape_string($_POST['actor1BaseEntry']);
      $movieBase2 = mysql_real_escape_string($_POST['actor2BaseEntry']);
      $movieBase3 = mysql_real_escape_string($_POST['actor3BaseEntry']);
      $movieBase4 = mysql_real_escape_string($_POST['actor4BaseEntry']);

      //Variables for the revenue shares of the actors
      $movieRev1 = mysql_real_escape_string($_POST['actor1RevEntry']);
      $movieRev2 = mysql_real_escape_string($_POST['actor2RevEntry']);
      $movieRev3 = mysql_real_escape_string($_POST['actor3RevEntry']);
      $movieRev4 = mysql_real_escape_string($_POST['actor4RevEntry']);

      //Boolean value to check that the information inputted is valid
      $valid_bool = true;

      //Array with the names of each actor to be used to cross-reference
      //against the current names of all the actors within the database.
      $actorArray = [$movieActor1,$movieActor2,$movieActor3,$movieActor4];

      //If the inputted title already exists within the Movies table, then
      //notify the user of the duplication and do not create a new entry.
      $duplicate_movie_query = mysql_query("SELECT * FROM movies");
      while($row = mysql_fetch_array($duplicate_movie_query)){
        if ($movieTitle == $row['title']) {
          $valid_bool = false;
          echo $movieTitle." has already been added to
          the database previously.<br/>";
        }
      }

      /* If the inputted company name does not match one of the 3 movie
       * production companies in the Companies table, then the inputted
       * information is not valid and a new entry is therefore not added to
       * the Movies table and the user is notified about the error.
       */
      $company_check_query = mysql_query("SELECT * FROM companies
        WHERE companyName = '$movieCompany'");
      if(!($company_check_query && mysql_num_rows($company_check_query) > 0)
        && $valid_bool) {
        echo "The company ".$movieCompany." does not seem to exist.<br/>
        Please check your spelling and try again.";
        $valid_bool = false;
      }

      //Foreach statement that dynamically adds actors to the Actors table if
      //do no already exist within the table
      foreach ($actorArray as $actor) {
        $new_actor_query = mysql_query("SELECT * FROM actors
          WHERE fullName = '$actor'");
        if(!($new_actor_query && mysql_num_rows($new_actor_query) > 0)
          && $valid_bool) {
          echo $actor." added to the Actors database.<br/>";
          mysql_query("INSERT INTO actors(fullName) VALUES('$actor')");
        }
      }

      //If the information is valid, then create the new entry into the Movies
      //table with the inputted values
      if ($valid_bool) {
        mysql_query("INSERT INTO movies(title, companyName, revenue, cost,
          actor1,actor2,actor3,actor4,
          base1,base2,base3,base4,
          rev1,rev2,rev3,rev4)
          VALUES ('$movieTitle','$movieCompany','$movieRevenue','$movieCost',
          '$movieActor1','$movieActor2','$movieActor3','$movieActor4',
          '$movieBase1','$movieBase2','$movieBase3','$movieBase4',
          '$movieRev1','$movieRev2','$movieRev3','$movieRev4')");

        echo $movieTitle." has been added to the Movies database.<br/>";
      }
      
    }
  ?>

</html>
