<?php

namespace includes\models\admin\menu;
use includes\controllers\admin\menu\WWWKalipsoICreatorInstance;
class WWWKalipsoMainAdminMenuModel implements WWWKalipsoICreatorInstance
{
    public function __construct(){
        add_action( 'admin_init', array( &$this, 'createOption' ) );
        error_log(1);
    }
    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции
     */
    public function createOption()
    {
        error_log(2);
        // register_setting( $option_group, $option_name, $sanitize_callback );
        // Регистрирует новую опцию
        register_setting('WWWKalipsoMainSettings', WWWKALIPSO_PlUGIN_OPTION_NAME, array(&$this, 'saveOption'));
        // add_settings_section( $id, $title, $callback, $page );
        // Добавление секции опций
        add_settings_section( 'www_kalipso_account_section_id', __('Account', WWWKALIPSO_PlUGIN_TEXTDOMAIN), '', 'www-kalipso-plugin' );
        add_settings_section( 'www_kalipso_key_id', __('Key', WWWKALIPSO_PlUGIN_TEXTDOMAIN), '', 'www-kalipso-plugin' );
        // add_settings_field( $id, $title, $callback, $page, $section, $args );
        // Добавление полей опций
        add_settings_field(
            'www_kalipso_token_field_id',
            __('Token', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            array(&$this, 'tokenField'),
            'www-kalipso-plugin',
            'www_kalipso_account_section_id'
        );
        add_settings_field(
            'www_kalipso_marker_field_id',
            __('Marker', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            array(&$this, 'markerField'),
            'www-kalipso-plugin',
            'www_kalipso_account_section_id'
        );
        add_settings_field(
            'www_kalipso_key_id',
            __('Key', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            array(&$this, 'keyField'),
            'www-kalipso-plugin',
            'www_kalipso_key_id'
        );
    }
    public function tokenField(){
        $option = get_option(WWWKALIPSO_PlUGIN_OPTION_NAME);
        ?>
        <input type="text"
               name="<?php echo WWWKALIPSO_PlUGIN_OPTION_NAME; ?>[account][token]"
               value="<?php echo esc_attr( $option['account']['token'] ) ?>" />
        <?php
    }
    public function markerField(){
        $option = get_option(WWWKALIPSO_PlUGIN_OPTION_NAME);
        //var_dump($option);
        ?>
        <input type="text"
               name="<?php echo WWWKALIPSO_PlUGIN_OPTION_NAME; ?>[account][marker]"
               value="<?php echo esc_attr( $option['account']['marker'] ) ?>" />
        <?php
    }
    public function keyField(){
        $option = get_option(WWWKALIPSO_PlUGIN_OPTION_NAME);
        ?>
        <input type="text"
               name="<?php echo WWWKALIPSO_PlUGIN_OPTION_NAME; ?>[key]"
               value="<?php echo esc_attr( $option['key'] ) ?>" />
        <?php
       
    }
    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input)
    {
        error_log(3);
        error_log(print_r($input, true));
        return $input;
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}