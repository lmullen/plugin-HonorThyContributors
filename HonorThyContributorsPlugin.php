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
    set_option('honor_thy_contributors_page_path', HONOR_THY_CONTRIBUTORS_PAGE_PATH);

  }

  public function hookUninstall() {

    delete_option('honor_thy_contributors_page_path');

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
  }

}
