// Function to handle user choice
function handleChoice() {
  let choice = document.getElementById("choice").value;
  let output = document.getElementById("output");
  output.innerHTML = "";

  switch (choice) {
    case "1":
      loops();
      break;
    case "2":
      armStrong();
      break;
    case "3":
      pattern();
      break;
    case "4":
      password();
      break;
    case "5":
      output.innerHTML = "Goodbye!";
      setTimeout(() => window.close(), 2000);
      break;
    default:
      output.innerHTML =
        "Invalid choice. Please enter a number between 1 and 5.";
  }
}

// Function to calculate sum using loops
function loops() {
  let num = parseInt(prompt("Enter a number:"));
  if (isNaN(num) || num <= 0) {
    alert("Please enter a valid positive number.");
    return;
  }
  let sumFor = 0,
    sumWhile = 0,
    sumDoWhile = 0;

  for (let i = 1; i <= num; i++) sumFor += i;
  let j = 1;
  while (j <= num) sumWhile += j++;
  let k = 1;
  do {
    sumDoWhile += k++;
  } while (k <= num);

  document.getElementById("output").innerHTML = `
        <p>For Loop Sum: ${sumFor}</p>
        <p>While Loop Sum: ${sumWhile}</p>
        <p>Do-While Loop Sum: ${sumDoWhile}</p>
    `;
}

// Function to check Armstrong number
function armStrong() {
  let num;
  do {
    num = prompt("Enter a three-digit number:");
  } while (isNaN(num) || num < 100 || num > 999);

  let sum = 0,
    temp = num;
  while (temp > 0) {
    let digit = temp % 10;
    sum += digit ** 3;
    temp = Math.floor(temp / 10);
  }

  document.getElementById("output").innerHTML =
    num == sum
      ? `<p>${num} is an Armstrong number.</p>`
      : `<p>${num} is not an Armstrong number.</p>`;
}

// Function to print pattern
function pattern() {
  let levels = parseInt(prompt("Enter number of levels for the pattern:"));
  if (isNaN(levels) || levels <= 0) {
    alert("Please enter a valid positive number.");
    return;
  }
  let patternStr = "";
  for (let i = 1; i <= levels; i++) {
    patternStr += "*".repeat(i) + "<br>";
  }
  document.getElementById("output").innerHTML = patternStr;
}

// Function to generate password
function password() {
  let firstName = prompt("Enter your first name:");
  let lastName = prompt("Enter your last name:");
  if (!firstName || !lastName || firstName.length < 1 || lastName.length < 2) {
    alert("Please enter valid names.");
    return;
  }
  let pass =
    firstName[0].toUpperCase() + "10" + lastName.slice(-2).toLowerCase();
  document.getElementById(
    "output"
  ).innerHTML = `<p>Your generated password: ${pass}</p>`;
}
