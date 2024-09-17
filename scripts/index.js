const productCardContainer = document.getElementById("product-card-container");

function GenreSelected(event) {
    event.preventDefault();

    let clickedButton = event.target;
    let genreName = clickedButton.textContent

    let dropdown = clickedButton.parentElement.parentElement
    if (!clickedButton.classList.contains('active')){
        for (let i = 0; i < dropdown.children.length; i++) {
            dropdown.children[i].firstElementChild.classList.remove('active')
        }
        clickedButton.classList.add('active')
        GetProducts(genreName)
    }
    else{
        clickedButton.classList.remove('active')
        GetProducts(null)
    }
}


function search(event){
    event.preventDefault();
    // Declare variables
    var filter, li, title, i, txtValue, searchBar;

    searchBar = document.getElementById('myInput');
    filter = searchBar.value.toUpperCase();
    li = document.getElementsByClassName("card-item");
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      title = li[i].getElementsByClassName("card-title")[0];
      txtValue = title.textContent || title.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }

function GetProducts(genreName){
    let requestOptions;
    if (genreName === null){
        requestOptions = {
            method: "POST"
        };
    }
    else{
        genreName = genreName.toLowerCase();
        requestOptions = {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({
                genre: genreName
            })
        };
    }

    fetch("http://localhost/GamersDream/api/getProducts.php", requestOptions)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Get response body text
    })
    .then(data => {
        updateProducts(data)
    })
    .catch(error => console.error('Error:', error)); // Catch and log any errors
}

function updateProducts(products){
    productCardContainer.innerHTML = ""

    products.forEach(product => {
        createProductCard(product)
    });
}