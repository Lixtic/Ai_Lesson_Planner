// Sample lesson data in JSON format
const lessons =  [
    {
      "id": 1,
      "title": "Introduction to Biology",
      "content": "Discuss the basics of Biology, its main branches, and their importance.",
      "date": "2023-04-10",
      "resources": [
        {
          "type": "textbook",
          "title": "Biology: The Unity and Diversity of Life",
          "author": "Starr, Taggart, Evers, Starr"
        },
        {
          "type": "website",
          "url": "https://www.khanacademy.org/science/biology",
          "description": "Khan Academy Biology Resources"
        }
      ]
    },
    {
      "id": 2,
      "title": "Photosynthesis",
      "content": "Explore the process plants use to convert sunlight into energy. Cover the chemical equation for photosynthesis and its significance.",
      "date": "2023-04-17",
      "resources": [
        {
          "type": "video",
          "url": "https://www.youtube.com/watch?v=o9BqrSAHbTc",
          "description": "Photosynthesis: Crash Course Biology #8"
        },
        {
          "type": "article",
          "url": "https://www.nature.com/articles/nature08233",
          "description": "A new perspective on photosynthesis in research"
        }
      ]
    },
    {
      "id": 3,
      "title": "Human Digestive System",
      "content": "An overview of the human digestive system, its components, and their functions.",
      "date": "2023-04-24",
      "resources": [
        {
          "type": "diagram",
          "url": "https://www.scientificcharts.com/products/human-digestive-system-chart",
          "description": "Chart of the Human Digestive System"
        },
        {
          "type": "interactive module",
          "url": "https://www.visiblebody.com/learn/digestive",
          "description": "Visible Body: Digestive System"
        }
      ]
    }
  ];

function loadLessons() {
    const lessonsContainer = document.getElementById('lessons-container');
    lessonsContainer.innerHTML = ''; // Clear the container
    lessons.forEach((lesson) => {
        const lessonElement = document.createElement('div');
        lessonElement.className = 'lesson';
        lessonElement.innerHTML = `
            <h2>${lesson.title}</h2>
            <p>${lesson.content}</p>
        `;
        lessonsContainer.appendChild(lessonElement);
    });
}

document.getElementById('add-lesson').addEventListener('click', function() {
    // For simplicity, we'll just log to the console here
    //  you would present a form to enter new lesson details
    console.log('Add lesson functionality to be implemented...');
});

// Load the lessons when the script is run
loadLessons();