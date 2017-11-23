<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.01.17
 * Time: 19:01
 */
namespace includes\controllers\admin\menu;
class WWWKalipsoMyPostsMenuController extends WWWKalipsoBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_posts_page(
            __('Sub posts WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            __('Sub posts WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            'read',
            'wwwkalipso_control_sub_posts_menu',
            array(&$this, 'render')
        );
    }
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page posts", WWWKALIPSO_PlUGIN_TEXTDOMAIN);
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}