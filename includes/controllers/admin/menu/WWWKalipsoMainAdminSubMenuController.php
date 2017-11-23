<?php

namespace includes\controllers\admin\menu;

class WWWKalipsoMainAdminSubMenuController extends WWWKalipsoBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_submenu_page(
            WWWKALIPSO_PlUGIN_TEXTDOMAIN,
            _x(
                'Sub WWWKalipso',
                'admin menu page' ,
                WWWKALIPSO_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Sub WWWKalipso',
                'admin menu page' ,
                WWWKALIPSO_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'wwwkalipso_control_sub_menu',
            array(&$this, 'render'));
    }
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello world sub menu", WWWKALIPSO_PlUGIN_TEXTDOMAIN);
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}