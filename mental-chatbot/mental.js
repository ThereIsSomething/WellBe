document.addEventListener('DOMContentLoaded', () => {
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const chatMessages = document.getElementById('chatMessages');

    const aiResponses = [
        "I understand. Can you tell me more about how you're feeling?",
        "It sounds like you're going through a challenging time. Your feelings are valid.",
        "Let's explore that thought a bit more. What makes you say that?",
        "Remember, it's okay to not be okay sometimes. I'm here to support you.",
        "That must be difficult. How has this been affecting your daily life?",
        "Would you like to discuss some coping strategies?",
        "Your mental health is important. Let's work through this together.",
    ];

    function getAIResponse() {
        return aiResponses[Math.floor(Math.random() * aiResponses.length)];
    }

    function createMessageElement(content, type) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message', type, 'mb-4', 'max-w-xs');

        const contentDiv = document.createElement('div');
        contentDiv.classList.add('bg-white', 'p-3', 'rounded-lg', 'shadow-md');
        contentDiv.textContent = content;

        const timeDiv = document.createElement('div');
        timeDiv.classList.add('text-xs', 'text-gray-500', 'mt-1');
        timeDiv.textContent = 'Just now';

        messageDiv.appendChild(contentDiv);
        messageDiv.appendChild(timeDiv);

        return messageDiv;
    }

    function sendMessage() {
        const messageText = messageInput.value.trim();

        if (messageText) {
            const userMessage = createMessageElement(messageText, 'sent');
            chatMessages.appendChild(userMessage);

            setTimeout(() => {
                const aiMessage = createMessageElement(getAIResponse(), 'received');
                chatMessages.appendChild(aiMessage);

                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);

            messageInput.value = '';
        }
    }
    sendButton.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});
