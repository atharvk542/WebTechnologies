document.getElementById("calculateBtn").addEventListener("click", function () {
  let billAmount = parseFloat(document.getElementById("billAmount").value);
  let tipPercentage = parseFloat(
    document.getElementById("tipPercentage").value
  );
  let numPeople = parseInt(document.getElementById("numPeople").value) || 1;

  if (isNaN(billAmount) || isNaN(tipPercentage)) {
    document.getElementById("tipResult").innerText =
      "Please enter valid values.";
    return;
  }

  let tipAmount = (billAmount * (tipPercentage / 100)).toFixed(2);
  let totalAmount = (billAmount + parseFloat(tipAmount)).toFixed(2);
  let perPerson = (totalAmount / numPeople).toFixed(2);

  document.getElementById(
    "tipResult"
  ).innerHTML = `Tip: $${tipAmount} <br> Total: $${totalAmount} <br> Each Pays: $${perPerson}`;
});
