<?php 

try {
			define('HOST', 'localhost');
			define('BASE', 'ANIDOM');
			define('USER', 'two_one_two');
			define('PASS', '12');


			$dsn = 'mysql:host='.HOST.';dbname='.BASE.';charset=utf8';
			$opt= array(

				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//permet de lever les erreurs
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC//renvoie erreur sous forme de tableau associatif

			);

			$db = new PDO($dsn, USER, PASS, $opt);
			
			} 



		catch (PDOException $err) {

			echo '<div class="alert alert-danger">'.$err->getMessage().'</div>';

		}





