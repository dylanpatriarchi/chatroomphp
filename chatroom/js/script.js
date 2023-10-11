$(document).ready(function() {
    $("#send").click(function() {
        var message = $("#message").val();
        var username = $("#username").val();
        var image = $("#image")[0].files[0];

        if (message !== "" || (username !== "" && image)) {
            // Crea un oggetto FormData per l'invio di dati (messaggio, nome utente e immagine)
            var formData = new FormData();
            formData.append("username", username);
            formData.append("message", message);
            formData.append("image", image);

            // Effettua una richiesta POST per inviare dati al server
            $.ajax({
                url: "chat.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function() {
                    $("#message").val("");
                    updateChat();
                }
            });
        }
    });

    function updateChat() {
        $("#chat-content").load("get_messages.php");
    }

    setInterval(updateChat, 1000);

    updateChat();
});
