const filterBtn = document.querySelectorAll(".filter-btn");

filterBtn.forEach((item) => {
  item.addEventListener("click", () => {
    filterBtn.forEach((button) => {
      button.classList.remove("active");
      item.classList.add("active");
      let filterValue = item.dataset.filter;
      $(".grid").isotope({ filter: filterValue });
    });
  });
});

$(".grid").isotope({
  itemSelector: ".grid-item",
  layoutMode: "fitRows",
  transitionDuration: "0.6s",
});
