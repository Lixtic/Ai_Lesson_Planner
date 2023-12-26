
        
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






<!-- 
// Function to retrieve and display notes based on the selected week
document.getElementById("weekSelect").addEventListener("change", function () {
    const selectedWeek = this.value;
    retrieveNotes(selectedWeek);
});

function retrieveNotes(selectedWeek) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const notes = JSON.parse(this.responseText);
            // Populate the retrieved notes in the respective input fields
            document.getElementsByName("duration")[0].value = notes.duration;
            document.getElementsByName("strand")[0].value = notes.strand;
            document.getElementsByName("class_size")[0].value = notes.class_size;
            document.getElementsByName("sub_strand")[0].value = notes.sub_strand;
            document.getElementsByName("content_standard")[0].value = notes.content_standard;
            document.getElementsByName("indicator")[0].value = notes.indicator;
            document.getElementsByName("lesson")[0].value = notes.lesson;
            // Add similar lines for other fields as necessary
        }
    };
    xhr.open("GET", `retrieve_notes.php?week=${selectedWeek}`, true);
    xhr.send();
}
 -->


