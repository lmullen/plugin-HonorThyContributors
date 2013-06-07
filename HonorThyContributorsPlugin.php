<?php 

/**
 * Honor Thy Contributors plugin for Omeka
 * 
 * @copyright Copyright 2013 Lincoln A. Mullen
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 *
 */

// Define constants that set default options
define('HONOR_THY_CONTRIBUTORS_PAGE_PATH', 'contributors/');
define('HONOR_THY_CONTRIBUTORS_PAGE_TITLE', 'Contributors');
define('HONOR_THY_CONTRIBUTORS_PRE_TEXT', 
  'The following people have contributed to this website.');
define('HONOR_THY_CONTRIBUTORS_POST_TEXT', '');

class HonorThyContributorsPlugin extends Omeka_Plugin_AbstractPlugin
{

  // Define hooks
  protected $_hooks = array(
    'install',
    'uninstall',
    'define_routes',
    'config_form',
    'config'
    );

  public function hookInstall() {
    // Set the url to the public page as a url that can be changed
    set_option('honor_thy_contributors_page_path',
     HONOR_THY_CONTRIBUTORS_PAGE_PATH);
    set_option('honor_thy_contributors_page_title',
     HONOR_THY_CONTRIBUTORS_PAGE_TITLE);
    set_option('honor_thy_contributors_pre_text',
     HONOR_THY_CONTRIBUTORS_PRE_TEXT);
    set_option('honor_thy_contributors_post_text',
     HONOR_THY_CONTRIBUTORS_POST_TEXT);
  }

  public function hookUninstall() {
    delete_option('honor_thy_contributors_page_path');
    delete_option('honor_thy_contributors_page_title');
    delete_option('honor_thy_contributors_pre_text');
    delete_option('honor_thy_contributors_post_text');
  }

  public function hookdefineroutes($args) {
    // Get the path to the contributors page from the options
    $page_path = get_option('honor_thy_contributors_page_path');

    // Direct the path to the view for this plugin
    $router = $args['router'];
    $router->addroute(
      'honor_thy_contributors_path',
      new Zend_Controller_Router_Route(
        $page_path, 
        array(
          'module'       => 'honor-thy-contributors',
          'controller'   => 'index',
          'action'       => 'index'
          )
        )
      );
  }

  public function hookConfigForm() 
  {
    include 'config_form.php';
  }

  public function hookConfig($args)
  {
    $post = $args['post'];
    set_option('honor_thy_contributors_page_path', $post['page_path']);
    set_option('honor_thy_contributors_page_title', $post['page_title']);
    set_option('honor_thy_contributors_pre_text', $post['pre_text']);
    set_option('honor_thy_contributors_post_text', $post['post_text']);
  }

}
