<?php

namespace includes\controllers\admin\menu;
class WWWKalipsoMyDashboardMenuController extends WWWKalipsoBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_dashboard_page(
            __('Sub dashboard WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            __('Sub dashboard WWWKalipso', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            'read',
            'wwwkalipso_control_sub_dashboard_menu',
            array(&$this, 'render')
        );
    }
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page dashboards", WWWKALIPSO_PlUGIN_TEXTDOMAIN);
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}