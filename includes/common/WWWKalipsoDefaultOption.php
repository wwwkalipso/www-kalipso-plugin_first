<?php

namespace includes\common;
class WWWKalipsoDefaultOption
{
    /**
     * Возвращает массив дефолтных настроек
     * @return array
     */
    public static function getDefaultOptions()
    {
        $defaults = array(
            'account' => array(
                'marker' => '',
                'token' => ''
            )
        );
        // Фильтр которому можно подключиться и изменить массив дефолтных настроек
        $defaults = apply_filters('www_kalipso_default_option', $defaults );
        return $defaults;
    }
}