// Function for displaying the divisibles based on the input that the user put in
function displayDivisibles(start, end) {
  let output = document.getElementById("output");
  output.innerHTML = "";

  for (let i = start; i <= end; i++) {
    // Based on divisibility, the text and color of the current list item is updated
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

    // Makes sure that the text exists and creates a list element with appropriate text / color
    if (text) {
      let li = document.createElement("li");
      li.textContent = text;
      li.className = className;
      output.appendChild(li);
    }
  }
  document.getElementById("end").textContent = "The end";
}

// Prompts for the first and second numbers 
function startPrompt() {
  let num1 = parseInt(prompt("Enter the first number:"));
  let num2;

  // Until the user enters a second number greater than the first, it will keep asking
  do {
    num2 = parseInt(prompt("Enter a second number greater than the first:"));
  } while (num2 <= num1);

  // Calls the function to print out all numbers divisible by 3 and 5 between the inputted range
  displayDivisibles(num1, num2);
}

// Once the content is loaded, prompt the users for their numbers
document.addEventListener("DOMContentLoaded", startPrompt);
