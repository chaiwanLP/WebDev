const currentWord = document.getElementById("current-word");
const userInput = document.getElementById("user-input");
const feedback = document.getElementById("feedback");
const timerDisplay = document.getElementById("time");
const scoreDisplay = document.getElementById("points");
const startBtn = document.getElementById("start-btn");

let wrongword=0;
let words = ["apple", "banana", "cherry", "dog", "elephant", "flower", "grape", "house", "jungle", "kitten"];
let timeLeft = 30;
let score = 0;
let isPlaying = false;
let GobalWord = "";
function startGame() {
  if (isPlaying) return;

  isPlaying = true;
  timeLeft = 30;
  score = 0;
  userInput.value = "";
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
  let wordCurrent = words[randomIndex].split('');
  GobalWord  = words[randomIndex];
  let e = "";
  for(i in wordCurrent){
    e+=`<span>${wordCurrent[i]}</span>`;

  }
  currentWord.innerHTML = e;
  userInput.value = "";
}

function updateScore() {
  scoreDisplay.textContent = score;
}

userInput.addEventListener("input", (event) => {
  let userWord = currentWord.querySelectorAll("span");

  
  if(GobalWord == userInput.value){
    score++;
    updateScore();
    updateWord();
    wrongword = 0;

  }
  if(wrongword === 2){
    if(score > 0){
      score--;
    }
    updateScore();
    updateWord();
    wrongword = 0;
  }
  if(userWord[userInput.value.length-1].textContent == userInput.value[userInput.value.length-1].trim()){
    userWord[userInput.value.length-1].style.color = "green";
    
  }else{
    userWord[userInput.value.length-1].style.color = "red";
    wrongword++;
  }

});

startBtn.addEventListener("click", startGame);
