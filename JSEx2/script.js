function calculateExpression() {
  // Prompt the user for an expression instead of using an input field
  let expression = prompt("Enter an expression:", "3 + 5");

  // Try to evaluate the expression, catching any errors
  if (expression) {
    try {
      let result = eval(expression).toFixed(2);
      document.getElementById("result").innerText = `${expression} = ${result}`;
    } catch (error) {
      alert("Invalid expression. Please try again.");
    }
  }
}

//Generates a madlib based on your name, a verb, and an adjective using prompts
//Otherwise alerts if not all values are used
function generateMadLib() {
  let name = prompt("Enter your name:", "Alex") || "Someone"; // Default to "Someone" if left empty
  let verb = prompt("Enter a verb:", "dance") || "run"; // Default to "run" if left empty
  let adjective = prompt("Enter an adjective:", "graceful") || "amazing"; // Default to "amazing" if left empty

  // Generate the story with the provided or default values
  let story = `${name} loves to ${verb} in the most ${adjective} way possible!`;

  // Update all four story variations
  document.getElementById("story-lowercase").innerText = story.toLowerCase();
  document.getElementById("story-uppercase").innerText = story.toUpperCase();
  document.getElementById("story-red").innerText = story;
  document.getElementById("story-bold").innerText = story;
}

function reloadPage() {
  location.reload();
}
