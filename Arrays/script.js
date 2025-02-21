/**
 * Array Exercises Script
 * This script contains functions to perform various array operations based on user selection.
 */

/**
 * Main function to handle the menu selection.
 * @param {number} option - The selected menu option.
 */
function performTask(option) {
  // Clear previous result
  document.getElementById("result").innerHTML = "";

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
 */
function representArrayAsString() {
  var myColor = ["White", "Red", "Black", "Green"];
  myColor.sort(); // Sort the array alphabetically
  var resultString = myColor.join(" + ");
  document.getElementById("result").innerHTML =
    "The string from a given array is: " + resultString;
}

/**
 * Task 2: Find the most frequent element in an array.
 * Iterates over the sample array and determines the element with the highest frequency.
 */
function findMostFrequent() {
  var arr1 = [3, "a", "a", "a", 2, 3, "a", 3, "a", 2, 4, 9, 3];
  var frequency = {};
  var max = 0;
  var mostFrequent;

  // Count frequency for each element
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
    "' and is repeated " +
    max +
    " times.";
}

/**
 * Task 3: Find the sum of squares of a numeric vector.
 * Calculates the sum of squares for a sample array.
 */
function sumOfSquares() {
  var arr = [0, 1, 2, 3, 4];
  var sum = arr.reduce(function (acc, num) {
    return acc + num * num;
  }, 0);
  document.getElementById("result").innerHTML =
    "The sum of the squares of the elements of array [0,1,2,3,4] is: " + sum;
}

/**
 * Task 4: Add the corresponding elements of two arrays.
 * Computes the sum for each index between two sample arrays.
 */
function sumCorrespondingElements() {
  var array1 = [1, 0, 2, 3, 4];
  var array2 = [3, 5, 6, 7, 8, 13];
  var maxLength = Math.max(array1.length, array2.length);
  var result = [];

  // Add values at corresponding indices, handling different lengths.
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
 * Displays a farewell message.
 */
function quitProgram() {
  document.getElementById("result").innerHTML =
    "Thank you for using the program. Goodbye!";
}
