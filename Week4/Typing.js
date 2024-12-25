const currentWord = document.getElementById("current-word");
const userInput = document.getElementById("user-input");
const feedback = document.getElementById("feedback");
const timerDisplay = document.getElementById("time");
const scoreDisplay = document.getElementById("points");
const startBtn = document.getElementById("start-btn");

let words = ["apple", "banana", "cherry", "dog", "elephant", "flower", "grape", "house", "jungle", "kitten"];
let timeLeft = 30;
let score = 0;
let isPlaying = false;

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
  currentWord.textContent = words[randomIndex];
  userInput.value = "";
}

function updateScore() {
  scoreDisplay.textContent = score;
}

userInput.addEventListener("input", () => {
  if (userInput.value === currentWord.textContent) {
    feedback.textContent = "Correct!";
    feedback.style.color = "green";
    userInput.style.borderColor = "green";
    score++;
    updateScore();
    updateWord();
  } else {
    feedback.textContent = "Keep trying...";
    feedback.style.color = "red";
    userInput.style.borderColor = "red";
  }
});

startBtn.addEventListener("click", startGame);
