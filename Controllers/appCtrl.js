let closeOverlay = document.querySelector(".close_overlay span");
let orderBtn = document.getElementsByClassName("orderBtn");
let overlay = document.querySelector("#overlay");
let overlay_inner = document.querySelector(".overlay_inner");
let resetCart = document.querySelector(".resetCart");
const registerForm = document.querySelector(".registerForm");
const loginForm = document.querySelector(".loginForm");
const payForm = document.querySelector(".payForm");
const track = document.querySelector(".track");
const MobileNavToggle = document.querySelector(".bar");
const navbarBg = document.querySelector(".navbarBg");
const closeDrawer = document.querySelector(".closeDrawer span");
//Delivery
let delivery = document.querySelector("#delivery");
let clearCartS = document.querySelector(".clearCartS");

for (let i = 0; i < orderBtn.length; i++) {
  if (orderBtn[i]) {
    orderBtn[i].addEventListener("click", () => {
      const id = orderBtn[i].getAttribute("id");
      server.getProductCategory(id);
    });
  }
}

//CLOSE OVERLAY
if (closeOverlay) {
  closeOverlay.addEventListener("click", () => {
    overlay_inner.innerHTML = "";
    document.getElementById("overlay").style.display = "none";
    document.getElementById("overlay").style.visibility = "hidden";
  });
}

//Reset Cart
if (resetCart) {
  resetCart.addEventListener("click", () => {
    product.resetCart();
  });
}

const displayCartInCartPage = () => {
  let location = window.location.href;
  if (location.includes("cart.php")) {
    appview.loadCartPanel();
  }
};
displayCartInCartPage();

const displayInvoice = () => {
  let location = window.location.href;
  if (location.includes("checkout.php")) {
    appview.Invoice();
    runDelivery(delivery);
  }
};
displayInvoice();

//Delivery
if (delivery) {
  delivery.addEventListener("change", () => {
    runDelivery(delivery);
  });
}

function runDelivery(delivery) {
  var text = delivery.options[delivery.selectedIndex].text;
  product.deliveryOption(delivery.value, text);
}

//Login
if (loginForm) {
  loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = new FormData(loginForm);
    server.loginAttempt(data);
  });
}
//Register
if (registerForm) {
  registerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = new FormData(registerForm);
    server.signupUser(data);
  });
}

const sendOrders = () => {
  let location = window.location.href;
  if (location.includes("success.php")) {
    let order = localStorage.getItem("sender");
    let cart = localStorage.getItem("cart");

    server.uploadOrder(order, cart);
  }
};
sendOrders();

//Clear cart from success page
if (clearCartS) {
  product.resetCartAfterShopping();
}

//track order
if (track) {
  track.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = new FormData(track);
    server.trackOrder(data);
  });
}

//Show Mobile Navigation
if (MobileNavToggle) {
  MobileNavToggle.addEventListener("click", () => {
    navbarBg.classList.toggle("showSideNav");
  });
}

//Close Drawer
if (closeDrawer) {
  closeDrawer.addEventListener("click", () => {
    navbarBg.classList.remove("showSideNav");
  });
}
