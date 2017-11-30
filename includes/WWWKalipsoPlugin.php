<?php
namespace includes;

use includes\common\WWWKalipsoDefaultOption;
use includes\common\WWWKalipsoLoader;
class WWWKalipsoPlugin
{
    private static $instance = null;
    private function __construct() {
        WWWKalipsoLoader::getInstance();
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));
    }
    public static function getInstance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Если не созданные настройки установить по умолчанию
     */
    public function setDefaultOptions(){
        if( ! get_option(WWWKALIPSO_PlUGIN_OPTION_NAME) ){
            update_option( WWWKALIPSO_PlUGIN_OPTION_NAME, WWWKalipsoDefaultOption::getDefaultOptions() );
        }
        if( ! get_option(WWWKALIPSO_PlUGIN_OPTION_VERSION) ){
            update_option(WWWKALIPSO_PlUGIN_OPTION_VERSION, WWWKALIPSO_PlUGIN_VERSION);
        }
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
        delete_option(WWWKALIPSO_PlUGIN_OPTION_NAME);
        delete_option(WWWKALIPSO_PlUGIN_OPTION_VERSION);
    }
}
WWWKalipsoPlugin::getInstance();