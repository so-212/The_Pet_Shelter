<?php
session_start();// demarre ou restaurer une session
//test si une session est active ou non 



if(isset($_SESSION['connected']) && $_SESSION['connected']){

  $connected = true;

}else{

  $connected = false;

}
?>
<!DOCTYPE html >
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- police google font Pacifico -->
     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- jumbotron's stylesheet -->

    <link rel="stylesheet" href="css/landingPage.css">

    <title>Pet Shelter</title>
  </head>
  <!--   navbar   -->
  
  <body class="">

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5">

    <!-- Navbar brand -->
    <img src="img/favicon_petshelter.png" class="navbar-brand">

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>

      </ul>
      <!-- Links -->

     
    </div>
    <!-- Collapsible content -->

  </nav>
  <!--/.Navbar-->




<div class="container">
 
  <!-- jumbotron bootstrap -->
  <!-- affichage d un alert si formulaire d inscription passé -->
  <?php 

    if (isset($_GET['subscribed'])){

    // succes connexion
  ?>

      <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Félicitation!</strong> Vous êtes désormais inscrit à The Pet shelter.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

  
    <?php } ?>


    <?php if(isset($_GET['auth']) && $_GET['auth'] == 'true'){ ?>

      <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
            Ravi de vous revoir <strong> <?php if($connected){ echo $_SESSION['prenom'];} ?>  <?php if($connected){ echo $_SESSION['nom'];} ?> </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>



    <?php } ?>



    <?php 

    // echec de la connexion

    if (isset($_GET['auth']) && $_GET['auth'] == 'false'){ ?>


               <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>echec de la connexion</strong><p>mot de passe ou login incorrect</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
    



    <?php } ?>

    <div class="jumbotron mt-4 mx-10" >
      <h1 class="display-4" id="jumbotron">Pet Shelter</h1>

      <p class="lead">Bienvenue sur Pet Shelter !
        </p>
      <hr class="my-4">
      <p id="intro">La meilleure solution pour faire garder vos animaux
        avec un réseau de plus de 100 000 petsitters partout en France </p>
      <div class="display-inline"> 



      

          <a href="logout.php" type="button" class="btn btn-danger" style="display: <?php echo ($connected?'' : 'none'); ?>">Déconnexion</a>
      
     






        <a class="btn btn-primary btn-lg mx-3 " href="#" style="height: min-content; display: <?php echo ($connected? 'none' : ''); ?>" role="button" data-toggle="modal" data-target="#myModal-login">Connexion</a>

        <!-- formulaire de connexion -->

        <div class="modal fade" id="myModal-login" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">connectez-vous</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="post" autocomplete="off" action="login_action.php" class="subscription-form">



                      <!-- message d'erreur -->
                      
                      <ul id="form_error">
                      </ul>


                      <!-- login = adresse-mail -->

                      <div class="form-group">
                        <label class="login1" for="exampleInputEmail1">login</label>
                        <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>

                      <!-- mot de passe -->

                      <div class="form-group my-2">
                        <label class="login1" for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" name="pass" class="password form-control" class="form-control" id="exampleInputPassword1" >
                      </div>

                      <button type="submit"  id="connexion"  name="submit" class="btn btn-primary align-items-center mt-4 mb-4">connexion</button>

        <script>
          
            var formulaire = {

                  message: document.getElementById('form_error'), 
                  login: document.getElementById('exampleInputEmail1'),
                  mdp: document.getElementById('exampleInputPassword1'),
                  submit:  document.getElementById('connexion')

            }

            formulaire.submit.addEventListener('click', () => {

                // requete ajax
                let xhr = new XMLHttpRequest()  //objet responsable de la requete via ses methodes
                // lorsque la requete est retourné par le serveur
                var xhrData = `username=${formulaire.login.value}&password=${formulaire.mdp.value}`//litteraux de gabarit
                var url = "loginAjax.php?" + xhrData 

                // console.log(xhrData)

               xhr.open('get', url)

               xhr.send()




               xhr.onreadystatechange = function(){

                    if(xhr.status == 200 && xhr.readyState == 4){
                        console.log(xhr.responseText)
                        var formValidity = JSON.parse(xhr.responseText) 
                        // console.log(formValidity)

                    }

                    if(formValidity){

                        handleResponse(formValidity)

                    }


               }
            })



            function handleResponse(formValidity){

                if(formValidity.ok){

                  location.href = 'login_action.php'

                }else{

                  

                  for(let i = 0; i < formValidity.message.length ; i++){

                    let li = document.createElement('li')
                    li.textContent = formValidity.message[i]
                    li.className = "alert alert-danger"
                    formulaire.message.appendChild(li)
                    formulaire.message.style.display = 'block'

                  }

                }


            }

        </script>

                </form>

              </div>
             <div class="modal-footer">
                       
          </div>
         </div>
        </div>
      </div>   
                  


        <a href="#" id ="incription" style="height: min-content; display: <?php echo ($connected? 'none' : '') ?>"   class="btn btn-success btn-primary btn-lg" data-toggle="modal" data-target="#myModal">inscription</a>

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

                <form method="post"  action="subscription_action.php" id="formInscription" class="subscription-form">
                  <div class="row">
                  <!-- nom -->
                  <div class=" col form-group col-xs-3 textInscription">
                    <label for="nom">Nom</label>
                    <input type="text" name="name" required  class="form-control" id="nom">
                  </div>

                  <!-- prenom -->
                  <div class=" col form-group textInscription">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="firstname" class="form-control" id="prenom" required>
                  </div>

                  </div>

                  <div class="row">

                  <!-- telephone -->
                  <div class=" col form-group textInscription">
                    <label for="tel">Téléphone</label>
                    <input type="tel" name="tel" class="form-control" id="tel" required>
                  </div>

                  <!-- adresse mail -->
                  <div class=" col form-group textInscription">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagons votre adresse mail avec personne d'autre.</small>
                  </div>

                </div>

                  <!-- pseudo -->

                  <div class="row">
                  <div class=" col form-group textInscription">
                    <label for="exampleInputPassword1">Nom d'utilisateur</label>
                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" maxlength="20" required>
                  </div>

                  <!-- région -->
                  <div class=" col form-group textInscription">
                      <label for="exampleFormControlSelect1">Région</label>
                      <select name="region" class="form-control" id="exampleFormControlSelect1" required>
                        <!-- gestion dynamique de la liste déroulante via la table REGIONS ac un foreach -->
                         <option value="" selected disabled hidden>-- sélectionner une région --</option>
                        <?php 
                        include_once 'common/db_connect_inc.php';

                        $sql = 'SELECT nom_region, id FROM REGIONS';
                        $data = $db->query($sql);
                        $row = $data->fetchAll();

                        $html = '';

                        foreach ($row as $col) {
                          $html .=   '<option value="'.$col['id'].'">'.$col['nom_region'].'</option>';
                        }
                        echo $html

                       ?>


                      </select>
                    </div>

                  </div>


                  <!-- statut -->
                     <label class="textInscription">
                      Etes-vous un : 
                    </label>

                    <div class="row" id="status_form">

                        <div class="form-check col">
                          <input class="form-check-input" type="radio" name="status" value="01" id="exampleRadios1" value="01" >
                          <label class="form-check-label textInscription ml-4" for="exampleRadios1">
                            Propriétaire
                          </label>
                        </div>
                        <div class="form-check col">
                          <input class="form-check-input" type="radio" name="status" value="02" id="exampleRadios2" value="02">
                          <label class="form-check-label textInscription ml-4" for="exampleRadios2">
                           Petsitter
                          </label>
                        </div>

                    </div>

                  <!-- mot de passe -->
                  <div class="form-group my-2">
                    <label class="textInscription" for="exampleInputPassword1">Mot de passe</label>
                    <input autocomplete="off" type="password" name="pass" class="password form-control" class="form-control" id="exampleInputPassword1" required>
                  </div>

                  <div class="form-group">
                    <label class="textInscription" for="exampleInputPassword1">Confirmez le mot de passe</label>
                    <input type="password"   class="password form-control" name="passRepeat" class="form-control" id="exampleInputPassword1" required>
                  </div>
                 
                  <button type="submit" name="submit" id="submit-incription" class="btn btn-primary align-items-center login1">Inscription</button>
                </form>

              </div>
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>


    </div>


      <!--   formulaire de recherche par nom de l'animal  -->

      <?php if($connected){?>

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
     

      <?php  }  ?>
           
    </div> 

