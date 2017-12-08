<?php
namespace includes\common;

use includes\ajax\WWWKalipsoGuestBookAjaxHandler;
use includes\ajax\WWWKalipsoGooglePlaceAjaxHandler;
use includes\controllers\admin\menu\WWWKalipsoGuestBookSubMenuController;
use includes\controllers\admin\menu\WWWKalipsoMainAdminMenuController;
use includes\controllers\admin\menu\WWWKalipsoMainAdminSubMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyCommentsMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyDashboardMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyMediaMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyOptionsMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyPagesMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyPluginsMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyPostsMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyThemeMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyToolsMenuController;
use includes\controllers\admin\menu\WWWKalipsoMyUsersMenuController;
use includes\controllers\site\shortcodes\WWWKalipsoCalendarPricesMonthShortcodeController;
use includes\controllers\site\shortcodes\WWWKalipsoGoogleShortcodeController;
use includes\controllers\site\shortcodes\WWWKalipsoGuestBookShortcodesController;
use includes\example\WWWKalipsoExampleAction;
use includes\example\WWWKalipsoExampleFilter;
use includes\widgets\WWWKalipsoGooglePlaceDashboardWidget;
use includes\widgets\WWWKalipsoGuestBookDashboardWidget;
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
        WWWKalipsoMainAdminMenuController::newInstance();
        WWWKalipsoMainAdminSubMenuController::newInstance();
        WWWKalipsoMyDashboardMenuController::newInstance();
        WWWKalipsoMyPostsMenuController::newInstance();
        WWWKalipsoMyMediaMenuController::newInstance();
        WWWKalipsoMyPagesMenuController::newInstance();
        WWWKalipsoMyCommentsMenuController::newInstance();
        WWWKalipsoMyThemeMenuController::newInstance();
        WWWKalipsoMyPluginsMenuController::newInstance();
        WWWKalipsoMyUsersMenuController::newInstance();
        WWWKalipsoMyToolsMenuController::newInstance();
        WWWKalipsoMyOptionsMenuController::newInstance();
        WWWKalipsoGuestBookSubMenuController::newInstance();

        // Подключаем виджет гостевой книги
        WWWKalipsoGuestBookDashboardWidget::newInstance();
        WWWKalipsoGooglePlaceDashboardWidget::newInstance();
    }
    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
        WWWKalipsoCalendarPricesMonthShortcodeController::newInstance();
        WWWKalipsoGoogleShortcodeController::newInstance();

        // Шорткод для формы гостевой книги
        WWWKalipsoGuestBookShortcodesController::newInstance();
    }
    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){

        WWWKalipsoLocalization::getInstance();
        WWWKalipsoLoaderScript::getInstance();
        // подключаем ajax обработчик
        WWWKalipsoGuestBookAjaxHandler::newInstance();
        WWWKalipsoGooglePlaceAjaxHandler::newInstance();
        /*$wWWKalipsoExampleAction = WWWKalipsoExampleAction::newInstance();
        $wWWKalipsoExampleFilter = WWWKalipsoExampleFilter::newInstance();
        $wWWKalipsoExampleFilter->callMyFilter("Roman");
        $wWWKalipsoExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");

        $wWWKalipsoExampleAction = WWWKalipsoExampleAction::newInstance();


        $wWWKalipsoExampleAction->callMyAction();
        $wWWKalipsoExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );*/
    }
}