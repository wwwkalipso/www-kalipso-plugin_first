<?php

namespace includes\common;
class WWWKalipsoGoogleRequestApi
{
    const WWWKALIPSO_GOOGLE_API_V1 = "https://maps.googleapis.com/maps/api/place/nearbysearch/";
    //const WWWKALIPSO_GOOGLE_KEY = "AIzaSyDtJOCNcAEta51HBHPMnLTLe3lxX6QQj1o";

    private static $instance = null;
    private function __construct(){
    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function getKey(){
        $key = get_option(WWWKALIPSO_PlUGIN_OPTION_NAME);
        return "&key=".$key['key'];//self::WWWKALIPSO_GOOGLE_KEY;
    }

    public function getPlaceGoogle($location, $radius, $type){
        $requestURL = "";
        if ($location == false || empty($location)){
            $location = "location=49.5937300,34.5407300";
        } else {
            $location = "location={$location}";
        }
        if ($radius == false || empty($radius)){
            $radius = "&radius=200";
        } else {
            $radius = "&radius={$radius}";
        }
        if ($type == false || empty($type)){
            $type = "type=restaurant";
        } else {
            $type = "&type={$type}";
        }

        $requestURL = self::WWWKALIPSO_GOOGLE_API_V1."json?{$location}{$radius}{$type}"
            .$this->getKey();
        error_log($requestURL.' ++++');
        return $this->requestAPI($requestURL);
    }
    public function requestAPI($requestURL){
        $response = wp_remote_get( $requestURL, array('headers' => array()) );

        $body = wp_remote_retrieve_body($response);
        $json = json_decode($body);
        //if (!is_wp_error($body) && $body.status == 'OK') {
        if (!is_wp_error($json)&& $json->status == 'OK' ){
            return $json->results;
        } else {
            return false;
        }
    }
}