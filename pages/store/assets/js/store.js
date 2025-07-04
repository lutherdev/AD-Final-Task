
let cart = [];

function showOrderSummary() {
    const cartBox = document.querySelector('.cart-box');
    cartBox.scrollIntoView({ behavior: 'smooth' });
}

function addToCart(item, price, category = "default") {
    let itemExists = false;

    for (let i = 0; i < cart.length; i++) {
        if (cart[i].name === item && cart[i].category === category) {
            cart[i].quantity++;
            itemExists = true;
            break;
        }
    }

    if (!itemExists) {
        cart.push({ name: item, price: price, quantity: 1, category: category });
    }

    updateCart();
    showOrderSummary(); // Optional: scroll to summary if needed
}

function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    cartItems.innerHTML = ''; // Clear old list

    let total = 0;

    cart.forEach(item => {
        const li = document.createElement('li');
        const subtotal = item.price * item.quantity;
        li.innerHTML = `${item.name} x${item.quantity} <span>₱${subtotal}</span>`;
        cartItems.appendChild(li);
        total += subtotal;
    });

    cartTotal.textContent = total;
}

    