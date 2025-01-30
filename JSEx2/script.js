function calculateExpression() {
  //Retrieves the expression
  const expression = document.getElementById("expression").value || "3 + 5";

  //Tries to resolve expression, and catches error if expression is invalid
  try {
    const result = eval(expression).toFixed(2);
    document.getElementById("result").innerText = `${expression} = ${result}`;
  } catch (e) {
    alert("Invalid expression. Please try again.");
  }
}

//Generates a madlib based on your name, a verb, and an adjective using prompts
//Otherwise alerts if not all values are used
function generateMadLib() {
  let name = prompt("Enter your name:");
  let verb = prompt("Enter a verb:");
  let adjective = prompt("Enter an adjective:");

  //Sets inner text of madlib page to specified story, otherwise generates alert
  if (name && verb && adjective) {
    let story = `${name} loves to ${verb} in the most ${adjective} way possible!`;
    document.getElementById("story").innerText = story;
  } else {
    alert("Please enter all values to create a story!");
  }
}

function reloadPage() {
  location.reload();
}
