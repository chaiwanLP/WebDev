const currentWord = document.getElementById("current-word");
const userInput = document.getElementById("user-input");
const feedback = document.getElementById("feedback");
const timerDisplay = document.getElementById("time");
const scoreDisplay = document.getElementById("points");
const startBtn = document.getElementById("start-btn");

let wrongword=0;
let words = [
  "apple", "banana", "mango", "orange", "pineapple", "papaya", "watermelon",
  "strawberry", "blueberry", "raspberry", "blackberry", "grape", "cherry",
  "peach", "pear", "plum", "kiwi", "lemon", "lime", "coconut", "avocado",
  "guava", "lychee", "dragon fruit", "pomegranate", "apricot", "fig",
  "passion fruit", "starfruit", "cranberry", "mulberry", "jackfruit",
  "tamarind", "custard apple", "persimmon", "dates", "olive", "durian",
  "mangosteen", "sapodilla", "rambutan", "longan", "gooseberry", "jujube",
  "cantaloupe", "honeydew", "blackcurrant", "redcurrant", "grapefruit", "acerola",
  "dog", "cat", "elephant", "tiger", "lion", "giraffe", "zebra", "kangaroo",
  "koala", "panda", "monkey", "deer", "rabbit", "bear", "fox", "wolf",
  "sheep", "goat", "cow", "horse", "pig", "chicken", "duck", "goose",
  "turkey", "parrot", "peacock", "sparrow", "eagle", "penguin", "whale",
  "dolphin", "shark", "octopus", "jellyfish", "crab", "lobster", "snail",
  "turtle", "frog", "snake", "crocodile", "ant", "bee", "butterfly",
  "mosquito", "dragonfly", "caterpillar", "bat", "hedgehog"
];
let timeLeft = 60;
let score = 0;
let isPlaying = false;
let GobalWord = "";

function startGame() {
  isPlaying = true;
  timeLeft;
  score = 0;
  userInput.value = "";
  userInput.focus();
  updateScore();
  updateWord();
  feedback.textContent = "";
  startTimer();
}

function startTimer() {
  const timer = setInterval(() => {
    timeLeft--;
    timerDisplay.textContent = timeLeft;
    if (timeLeft <= 0) {
      clearInterval(timer);
      endGame();
      window.location.reload();
    }
  }, 1000);
}

function endGame() {
  isPlaying = false;
  feedback.textContent = `Game Over! Final Score: ${score}`;
  feedback.style.color = "blue";
  alert(`Game Over! Your Final Score is: ${score}`);
}

function updateWord() {
  const randomIndex = Math.floor(Math.random() * words.length);
  let wordnow = words[randomIndex].split('');
  GobalWord  = words[randomIndex];
  let e = "";
  for(i in wordnow){
    e+=`<span>${wordnow[i]}</span>`;

  }
  currentWord.innerHTML = e;
  userInput.value = "";
}

function updateScore() {
  scoreDisplay.textContent = score;
}

userInput.addEventListener("input", (event) => {
  if(isPlaying === true){
      let userWord = currentWord.querySelectorAll("span");

    if(event.inputType === "insertText" && event.data === " "){
      userWord[userInput.value.length-1].style.color = "red";
      
    }

    if(event.inputType === "deleteContentBackward"){
      return;
    }

    if(GobalWord == userInput.value){
      score++;
      updateScore();
      updateWord();
      wrongword = 0;

    }
    if(userWord[userInput.value.length-1].textContent == userInput.value[userInput.value.length-1]){
      userWord[userInput.value.length-1].style.color = "green";
      
    }else{
      userWord[userInput.value.length-1].style.color = "red";
      wrongword++;
    }
    if(wrongword === 2){
      if(score > 0){
        score--;
      }
      updateScore();
      updateWord();
      wrongword = 0;
    }
  }

});


startBtn.addEventListener("click", startGame);
