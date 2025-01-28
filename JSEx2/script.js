function generateMadLib() {
  const name = document.getElementById("name").value || "John";
  const verb = document.getElementById("verb").value || "run";
  const adjective = document.getElementById("adjective").value || "funny";

  const story = `When ${name} gives a lecture, ${name} accepts that people ${verb} at their watches, but what ${name} does not ${verb} is when they look at it and raise it to their ${adjective} ear to find out if it has stopped working.`;

  const storyDiv = document.getElementById("story");
  storyDiv.innerHTML = story;
}

function calculateExpression() {
  const expression = document.getElementById("expression").value || "3 + 5";
  try {
    const result = eval(expression).toFixed(2);
    document.getElementById("result").innerText = `${expression} = ${result}`;
  } catch (e) {
    alert("Invalid expression. Please try again.");
  }
}

function reloadPage() {
  location.reload();
}
