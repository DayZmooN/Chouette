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
// Fonction pour afficher les messages entre l'utilisateur connecté et le destinataire
// function showMessagesWithUser(recipientId, recipientPseudo) {
//     let senderId = document.querySelector('.user').dataset.userId;

//     // Mettre à jour le span avec le pseudo du destinataire
//     document.querySelector('.name span').textContent = recipientPseudo;

//     // Effectuer une requête Fetch pour obtenir les messages
//     fetch('/get_messages/' + recipientId)
//         .then(response => response.json())
//         .then(data => {
//             // Supprimer les anciens messages
//             let messageContainer = document.querySelector('.message-container');
//             messageContainer.innerHTML = '';

//             // Parcourir les messages et les ajouter au container
//             data.messages.forEach(message => {
//                 let messageDiv = document.createElement('div');
//                 let messageP = document.createElement('p');
//                 messageP.className = 'p-message';
//                 messageP.textContent = message.content;

//                 if (message.sender_id == senderId) {
//                     messageDiv.className = 'message sent';
//                 } else {
//                     messageDiv.className = 'message received';
//                 }

//                 messageDiv.appendChild(messageP);
//                 messageContainer.appendChild(messageDiv);
//             });
//         })
//         .catch(error => {
//             console.error('Error fetching messages:', error);
//         });
// }

// // Écouter le clic sur les cartes "card-message"
// document.querySelectorAll('.card-message').forEach(card => {
//     card.addEventListener('click', function () {
//         let recipientId = this.dataset.id;
//         let recipientPseudo = this.querySelector('.username span').textContent;

//         // Appeler la fonction pour afficher les messages avec le destinataire
//         showMessagesWithUser(recipientId, recipientPseudo);
//     });
// });

// // Notez que vous pouvez également appeler la fonction showMessagesWithUser() directement lors du chargement de la page pour afficher les messages avec le premier destinataire par défaut.





///



// Écouter le clic sur les cartes "card-message"
document.querySelectorAll('.card-message').forEach(card => {
    card.addEventListener('click', function () {
        let recipientId = this.dataset.id;
        let recipientPseudo = this.querySelector('.username span').textContent;

        // Appeler la fonction pour afficher les messages avec le destinataire
        showMessagesWithUser(recipientId, recipientPseudo);
    });
});

// Fonction pour afficher les messages entre l'utilisateur connecté et le destinataire
function showMessagesWithUser(recipientId, recipientPseudo) {
    let senderId = document.querySelector('.user').dataset.userId;

    // Mettre à jour le span avec le pseudo du destinataire
    document.querySelector('.name span').textContent = recipientPseudo;

    // Effectuer une requête Fetch pour obtenir les messages
    fetch('get_messages/' + recipientId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Supprimer les anciens messages
            let messageContainer = document.querySelector('.message-container');
            messageContainer.innerHTML = '';

            // Parcourir les messages et les ajouter au container
            data.messages.forEach(message => {
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
        .catch(error => {
            console.log('Error fetching messages:', error);
        });
}
