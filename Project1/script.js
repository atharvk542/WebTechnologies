let rentals = []; // Store active rentals
let basePrice = 50; // Base price per day (fake number)

document.getElementById("nextDay").addEventListener("click", function () {
  let dateElement = document.getElementById("currentDate");
  let currentDate = new Date(dateElement.innerText.split("Today is ")[1]);
  currentDate.setDate(currentDate.getDate() + 1);
  dateElement.innerText = "Today is " + currentDate.toDateString();

  // Decrement rental days left
  rentals.forEach((rental) => rental.daysLeft--);

  // Remove expired rentals
  rentals = rentals.filter((rental) => rental.daysLeft > 0);

  // Update invoice
  updateInvoice();
});

document
  .getElementById("rentForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    let name = document.getElementById("name").value;
    let carChoice = document.getElementById("carChoice").value;
    let days = parseInt(document.getElementById("days").value);

    if (!name || !carChoice || !days) {
      alert("Please fill out all fields.");
      return;
    }

    let dateElement = document.getElementById("currentDate");
    let startDate = new Date(dateElement.innerText.split("Today is ")[1]);
    let endDate = new Date(startDate);
    endDate.setDate(startDate.getDate() + days);

    let totalAmountDue = days * basePrice;

    rentals.push({
      name,
      carChoice,
      daysLeft: days,
      totalAmountDue,
      startDate: startDate.toDateString(),
      endDate: endDate.toDateString(),
    });

    updateInvoice();
  });

function updateInvoice() {
  let invoiceElement = document.getElementById("rentedCarInfo");

  if (rentals.length === 0) {
    invoiceElement.innerText = "No cars have been rented yet.";
    return;
  }

  invoiceElement.innerHTML = rentals
    .map(
      (rental) => `
    <p><strong>${rental.name}</strong> has rented a <strong>${rental.carChoice}</strong></p>
    <p>Rental Period: ${rental.startDate} - ${rental.endDate}</p>
    <p>Days Left: ${rental.daysLeft}</p>
    <p>Total Amount Due: $${rental.totalAmountDue}</p>
    <hr>
  `
    )
    .join("");
}
