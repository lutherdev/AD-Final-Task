
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

document.addEventListener('DOMContentLoaded', function () {
    const checkoutBtn = document.getElementById('checkout-btn');
    const cancelBtn = document.getElementById('cancel-btn');

    checkoutBtn.addEventListener('click', function () {
        if (cart.length === 0) {
            alert('Your cart is empty!');
            return;
        }
        fetch('/handlers/checkout.handler.php', { //THIS IS THE ACTUAL SENDING
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ cart })  //THIS IS LIKE SENDING THE CART AS AN ARRAY
        })
        .then(response => response.json()) //THJIS RECEIVES THE MESSAGE FROM CHECKOUT HANDLER
        .then(result => {
            alert('Checkout successful! : ', result.message);
            cart = [];            // WILL UPDATE THE CART ARRAY TO EMPTY SINCE WE DONE CHECKING OUT
            updateCart();         
        })
        .catch(err => {
            console.error('Checkout failed:', err);
            alert('Checkout failed. Try again.');
        });
    });

    cancelBtn.addEventListener('click', function () {
        if (confirm('Are you sure you want to cancel your order?')) {
            cart = [];
            updateCart();
        }
    });
});

