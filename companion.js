const botResponses = {
    hi: "Hello! How can I assist you today?",
    help: "Sure, I'm here to help. Can you tell me more?",
    bye: "Goodbye! Have a great day!",
    default: "I'm sorry, I didn't understand that. Can you rephrase?",
    byy: "Goodbye! Have a great day!",
    thankyou: "Happy to help always 💗",
};

document.addEventListener("DOMContentLoaded", () => {
    const chatBody = document.getElementById("chatBody");
    const messageInput = document.getElementById("messageInput");
    const sendMessage = document.getElementById("sendMessage");
    function addMessage(text, sender) {
        const messageDiv = document.createElement("div");
        messageDiv.classList.add("message", sender);

        const messageText = document.createElement("div");
        messageText.classList.add("text");
        messageText.innerText = text;

        messageDiv.appendChild(messageText);
        chatBody.appendChild(messageDiv);

        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function getBotResponse(userMessage) {
        const key = userMessage.toLowerCase();
        return botResponses[key] || botResponses.default;
    }

    function handleSendMessage() {
        const userMessage = messageInput.value.trim();
        if (userMessage) {
            addMessage(userMessage, "user");

            messageInput.value = "";
            setTimeout(() => {
                const botMessage = getBotResponse(userMessage);
                addMessage(botMessage, "bot");
            }, 1000);
        }
    }

    sendMessage.addEventListener("click", handleSendMessage);

    messageInput.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            handleSendMessage();
        }
    });

    messageInput.addEventListener("input", () => {
        sendMessage.disabled = !messageInput.value.trim();
    });

    sendMessage.disabled = true;
});