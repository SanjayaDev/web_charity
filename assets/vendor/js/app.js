const filterBtn = document.querySelectorAll(".filter-btn");
const hamburgerMenu = document.querySelector(".hamburger-menu");
const navbar = document.querySelector("header nav");
const links = document.querySelectorAll(".links a");

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

hamburgerMenu.addEventListener("click", () => {
  if (!navbar.classList.contains("open")) {
    navbar.classList.add("open");
    document.body.classList.add("stop-scrolling");
  } else {
    closeMenu();
  }
});

links.forEach((link) => {
  link.addEventListener("click", () => {
    closeMenu();
  });
});

$(".grid").isotope({
  itemSelector: ".grid-item",
  layoutMode: "fitRows",
  transitionDuration: "0.6s",
});

const closeMenu = () => {
  navbar.classList.remove("open");
  document.body.classList.remove("stop-scrolling");
};

const routeTo = (link) => {
  window.location.href = link;
};
