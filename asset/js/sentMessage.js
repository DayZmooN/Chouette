$(document).ready(function () {
    $('#send-button').on('click', function (e) {
        e.preventDefault();
        var message = $('#message-input').val();
        var recipientId = userId;
        $.ajax({
            url: '/send_message/' + recipientId,  // l'URL de la route pour envoyer un message
            type: 'POST',
            data: {
                message: message
            },
            success: function (response) {
                // Ajoutez le message à la conversation
                $('.message-container').append(
                    '<div class="message sent"><p class="p-message">' + message + '</p></div>'
                );
                // Videz le champ de saisie du message
                $('#message-input').val('');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
