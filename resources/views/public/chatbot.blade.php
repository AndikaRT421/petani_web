@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4" style="padding-top: 9rem; padding-bottom: 5rem;">
    <h1 class="text-2xl font-bold mb-4">Chatbot</h1>
    
    
    <div id="chat-container" class="border p-4 rounded-lg shadow h-96 overflow-y-scroll bg-gray-400">
    </div>

    <form id="chat-form" class="mt-4 flex">
        <input
            type="text"
            id="chat-input"
            placeholder="Ketik pesan Anda..."
            class="flex-grow p-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
       
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatContainer = document.getElementById('chat-container');
        const chatForm = document.getElementById('chat-form');
        const chatInput = document.getElementById('chat-input');

        const userName = "User";
        const botName = "AI";  

        
        function appendMessage(sender, content, isUser = false) {
            const messageWrapper = document.createElement('div');
            messageWrapper.classList.add('mb-4', 'flex', isUser ? 'justify-end' : 'justify-start');

            const messageElement = document.createElement('div');
            messageElement.classList.add('p-2', 'rounded-lg', 'shadow-lg');
            
            messageElement.style.maxWidth = '75%';
            messageElement.style.minWidth = '20%';
            messageElement.style.wordWrap = 'break-word'; 

            if (isUser) {
                messageElement.classList.add('bg-blue-500', 'text-white', 'ml-auto');
            } else {
                messageElement.classList.add('bg-gray-200', 'text-gray-800');
            }

            const senderName = document.createElement('div');
            senderName.classList.add('text-sm', 'font-bold', 'mb-1', 'text-left');
            senderName.textContent = sender;

            const messageText = document.createElement('div');
            messageText.textContent = content;

            messageElement.appendChild(senderName);
            messageElement.appendChild(messageText);
            messageWrapper.appendChild(messageElement);

            chatContainer.appendChild(messageWrapper);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        // Handle form submission
        chatForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const userMessage = chatInput.value.trim();
            if (userMessage === '') return;

            // Append user message
            appendMessage(userName, userMessage, true);

            // Simulate bot response
            const botResponse = {
                message: userMessage // Echo back the same message
            };

            // Append bot response
            setTimeout(() => {
                appendMessage(botName, botResponse.message);
            }, 500);

            // Clear input field
            chatInput.value = '';
        });
    });
</script>

@endsection
