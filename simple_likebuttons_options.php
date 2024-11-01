<?php

/*
Copyright 2011 Maik Balleyer (Biloba IT)  (email : balleyer@biloba-it.de)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Method to add the menu to the adminpanel
function simple_likebuttons_menu() {
	add_options_page('Simple Likebuttons', 'Simple Likebuttons', 'manage_options', 'simple-likebuttons', 'simple_likebuttons_options');
	add_action('admin_init', 'register_simple_likebuttons_settings');
}

//Method to set all options for this plugin
function simple_likebuttons_options() {

  if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

  ?>
  <div class="wrap">
    <?php screen_icon(); ?>
    <h2> <?php echo esc_html('Simple Likebuttons') ?></h2>
    <form method="POST" action="options.php">

      <?php settings_fields('simple-likebuttons-options'); ?>
      <?php do_settings_sections('simple-likebuttons'); ?>

      <p class="submit">
        <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>">
      </p>

    </form>
  </div>
 <?php

}

//Register all options fields
function register_simple_likebuttons_settings() {
  register_setting('simple-likebuttons-options', 'simple-likebuttons-options', 'simple_likebuttons_validate');
  add_settings_section('section_main', '', 'section_main', 'simple-likebuttons');
  add_settings_field('gp_status', 'Show Google+ button', 'gp_status', 'simple-likebuttons', 'section_main');
  add_settings_field('tw_status', 'Show Tweet button', 'tw_status', 'simple-likebuttons', 'section_main');
  add_settings_field('fb_status', 'Show facebook button', 'fb_status', 'simple-likebuttons', 'section_main');
  add_settings_field('li_status', 'Show LinkedIn button', 'li_status', 'simple-likebuttons', 'section_main');
  add_settings_field('xi_status', 'Show XING button', 'xi_status', 'simple-likebuttons', 'section_main');
}

//Edit the intro text of the options section
function section_main() {
  echo 'Please choose which buttons you want to display.';
}

//Field for Google+ button
function gp_status() {
  $aryOptions = get_option('simple-likebuttons-options');
  if($aryOptions === false) {
    $aryOptions['gp_status'] = "1";
  }

  $strStatus = '';
  if($aryOptions['gp_status'] == '1') { $strStatus = ' checked'; }
  echo "<input id='gp_status' name='simple-likebuttons-options[gp_status]' type='checkbox' value='1' ".$strStatus.">";
}

//Field for Twitter button
function tw_status() {
  $aryOptions = get_option('simple-likebuttons-options');
  if($aryOptions === false) {
    $aryOptions['tw_status'] = "1";
  }

  $strStatus = '';
  if($aryOptions['tw_status'] == '1') { $strStatus = ' checked'; }
  echo "<input id='tw_status' name='simple-likebuttons-options[tw_status]' type='checkbox' value='1' ".$strStatus.">";
}

//Field for facebook button
function fb_status() {
  $aryOptions = get_option('simple-likebuttons-options');
  if($aryOptions === false) {
    $aryOptions['fb_status'] = "1";
  }

  $strStatus = '';
  if($aryOptions['fb_status'] == '1') { $strStatus = ' checked'; }
  echo "<input id='fb_status' name='simple-likebuttons-options[fb_status]' type='checkbox' value='1' ".$strStatus.">";
}

//Field for linkedin button
function li_status() {
  $aryOptions = get_option('simple-likebuttons-options');
  if($aryOptions === false) {
    $aryOptions['li_status'] = "1";
  }

  $strStatus = '';
  if($aryOptions['li_status'] == '1') { $strStatus = ' checked'; }
  echo "<input id='li_status' name='simple-likebuttons-options[li_status]' type='checkbox' value='1' ".$strStatus.">";
}

//Field for xing button
function xi_status() {
  $aryOptions = get_option('simple-likebuttons-options');
  if($aryOptions === false) {
    $aryOptions['xi_status'] = "1";
  }

  $strStatus = '';
  if($aryOptions['xi_status'] == '1') { $strStatus = ' checked'; }
  echo "<input id='xi_status' name='simple-likebuttons-options[xi_status]' type='checkbox' value='1' ".$strStatus.">";
}

//Method to validate input. Not necessary for 0/1 checkbox values.
function simple_likebuttons_validate($strSource) {
	return $strSource;
}

?>