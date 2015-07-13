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
      $actor_query = mysql_query("SELECT * FROM actors ORDER BY fullName");

      if($actor_query === FALSE){
        die(mysql_error());
      }

      while($actor_row = mysql_fetch_array($actor_query)){
        $actor_rev_sum = 0;

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
      }
    ?>
  </table>
  <br/>
  <br/>
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
      LEFT JOIN movies ON movies.companyName = companies.companyName
      GROUP BY movies.companyName ORDER BY companies.companyName");

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
  <br/>
  <br/>
  <body>
    <div align="center">
      <a href="actor_lookup.php">Click here for Actor Lookup</a> <br/><br/>
      <a href="movie_form.php">Click here to add new Movie Entry</a> <br/><br/>
    </div>
  </body>

</html>
