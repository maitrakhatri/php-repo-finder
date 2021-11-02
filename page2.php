<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "repofinder";

$con = new mysqli($server,$username, $password, $dbname);

if($con->connect_error) { 
    die("Connection failed: " . $con->connect_error); 
}

$val = $_GET["val"]; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>
        <?php echo "Project: $val"; ?>
    </title>

  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="button.php">Maitra's Projects</a>
    </nav>

    <div class="container">


    <?php

        if(isset($_GET['val'])) {
            
            $sql = "SELECT * FROM `repodata` WHERE (`name` LIKE '$val')";
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
                          
                          <h1> <b> Check out all of my projects </b> </h1> <hr> <br>

        <a href='page2.php?val=Profit or Loss' class='btn btn-outline-dark m-2'> Profit or Loss </a>
        <a href='page2.php?val=Is your Birthday a Palindrome ?' class='btn btn-outline-dark m-2'> Is your Birthday a Palindrome ? </a>
        <a href='page2.php?val=Fun with Triangles' class='btn btn-outline-dark m-2'> Fun with Triangles </a>
        <a href='page2.php?val=Is your Birthday Lucky ?' class='btn btn-outline-dark m-2'> Is your Birthday Lucky ? </a>
        <a href='page2.php?val=Cash Register' class='btn btn-outline-dark m-2'> Cash Register </a>
        <a href='page2.php?val=Better Reads 2.0' class='btn btn-outline-dark m-2'> Better Reads 2.0 </a>
        <a href='page2.php?val=Emoji Dictionary' class='btn btn-outline-dark m-2'> Emoji Dictionary </a> 
        <a href='page2.php?val=Ferb Latin Translator' class='btn btn-outline-dark m-2'> Ferb Latin Translator </a> 
        <a href='page2.php?val=Minion Translator' class='btn btn-outline-dark m-2'> Minion Translator </a> 
        <a href='page2.php?val=Brooklyn Nine-Nine Quiz' class='btn btn-outline-dark m-2'> Brooklyn Nine-Nine Quiz </a>
        <a href='page2.php?val=How well do you know me?' class='btn btn-outline-dark m-2'> How well do you know me? </a>
        <br> <br> <br> <br>
                          
                          
                          
                          
                          ";
            }
        }

    ?>

    </div>


    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mx-auto h1">Check me out on <a href="https://github.com/maitrakhatri" class="badge badge-light"> GitHub </a></span>
    </nav>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


  </body>

</html>
