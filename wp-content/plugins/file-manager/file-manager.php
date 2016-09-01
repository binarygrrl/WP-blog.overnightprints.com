<?php
/**
 * 
 * Plugin Name: File Manager
 * Author: Aftabul Islam
 * Author URI: www.giribaz.website
 * Version: 3.1.0
 * Author Email: toaihimel@gmail.com
 * License: GPLv2
 * Description: Manage your file the way you like. You can upload, delete, copy, move, rename, compress, extract files. You don't need to worry about ftp. It is realy simple and easy to use.
 *
 * */

// Including elFinder class
require_once('elFinder/elFinder.php');

// Including bootstarter
require_once('BootStart/__init__.php');

class FM extends FM_BootStart {

	public function __construct($name){

		// Adding Menu
		$this->menu_data = array(
			'type' => 'menu',
		);
		
		// Adding Ajax
		$this->add_ajax('connector'); // elFinder ajax call
		$this->add_ajax('valid_directory'); // Checks if the directory is valid or not

		parent::__construct($name);
		
		// Adding plugins page links
		add_filter('plugin_action_links', array(&$this, 'plugin_page_links'), 10, 2);
		
	}
	
	/**
	 * 
	 * File manager connector function
	 * 
	 * */
	public function connector(){
		
		if( !defined('FILE_MANAGER_PREMIUM') && !defined('FILE_MANAGER_BACKEND') ){
			$file_operations = array( 'mkdir', 'mkfile', 'rename', 'duplicate', 'paste', 'ban', 'archive', 'extract', 'copy', 'cut', 'edit' );
			$mime_allowed = array('text/plain');
			$mime_denied = array('image');
		} else {
		
			$file_operations = array();
			$mime_allowed = array('text/plain', 'image');
			$mime_denied = array();
			
		}
		
		$opts = array(
			'debug' => true,
			'roots' => array(
				array(
					'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
					'path'          => ABSPATH,                     // path to files (REQUIRED)
					'URL'           => site_url(),                  // URL to files (REQUIRED)
					'uploadDeny'    => $mime_denied,                // All Mimetypes not allowed to upload
					'uploadAllow'   => $mime_allowed,               // Mimetype `image` and `text/plain` allowed to upload
					'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
					'accessControl' => 'access',
					'disabled'      => $file_operations             // disable and hide dot starting files (OPTIONAL)
				)
			)
		);
		
		$elFinder = new FM_EL_Finder();
		$elFinder = $elFinder->connect($opts);
		$elFinder->run();
				
		die();
	}
	
	/**
	 * 
	 * Adds plugin page links,
	 * 
	 * */
	public function plugin_page_links($links, $file){
		
		static $this_plugin;
		
		if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
		 
		if ($file == $this_plugin){
			array_unshift( $links, '<a target=\'blank\' href="http://www.giribaz.com/support/">'.__("Support", "file-manager").'</a>');
			
			array_unshift( $links, '<a href="admin.php?page=file-manager_settings">'.__("File Manager", "file-manager").'</a>');
				
			if( !defined('FILE_MANAGER_PREMIUM') && !defined('FILE_MANAGER_BACKEND') )
				array_unshift( $links, '<a target=\'blank\' class="file-manager-admin-panel-pro" href="http://www.giribaz.com/wordpress-file-manager-plugin/" style="color: white; font-weight: bold; background-color: red; padding-right: 5px; padding-left: 5px; border-radius: 40%;">'.__("Pro", "file-manager").'</a>');
		
		}
		
		return $links;
	}

}

global $FileManager;
$FileManager = new FM('File Manager');
