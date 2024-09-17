const cartTotal = document.getElementById("cartTotal");
const cartItemContainer = document.getElementById("cart-item-container");
const purchaseModal = new bootstrap.Modal(document.getElementById('purchaseModal'));

function DrawCartItems(){
    cartItemContainer.innerHTML = "";
    cart.forEach(item => {
        createCartItem(item);
    });
    UpdateTotal();
}

function IncreaseQuantity(event){
    let clickedButton = event.target;
    let pElement = clickedButton.parentElement;
    let input = pElement.getElementsByClassName("form-control")[0];
    let rootElement = pElement.parentElement.parentElement;
    let id = parseInt(rootElement.getAttribute("data-id"));

    if (parseInt(input.value) < 99){
        // This returns reference to the JSO
        let cartItem = cart.find(item => parseInt(item.id) === id);
        cartItem.quantity += 1;

        input.value = cartItem.quantity;

        UpdateSubTotal(rootElement.children[3],cartItem);
        UpdateTotal();

    }
}

function DecreaseQuantity(event){
    let clickedButton = event.target;
    let pElement = clickedButton.parentElement;
    let input = pElement.getElementsByClassName("form-control")[0];
    let rootElement = pElement.parentElement.parentElement;
    let id = parseInt(rootElement.getAttribute("data-id"));

    if(parseInt(input.value) > 1){
        // This returns reference to the JSO
        let cartItem = cart.find(item => parseInt(item.id) === id);
        cartItem.quantity -= 1;

        input.value = cartItem.quantity;

        UpdateSubTotal(rootElement.children[3],cartItem);
        UpdateTotal();
    }
}

function RemoveItem(event){
    let element = event.target.parentElement.parentElement.parentElement;
    console.log(element);
    console.log(element.getAttribute('data-id'));

    cart = cart.filter(item => item.id !== parseInt(element.getAttribute("data-id")));
    element.remove()
    
    UpdateTotal()
}

function UpdateSubTotal(element, cartItem){
    element.innerHTML = "€" + cartItem.quantity*cartItem.price;
}


function UpdateTotal(){
    let sum = 0.0;
    cart.forEach(product =>{
        sum += parseFloat(product.price) * parseInt(product.quantity) 
    })
    cartTotal.textContent = sum.toFixed(2);
}

function ValidateForm(event){
    event.preventDefault();

    let firstName = document.getElementById('firstName');
    let lastName = document.getElementById('lastName');
    let address = document.getElementById('address');
    let city = document.getElementById('city');
    let country = document.getElementById('country');
    let zipCode = document.getElementById('zipcode');
    let isValid = true;

    if(cart.length <= 0){
        alert("Your Cart is empty!");
        isValid = false;
    }
    
    if(firstName.value.length <= 2 || firstName.value.length > 30){
        firstName.classList.add('red-glow');
        isValid = false;
    }else{
        firstName.classList.remove('red-glow');
    }

    if(lastName.value.length <= 2 || lastName.value.length > 30){
        lastName.classList.add('red-glow');
        isValid = false;
    }else{
        lastName.classList.remove('red-glow');
    }

    if(address.value == null || !validateString(address.value) || address.value.replace('/[0-9]/g', '').length <= 2){
        address.classList.add('red-glow');
        isValid = false;
    }else{
        address.classList.remove('red-glow');
    }

    if(city.value.length > 30 || city.value.length < 1){
        city.classList.add('red-glow');
        isValid = false;
    }else{
        city.classList.remove('red-glow');
    }

    if(country.value === 'Select Country'){
        country.classList.add('red-glow');
        isValid = false;
    }else{
        country.classList.remove('red-glow');
    }
    // This works super weird because conditions are returning wrong values. 
    // Ex. zipCode.value.lenght < 3 on empty or one character returns false
    if(zipCode.value.lenght < 3 || zipCode.value.lenght > 10 || zipCode.value == null || parseInt(zipCode.value) == NaN || zipCode.value === ""){
        zipCode.classList.add('red-glow');
        isValid = false;
    }else{
        zipCode.classList.remove('red-glow');
    }


    if( isValid ){
        cart =[];
        purchaseModal.show();
        DrawCartItems();
        // Functionality outside of scope
        // Ex. Redirection to the payment vendor
    }
}

function validateString(address){
    for (let char of address) {
        if (!isNaN(char) && char !== ' ') {
            return true;
        }
    }
    return false;
}