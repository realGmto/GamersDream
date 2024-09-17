function createProductCard(product){
    let itemElement = document.createElement('div')
    itemElement.id = `list-product-${product.id}`
    itemElement.classList.add('col-6', 'col-md-4', 'col-lg-3','card-item')
    itemElement.innerHTML = 
    `
    <div class="product-card text-center">
                    <img src="${product.image}" class="card-img-top" alt="${product.name}">
                    <div class="card-body">
                        <p class="card-title my-3 fs-5">${product.name}</p>
                        <p class="price mt-2 pb-2 fs-5">€${product.price}</p>
                    </div>
                </div>
    `;

    itemElement.addEventListener('mouseover', function () {
        itemElement.querySelector('.product-card').style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)'
    });
    
    itemElement.addEventListener('mouseout', function () {
        itemElement.querySelector('.product-card').style.boxShadow = 'none'
    });
    
    itemElement.addEventListener('click', function () {
        window.location.href = `./product.php?id=${product.id}`;
    });

    productCardContainer.appendChild(itemElement)
}