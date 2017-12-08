jQuery(function($) {
    $(document).ready(function(){
        $(document).find('.wwwkalipso-google-place-btn-add').click(function (e) {
            var restotaunt_name, address, rating, place;
            restotaunt_name = $(this).parent().find('input[name=www_restotaunt_name]').val();
            address = $(this).parent().find('input[name=www_address]').val();
            rating = $(this).parent().find('input[name=www_rating]').val();
            place = $(this).parent().find('input[name=www_place_id]').val();
            //console.log(restotaunt_name + ' ' + address + ' ' + rating +  '' +place );
            data = {
                action: 'google_place',
                nonce : nonce,
                place_name: restotaunt_name,
                formatted_address: address,
                rating: rating,
                place_id: place
            }
            console.log(data);
            console.log(ajaxurl+ '?action=google_place');
            $.post( ajaxurl, data, function(response) {
                alert('Получено с сервера: ' + response.data.message );
                //console.log(response);
            });
            return false;
        });

        $(document).find('.www-kalipso-btn-add').click(function (e) {
            var userName, userMessage, data;
            // Получаем данные формы
             userName = $(this).parent().find('.www-user-name').val();
             userMessage = $(this).parent().find('.www-message').val();
             // Формируем обьект данных который получит AJAX  обработчик
             data = {
                 action: 'guest_book',
                 user_name: userName,
                 message: userMessage
             }
             // Вывод данных в консоль браузера
             console.log(data);
            console.log(ajaxurl+ '?action=guest_book');

            // Отправка данных ajax обработчику (wp_ajax_guest_book, wp_ajax_nopriv_guest_book)
            $.post( ajaxurl, data, function(response) {
                alert('Получено с сервера: ' + response.data.message);
                console.log(response);
            });

            // Запрещаем отправление формы что бы страница не перезагружалась
            return false;
        });
    });

});