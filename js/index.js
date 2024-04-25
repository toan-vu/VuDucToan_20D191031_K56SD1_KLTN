// close sidebar
const ball = document.querySelector(".fa-bars");
const items = document.querySelectorAll(
  ".sidebar, .navbar, .content, .navbar-user"
);

ball.addEventListener("click", () => {
  items.forEach((item) => {
    item.classList.toggle("active");
  });
  ball.classList.toggle("active");
});


// const popup = document.querySelector(".button-cancle");
// const confirm = document.querySelector(".confirm-popup");

// function confirmCancle() {
//   confirm.classList.toggle("open-popup");
//   popupDeletes.classList.remove("open-delete-popup");
//   popupConfirm.classList.remove("open-confirm-popup");
// }

// function closePopup() {
//   confirm.classList.remove("open-popup");
// }


// const popupDeletes = document.querySelector(".confirm-delete-popup");

// function confirmDelete() {
//   popupDeletes.classList.toggle("open-delete-popup");
//   confirm.classList.remove("open-popup");
//   popupConfirm.classList.remove("open-confirm-popup");
// }

// function closeDeletePopup() {
//   popupDeletes.classList.remove("open-delete-popup");
// }

const popupConfirm = document.querySelector(".confirm-order-popup");

function confirmButton() {
  popupConfirm.classList.toggle("open-confirm-popup");
  confirm.classList.remove("open-popup");
  popupDeletes.classList.remove("open-delete-popup");
}

function closeConfirmPopup() {
  popupConfirm.classList.remove("open-confirm-popup");
}

// active option
// const sidebarItem = document.querySelector(".sidebar-box");
// const sidebarItemActives = document.querySelectorAll(
//   ".sidebar-box, .sidebar-box h2"
// );

// sidebarItem.addEventListener("click", () => {
//   sidebarItemActives.forEach((sidebarItemActive) => {
//     sidebarItemActive.classList.toggle("changeColor");
//   });
//   sidebarItem.classList.toggle("changeColor");
// });