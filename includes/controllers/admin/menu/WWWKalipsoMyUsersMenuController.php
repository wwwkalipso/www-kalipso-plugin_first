<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.01.17
 * Time: 19:35
 */
namespace includes\controllers\admin\menu;
class WWWKalipsoMyUsersMenuController extends WWWKalipsoBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_users_page(
            __('Sub users WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            __('Sub users WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            'read',
            'wwwkalipso_control_sub_users_menu',
            array(&$this, 'render')
        );
    }
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Users", WWWKALIPSO_PlUGIN_TEXTDOMAIN);
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
