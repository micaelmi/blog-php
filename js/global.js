function goBack() {
  window.history.back();
}

function toggleMenu() {
  const menu = document.querySelector(".menu");
  menu.style.right = menu.style.right === "0px" ? "-250px" : "0px";
}
