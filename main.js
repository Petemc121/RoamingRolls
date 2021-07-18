document.getElementById("sidebarbtn").onmouseover = function () {
  document.getElementById("sidebarbtn").style.backgroundImage =
    "linear-gradient(white, white)";
};

document.getElementById("sidebarbtn").onmouseout = function () {
  document.getElementById("sidebarbtn").style.backgroundImage =
    "linear-gradient(#0A0A23, #071A4B)";
};
var sidebar = false;

$("#sidebarbtn").on("click", function () {
  if(sidebar == true)
  {
    $("#sidebar").toggleClass("active");
    blockSide.style.display = "none";
    sidebar = false;
  } else{
    $("#sidebar").toggleClass("active");
    sidebar = true;
    blockSide.style.display = "block";
  }
});

blockSide.addEventListener("click", function () {
  $("#sidebar").toggleClass("active");
  sidebar = false;
  blockSide.style.display = "none";
});

const popup = document.querySelector("#signpop");
function showpopup() {
  popup.classList.add("open");
}
function hidePopup() {
  popup.classList.remove("open");
}

document.getElementById("loginbtn").addEventListener("click", function () {
  showpopup();
});

document.getElementById("block").addEventListener("click", function () {
  hidePopup();
});

function onSubmit(token) {
  document.getElementById("demo-form").submit();
}
