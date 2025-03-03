const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");

function drawRectangle() {
  ctx.fillStyle = "brown";
  ctx.fillRect(50, 50, 150, 100);
}

function drawCircle() {
  ctx.beginPath();
  ctx.arc(250, 200, 50, 0, Math.PI * 2);
  ctx.fillStyle = "green";
  ctx.fill();
  ctx.closePath();
}

function drawLine() {
  ctx.beginPath();
  ctx.moveTo(100, 300);
  ctx.lineTo(400, 300);
  ctx.strokeStyle = "yellow";
  ctx.lineWidth = 5;
  ctx.stroke();
  ctx.closePath();
}

function drawText() {
  ctx.font = "20px Arial";
  ctx.fillStyle = "black";
  ctx.fillText("Hello Canvas!", 200, 50);
}

function drawImage() {
  let img = new Image();
  img.src = "./pic13.jpg";
  img.onload = function () {
    ctx.drawImage(img, 100, 100, 150, 100);
  };
}

function drawGradient() {
  let gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
  gradient.addColorStop(0, "red");
  gradient.addColorStop(1, "blue");
  ctx.fillStyle = gradient;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
}

function drawMultiple() {
  for (let i = 0; i < 5; i++) {
    drawRectangle();
    drawCircle();
    drawLine();
  }
}

function drawSculpture() {
  ctx.fillStyle = "#8B5A2B";
  ctx.beginPath();
  ctx.moveTo(150, 250);
  ctx.lineTo(250, 100);
  ctx.lineTo(350, 250);
  ctx.fill();
}

function randomCall() {
  let functions = [drawRectangle, drawCircle, drawLine, drawText, drawGradient];
  let randomIndex = Math.floor(Math.random() * functions.length);
  functions[randomIndex]();
}

function scaleCanvas() {
  ctx.scale(1.5, 1.5);
  drawRectangle();
}
