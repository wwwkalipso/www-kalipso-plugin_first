<?php

namespace includes\models\site;
use includes\common\WWWKalipsoGoogleRequestApi;
use includes\controllers\admin\menu\WWWKalipsoICreatorInstance;

class WWWKalipsoGoogleShortcodeModel implements WWWKalipsoICreatorInstance
{
    public function __construct() {
    }
    /**
     * Получения данных от кэша если данных нет в кэше запросить от сервера и записать в кэш
     * @param $location
     * @param $radius
     * @param $type
     * @return array|bool
     */
    public function getData($location, $radius, $type){
        error_log("model{$location}, {$radius}, {$type}");
        $cacheKey = "";
        $data = array();
        $cacheKey = $this->getCacheKey($location, $radius, $type);
        if ( false === ($data = get_transient($cacheKey))) {
            $reuestAPI = WWWKalipsoGoogleRequestApi::getInstance();
            $data = $reuestAPI->getPlaceGoogle($location, $radius, $type);
            set_transient($cacheKey, $data, 100);
        }
        return $data;
    }
    /**
     * Создает ключ для кэша
     */
    public function getCacheKey($location, $radius, $type){
        return WWWKALIPSO_PlUGIN_TEXTDOMAIN
            ."_google_location_{$location}_radius_{$radius}_type_{$type}";
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}