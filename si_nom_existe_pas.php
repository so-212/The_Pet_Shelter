<?php

              include_once 'db_connect_inc.php';


              if(isset($_POST['name']) && !empty($_POST['name'])){

                $pet_name = htmlspecialchars($_POST['name']);

                try{
                  $sql = 'SELECT 
                          a.id_ani AS "identifiant",
                          a.nom_animal AS "nom",
                          e.nom_espece AS "espece",
                          p.nom AS "propriétaire",
                          a.photo
                       FROM
                          (animal AS a
                         INNER JOIN espece AS e USING(id_esp))
                         INNER JOIN proprietaire AS p USING(id_prop)
                       WHERE
                        a.nom_animal = ?' ;

                  $param = array($pet_name);

                  $data = $db->prepare($sql);
                  $query = $data->execute($param);
                  $req = $data->fetchAll();




              if(!$req){


                        $html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 Aucun animal ne porte ce nom 
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>';

                        echo $html;
                 }


              }catch(PDOException $err){

                    header('location:LandingPage.php');

                  }

          }





            ?>