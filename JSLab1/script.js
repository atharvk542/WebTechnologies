function startPrompt() {
  let num1 = parseInt(prompt("Enter the first number:"));
  let num2;
  do {
    num2 = parseInt(prompt("Enter a second number greater than the first:"));
  } while (num2 <= num1);

  displayDivisibles(num1, num2);
}

function displayDivisibles(start, end) {
  let output = document.getElementById("output");
  output.innerHTML = "";

  for (let i = start; i <= end; i++) {
    let text = "";
    let className = "";
    if (i % 3 === 0 && i % 5 === 0) {
      text = `Number divisible by 3 and 5: ${i}`;
      className = "blue";
    } else if (i % 3 === 0) {
      text = `Number divisible by 3: ${i}`;
      className = "green";
    } else if (i % 5 === 0) {
      text = `Number divisible by 5: ${i}`;
      className = "red";
    }

    if (text) {
      let li = document.createElement("li");
      li.textContent = text;
      li.className = className;
      output.appendChild(li);
    }
  }
  document.getElementById("end").textContent = "The end";
}
