<?php

              include_once 'db_connect_inc.php';


              if(isset($_POST['name']) && !empty($_POST['name'])){

                $pet_name = htmlspecialchars($_POST['name']);

                try{
                  $sql = 'SELECT 
                            a.id AS "identifiant",
                            a.nom_animal AS "nom",
                            e.nom_espece AS "espece",
                            u.nom AS "propriétaire",
                            a.photo
                          FROM
                            (ANIMAUX AS a
                          INNER JOIN ESPECES AS e ON a.esp_id = e.id)
                          INNER JOIN UTILISATEURS AS u ON a.prop_id = u.id
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

                  $err->getMessage();

                  }

          }





            ?>