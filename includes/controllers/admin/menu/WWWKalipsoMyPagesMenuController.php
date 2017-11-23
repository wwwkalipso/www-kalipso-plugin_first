<?php

namespace includes\controllers\admin\menu;
class WWWKalipsoMyPagesMenuController extends WWWKalipsoBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_pages_page(
            __('Sub pages WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            __('Sub pages WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            'read',
            'wwwkalipso_control_sub_pages_menu',
            array(&$this, 'render')
        );
    }
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Pages", WWWKALIPSO_PlUGIN_TEXTDOMAIN);
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}