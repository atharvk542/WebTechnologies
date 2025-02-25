/**
 * Array Exercises Script
 * This script contains functions to perform various array operations based on user selection.
 * It also updates the left and right sidebars with the arrays used.
 */

/**
 * Main function to handle the menu selection.
 * @param {number} option - The selected menu option.
 */
function performTask(option) {
  // Clear previous outputs
  document.getElementById("result").innerHTML = "";
  document.getElementById("left-array").innerHTML = "";
  document.getElementById("right-array").innerHTML = "";

  switch (option) {
    case 1:
      representArrayAsString();
      break;
    case 2:
      findMostFrequent();
      break;
    case 3:
      sumOfSquares();
      break;
    case 4:
      sumCorrespondingElements();
      break;
    case 5:
      quitProgram();
      break;
    default:
      document.getElementById("result").innerHTML =
        "Invalid option. Please try again.";
  }
}

/**
 * Task 1: Represent array elements as a string.
 * Sorts a sample array of colors alphabetically and joins them into a string.
 * Displays the array in the left sidebar.
 */
function representArrayAsString() {
  var myColor = ["White", "Red", "Black", "Green"];
  // Display the array on the left sidebar
  document.getElementById("left-array").innerHTML =
    "<h3>Array:</h3><p>[" + myColor.join(", ") + "]</p>";
  // Right sidebar remains empty
  myColor.sort(); // Sort the array alphabetically
  var resultString = myColor.join(" + ");
  document.getElementById("result").innerHTML =
    "The string from the given array is: " + resultString;
}

/**
 * Task 2: Find the most frequent element in an array.
 * Iterates over the sample array and determines the element with the highest frequency.
 * Displays the array in the left sidebar.
 */
function findMostFrequent() {
  var arr1 = [3, "a", "a", "a", 2, 3, "a", 3, "a", 2, 4, 9, 3];
  // Display the array on the left sidebar
  document.getElementById("left-array").innerHTML =
    "<h3>Array:</h3><p>[" + arr1.join(", ") + "]</p>";
  // Right sidebar remains empty
  var frequency = {};
  var max = 0;
  var mostFrequent;
  for (var i = 0; i < arr1.length; i++) {
    var elem = arr1[i];
    frequency[elem] = (frequency[elem] || 0) + 1;
    if (frequency[elem] > max) {
      max = frequency[elem];
      mostFrequent = elem;
    }
  }
  document.getElementById("result").innerHTML =
    "The most repeated element is '" +
    mostFrequent +
    "' and it is repeated " +
    max +
    " times.";
}

/**
 * Task 3: Find the sum of squares of a numeric vector.
 * Calculates the sum of squares for a sample array.
 * Displays the array in the left sidebar.
 */
function sumOfSquares() {
  var arr = [0, 1, 2, 3, 4];
  // Display the array on the left sidebar
  document.getElementById("left-array").innerHTML =
    "<h3>Array:</h3><p>[" + arr.join(", ") + "]</p>";
  // Right sidebar remains empty
  var sum = arr.reduce(function (acc, num) {
    return acc + num * num;
  }, 0);
  document.getElementById("result").innerHTML =
    "The sum of the squares of the elements is: " + sum;
}

/**
 * Task 4: Add the corresponding elements of two arrays.
 * Computes the sum for each index between two sample arrays.
 * Displays the first array in the left sidebar and the second array in the right sidebar.
 */
function sumCorrespondingElements() {
  var array1 = [1, 0, 2, 3, 4];
  var array2 = [3, 5, 6, 7, 8, 13];
  // Display both arrays in the sidebars
  document.getElementById("left-array").innerHTML =
    "<h3>Array 1:</h3><p>[" + array1.join(", ") + "]</p>";
  document.getElementById("right-array").innerHTML =
    "<h3>Array 2:</h3><p>[" + array2.join(", ") + "]</p>";

  var maxLength = Math.max(array1.length, array2.length);
  var result = [];
  for (var i = 0; i < maxLength; i++) {
    var val1 = array1[i] || 0;
    var val2 = array2[i] || 0;
    result.push(val1 + val2);
  }
  document.getElementById("result").innerHTML =
    "Resulting array after addition: [" + result.join(", ") + "]";
}

/**
 * Task 5: Quit the program.
 * Clears the sidebars and displays a farewell message.
 */
function quitProgram() {
  document.getElementById("left-array").innerHTML = "";
  document.getElementById("right-array").innerHTML = "";
  document.getElementById("result").innerHTML =
    "Thank you for using the program. Goodbye!";
}
