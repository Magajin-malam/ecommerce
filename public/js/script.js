// Script for navigation bar
const bar = document.getElementById("bar");
const close = document.getElementById("close");
const nav = document.getElementById("navbar");

if (bar) {
  bar.addEventListener("click", () => {
    nav.classList.add("active");
  });
}

if (close) {
  close.addEventListener("click", () => {
    nav.classList.remove("active");
  });
}

function subprice() {
  var qty = document.getElementsByClassName("aqt");
  var sub = document.getElementsByClassName("atd");
  var pri = document.getElementsByClassName("pr");
  var upd = document.getElementsByClassName("inq");

  for (var i = 0; i < qty.length; i++) {
    var quantity = parseInt(qty[i].value);
    var price = parseFloat(pri[i].innerText.replace("$", ""));
    sub[i].innerHTML = `$${quantity * price}`;
    upd[i].value = parseInt(qty[i].value);
  }

  totala();
}

function totala() {
  var pri = document.getElementsByClassName("atd");
  let yes = 0;
  for (var i = 0; i < pri.length; i++) {
    yes = yes + parseFloat(pri[i].innerText.replace("$", ""));
  }

  document.getElementById("tot").innerHTML = "$" + yes;
  document.getElementById("tot1").innerHTML = "$" + yes;
}

window.addEventListener("unload", function () {
  // Call a PHP script to log out the user
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});

function bruh(param) {
  console.log(param);
  const ratingFields = document.querySelectorAll("#a-" + param + "-rating");

  // Loop through each rating field
  ratingFields.forEach((ratingField) => {
    // Get all the stars in this rating field
    const stars = ratingField.querySelectorAll('input[type="radio"]');

    // Loop through each star
    stars.forEach((star) => {
      // Listen for click events on this star
      star.addEventListener("click", function () {
        // Set the clicked star and all the stars before it to be checked and filled

        for (let i = 0; i < star.value; i++) {
          console.log("hello");
          stars[i].checked = true;
          stars[i].nextElementSibling.classList.add("checked");
        }

        // Set all the stars after the clicked star to be unchecked and empty
        for (let i = star.value; i < stars.length; i++) {
          stars[i].checked = false;
          console.log("hello");

          stars[i].nextElementSibling.classList.remove("checked");
        }
      });
    });
  });
}

