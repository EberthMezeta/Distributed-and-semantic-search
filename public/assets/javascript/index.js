
const searchInput = document.getElementById("SearchInput");
const buttonSearch = document.getElementById("buttonSearch");
const containerResults = document.getElementById("results");
const MICRO_SERVICE = `http://localhost/projects/Distributed-and-semantic-search/private/Services/Service.php`;

const getResponse = async (direction) => {
    try {
      let Search = searchInput.value;
      const res = await fetch(direction +`?q=${Search}`);
      let data = await res.text();
      console.log(data);
      containerResults.innerHTML = data;
    } catch (error) {
      console.log(error);
      containerResults.innerHTML = "ocurrio un error indesperado";
    }
  };

  buttonSearch.addEventListener("click",()=>{
    getResponse(MICRO_SERVICE);
  });
