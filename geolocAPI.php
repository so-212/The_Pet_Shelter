<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <style>
           #myMap, #myRoute {
               height: 30em;
               background-color: pink;
               margin: 2em O;
           }
       </style>
    


    <title>Hello, world!</title>
  </head>
  <body class="container">
    <h1>geolocalisation : itinéraire</h1>

    <div class="form-group">
      <label for="start">départ</label>
      <input type="text" class="form-control" id="start" placeholder="laisser vide pour position actuelle">
    </div>


    <div class="form-group">
      <label for="end">arrivée</label>
      <input type="text" class="form-control" id="end" value="55 rue du faubourg saint-honoré 75001">
    </div>


  <div class="form-group">
    <input type="button" value="calculer l'itinéraire" class="btn btn-primary" id="calc">
  </div>



  <div id="myMap" class="mb-4"></div>
     
  <div id="myRoute" class="mb-4"></div>











<!-- //api google map
 -->    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB_WdX1bf0msgKWjbPgSTT9gfMTrVshMvY"></script>


<!-- récupération geolocalisation
 -->    <script src="js/geolocAPI.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>