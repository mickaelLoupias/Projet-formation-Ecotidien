/** AFFICHAGE ASTUCE */
const astuce = document.querySelectorAll(".astuce_card");
const para = document.querySelectorAll(".p_overflow");

astuce.forEach((item, index) => {
  item.addEventListener("click", () => {
    para[index].classList.toggle("active");
  });
});



/**MODAL TRIGGER */
const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelector(".modal-trigger");


function closeModal() {
  modalContainer.classList.add("disactive");
}
if(modalTriggers) {

  modalTriggers.addEventListener('click', closeModal);
}


