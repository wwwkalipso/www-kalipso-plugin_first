<?php

namespace includes\ajax;
use includes\controllers\admin\menu\WWWKalipsoICreatorInstance;
use includes\models\site\WWWKalipsoGooglePlaceSubMenuModel;

class WWWKalipsoGooglePlaceAjaxHandler implements WWWKalipsoICreatorInstance
{
    public function __construct(){
        if( defined('DOING_AJAX') && DOING_AJAX ){
            add_action('wp_ajax_google_place', array( &$this, 'ajaxHandler'));
            add_action('wp_ajax_nopriv_google_place',  array( &$this, 'ajaxHandler'));
        }
    }
    /**
     * Обработчик для ajax действия guest_book (wp_ajax_guest_book, wp_ajax_nopriv_guest_book)
     */
    public function ajaxHandler(){
        error_log('ajaxHandler nonce - '. $_POST['nonce'].'----- '.wp_verify_nonce( $_POST['nonce'], 'google_place' ));
        // Проверка наличия данных
        if ( $_POST ){
            if( ! wp_verify_nonce( $_POST['nonce'], 'google_place' ) ){
                wp_send_json_error();
            }


            //Добавляем данные
            $id =WWWKalipsoGooglePlaceSubMenuModel::insert(array(
                'place_id' => $_POST['place_id'],
                'place_name' => $_POST['place_name'],
                'formatted_address' => $_POST['formatted_address'], // time() стандартная php функция получения времени
                'rating' => $_POST['rating']
            ));
            $return = array(
                'message'   => 'Сохранено',
                'ID'        => $id
            );
            // Возвращаем ответ
            wp_send_json_success( $return );

        }
        wp_send_json_error();
        //wp_die();
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}