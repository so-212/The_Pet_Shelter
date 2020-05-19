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
  <body class="container" data-spy="scroll" data-target="#myScrollspy" data-offset="20">


  <!-- jumbotron bootstrap -->

    <div class="jumbotron mt-5 mx-10">
      <h1 class="display-4">Pet Shelter</h1>
      <p class="lead">Bienvenue sur Pet Shelter !
        </p>
      <hr class="my-4">
      <p id="intro">La meilleure solution pour faire garder vos animaux
        avec un réseau de plus de 100 000 petsitters partout en France </p>
      <div class="display-inline">  
        <a class="btn btn-primary btn-lg mx-3 " href="#" style="height: min-content;" role="button">Connexion</a>
        <a href="#" id ="incription" style="height: min-content;"   class="btn btn-success btn-primary btn-lg" data-toggle="modal" data-target="#myModal">inscription</a>

        <!-- formulaire d inscription en modal bootstrap  -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Inscrivez-vous</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="post" action="subscription_action.php" class="subscription-form">
                  
                  <!-- nom -->
                  <div class="form-group col-xs-3">
                    <label for="nom">Nom</label>
                    <input type="text" name="name"  class="form-control" id="nom">
                  </div>

                  <!-- prenom -->
                  <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="firstname" class="form-control" id="prenom" required>
                  </div>

                  <!-- telephone -->
                  <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="password" name="tel" class="form-control" id="tel" required>
                  </div>

                  <!-- adresse mail -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagons votre adresse mail avec personne d'autre.</small>
                  </div>

                  <!-- pseudo -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nom d'utilisateur</label>
                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" required>
                  </div>

                  <!-- région -->
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Région</label>
                      <select name="region" class="form-control" id="exampleFormControlSelect1" required>
                        <!-- gestion dynamique de la liste déroulante via la table REGIONS ac un foreach -->
                        <?php 
                        include_once 'db_connect_inc.php';

                        $sql = 'SELECT nom_region FROM REGIONS';
                        $data = $db->query($sql);
                        $row = $data->fetchAll();

                        $html = '';

                        foreach ($row as $col) {
                          $html .=   '<option>'.$col['nom_region'].'</option>';
                        }
                        echo $html

                       ?>


                      </select>
                    </div>


                  <!-- statut -->
                     <label>
                      Etes-vous un : 
                    </label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="proprietaire" id="exampleRadios1" value="option1"  required>
                    <label class="form-check-label" for="exampleRadios1">
                      Propriétaire
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="statut" value="petsitter" id="exampleRadios2" value="option2" required>
                    <label class="form-check-label" for="exampleRadios2">
                     Petsitter
                    </label>
                  </div>

                  <!-- mot de passe -->
                  <div class="form-group my-2">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" name="pass" class="password" class="form-control" id="exampleInputPassword1" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirmez le mot de passe</label>
                    <input type="password" class="password" name="passRepeat" class="form-control" id="exampleInputPassword1" required>
                  </div>
                 
                  <button type="submit" name="submit" class="btn btn-primary align-items-center">Inscription</button>
                </form>

              </div>
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>


    </div>


      <!--   formulaire de recherche par nom de l'animal  -->

        <form method="post" >
         

          <div class="form-group mt-4 search-form">

            <label for="exampleInputEmail1">Recherche animal par nom :</label>
            <input type="text" name="name" class="form-control input-sm input-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required="true">
          <button type="submit" class="btn btn-primary my-2" style="height: min-content;">Rechercher</button>


<!--affichage d'un message d'alerte si le nom de l'animal n'existe pas en base-->

          <?php

              include 'si_nom_existe_pas.php';

          ?>


      
          </div>

        </form>
     

           
    </div> 

    <div class="container-fluid container-badges mb-4">
      
      <?php  include 'badges_especes.php' ?>


    </div>

<!--affichage d'une card si le nom rentré correspond à une entrée en base-->

    <div class="container-flui container-card">

      <?php include 'recherche_par_nom_action.php' ?>
     
    </div>


    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
   


  </body>
</html>