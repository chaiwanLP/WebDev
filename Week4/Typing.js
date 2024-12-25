const words = [
  "state", "no", "good", "he", "or", "course", "keep", "too",
  "this", "those", "however", "face", "back", "time", "then", "by"
];
let currentWordIndex = 0;
let score = 0;
let timeLeft = 30;
let timer;

const wordContainer = document.getElementById("word");
const inputBox = document.getElementById("input-box");
const startButton = document.getElementById("start-btn");

function renderWords() {
  wordContainer.innerHTML = words
    .map((word, index) => {
      if (index === currentWordIndex) {
        return `<span class="word current">${word}</span>`;
      }
      return `<span class="word">${word}</span>`;
    })
    .join("");
}

function handleInput() {
  const typedWord = inputBox.value.trim();
  const currentWord = words[currentWordIndex];
  const wordElements = document.querySelectorAll(".word");

  if (typedWord === currentWord) {
    // หากพิมพ์ถูก
    wordElements[currentWordIndex].classList.remove("current");
    wordElements[currentWordIndex].classList.add("correct");

    // รีเซ็ตข้อความกลับเป็นปกติ (ไม่มีไฮไลต์)
    wordElements[currentWordIndex].innerHTML = currentWord;

    currentWordIndex++;
    inputBox.value = "";

    if (currentWordIndex < words.length) {
      wordElements[currentWordIndex].classList.add("current");
    }

    score++;
    document.getElementById("score").innerText = score;
  } else {
    // หากพิมพ์ผิด
    let highlightedWord = "";
    for (let i = 0; i < currentWord.length; i++) {
      if (i < typedWord.length && typedWord[i] === currentWord[i]) {
        highlightedWord += `<span style="color: green;">${currentWord[i]}</span>`;
      } else if (i < typedWord.length) {
        highlightedWord += `<span style="color: red;">${currentWord[i]}</span>`;
      } else {
        highlightedWord += `<span>${currentWord[i]}</span>`;
      }
    }

    wordElements[currentWordIndex].innerHTML = highlightedWord;
    wordElements[currentWordIndex].classList.add("uncorrect");
    
    if (document.querySelectorAll(".uncorrect").length == 2) {
      score--;
      document.getElementById("score").innerText = score;
    }
  }
}



function startGame() {
  currentWordIndex = 0;
  score = 0;
  timeLeft = 30;

  renderWords();
  inputBox.value = "";
  document.getElementById("score").innerText = score;
  document.getElementById("time").innerText = timeLeft;

  clearInterval(timer);
  timer = setInterval(() => {
    timeLeft--;
    document.getElementById("time").innerText = timeLeft;
    if (timeLeft === 0) {
      clearInterval(timer);
      alert(`Game Over! Your score is ${score}`);
    }
  }, 1000);
}

startButton.addEventListener("click", startGame);
inputBox.addEventListener("input", handleInput);
