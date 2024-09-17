function AddProductToCart(event){
    let clickedButton = event.target;

    const json = clickedButton.getAttribute('file-json');
    const product = JSON.parse(json);

    let index = cart.findIndex((item) => parseInt(item.id) === parseInt(product.id));

    if (index !== -1){
        cart[index].quantity += 1;
    }
    else{
        product.quantity = 1;
        cart.push(product);
    }
}