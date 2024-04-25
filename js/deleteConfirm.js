// open delete popup
const popupDeletes = document.querySelectorAll(".confirm-delete-popup, .popup");

function confirmDelete() {
  popupDeletes.forEach((popupDelete) => {
     popupDelete.classList.toggle("open-delete-popup")});
};

function closeDeletePopup() {
  popupDeletes.forEach((popupDelete) => { popupDelete.classList.remove("open-delete-popup")});
};

const popupDeleteOutputs = document.querySelectorAll(".confirm-delete-output-popup");

function confirmDeleteOutput() {
  popupDeleteOutputs.forEach((popupDeleteOutput) => {
    popupDeleteOutput.classList.toggle("open-delete-output-popup")});
};

function closeDeleteOutput() {
  popupDeleteOutputs.forEach((popupDeleteOutput) => {
    popupDeleteOutput.classList.remove("open-delete-output-popup")});
};