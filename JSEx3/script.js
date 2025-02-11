function processChoice() {
  let choice = document.getElementById("choice").value;
  let outputDiv = document.getElementById("output");
  outputDiv.innerHTML = "";

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
      outputDiv.innerHTML = "<p>Goodbye! Closing the page.</p>";
      setTimeout(() => window.close(), 2000);
      break;
    default:
      outputDiv.innerHTML = "<p>Please enter a valid choice (1-5).</p>";
  }
}

function loops() {
  let num = parseInt(prompt("Enter a three-digit number:"));
  if (isNaN(num) || num < 100 || num > 999) {
    alert("Please enter a valid three-digit number.");
    return;
  }

  let sumFor = 0,
    sumWhile = 0,
    sumDoWhile = 0;

  for (let i = 1; i <= num; i++) {
    sumFor += i;
  }

  let i = 1;
  while (i <= num) {
    sumWhile += i;
    i++;
  }

  i = 1;
  do {
    sumDoWhile += i;
    i++;
  } while (i <= num);

  document.getElementById("output").innerHTML = `
        <p>For Loop Sum: ${sumFor}</p>
        <p>While Loop Sum: ${sumWhile}</p>
        <p>Do-While Loop Sum: ${sumDoWhile}</p>
    `;
}

function armStrong() {
  let num;
  do {
    num = prompt("Enter a three-digit number:");
  } while (isNaN(num) || num < 100 || num > 999);

  let sum = 0;
  let temp = num;
  while (temp > 0) {
    let digit = temp % 10;
    sum += digit ** 3;
    temp = Math.floor(temp / 10);
  }

  let result =
    sum == num
      ? `${num} is an Armstrong number.`
      : `${num} is NOT an Armstrong number.`;
  document.getElementById("output").innerHTML = `<p>${result}</p>`;
}

function pattern() {
  let levels = parseInt(prompt("Enter the number of levels for the pattern:"));
  if (isNaN(levels) || levels <= 0) {
    alert("Please enter a valid positive number.");
    return;
  }

  let output = "";
  for (let i = 1; i <= levels; i++) {
    output += "*".repeat(i) + "<br>";
  }

  document.getElementById("output").innerHTML = `<p>${output}</p>`;
}

function password() {
  let firstName = prompt("Enter your first name:").trim();
  let lastName = prompt("Enter your last name:").trim();

  if (!firstName || !lastName || firstName.length < 1 || lastName.length < 2) {
    alert("Please enter valid names.");
    return;
  }

  let password =
    firstName.charAt(0).toUpperCase() + "10" + lastName.slice(-2).toLowerCase();
  document.getElementById(
    "output"
  ).innerHTML = `<p>Your generated password is: <strong>${password}</strong></p>`;
}
