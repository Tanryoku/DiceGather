<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./messagerie.html">
    <title>Dice Gather</title>
</head>
<body>
    <header>
        <?php include('./include/header.inc.php'); ?>
    </header>
    <main>
        <div id="messageSystem">
            <ul id="tabs">
                <li id="receivedTab">Received</li>
                <li id="sentTab">Sent</li>
                <li id="invitationsTab">Invitations</li>
            </ul>
            <div id="messageArea">
                <div id="receivedMessages">
                    <p id="receivedMessage"></p>
                </div>
                <div id="sentMessages" style="display: none;">
                    <p id="sentMessage"></p>
                </div>
                <div id="invitations" style="display: none;">
                    <p id="invitationMessage"></p>
                </div>
            </div>
            <div id="messageInputArea">
                <input id="messageInput" type="text" placeholder="Type a message...">
                <button id="sendButton">Send</button>
            </div>
        </div>
            <script src="script.js"></script>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
</body>
</html>