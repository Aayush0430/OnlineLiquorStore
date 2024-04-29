const searchContent = document.querySelector(".searchcontent");
const searchIcon = document.querySelector(".searchicon");
const closeIcon = document.querySelector(".closeicon");
const searchInput = document.getElementById("searchinput");
searchIcon.addEventListener("click", () => {
  searchContent.classList.add("show");
});
closeIcon.addEventListener("click", () => {
  searchContent.classList.remove("show");
  searchInput.value = "";
});
