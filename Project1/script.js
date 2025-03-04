// Basic script to handle the renting logic
const rentForm = document.getElementById("rentForm");
const rentedCarInfo = document.getElementById("rentedCarInfo");

rentForm.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent page reload

  const nameValue = document.getElementById("name").value.trim();
  const emailValue = document.getElementById("email").value.trim();
  const carChoiceValue = document.getElementById("carChoice").value;
  const daysValue = document.getElementById("days").value;

  // Simple validation
  if (!nameValue || !emailValue || !carChoiceValue || !daysValue) {
    rentedCarInfo.textContent = "Please fill out all fields.";
    return;
  }

  // Display the rented car info
  rentedCarInfo.innerHTML = `
    <strong>Rented Car Information:</strong><br />
    Name: ${nameValue}<br />
    Email: ${emailValue}<br />
    Car: ${carChoiceValue}<br />
    Number of Days: ${daysValue}
  `;
});
