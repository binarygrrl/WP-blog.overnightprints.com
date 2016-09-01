<?php

/*

Plugin Name: File Commander
Description: File Commander enables you to manage all files on your webserver.
Plugin URI: http://dennishoppe.de/wordpress-plugins/file-commander 
Version: 1.0.3
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de

*/


// Please think about a donation
If (Is_File(DirName(__FILE__).'/donate.php')) Include DirName(__FILE__).'/donate.php';
    

If (!Class_Exists('wp_plugin_file_commander')){
Class wp_plugin_file_commander {
  var $base_url;
  var $text_domain;
  var $arr_options;
  var $interface_url;
  
  Function wp_plugin_file_commander(){
    // PHP4 Constructor, show PHP4 Warning message to user
    Add_Action('admin_notices', Create_Function('','
      Echo "<div class=\"error\"><p><b>Error: File Commander requires PHP5. Your WordPress runs with PHP4.</b></p></div>";
    '));
  }
  
  Function __construct(){
    // Read base
    $this->base_url = $this->get_base_url();
    
    // Get ready to translate
    $this->Load_TextDomain();
    
    // Set Hooks
    Add_Action ('admin_init', Array($this, 'handle_user_request'));
    Add_Action ('admin_menu', Array($this, 'add_options_page'));
    Add_Action ('admin_menu', Array($this, 'add_file_commander_interface'));
    
    // Load options
    $this->Load_Options();
  }

  Function Load_TextDomain(){
    $locale = Apply_Filters( 'plugin_locale', get_locale(), __CLASS__ );
    load_textdomain (__CLASS__, DirName(__FILE__).'/language/' . $locale . '.mo');
  }
  
  Function t ($text, $context = ''){
    // Translates the string $text with context $context
    If ($context == '')
      return __($text, __CLASS__);
    Else
      return _x($text, $context, __CLASS__);
  }
  
  Function get_base_url(){ return get_bloginfo('wpurl').'/'.Str_Replace("\\", '/', SubStr(RealPath(DirName(__FILE__)), Strlen(ABSPATH))); }
  
  Function option_key(){ return __CLASS__; }

  Function add_options_page(){
    $handle = Add_Options_Page(
      $this->t('File Commander Options'),
      $this->t('File Commander'),
      10,
      __CLASS__ . '_options',
      Array($this, 'print_options_page_body')
    );

    Add_Action ('admin_head-' . $handle, Array($this, 'print_options_page_head'));
  }

  Function print_options_page_head(){
    ?>   
    <script type="text/javascript" src="<?php echo $this->base_url?>/options_page.js"></script>
    <?php
  }
  
  Function print_options_page_body(){
    ?><div class="wrap">
      <?php screen_icon(); ?>
      <h2><?php Echo $this->t('File Commander Options') ?></h2>
      
      <form method="post" action="">
        
        <?php If ( $this->Save_Options() ) : ?>
          <div id="message" class="updated fade"><p><strong><?php _e('Settings saved.') ?></strong></p></div>
        <?php EndIf; ?>
        
        <?php Include DirName(__FILE__).'/options_page.php' ?>
        
        <div style="max-width:600px">
          <?php do_action('donation_message') ?>
        </div>
        
        <p class="submit">
          <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
      </form>

    </div><?php
  }
  
  Function default_options(){
    return Array(
      'min_user_level' => 8
    );
  }

  Function Save_Options(){
    If (Empty($_POST)) return False;
    
    $new_options = Array();
    
    // Read options
    ForEach (StripSlashes_Deep((ARRAY) $_POST) AS $option => $value )
      If ($value != '') $new_options[$option] = $value;
    
    // Save options
    Update_Option ($this->option_key(), $new_options);
    
    // Overwrite options array
    $this->Load_Options();
    
    // Everything is ok =)
    return True;
  }

  Function get_option ($key = Null, $default = False){
    If ( IsSet($this->arr_options[$key]) && $this->arr_options[$key] != '' )
      // the setting were saved and there is a value
      return $this->arr_options[$key];
    Else
      return $default;

  }
  
  Function Load_Options(){
    $this->arr_options = Array_Merge (
      $this->default_options(),
      (Array) get_option($this->option_key(), True)
    );
  }
  
  Function handle_user_request(){
    // Create folder
    If (IsSet($_POST['action']) && $_POST['action'] == 'create_folder' && $this->get_option('user_can_create_folder')){
      $directory = RealPath($_POST['directory']);
      $new_folder = $directory . '/' . $_POST['new_folder'];

      If (@MkDir($new_folder))
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('The new folder was created successfully.')
        ), False));

      Else
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('Could not create the new folder.')
        ), False));
    }

    // Rename folder
    ElseIf (IsSet($_POST['action']) && $_POST['action'] == 'rename_folder' && $this->get_option('user_can_rename_folder')){
      $directory = RealPath($_POST['directory']);
      $src = RealPath($_POST['directory'] . '/' . $_POST['old_name']);
      $dst = $directory . '/' . BaseName($_POST['new_name']);

      If (@Rename($src, $dst))
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('The folder was renamed successfully.')
        ), False));
      Else
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('Could not rename the folder.')
        ), False));
    }

    // Delete folder
    ElseIf ( IsSet($_GET['delete_folder']) && $_GET['delete_folder'] != '' && $this->get_option('user_can_delete_folder') ){
      $dst = RealPath($_GET['delete_folder']);
      $parent = RealPath($dst . '/..');

      If (@$this->delete_r($dst))
        wp_redirect($this->interface_url(Array(
          'browse' => $parent,
          'message' => SPrintF( $this->t('The folder "%s" was deleted successfully.'), BaseName($dst) )
        ), False));
      Else
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => SPrintF( $this->t('Could not delete the folder "%s".'), BaseName($dst) )
        ), False));
    }

    // Upload file
    ElseIf (IsSet($_POST['action']) && $_POST['action'] == 'upload_file' && $this->get_option('user_can_upload_file') ){
      $error = False;
      $directory = RealPath($_POST['directory']);
      ForEach ($_FILES['file_upload']['name'] AS $index => $name){
        $path = $_FILES['file_upload']['tmp_name'][$index];
        If (!Is_File($path)) Continue;
        $dst = $directory . '/' . $name;
        If (!@Copy($path, $dst)) $error = True;
      }
      
      If ($error)
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('Could not copy all files successfully.')
        ), False));
      Else
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('All files uploaded.')
        ), False));
    }

    // Download file
    ElseIf ( IsSet($_GET['download_file']) && $_GET['download_file'] != '' && $this->get_option('user_can_download_file') ){
      If (!$file = RealPath ($_GET['download_file'])) Die('This is no file.');
      Header('Content-Length: ' . FileSize($file));
      Header('Content-Type: application/octet-stream');
      Header('Content-Disposition: attachment; filename="' . BaseName($file) . '"');
      Header('Content-Transfer-Encoding: binary');      
      ReadFile ($file);
      Exit;
    }
        
    // Rename file
    ElseIf (IsSet($_POST['action']) && $_POST['action'] == 'rename_file' && $this->get_option('user_can_rename_file') ){
      $directory = RealPath($_POST['directory']);
      $src = RealPath($_POST['directory'] . '/' . $_POST['old_name']);
      $dst = $directory . '/' . BaseName($_POST['new_name']);

      If (@Rename($src, $dst))
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('The file was renamed successfully.')
        ), False));
      Else
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => $this->t('Could not rename the file.')
        ), False));
    }

    // Delete file
    ElseIf ( IsSet($_GET['delete_file']) && $_GET['delete_file'] != '' && $this->get_option('user_can_delete_file') ){
      $dst = RealPath($_GET['delete_file']);
      $parent = DirName($dst);

      If (@Unlink($dst))
        wp_redirect($this->interface_url(Array(
          'browse' => $parent,
          'message' => SPrintF( $this->t('The file "%s" was deleted successfully.'), BaseName($dst) )
        ), False));
      Else
        wp_redirect($this->interface_url(Array(
          'browse' => $directory,
          'message' => SPrintF( $this->t('Could not delete the file "%s".'), BaseName($dst) )
        ), False));
    }

  }
  
  Function add_file_commander_interface(){
    $handle = Add_Management_Page (
      $this->t('File Commander'),
      $this->t('File Commander'),
      IntVal($this->get_option('min_user_level', 8)),
      __CLASS__ . '_interface',
      Array($this, 'print_file_commander_interface')
    );
    $this->interface_url = Admin_URL( 'tools.php?page=' . __CLASS__ . '_interface' );
    Add_Action ('admin_head-' . $handle, Array($this, 'print_file_commander_interface_head'));
  }

  Function print_file_commander_interface_head(){
    ?>
    <script type="text/javascript" src="<?php echo $this->base_url ?>/interface.js"></script>
    <link rel="stylesheet" href="<?php echo $this->base_url ?>/interface.css" type="text/css" media="all" />
    <?php
  }  
  
  Function print_file_commander_interface(){
    ?><div class="wrap">
      <?php screen_icon('edit-pages'); ?>
      <h2><?php Echo $this->t('File Commander') ?></h2>
      <?php Include DirName(__FILE__) . '/interface.php'; ?>
      <div style="max-width:600px"><?php do_action('donation_message') ?></div>
    </div><?php        
  }
  
  Function interface_url($parameter = Array(), $htmlspecialchars = True){
    $url = $this->interface_url;
    ForEach ($parameter AS $name => $value)
      $url .= '&' . RawUrlEncode($name) . '=' . RawURLEncode($value);
    If ($htmlspecialchars) $url = HTMLSpecialChars($url);
    return $url;
  }
  
  Function get_http_link($path){
    $path = RealPath ($path);
    $root_dir = RealPath($_SERVER['DOCUMENT_ROOT']);
    $root_url = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
    
    If ( SubStr($path, 0, StrLen($root_dir)) == $root_dir )
      return $root_url . Str_Replace("\\", '/', SubStr($path, StrLen($root_dir)));
    Else
      return False;
  }
  
  Function delete_r ($path){
    If (Is_Dir($path)){
      ForEach ((Array) Glob($path . '/*') AS $f){
        If (Is_Dir($f) && !$this->delete_r($f)) return False;
        If (Is_File($f) && !Unlink($f)) return False;
      }
      If (!RmDir($path)) return False;
    }
    Else {
      If (!Unlink ($path))
        return False;
    }
    
    return True;
  }
  
  Function format_bytes($bytes) {
     If ($bytes < 1024)
       Return $bytes.' B';
     ElseIf ($bytes < 1048576)
       Return round($bytes / 1024, 2).' KB';
     ElseIf ($bytes < 1073741824)
       Return round($bytes / 1048576, 2).' MB';
     ElseIf ($bytes < 1099511627776)
       Return round($bytes / 1073741824, 2).' GB';
     ElseIf ($bytes < 1125899906842624)
       Return round($bytes / 1099511627776, 2).' TB';
     Else
       Return round($bytes / 1125899906842624, 2).' PB';
  }

} /* End of the Class */
New wp_plugin_file_commander();
} /* End of the If-Class-Exists-Condition */
/* End of File */