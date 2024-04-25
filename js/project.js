const buttons = document.querySelectorAll(".order-list-button");
const contents = document.querySelectorAll(".order-list-box");

buttons.forEach((button, index) => {
  button.addEventListener('click', () => {
    buttons.forEach(button=>{button.classList.remove('active')});
  button.classList.add('active');

  contents.forEach(contents=>{contents.classList.remove('active')});
  contents[index].classList.add('active');
  })

})

const changes = document.querySelectorAll(".order-list-button");

  changes.forEach((search) => {
    
    search.addEventListener("click", () => {
    document.querySelector(".button")?.classList.remove("button");  
    search.classList.add("button");
  });

});
