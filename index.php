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
      mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("first_db") or die("Cannot connect to database");

      $actor_query = mysql_query("SELECT * FROM actors");
      if($actor_query === FALSE)
      {
        die(mysql_error());
      }

      while($actor_row = mysql_fetch_array($actor_query))
      {
        $actor_rev_sum = 0;
        print "<tr>";
          $movie_query = mysql_query("SELECT * FROM movies");
          if($movie_query === FALSE)
          {
            die(mysql_error());
          }
          while ($movie_row = mysql_fetch_array($movie_query)){
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
        <th>Company Loss</th>
        <th>Company Profit(+)/Loss(-)</th>
    </tr>
    <?php
      mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("first_db") or die("Cannot connect to database");

      $company_query = mysql_query("SELECT companies.companyName,
      SUM(movies.revenue) totalRevenue, SUM(movies.cost) totalCost,
      SUM(movies.revenue)-SUM(movies.cost) totalProfitLoss FROM companies JOIN movies
      ON movies.companyName = companies.companyName
      GROUP BY movies.companyName");
      if($company_query === FALSE)
      {
        die(mysql_error());
      }
      while($company_row = mysql_fetch_array($company_query))
      {
        print "<tr>";
          print '<td align="center">'.$company_row['companyName']."</td>";
          print '<td align="center">'.$company_row['totalRevenue']."</td>";
          print '<td align="center">'.$company_row['totalCost']."</td>";
          print '<td align="center">'.$company_row['totalProfitLoss']."</td>";
        print "</tr>";
      }
    ?>
  </table>
  <br/>
  <br/>
  <body>
    <div align="center">
      <a href="actor_lookup.php">Click here for Actor Lookup</a> <br/><br/>
      <!--<a href="actor_form.php">Click here to add new Actor Entry</a> <br/><br/>-->
      <!--<a href="company_form.php">Click here to add new Company Entry</a> <br/><br/>-->
      <a href="movie_form.php">Click here to add new Movie Entry</a> <br/><br/>
    </div>
  </body>

</html>
