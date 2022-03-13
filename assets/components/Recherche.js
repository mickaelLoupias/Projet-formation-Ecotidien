//obliger d'importer car pas dans react
import React, {useState} from "react";

const Recherche = () => {

  const [query,setQuery] = useState("");
  const [results, setResults] = useState([]);
  

  //appel à une fonction pour aller chercher les données sur le serveur
  const callData  =  () => { 
    fetch(`/user/search/${query}`)
    .then((response) => response.json())
    .then((data) => { 
      setResults(data);
      console.log(data);
    });
  }
  
  
  //stock dans query les modif lors de la frappe dans l'input a chaque frappe du clavier
  const handleChange = (e) => { 
    setQuery(e.target.value); 
    
  }
  
  //recupere le query
  const handleclick = () => { 
    callData();
  }


  return (
    <div className="block_search">
      <input type="text" onChange={handleChange} />
      <button onClick={handleclick}>Rechercher</button>
      {query.length > 0 ? (
      <ul className="list_item">
        {results.map((item,index) => {  
          return(
            <li key={item.id}>
              <p className="item_search">{item.description}</p>
            </li>  
          );
        })}
      </ul>
      ):("")};
    </div>
  );
};

export default Recherche;
