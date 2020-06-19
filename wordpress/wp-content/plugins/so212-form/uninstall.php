<?php 

/**
 *fichier appelé à la désinstallation du plugin 
 *
 * @package test212Plugin
 */

//security check pr s'assurer que seul WP peut désinsatller

if (!defined('WP_UNINSTALL_PLUGIN')) {

	die; //si non defini, c que qqun autre que WP essaie d'acceder à ce fichier et de le déclencher

}

//ce fichier permet essentiellement d'effacer les données rentrées en base par le plugin.
/// a la desinstalation du plugin il est préferable d'effacer les données rentrées en base
// pr ne pas surcharger la base ou stocker de données inutilisées

//2 methodes possibles: requete sql apres apple au $wpdb ou methode prdefini WP

$books = get_posts(	array('post_type' => 'book' , 'numberposts' => -1 )	)

//get_posts = fction WP permettant de recuperer tous les types de post depuis la base wordpress
//numberpost -1 = tous les posts relatif à book ici

foreach ($books as $book) {
	wp_delete_post( $book->ID, true); //wpdelete accepte 2 arguments l'id du post et 
	//s'il doit l'effacer ou le laisser ds la corbeil, true = effacer

}

//2meme methode ac sql et appel ac wpdb plus directe qu'un foreach mais aussi plus dangereuse

//acces a la bdd
// global $wpdb;

// $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
// //si nos post contienne des metadonnées
// $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
// $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
