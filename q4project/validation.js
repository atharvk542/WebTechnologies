$(document).ready(function () {
  // Login form validation
  $("#loginForm").submit(function (e) {
    const username = $("#username").val().trim();
    const password = $("#password").val().trim();
    let isValid = true;

    if (username === "") {
      isValid = false;
      showMessage("Username is required", "error");
    } else if (password === "") {
      isValid = false;
      showMessage("Password is required", "error");
    }

    if (!isValid) {
      e.preventDefault();
    }
  });

  // Registration form validation
  $("#registerForm").submit(function (e) {
    const username = $("#newUsername").val().trim();
    const email = $("#email").val().trim();
    const password = $("#newPassword").val().trim();
    const confirmPassword = $("#confirmPassword").val().trim();
    let isValid = true;

    // Clear previous messages
    $("#message").removeClass("error success").html("");

    // Username validation
    if (username === "") {
      isValid = false;
      showMessage("Username is required", "error");
      return false;
    }

    // Email validation
    if (email === "") {
      isValid = false;
      showMessage("Email is required", "error");
      return false;
    } else if (!isValidEmail(email)) {
      isValid = false;
      showMessage("Please enter a valid email address", "error");
      return false;
    }

    // Password validation
    if (password === "") {
      isValid = false;
      showMessage("Password is required", "error");
      return false;
    } else if (password.length < 6) {
      isValid = false;
      showMessage("Password must be at least 6 characters long", "error");
      return false;
    }

    // Confirm password validation
    if (confirmPassword === "") {
      isValid = false;
      showMessage("Please confirm your password", "error");
      return false;
    } else if (password !== confirmPassword) {
      isValid = false;
      showMessage("Passwords do not match", "error");
      return false;
    }

    if (!isValid) {
      e.preventDefault();
    }
  });

  // Helper function to validate email format
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Helper function to display messages
  function showMessage(message, type) {
    $("#message").removeClass("error success").addClass(type).html(message);
  }
});
