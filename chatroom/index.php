<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .chat-container {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chat-messages {
            max-height: 200px;
            overflow-y: scroll;
        }

        .chat-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .chat-submit {
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .chat-submit:hover {
            background: #0056b3;
        }

        @media (max-width: 600px) {
            .chat-container {
                width: 100%;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h1>Chat Room</h1>
        <div class="chat-messages" id="chat-content"></div>
        <input type="text" class="chat-input" id="username" placeholder="Inserisci il tuo nome utente">
        <input type="text" class="chat-input" id="message" placeholder="Scrivi un messaggio">
        
        <button class="chat-submit" id="send">Invia</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
