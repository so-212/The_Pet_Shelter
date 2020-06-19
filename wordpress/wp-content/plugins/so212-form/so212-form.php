<?php 
/**
 * @package test212Plugin
 */
/**
 * Plugin Name:       so212-form plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       mon 1er plugin 
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hommani Soufiane
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       test212-plugin
 * Domain Path:       /languages
 */

/*
This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>
*/

defined('ABSPATH') or die("Hors de mon site !"); //securisation de mon plugin

class maClassTest212
{
	// variables parametres de mon post type
	private $type = 'event';
	private $slug = 'events';
	private $name  = 'l\'avis des pros';
	private $singular_name = 'Commentaire';

	public function  __construct(){ 

		add_action('init', array($this, 'custom_post_type')); 


		//on ne passe pas la fction en 2eme parametre mais un tablo = dans cette classe ($this) cherche moi la methode cutsom...
	}
	//ajout des styles et script 
	function register(){

		add_action('wp_enqueue_scripts', array($this, 'enqueue'));

		//'admin_enqueueue_scripts' pour la partie back end
	}
	//gestion de la désinstallation ds fichier uninstall.php
	public function custom_post_type(){

		 $labels = array(
            'name'                  => $this->name,
            'singular_name'         => $this->singular_name,
            'add_new'               => 'Ajouter un commentaire',
            'add_new_item'          => 'Mon nouveau '   . $this->singular_name,
            'edit_item'             => 'Edit '      . $this->singular_name,
            'new_item'              => 'New '       . $this->singular_name,
            'all_items'             => 'commentaires liés à '       . $this->name,
            'view_item'             => 'View '      . $this->name,
            'search_items'          => 'Rechercher un '    . $this->singular_name,
            'not_found'             => 'Aucun '        . strtolower($this->name) . ' trouvé',
            'not_found_in_trash'    => 'Aucun '        . strtolower($this->name) . ' trouvé dans la corbeille',
            'parent_item_colon'     => '',
            'menu_name'             => $this->name
        );


		 $args = array(
		           'labels'                => $labels, //permet d'afficher tous les labels sur notre écran
		           'public'                => true, //acces public
		           'publicly_queryable'    => true,
		           'show_ui'               => true,
		           'show_in_menu'          => true,
		           'query_var'             => true,
		           'rewrite'               => array( 'slug' => $this->slug ),
		           'capability_type'       => 'post',
		           'has_archive'           => true,
		           'hierarchical'          => true,
		           'menu_position'         => 8,
		           'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
		           'yarpp_support'         => true,
		           'taxonomy' => array('category', 'post_tag'),
		           
		       );
		register_post_type('book', $args);
	}
//ajouter du style à mon plugin
	public function enqueue(){

		wp_enqueue_style('mypluginstyle', plugins_url('assets/style212.css', __FILE__));

		wp_enqueue_style('mypluginstyle', plugins_url('assets/script212.js', __FILE__));
	} 
//appel au fichiers d'activation et desactivation
	function activate(){

		require_once plugin_dir_path( __FILE__ ) . 'inc/so212-form_activate.php';
		so212FormActivate::activate();

	}
	function deactivate(){

		require_once plugin_dir_path(__FILE__) . 'inc/so212-form_deactivate.php';
		so212FormDeactivate::deactivate();

	}
}

if (class_exists('maClassTest212')) { //si ma classe existe creons une instance

	$objetTest212 = new maClassTest212();
	// $objetTest212->register();

}
//activation du plugin 
register_activation_hook(__FILE__, array($objetTest212 , 'activate'));

//desactivation du plugin 
register_deactivation_hook(__FILE__, array($objetTest212 , 'deactivate'));

//desinstallation du plugin  gérer ds uninstall.php


//https://codex.wordpress.org/Function_Reference/register_post_type