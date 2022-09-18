<?php include("scraper.php")?>

<?php

// print_r($beaches);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hawaii Beach Scraper</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <h1>What's The Forecast?</h1>
    
        <form method="get">
        <div class="mb-3">
            <label for="beach" class="form-label">Enter a Beach</label>
            <datalist id="beaches">
                <?php 
                    foreach ($forecastData as $beach) {
                      $beaches = [];
                      array_push($beaches,  $beach['beach'] );
                    
                      foreach ($beaches as $beach) {
                        echo "<option> ${beach} </option>";
                      }
                    }
                ?>  
            </datalist>
            <input type="text" list="beaches" class="form-control" id="beach" name="beach" placeholder="E.g. Nanakuli Beach, Waikiki Beach" value="<?=$_GET['beach']?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="forecast"><?php
          if ($forecast) {

            echo '<div class="alert alert-success" role="alert">'.
            $forecast['beach'].
            "<br>".
            $forecast['shore'].
            "<br>".
            $forecast['surf'].
            "<br>".
            "temperature ".$forecast['temp'].
            '</div>';

          } else {

            echo '<div class="alert alert-danger" role="alert">'."Couldn't Find Beach, Try Again!"
            .'</div>';

          }

          ?>

        </div>
   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>