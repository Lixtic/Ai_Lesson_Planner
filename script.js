
        
// Function to fetch config.json
async function fetchConfig() {
    const response = await fetch('config.json');
    const config = await response.json();
    return config;
}

async function query(data) {
    const config = await fetchConfig();

    const response = await fetch(
        config.url2,
        {
            method: "POST",
            headers: { 
                'Content-Type': 'application/json',
        'Authorization': config.authorization
            },
            
            body: JSON.stringify(data),
        }
    );
    const result = await response.json();
    return result;
    console.log(response);
}


function appendMessage(message, sender) {
    const chatLog = document.getElementById('chat-log');
    const messageElement = document.createElement('div');
    messageElement.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
    messageElement.innerText = message;
    chatLog.appendChild(messageElement);
    chatLog.scrollTop = chatLog.scrollHeight; // Auto-scroll to bottom
}


// Function to generate Teacher activity
async function generateTeacherActivity() {
const indicatorValue = document.getElementById('indicatorId').value;
const selectElement = document.getElementById('genOptions');
const loader = document.getElementById('loader');
if (!indicatorValue) return;
loader.style.display = 'block';

// Handle the change event of the select element
selectElement.addEventListener('change', async function() {
const selectedOption = selectElement.options[selectElement.selectedIndex].text;

if (selectedOption === 'Teacher Activities') {
    const botResponses = await query({ "inputs": "steps to introduce a lesson on how to" + indicatorValue });
    displayResponse(botResponses, 'phase-duration');
} else if (selectedOption === 'Learner Activies') {
    const botResponses = await query({ "inputs": "learner activities on  a lesson on how to " + indicatorValue });
    displayResponse(botResponses, 'learners-activities');
} else if (selectedOption === 'Resources') {
    const botResponses = await query({ "inputs": "teaching resources needed to introduce a lesson on  " + indicatorValue });
    displayResponse(botResponses, 'resources');
} else {
    console.log('Selected option: Other');
  
}
loader.style.display = 'none';
});
}

// Function to display bot response in the specified textarea
function displayResponse(botResponses, textareaId) {
const responseTextarea = document.getElementById(textareaId);
if (responseTextarea) {
responseTextarea.value = ''; // Clear previous content if needed

botResponses.forEach(botResponse => {
    responseTextarea.value += botResponse.generated_text + '\n';
});
}
}








