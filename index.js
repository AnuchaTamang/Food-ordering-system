const navLinkEls = document.querySelectorAll('.nav__link');
const windowPathname = window.location.pathname;
console.log(window.location.pathname)

navLinkEls.forEach(navLinkEl => {


const navlinkPathname = new URL(navLinkEl.href).pathname;

  console.log(navLinkEl.href);

  if ((windowPathname === navlinkPathname) || (windowPathname === 'index.php' && navlinkPathname === '/')) {
  navLinkEl.classList.add('active');
  }
});
//Navbar start

const navMenu = document.getElementById("navContent");
const navToggle = document.getElementById("nav-Toggle");
const navClose = document.getElementById("nav-Close");
if (navToggle) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.add("active");
  });
}

if (navClose) {
  navClose.addEventListener("click", () => {
    navMenu.classList.remove("active");
  });
}


//Navbar end

//carousel start
var swiper = new Swiper(".mySwiper", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 30,
  navigation: {
    nextEl: ".foodNext",
    prevEl: ".foodPrev",
  },
  breakpoints:{
    1200:{
      slidesPerView: 6,
      spaceBetween: 30,
    },
    1024:{
      slidesPerView: 5,
      spaceBetween: 30,
    },
    768:{
      slidesPerView:3,
      spaceBetween: 30,
    },
    525:{
      slidesPerView: 2,
      spaceBetween: 30,
    },
    320:{
      slidesPerView: 1,
      spaceBetween: 30,
    }
  }
});

//carousel end

//card start


document.addEventListener('DOMContentLoaded', loadFood);

const btnCart = document.querySelector('#cart-icon');
const cart = document.querySelector('.cart');
const btnClose = document.querySelector('#cart-close');

btnCart.addEventListener('click', () => {
  cart.classList.add('cart-active');
});

btnClose.addEventListener('click', () => {
  cart.classList.remove('cart-active');
});

function loadFood() {
  loadContent();
}

function loadContent() {
  fetchCartItems();
}

function fetchCartItems() {
  fetch('./loginsystem/cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({ action: 'load' }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.status === 'success') {
      renderCart(data.cart);
    }
  })
  .catch(error => console.error('Error fetching cart items:', error));
}

function renderCart(items) {
  const cartBasket = document.querySelector('.cart-content');
  cartBasket.innerHTML = '';
  items.forEach(item => {
    const newProductElement = createCartProduct(item.title, item.price, item.imgSrc, item.cart_qty);
    const element = document.createElement('div');
    element.innerHTML = newProductElement;
    cartBasket.append(element);
  });
  loadEventListeners();
  updateTotal();
}

function loadEventListeners() {
  document.querySelectorAll('.cart-remove').forEach(btn => {
    btn.addEventListener('click', removeItem);
  });

  document.querySelectorAll('.cart-quantity').forEach(input => {
    input.addEventListener('change', changeQty);
  });

  document.querySelectorAll('.add-cart').forEach(btn => {
    btn.addEventListener('click', addCart);
  });
}

function removeItem() {
  const title = this.parentElement.querySelector('.cart-food-title').innerHTML;
  fetch('./loginsystem/cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({ action: 'remove', title }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.status === 'success') {
      loadContent();
    }
  })
  .catch(error => console.error('Error removing item:', error));
}

function changeQty() {
  const title = this.parentElement.querySelector('.cart-food-title').innerHTML;
  const quantity = this.value;
  fetch('./loginsystem/cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({ action: 'update', title, quantity }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.status === 'success') {
      updateTotal();
    }
  })
  .catch(error => console.error('Error updating quantity:', error));
}

function addCart() {
  const food = this.parentElement;
  const title = food.querySelector('.food-title').innerHTML;
  const price = food.querySelector('.food-price').innerHTML;
  const imgSrc = food.querySelector('.food-img').src;

  fetch('./loginsystem/cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({ action: 'add', title, price, imgSrc }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.status === 'success') {
      loadContent();
    } else {
      alert(data.message);
    }
  })
  .catch(error => console.error('Error adding to carts:', error));
}

function createCartProduct(title, price, imgSrc, quantity) {
  return `
    <div class="cart-box">
      <img src="${imgSrc}" class="cart-img">
      <div class="detail-box">
        <div class="cart-food-title">${title}</div>
        <div class="price-box">
          <div class="cart-price">${price}</div>
          <div class="cart-amt">Rs.${price * quantity}</div>
        </div>
        <input type="number" value="${quantity}" class="cart-quantity" min="0" max="10">
      </div>
      <ion-icon name="trash" class="cart-remove"></ion-icon>
    </div>
  `;
}

function updateTotal() {
  const cartItems = document.querySelectorAll('.cart-box');
  const totalValue = document.querySelector('.total-price');
  let total = 0;

  cartItems.forEach(product => {
    const priceElement = product.querySelector('.cart-price');
    const price = parseFloat(priceElement.innerHTML.replace("Rs.", ""));
    const qty = product.querySelector('.cart-quantity').value;
    total += (price * qty);
    product.querySelector('.cart-amt').innerText = "Rs." + (price * qty);
  });

  totalValue.innerHTML = 'Rs.' + total;

  const cartCount = document.querySelector('.cart-count');
  const count = cartItems.length;
  cartCount.innerHTML = count;

  if (count === 0) {
    cartCount.style.display = 'none';
  } else {
    cartCount.style.display = 'block';
  }
}


//card end

//make a searchInput
const searchInput = document.getElementById('searchInput');
  const searchResults = document.getElementById('searchResults');

  searchInput.addEventListener('input', function() {
    const searchText = this.value.trim().toLowerCase();

    // Clear previous search results
    searchResults.innerHTML = '';

    if (searchText.length === 0) {
      return;
    }

    // Simulated data for demonstration
    const data = [
      "Mo:Mo", "Salad", "Rice", "Noodles", "Pulao", "Sandwich",
      "Burger", "Chips", "Pizza", "Keema Noodles",
    ];

    const filteredResults = data.filter(item => {
      return item.toLowerCase().includes(searchText);
    });

    if (filteredResults.length === 0) {
      searchResults.innerHTML = '<p>No results found</p>';
    } else {
      const ul = document.createElement('ul');
      filteredResults.forEach(item => {
        const p = document.createElement('p');
        p.textContent = item;
        ul.appendChild(p);
      });
      searchResults.appendChild(ul);
    }
  });