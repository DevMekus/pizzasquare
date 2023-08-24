class Product {
  constructor() {
    let cart = localStorage.getItem("cart")
      ? JSON.parse(localStorage.getItem("cart"))
      : [];
    this.cart = cart;
    let prodIndex = (id) =>
      this.cart.indexOf(this.cart.find((item) => item.id === id));
    this.prodIndex = prodIndex;
    this.total = 0;
    this.totalinCart = 0;
    this.deliveryPrice = 0;
    this.deliveryType = "";
    this.serviceCharge = 100;
    this.totalBill = 0;
    this.referenceID = "piz" + Math.floor(Math.random() * 10000);
    this.TopNavCalculation();
    this.loadStorageToCart();
    this.cartTotal();
    this.billToclient();
  }

  alerts(flag, responseMsg) {
    let feedbackMsg = document.querySelector(".serverFeedback");
    if (flag == "s") {
      feedbackMsg.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <p class="fw-light">${responseMsg}.</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
    } else {
      feedbackMsg.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Oops!</strong><p class="fw-light">${responseMsg}.</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
    }
  }

  addToCart(id, price, name, category, size) {
    if (confirm("Do you wish to continue?")) {
      let alertMsg = "";
      let addToCartMsg = document.getElementsByClassName("addToCartMsg");
      if (this.cart.length > 0) {
        this.prodIndex(id) > -1
          ? (this.cart[this.prodIndex(id)].qty += 1)
          : this.cart.push({ id, price, name, category, qty: 1, size });
      } else {
        this.cart.push({ id, price, name, category, qty: 1, size });
      }
      localStorage.setItem("cart", JSON.stringify(this.cart));
      alertMsg = `${size} ${name} added to cart`;
      addToCartMsg.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> <p class="fw-light">${alertMsg}.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>`;
      this.alertMessage(alertMsg, addToCartMsg);
      this.loadStorageToCart();
    }
    this.TopNavCalculation();
    this.cartTotal();
  }

  alertMessage(msg, where) {
    for (let i = 0; i < where.length; i++) {
      where[
        i
      ].innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
      <p class="fw-light">${msg}.</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
      setTimeout(() => {
        where[i].innerHTML = "";
      }, 2000);
    }
  }

  loadStorageToCart() {
    let display = "";
    if (this.cart.length > 0) {
      display += `
      <div class="cart_inner_body">   
          `;
      this.cart.forEach((item) => {
        display += `
        <div class="cart_item_wrapper">
        <div class="prod_disp">        
            <p class="cart_item_name fw-light" style="margin-left: 5px">${item.name} (${item.category})</p>
        </div>
        <div class="price_disp">
            <div class="removeItem" id="${item.id}"><span class="material-symbols-outlined">close</span></div> 
            <p class="fw-light">${item.qty} x <span class="subtotal_amount_cart">"\u20A6" ${item.price}</span></p>
        </div>
        </div>
              `;
      });
      display += `
    
      </div>
          `;
    } else {
      display = "<p style='color: red'>Cart is empty</p>";
    }

    document.querySelector(".displayCart").innerHTML = display;
    //Calculate the subtotal

    let removeItem = document.getElementsByClassName("removeItem");
    for (let i = 0; i < removeItem.length; i++) {
      removeItem[i].addEventListener("click", () => {
        let id = removeItem[i].getAttribute("id");
        this.removeCartItem(id);
      });
    }
  }

  cartTotal() {
    let subTotal = 0;
    this.cart.forEach((item) => {
      subTotal += item.price * item.qty;
    });
    let subTotalCart = (document.querySelector(
      ".subtotal_amount"
    ).innerHTML = `"\u20A6" ${Number(subTotal).toLocaleString(2)}`);
    this.totalinCart = subTotal.toFixed(2);
    return subTotal;
  }

  removeCartItem(nid) {
    const id = Number(nid);
    this.prodIndex(id) > -1 ? this.cart.splice(this.prodIndex(id), 1) : "";
    localStorage.setItem("cart", JSON.stringify(this.cart));
    this.TopNavCalculation();
    this.loadStorageToCart();
  }

  resetCart() {
    let clearCartMsg = document.querySelector(".clearCartMsg");
    let alertMsg = "";
    if (confirm("Empty Cart")) {
      this.cart.splice(0, this.cart.length);
      localStorage.setItem("cart", JSON.stringify(this.cart));
      alertMsg = `Cart cleared`;
      clearCartMsg.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> <p class="fw-light">${alertMsg}.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>`;
      this.TopNavCalculation();
      this.loadStorageToCart();
    }
  }

  resetCartAfterShopping() {
    this.cart.splice(0, this.cart.length);
    localStorage.setItem("cart", JSON.stringify(this.cart));
    let orderDetails = [];
    localStorage.setItem("sender", JSON.stringify(orderDetails));
    this.TopNavCalculation();
    this.loadStorageToCart();
  }

  //Increase Quantity
  increaseQty(nid) {
    const id = Number(nid);
    if (this.prodIndex(id > -1)) {
      this.cart[this.prodIndex(id)].qty += 1;
    } else {
      this.cart.push({ id, qty: 1 });
    }
    localStorage.setItem("cart", JSON.stringify(this.cart));
    this.TopNavCalculation();
    this.loadStorageToCart();
    this.billToclient();
    appview.loadCartPanel();
  }

  //Decrease Quantity
  decreaseQty(nid) {
    const id = Number(nid);
    if (this.prodIndex(id) > -1) {
      this.cart[this.prodIndex(id)].qty -= 1;
      if (this.cart[this.prodIndex(id)].qty < 1) {
        this.cart[this.prodIndex(id)].qty = 1;
      }
    } else {
      this.cart.push({ id, qty: 1 });
    }
    localStorage.setItem("cart", JSON.stringify(this.cart));
    this.TopNavCalculation();
    this.loadStorageToCart();
    this.billToclient();
    appview.loadCartPanel();
  }

  TopNavCalculation() {
    let cartCount = document.querySelector(".bagCount");
    let cartCount2 = document.querySelector(".bagCount2");
    let cartAmt = document.querySelector(".cartAmt");
    let billAmount2 = document.querySelector(".cartAmt2");

    let bagTotal = 0;
    let myBill = 0;
    let subtotal = this.cartTotal();
    this.cart.forEach((item) => {
      bagTotal += item.qty;
      myBill = (subtotal + this.deliveryPrice).toFixed(2);
    });

    billAmount2.innerText = "\u20A6 " + parseInt(subtotal).toLocaleString();
    cartAmt.innerText = "\u20A6 " + parseInt(subtotal).toLocaleString();
    cartCount.innerText = bagTotal;
    cartCount2.innerText = bagTotal;

    this.cartTotal();
  }

  billToclient() {
    let subtotal = this.cartTotal();
    let totalBillToCient =
      Number(subtotal) +
      Number(this.deliveryPrice) +
      Number(this.serviceCharge);
    this.totalBill = totalBillToCient;
    return totalBillToCient;
  }

  deliveryOption(delivery, method) {
    if (delivery == "pickup") {
      this.deliveryPrice = 0;
    } else {
      this.deliveryPrice = Number(delivery);
    }
    this.deliveryType = method;
    this.billToclient();
    appview.Invoice();
  }
}

const product = new Product();
