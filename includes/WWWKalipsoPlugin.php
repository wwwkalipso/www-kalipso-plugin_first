<?php
namespace includes;
use includes\common\WWWKalipsoLoader;
class WWWKalipsoPlugin
{
    private static $instance = null;
    private function __construct() {
        WWWKalipsoLoader::getInstance();
    }
    public static function getInstance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    static public function activation()
    {
        // debug.log
        error_log('plugin '.WWWKALIPSO_PlUGIN_NAME.' activation');
    }
    static public function deactivation()
    {
        // debug.log
        error_log('plugin '.WWWKALIPSO_PlUGIN_NAME.' deactivation');
    }
}
WWWKalipsoPlugin::getInstance();