let cart =[];

window.addEventListener('load', (event) => {
    let requestOptions = {
        method: "POST"
    };

    fetch("http://localhost/GamersDream/api/getCart.php",requestOptions)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (!('error' in data))
            cart = data;

        // Ugly solution but didn't know better one
        if(window.location.pathname === "/GamersDream/cart.php")
            DrawCartItems();
    })
    .catch(error => console.error('Error:', error));
});

window.addEventListener('beforeunload', (event) => {
    let requestOptions ={
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(cart)
    };

    fetch("http://localhost/GamersDream/api/storeCart.php",requestOptions)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .catch(error => console.error('Error:', error));
});