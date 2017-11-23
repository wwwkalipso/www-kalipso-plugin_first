<?php

namespace includes\controllers\admin\menu;

 class WWWKalipsoMainAdminMenuController extends WWWKalipsoBaseAdminMenuController
 {


     public function action()
     {
               // TODO: Implement action() method.
                /**
                 * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
                 *
                 */
         $pluginPage = add_menu_page(
             _x(
                 'WWWKalipso',
                 'admin menu page' ,
                 WWWKALIPSO_PlUGIN_TEXTDOMAIN
             ),
             _x(
                 'WWWKalipso',
                 'admin menu page' ,
                 WWWKALIPSO_PlUGIN_TEXTDOMAIN
             ),
             'manage_options',
             WWWKALIPSO_PlUGIN_TEXTDOMAIN,
             array(&$this,'render'),
             WWWKALIPSO_PlUGIN_URL .'assets/images/main-menu.png'
         );
     }

     /**
      * Метод отвечающий за контент страницы
      */
     public function render()
     {
         // TODO: Implement render() method.
         _e("Hello world", WWWKALIPSO_PlUGIN_TEXTDOMAIN);

     }

     public static function newInstance()
     {
                // TODO: Implement newInstance() method.
                $instance = new self;
                return $instance;
     }
 }