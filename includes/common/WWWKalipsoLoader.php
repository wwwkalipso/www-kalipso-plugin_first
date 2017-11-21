<?php
namespace includes\common;
use includes\example\WWWKalipsoExampleAction;
use includes\example\WWWKalipsoExampleFilter;
class WWWKalipsoLoader
{
    private static $instance = null;
    private function __construct(){
        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            // Когда в админке вызываем метод admin()
            $this->admin();
        } else {
            // Когда на сайте вызываем метод site()
            $this->site();
        }
        $this->all();
    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){
    }
    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
    }
    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){

        WWWKalipsoLocalization::getInstance();
       $wWWKalipsoExampleAction = WWWKalipsoExampleAction::newInstance();
       /*$wWWKalipsoExampleFilter = WWWKalipsoExampleFilter::newInstance();
       $wWWKalipsoExampleFilter->callMyFilter("Roman");
       $wWWKalipsoExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");

       $wWWKalipsoExampleAction = WWWKalipsoExampleAction::newInstance();
        

       $wWWKalipsoExampleAction->callMyAction();
       $wWWKalipsoExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );*/
    }
}