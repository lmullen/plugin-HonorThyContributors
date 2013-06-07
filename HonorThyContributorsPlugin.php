<?php 

/**
 * Honor Thy Contributors plugin for Omeka
 * 
 * @copyright Copyright 2013 Lincoln A. Mullen
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 *
 */

// Define constants that set default options
define('HONOR_THY_CONTRIBUTORS_PAGE_PATH', 'contributions/');


class HonorThyContributorsPlugin extends Omeka_Plugin_AbstractPlugin
{

  // Define hooks
  protected $_hooks = array(
    'install',
    'uninstall',
    'define_routes'
    );

  public function hookInstall() {

    // Set the url to the public page as a url that can be changed
    set_option('honor_thy_contributors_page_page', HONOR_THY_CONTRIBUTORS_PAGE_PATH);

  }

  public function hookUninstall() {

    delete_option('honor_thy_contributors_page_page');

  }

  public function hookdefineroutes($args) {
    // Direct the URL set in option to the view for this plugin
    $router = $args['router'];
    $router->addroute(
      'honor_thy_contributors_path',
      new Zend_Controller_Router_Route(
        HONOR_THY_CONTRIBUTORS_PAGE_PATH, 
        array(
          'module'       => 'honor-thy-contributors',
          'controller'   => 'index',
          'action'       => 'index'
          )
        )
      );
  }


}
