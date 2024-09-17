function createCartItem(item){
    let itemElement = document.createElement('tr');
    itemElement.id = `cart-item-${item.id}`;
    itemElement.setAttribute('data-id',item.id);
    itemElement.innerHTML = 
    `
        <td class="item-name">
            <img src="${item.image}" alt="${item.name}" class="img-fluid" style="width: 60px;">
            ${item.name}
        </td>
        <td>€${item.price}</td>
        <td>
            <div class="input-group">
                <button class="btn btn-sm btn-outline-light" onclick="DecreaseQuantity(event)">-</button>
                <input type="text" class="form-control form-control-sm text-center text-white" value="${item.quantity}" style="max-width: 50px;">
                <button class="btn btn-sm btn-outline-light" onclick="IncreaseQuantity(event)">+</button>
            </div>
        </td>
        <td>€${item.price * item.quantity}</td>
        <td style="text-align: center;">
            <button type="button" class="btn btn-outline-danger" onclick="RemoveItem(event)" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .25rem; --bs-btn-font-size: .5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                </svg>
            </button>
        </td>
    `;

    cartItemContainer.appendChild(itemElement);
}