var myInput = document.getElementById("paswoord");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("fout");
    letter.classList.add("juist");
  } else {
    letter.classList.remove("juist");
    letter.classList.add("fout");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("fout");
    capital.classList.add("juist");
  } else {
    capital.classList.remove("juist");
    capital.classList.add("fout");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("fout");
    number.classList.add("juist");
  } else {
    number.classList.remove("juist");
    number.classList.add("fout");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("fout");
    length.classList.add("juist");
  } else {
    length.classList.remove("juist");
    length.classList.add("fout");
  }
}
