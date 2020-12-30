let hamburgerIcon = document.querySelector("#hamburger-icon");
let hamburgerNavigation = document.querySelector("#hamburger-navigation");
console.log(hamburgerNavigation, hamburgerIcon);

let i = 0;

hamburgerIcon.addEventListener("click", () => {
  if (i == 0) {
    hamburgerNavigation.style.display = "block";
    i++;
  } else {
    hamburgerNavigation.style.display = "none";
    i--;
  }
});
