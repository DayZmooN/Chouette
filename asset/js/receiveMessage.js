$(document).ready(function () {
    setInterval(function () {
        $.ajax({
            url: '/get_messages/' + recipientId,  // l'URL de la route pour obtenir les messages
            type: 'GET',
            success: function (response) {
                // Mettez à jour la conversation avec les nouveaux messages
                // Supposons que la réponse soit un tableau de messages
                $('.message-container').empty();  // effacez les messages actuels
                response.forEach(function (message) {
                    var messageElement = '<div class="message ' +
                        (message.senderId == userId ? 'sent' : 'received') +
                        '"><p class="p-message">' + message.content + '</p></div>';
                    $('.message-container').append(messageElement);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }, 3000);  // interroge le serveur toutes les 3 secondes
});
