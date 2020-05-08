<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- police google font Pacifico -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- jumbotron's stylesheet -->

    <link rel="stylesheet" href="css/landingPage.css">

    <title>Pet Shelter</title>
  </head>
  <body class="container">


  <!-- jumbotron bootstrap -->

    <div class="jumbotron mt-5 mx-10">
      <h1 class="display-4">Pet Shelter</h1>
      <p class="lead">Bienvenue sur Pet Shelter !
        </p>
      <hr class="my-4">
      <p id="intro">La meilleure solution pour faire garder vos animaux
        avec un réseau de plus de 100 000 petsitters partout en France </p>
      <div class="display-inline">  
        <a class="btn btn-primary btn-lg mx-3 btn-jumb" href="#" role="button">Connexion</a>
        <a href="#" class="btn btn-success btn-primary btn-lg btn-jumb ">inscription</a>

<!-- probleme de modal ici et resolu sur stackoverflow: le modal doit etre décleché manuellement https://stackoverflow.com/questions/34284820/triggering-bootstrap-modal-on-form-submit-and-not-on-click  -->

        <form method="post" action="LandingPage.php" >
         

          <div class="form-group mt-5">

            <label for="exampleInputEmail1">Recherche animal par nom :</label>
            <input type="text" name="name" class="form-control input-sm input-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required="true">
      
          </div>
          <button type="submit" class="btn btn-primary">Rechercher</button>

        </form>


    </div>

     


    </div> 



    <div class="container">
      
       

    </div>










    


    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
   


  </body>
</html>