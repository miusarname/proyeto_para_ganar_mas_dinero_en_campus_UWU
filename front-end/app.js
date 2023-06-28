const btnSelect = document.querySelectorAll(".selectedE");
const sidebars = document.querySelector('#sidebar')
var toInsert;

btnSelect.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    console.log(btn.textContent);
  });
});
