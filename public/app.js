const sidebar = document.querySelector("aside.sidebar");
const sidebarToggleButton = sidebar.querySelector(".sidebar-toggle-button");
const expandableItems = sidebar.querySelectorAll(".expandable");
const themeSwitcher = sidebar.querySelector("[data-theme-switcher]");
//toggle-expand sidebar
sidebarToggleButton.onclick = () => {
  sidebar.classList.toggle("collapsed");
  expandableItems.forEach((item) => {
    item.classList.remove("expanded");
    checkExpand(item);
  });
};

expandableItems.forEach((item) => {
  const link = item.querySelector("a");
  link.onclick = () => {
    if (sidebar.classList.contains("collapsed")) return;
    item.classList.toggle("expanded");
    checkExpand(item);
  };
});

function checkExpand(item) {
  if (item.classList.contains("expanded")) {
    item.style.height = `${item.scrollHeight}px`;
  } else {
    item.style.height = "2.5rem";
  }
}

//switch theme
themeSwitcher.onclick = () => {
  if (themeSwitcher.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
};
