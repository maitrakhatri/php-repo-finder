<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "repofinder";

$con = new mysqli($server, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: ". $con->connect_error);
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

    <br>
    <div class="container">

      <form class="form-inline my-2 my-lg-0" method="get" action="index.php">

         <input name = "reponame" class="form-control mr-sm-2 mb5" type="search" placeholder="Search" aria-label="Search">
        <button name= "submit" class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button> 

        

    </form>

    <br>

      <?php

        if(isset($_GET['submit'])) {
          $serchedName = $_GET['reponame'];

          $sql = "SELECT * FROM `repodata` WHERE `name` LIKE '$serchedName'";
          $result = $con->query($sql);

          if ($result-> num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id= $row["id"]; 
                $reponame = $row["name"];
                $des = $row["des"];
                $link = $row["link"];
            }
    
            echo "
    
            <table class='table'>
    
            <thead class='bg-dark text-light'>
              <tr>
                <th scope='col'>Sr. No</th>
                <th scope='col'>Repo Name</th>
                <th scope='col'>Description</th>
                <th scope='col'>Link</th>
              </tr>
            </thead>
    
            <tbody class='bg-light'>
              <tr>
                <th scope='row'>$id</th>
                <td>$reponame</td>
                <td>$des</td>
                <td> <a href='$link' target='_blank'> GitHub Link </a></td>
              </tr>
            </tbody>
    
          </table>
    
            ";
          }
    
          else {
            echo "0 results";
          }

        }

      


      ?>

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>

<?php

$con->close();

?>

<!-- SELECT * FROM `repodata` WHERE `name` LIKE 'sample name'  -->