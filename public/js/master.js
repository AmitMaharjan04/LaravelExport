document.addEventListener("DOMContentLoaded", function() {
        var messageBox = document.getElementById("message_box");

        // Show the message box
        messageBox.style.display = "block";

        // Set a timeout to add fade-out class after 5 seconds
        setTimeout(function() {
            messageBox.classList.add("fade-out");

            // Remove the message box from DOM after animation ends
            messageBox.addEventListener("animationend", function() {
                messageBox.parentNode.removeChild(messageBox);
            });
        }, 3000); // 5000 milliseconds = 5 seconds
});
