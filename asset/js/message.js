// $(document).ready(function () {
//     // Assumer que l'ID de l'utilisateur connecté est stocké dans un attribut data de l'élément body
//     var userId = $('body').data('user-id');

//     $('.card-message').click(function () {
//         // Obtenez l'ID de l'utilisateur sur lequel on a cliqué
//         var recipientId = $(this).data('id');

//         $.ajax({
//             url: '/conversation/' + recipientId, // Ici, on suppose que votre route pour la méthode getMessages est '/get_messages/{recipientId}'
//             type: 'GET',
//             success: function (response) {
//                 $('.message-container').empty();
//                 response.forEach(function (message) {
//                     var messageClass = message.senderId == userId ? 'sent' : 'received';
//                     var senderOrReceiverId = message.senderId == userId ? message.senderId : message.receiverId;
//                     var messageElement = '<div class="message ' + messageClass +
//                         '" data-' + messageClass + 'id="' + senderOrReceiverId + '">' +
//                         '<p class="p-message" data-message="' + message.content + '">' + message.content + '</p></div>';

//                     $('.message-container').append(messageElement);
//                 });
//             },
//             error: function (jqXHR, textStatus, errorThrown) {
//                 console.log(textStatus, errorThrown);
//             }
//         });
//     });
// });


// Dans votre fichier JavaScript
document.querySelectorAll('.card-message').forEach(card => {
    card.addEventListener('click', function () {
        let recipientId = this.dataset.id;

        // Maintenant que vous avez l'ID du destinataire, vous pouvez l'utiliser dans votre requête Fetch
        fetch('get_messages' + recipientId)
            .then(response => response.json())
            .then(messages => {
                let messageContainer = document.querySelector('.message-container');
                messageContainer.innerHTML = ''; // on vide le container

                messages.forEach(message => {
                    let messageDiv = document.createElement('div');
                    let messageP = document.createElement('p');
                    messageP.className = 'p-message';
                    messageP.textContent = message.content;

                    if (message.sender_id == senderId) {
                        messageDiv.className = 'message sent';
                    } else {
                        messageDiv.className = 'message received';
                    }

                    messageDiv.appendChild(messageP);
                    messageContainer.appendChild(messageDiv);
                });
            })
            .catch(err => {
                console.log('error', err);
            });
    });
});