<!-- list group-->

    <div class="btn-group mb-3 list" role="group" aria-label="Basic example">
      <button type="button" style="display: <?php echo ($connected? '': 'none') ?>" class="btn btn-secondary list"><a href="liste_animaux.php" class="list-link"> liste des animaux</a></button>
      <button type="button" style="display: <?php echo ($connected? '': 'none') ?>" class="btn btn-secondary list"><a href="add_animal.php" class="list-link" data-toggle="modal" data-target="#myModal2"> ajouter un animal </a></button>

<!-- modal ajout animal -->

        <div class="modal" tabindex="-1" id="myModal2" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">ajout animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="post" action="add_animal.php" class="subscription-form" enctype="multipart/form-data">
                  
                  <!-- nom -->
                  <div class="form-group col-xs-3">
                    <label for="nom">Nom</label>
                    <input type="text" name="name"  class="form-control" id="nom">
                  </div>

                  <!-- espece -->
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Espèces</label>
                      <select name="espece" class="form-control" id="exampleFormControlSelect1" required>
                        <!-- gestion dynamique de la liste déroulante via la table REGIONS ac un foreach -->
                        <?php 
                        include_once 'common/db_connect_inc.php';

                        $sql = 'SELECT nom_espece, id FROM ESPECES';
                        $data = $db->query($sql);
                        $row = $data->fetchAll();

                        $html = '';

                        foreach ($row as $col) {
                          $html .=   '<option value="'.$col['id'].'">'.$col['nom_espece'].'</option>';
                        }
                        echo $html

                       ?>


                      </select>
                    </div>

                  <!-- propriétaire -->
                 <!--  <div class="form-group">//enlever proprietaire car on l'identifie ac £_SESSION, l'input est donc inutil
                    <label for="propriétaire">proprietaire</label>
                    <input type="text" name="proprietaire" class="form-control" id="proprietaire" required>
                  </div>
 -->
                  <!-- photo de l animal -->

                  <div class="form-group">

                         <label for="photo">photo  :</label>
                         <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                         <!-- correspond à un Mo -->
                         <!-- rajouter un input cacher securisant la taille du fichier a inserer, c'est une securité pr pas faire sauter le serveur -->
                         <!-- attention c l'input hidden qui va remonter ds le post il faut le corriger -->
                         <input type="file" class="form-control input-lg" name="photo" id="photo">
                         

                  </div>

                  <!-- statut a adopter ou non -->
                     <label>
                      motif: 
                    </label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="statut" value="garde" id="exampleRadios1" value="01" >
                    <label class="form-check-label" for="exampleRadios1">
                      garde
                    </label>
                  </div>
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="radio" name="statut" value="adoption" id="exampleRadios2" value="02">
                    <label class="form-check-label" for="exampleRadios2">
                     adoption
                    </label>
                  </div>
                 
                  <button type="submit" name="submit" class="btn btn-primary align-items-center">Inscription</button>
                </form>


              </div>
              
            </div>
          </div>
        </div>





      <button type="button" style="display: <?php echo ($connected? '': 'none') ?>" class="btn btn-secondary list"><a href="ajout_suppr_modif_animaux.php" class="list-link">modifier un animal</a></button>

      <button type="button" class="btn btn-secondary list"><a href="#" class="list-link"> Produits animaliers </a></button>

      <button type="button" class="btn btn-secondary list"><a href="wordpress" class="list-link"> adoptez-nous</a></button>



    </div>




    <div class="container-fluid container-badges mb-4">
      
      <?php if ($connected) {

        include 'badges_especes.php';

      }   ?>


    </div>




<!--affichage d'une card si le nom rentré correspond à une entrée en base-->

    <div class="container-flui container-card">

      <?php include 'recherche_par_nom_action.php' ?>
     
    </div>

    <!-- caroussel -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/ouvrir-une-animalerie.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/adoption1bis.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/adoption2.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>



    <script type="text/javascript" src="test.js">  </script>
    <script> var a = 2</script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  </div>

  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark mt-5">

    <div style="background-color: #6351ce;">
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0">Get connected with us on social networks!</h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Company name</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
            consectetur
            adipisicing elit.</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Products</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">MDBootstrap</a>
          </p>
          <p>
            <a href="#!">MDWordPress</a>
          </p>
          <p>
            <a href="#!">BrandFlow</a>
          </p>
          <p>
            <a href="#!">Bootstrap Angular</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Useful links</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Your Account</a>
          </p>
          <p>
            <a href="#!">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!">Shipping Rates</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> info@example.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
          <p>
            <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->



  </body>
</html>