<?php

namespace includes\controllers\admin\menu;
class WWWKalipsoMyMediaMenuController extends WWWKalipsoBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_media_page(
            __('Sub media WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            __('Sub media WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            'read',
            'wwwkalipso_control_sub_media_menu',
            array(&$this, 'render')
        );
    }
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page media", WWWKALIPSO_PlUGIN_TEXTDOMAIN);
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
