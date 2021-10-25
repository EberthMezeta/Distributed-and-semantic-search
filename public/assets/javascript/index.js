
const searchInput = document.getElementById("SearchInput");
const buttonSearch = document.getElementById("buttonSearch");
const containerResults = document.getElementById("results");
const API_PLOS = 'http://api.plos.org/search';

const getResponse = async (direction) => {
    try {
      //let Search = searchInput.value;
      let Search = "ADN";
      const res = await fetch(`http://localhost/projects/Distributed-and-semantic-search/private/Service.php`);
      let data = await res.json();
      console.log(data);
      //containerResults.innerHTML = getTable(data);
    } catch (error) {
      console.log(error);
      //containerResults.innerHTML = "ocurrio un error indesperado";
    }
  };

  buttonSearch.addEventListener("click",()=>{
    getResponse(API_PLOS);
  });
