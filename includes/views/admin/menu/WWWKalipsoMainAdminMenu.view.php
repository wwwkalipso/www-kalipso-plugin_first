<form action="options.php" method="POST">
    <?php
    settings_fields( 'WWWKalipsoMainSettings' );     // скрытые защитные поля
    do_settings_sections( 'www-kalipso-plugin' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
    submit_button();
    ?>
</form>