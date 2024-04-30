const searchContent = document.querySelector(".searchcontent");
const searchIcon = document.querySelector(".searchicon");
const closeIcon = document.querySelector(".closeicon");
const searchInput = document.getElementById("searchinput");

const searchResults = document.querySelector(".searchresults");
searchIcon.addEventListener("click", () => {
  searchContent.classList.add("show");
});
closeIcon.addEventListener("click", () => {
  searchContent.classList.remove("show");
  searchInput.value = "";
});
searchInput.addEventListener("focus", () => {
  searchResults.classList.add("showresults");
});
// searchInput.addEventListener("click", () => {
//   if (searchInput.value.trim() === "") {
//     console.log("empty");
//   } else {
//     console.log(searchInput.value);
//   }
// });
searchInput.addEventListener("blur", () => {
  searchResults.classList.remove("showresults");
});
