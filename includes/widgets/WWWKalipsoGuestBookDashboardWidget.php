<?php

namespace includes\widgets;
use includes\controllers\admin\menu\WWWKalipsoICreatorInstance;
use includes\models\admin\menu\WWWKalipsoGuestBookSubMenuModel;
class WWWKalipsoGuestBookDashboardWidget implements WWWKalipsoICreatorInstance
{
    public function __construct() {
        // Регистрация виджета консоли
        add_action( 'wp_dashboard_setup', array( &$this, 'addDashboardWidgets' ) );
        add_action( 'wp_dashboard_setup', array( &$this, 'removeDashboardWidgets' ) );
    }
    // Удаление виджета консоли
    public function removeDashboardWidgets(){
        /**
         * Удаляет Блоки на страницах редактирования/создания постов, постоянных страниц и произвольных типов записей.
         * remove_meta_box( $id, $screen, $context );
         */
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    }
    // Используется в хуке
    public function addDashboardWidgets(){
        // Продвинутое использование: добавление виджета в боковой столбец
        add_meta_box(
            'www_kalipso_guest_book_dashboard_widget_new',
            __('Guest book new', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            array( &$this, 'renderDashboardWidget' ),
            'dashboard',
            'side',
            'high'
        );
        wp_add_dashboard_widget(
            'www_kalipso_guest_book_dashboard_widget',         // Идентификатор виджета.
            __('Guest book', WWWKALIPSO_PlUGIN_TEXTDOMAIN),           // Заголовок виджета.
            array( &$this, 'renderDashboardWidget'  ) // Функция отображения.
        );
        // Объявляем глобальный массив метабоксов, содержащий все виджеты административной понели WordPress
        global $wp_meta_boxes;
        // Получаем нормальный массив виджетов консоли
        // (который уже содержит наш виджет в самом конце)
        $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
        // Сохраняем старую версию массива и удаляем наш виджет из конца массива
        $example_widget_backup = array('www_kalipso_guest_book_dashboard_widget' => $normal_dashboard['www_kalipso_guest_book_dashboard_widget']);
        unset($normal_dashboard['www_kalipso_guest_book_dashboard_widget']);
        // Объединяем два массива вместе таким образом, что наш виджет оказывается в начале
        $sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);
        // Сохраняем отсортированный массив обратно в метабокс
        $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
    }
    // Выводит контент
    public function renderDashboardWidget(){
        // Запрашиваем данные из таблицы
        $data = WWWKalipsoGuestBookSubMenuModel::getAll();
        // Вывод данных
        ?>
        <table  class="flatTable">
            <thead>
            <tr class="titleTr">
                <td>
                    <?php _e('Name', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
                </td>
                <td>
                    <?php _e('Messsage', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
                </td>
                <td>
                    <?php _e('Date', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
                </td>

            </tr>
            </thead>
            <tbody>
            <?php if(count($data) > 0 && $data !== false){  ?>
                <?php foreach($data as $value): ?>
                    <tr class="row table_box">

                        <td>
                            <?php echo $value['user_name']; ?>
                        </td>
                        <td>
                            <?php echo $value['message']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y H:i', $value['date_add']); ?>
                        </td>



                    </tr>
                <?php endforeach ?>
            <?php }else{ ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}