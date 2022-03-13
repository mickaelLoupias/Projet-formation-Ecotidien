/**  QUIZ */
Question = [
    { id: 0,
       q: "Quel est votre nom ?" },
  
    { id: 1, 
      q: "Vous etes ?",
      choice: ["Homme", "Femme"] },
    { id: 2,
       q: "L ecologie liée au foyer, vous etes plutot...", 
       choice : ['Informe(e) Vous en savez plus que la moyenne', 'Sceptique Vous n etes pas conviancue'] },
    { id: 3,
       q: "Mettez vous en place des eco-gestes au qotidient ?", 
       choice : ["Oui", "Non"] },
    { id: 4, 
      q: "Souhaitez vous rendre vos action plus concretes ?", 
      choice : ["Oui", "Non"] },
    { id: 5, 
      q: "Dans quel region de France habitez vous ?" },
    { id: 6, 
      q: "Mettez vous en place des eco-gestes au qotidient ?", 
      choice : ["Oui", "Non"] },
    { id: 7, 
      q: "Que recherchez vous a travers l ecologie ?", 
      choice : ['Des actions plus poussé', 'La decouverte Apprendre les gestes du quotidient'] },
    { id: 8, 
      q: "Quel est votre principal envie ?", 
      choice : ['Connaitre les eco-geste', 'Un changement de comportement', 'Agir avec investissement'] },
  
  ];
  
  
  const suivi = document.querySelector('.suivi');
  const barre = document.querySelector('.barre');
  const mybar = document.querySelector('.mybar');
  const quest = document.querySelector('.question');
  const choice = document.querySelector('.choice');
  const btn = document.querySelector('.next');
  
  currentIndex = 0;
  MAX_QUESTION = Array.from(Question).length;
  state = false;
  
  
  
  const showQuestion = () => {
  
      choice.innerHTML = "";
  
      if(currentIndex + 1 >  MAX_QUESTION  ) {
          state = true;
          btn.innerText = "ENVOYER";
      } else {
          suivi.innerHTML = `Question ${currentIndex+1} sur ${MAX_QUESTION}`;
          quest.innerHTML = `${Question[currentIndex].q}`;
      
          // remplissage de la barre de progression
          pourcentage = (currentIndex + 1) / MAX_QUESTION * 100;
          mybar.style.width = pourcentage + "%";
         
          //question suivante
          if(Question[currentIndex].choice) {
              for(let i=0; i < Question[currentIndex].choice.length; i++) {   
                 choice.innerHTML += `<input type="radio" name="choice" id=${i} class="resp" value=${Question[currentIndex].choice[i]}>
                                      <label for="${i}">${Question[currentIndex].choice[i]}</label>
                                       `;                   
               }
               
              } else {
                 choice.innerHTML = `<input type="text">`;
              }
              
              //incrementation 
              currentIndex++;
              console.log(currentIndex);
      }
  }
  
  
  //Stockage des réponse dans le localStorage
  function stockageData() {
     const answers = document.querySelectorAll('.choice input');

       for(let answer of answers ) {   
          if(Question[currentIndex]) {

             if (answer.checked === true) {
                localStorage.setItem(Question[currentIndex].id, answer.value);
             } 
             if (answer.type =="text") {
                localStorage.setItem(Question[currentIndex].id, answer.value);
             }

          }   
       }
  
  }
  
  btn.addEventListener('click', ()=> {
    
      if(currentIndex > 0 || currentIndex + 1 == MAX_QUESTION ) {
         stockageData();
      }
      if(state === false) {
          btn.innerText = "SUIVANT";     
          showQuestion();
      } 
      if(btn.dataset.sent === "connect") {
         document.location.href="/login";
      }
     if(state === true) {
         btn.innerText = "Se connecter";
         btn.setAttribute('data-sent', "connect");
     }
  });

 
  