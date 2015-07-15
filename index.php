<html>
  <head>
    <title>Home Page</title>
  </head>
  <br/>
  <br/>
  <table width="100%" style="max-width:50%;" align="center" border="1px">
    <tr>
        <th>Actor Name</th>
        <th>Actor Revenue</th>
    </tr>
    <?php
      //Connects to server
      mysql_connect("localhost","root","") or die(mysql_error());

      //Connects to database
      mysql_select_db("cbsi_movies_db") or die("Cannot connect to database");

      //SQL query for displaying the actors' names
      $actor_query = mysql_query("SELECT id,fullName FROM actors ORDER BY fullName");

      if($actor_query === FALSE){
        die(mysql_error());
      }

      print "<tr>";
      while($actor_row = mysql_fetch_array($actor_query)){
        $actor_rev_sum = 0;
        $rev_sum = 0;
        $curr_actor_id = $actor_row['id'];
        $curr_actor = $actor_row['fullName'];

        $rev_query = mysql_query("SELECT basePay,
          (payments.revShare*movies.revenue/100) payout
          FROM payments LEFT JOIN movies
          ON payments.movieId = movies.id
          WHERE '$curr_actor_id' = payments.actorId");

        while ($rev_row = mysql_fetch_array($rev_query)){
          $currBase = $rev_row['basePay'];
          $currPayout = $rev_row['payout'];
          $rev_sum+= $currBase + $currPayout;
        }

        print '<td align="center">'.$curr_actor."</td>";
        print '<td align="center">'."$".number_format($rev_sum,2)."</td>";

        print "</tr>";
        /*
        print "<tr>";
          //SQL query for displaying the actors' revenues
          $movie_query = mysql_query("SELECT * FROM movies");

          if($movie_query === FALSE){
            die(mysql_error());
          }

          while ($movie_row = mysql_fetch_array($movie_query)){
            //SWITCH statement to properly calculate an actor's revenue
            switch ($actor_row['fullName']) {
              case $movie_row['actor1']:
                $actor_rev_sum += $movie_row['base1']
                + ($movie_row['rev1']*$movie_row['revenue']/100.00);
                break;
              case $movie_row['actor2']:
                $actor_rev_sum += $movie_row['base2']
                + ($movie_row['rev2']*$movie_row['revenue']/100.00);
                break;
              case $movie_row['actor3']:
                $actor_rev_sum += $movie_row['base3']
                + ($movie_row['rev3']*$movie_row['revenue']/100.00);
                break;
              case $movie_row['actor4']:
                $actor_rev_sum += $movie_row['base4']
                + ($movie_row['rev4']*$movie_row['revenue']/100.00);
                break;
              default:
                break;
            }
          }
          print '<td align="center">'.$actor_row['fullName']."</td>";
          print '<td align="center">'."$".number_format($actor_rev_sum,2)."</td>";

        print "</tr>";
        */
      }
    ?>
  </table>
  <br/><br/>

  <table width="100%" style="max-width:50%;" align="center" border="1px">
    <tr>
        <th>Company Name</th>
        <th>Company Revenue</th>
        <th>Company Cost</th>
        <th>Company Profit(+)/Loss(-)</th>
    </tr>
    <?php
      //SQL query to display the companies' names, their total revenue,
      //their total costs, and their profits/losses.
      $company_query = mysql_query("SELECT companies.companyName,
      SUM(movies.revenue) totalRevenue, SUM(movies.cost) totalCost,
      SUM(movies.revenue)-SUM(movies.cost) totalProfitLoss FROM companies
      LEFT JOIN movies ON movies.companyId = companies.id
      GROUP BY companies.companyName ORDER BY companies.companyName");

      if($company_query === FALSE){
        die(mysql_error());
      }

      while($company_row = mysql_fetch_array($company_query)){
        print "<tr>";
          print '<td align="center">'.$company_row['companyName']."</td>";
          print '<td align="center">$'.number_format($company_row['totalRevenue'],2)."</td>";
          print '<td align="center">$'.number_format($company_row['totalCost'],2)."</td>";
          print '<td align="center">$'.number_format($company_row['totalProfitLoss'],2)."</td>";
        print "</tr>";
      }
    ?>
  </table>
  <br/><br/>

  <!--
  Table displaying numbers of lines and words in each movie script for each
  Actor and the number of times the Actor's character is mentioned in each
  script by other Actors.
  -->
  <table width="100%" style="max-width:50%;" align="center" border="1px">
    <tr>
        <th>Movie Title</th>
        <th>Character Name</th>
        <th>Actor Name</th>
        <th>Number of Lines</th>
        <th>Number of Words</th>
        <th>Number of Mentions</th>
    </tr>
    <?php



      $character_query = mysql_query("SELECT movies.title,
        characters.id, characters.name,
        actors.fullName, COUNT(scripts.characterId) charlines,
        scripts.movieId FROM characters
        JOIN scripts ON characters.id = scripts.characterId
        JOIN movies ON characters.movieId = movies.id
        JOIN actors ON characters.actorId = actors.id
        GROUP BY characters.name
        ORDER BY movies.title");

      if($character_query === FALSE){
        die(mysql_error());
      }

      while($character_row = mysql_fetch_array($character_query)){
        $currCharacter = $character_row['name'];
        $currCharacterId = $character_row['id'];
        $currMovieId = $character_row['movieId'];
        //echo $currCharacter."<br/>";
        $wordsCount = 0;
        $mentionCount = 0;

        $mention_query = mysql_query("SELECT scripts.lineText
          FROM scripts
          WHERE '$currCharacterId' != scripts.characterId
          AND '$currMovieId' = scripts.movieId");

        if($mention_query === FALSE){
          die(mysql_error());
        }
        //echo "~~".mysql_fetch_array($mention_query)['lineText']."<br/>";
        while ($mention_row = mysql_fetch_array($mention_query)){
          $currLineArray = explode(" ",$mention_row['lineText']);
          foreach ($currLineArray as $word){
            //echo $word."##<br/>";
            if(strpos($word,$currCharacter) !== FALSE){
              $mentionCount++;
              //echo "*<br/>";
            }
          }
        }


        $script_query = mysql_query("SELECT scripts.lineText
          FROM scripts
          JOIN characters ON characters.id = scripts.characterId
          WHERE '$currCharacter' = characters.name");

        if($script_query === FALSE){
          die(mysql_error());
        }

        while ($script_row = mysql_fetch_array($script_query)){
          $wordsCount += count(explode(" ",$script_row['lineText']));
          //echo "WordCount: ".$wordsCount." After line: ".$script_row['lineText']."<br/>";
        }


        print "<tr>";
          print '<td align="center">'.$character_row['title']."</td>";
          print '<td align="center">'.$character_row['name']."</td>";
          print '<td align="center">'.$character_row['fullName']."</td>";
          print '<td align="center">'.$character_row['charlines'].'</td>';
          print '<td align="center">'.$wordsCount.'</td>';
          print '<td align="center">'.$mentionCount.'</td>';
        print "</tr>";
      }
    ?>
  </table>
  <br/><br/>

  <body>
    <div align="center">
      <a href="actor_lookup.php">Click here for Actor Lookup</a> <br/><br/>
      <a href="movie_form.php">Click here to add new Movie Entry</a> <br/><br/>
    </div>
  </body>

</html>
