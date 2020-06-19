<?php 
/**
 * @package test212Plugin
 */

 class so212FormDeactivate
 {
 	
 	public static function deactivate(){

 		flush_rewrite_rules();
 		
 	}
 }