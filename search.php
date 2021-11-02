<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "repofinder";

$con = new mysqli($server, $username, $password, $dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Repo Finder</title>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="search.php">Maitra's Projects</a>
    <form class="form-inline" method="get" action="search.php">

      <input name="reponame" class="form-control mr-sm-2 mb5" type="search" placeholder="Search" aria-label="Search" required>
      <button name="submit" class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>

    </form>
  </nav>

  <br>
  <div class="container">

    <?php

    if (!isset($_GET['submit'])) {

      echo "

              <h1>
                <b> List of all of my projects </b>
              </h1>
      
              <p class='lead'>Enter the project number/name(case sensitive) in search box</p>
            
              <ul class='list-group list-group-flush'>

                <li class='list-group-item'>1. How well do you know me?</li>
                <li class='list-group-item'>2. Brooklyn Nine-Nine Quiz</li>
                <li class='list-group-item'>3. Minion Translator</li>
                <li class='list-group-item'>4. Ferb Latin Translator</li>
                <li class='list-group-item'>5. Emoji Dictionary</li>
                <li class='list-group-item'>6. Better Reads 2.0</li>
                <li class='list-group-item'>7. Cash Register</li>
                <li class='list-group-item'>8. Is your Birthday Lucky ?</li>
                <li class='list-group-item'>9. Fun with Triangles</li>
                <li class='list-group-item'>10. Is your Birthday a Palindrome ?</li>
                <li class='list-group-item'>11. Profit or Loss</li>

              </ul>
              <br>
            
            ";
    }

    if (isset($_GET['submit'])) {
      $serchedName = $_GET['reponame'];

      $sql = "SELECT * FROM `repodata` WHERE ( `id` LIKE '$serchedName' OR `name` LIKE '$serchedName')";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row["id"];
          $reponame = $row["name"];
          $des = $row["des"];
          $link = $row["link"];
        }

        echo "
      
                <br><br>
                <div class='card'>

                  <div class='card-header bg-dark text-light'>
                    <h5> Project Details </h5>
                  </div>

                  <div class='card-body'>

                    <dl class='row'>

                      <dt class='col-sm-3'>Project Number</dt>
                      <dd class='col-sm-9'> <h3> $id </h3> </dd>

                      <dt class='col-sm-3'>Project Name</dt>
                      <dd class='col-sm-9'> <h3> $reponame </h3> </dd>
                  
                      <dt class='col-sm-3'>Description</dt>
                      <dd class='col-sm-9'> <h5> $des </h5> </dd>
                  
                      <dt class='col-sm-3'>GitHub Repo Link</dt>
                      <dd class='col-sm-9'> <h5> <a href='$link' class='badge badge-dark' target='_blank'> Link </a> </h5> </dd>
                  
                    </dl>
              
                  </div>
                </div> <br> <br>

                <h1>
                <b> Check out all of my projects </b>
                </h1>

                <p class='lead'>Enter the project number/name(case sensitive) in search box</p>
            
                <ul class='list-group list-group-flush'>

                  <li class='list-group-item'>1. How well do you know me?</li>
                  <li class='list-group-item'>2. Brooklyn Nine-Nine Quiz</li>
                  <li class='list-group-item'>3. Minion Translator</li>
                  <li class='list-group-item'>4. Ferb Latin Translator</li>
                  <li class='list-group-item'>5. Emoji Dictionary</li>
                  <li class='list-group-item'>6. Better Reads 2.0</li>
                  <li class='list-group-item'>7. Cash Register</li>
                  <li class='list-group-item'>8. Is your Birthday Lucky ?</li>
                  <li class='list-group-item'>9. Fun with Triangles</li>
                  <li class='list-group-item'>10. Is your Birthday a Palindrome ?</li>
                  <li class='list-group-item'>11. Profit or Loss</li>

                </ul> <br><br>
      
              ";
      } else {
        echo "0 results";
      }
    }

    ?>

  </div>

  <nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mx-auto h1">Check me out on <a href="https://github.com/maitrakhatri" class="badge badge-light"> GitHub </a></span>
  </nav>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>

<?php

$con->close();

?>
