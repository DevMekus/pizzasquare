class ApplicationView {
  constructor() {
    this.shopID = Math.floor(Math.random() * 900000 + 100000);
    this.timer = "";
    this.shopFormData = new FormData();
  }

  //Append to Dom
  appendToDash(dom, item) {
    let locate = document.querySelector(dom);
    locate.innerHTML = "";
    locate.innerHTML = item;
  }

  loadCartPanel() {
    let cartItems = "";
    if (product.cart.length > 0) {
      cartItems += `
      <div class="row">
      <div class="col-sm-9">
          <div class="scrollTable">
              <table class="table table-bordered " style="min-width: 100%">
                  <thead>
                      <tr>
                          <th></th>                       
                          <th class="text-center fw-light">Product</th>
                          <th class="text-center fw-light">Price</th>
                          <th class="text-center fw-light">Quantity</th>
                          <th class="text-center fw-light">Subtotal</th>

                      </tr>
                  </thead>
                  <tbody>`;
      product.cart.forEach((item) => {
        cartItems += `
                      <tr>
                        <td>
                            <div class="removeItem percenter100 text-center" id="${
                              item.id
                            }"><span class="material-symbols-outlined">close</span></div>
                        </td>
                       
                        <td class="percenter100">
                            <div class="percenter100 text-center">
                                <p class="cart_item_name fw-light text-center">${
                                  item.name
                                } (${item.category})</p>
                            </div>
                        </td>
                        <td>
                            <div class="percenter100 text-center">
                                <p class="fw-light text-center"><span class="text-center">${
                                  item.price
                                }</span></p>
                            </div>

                        </td>
                        <td>
                            <div class="quantity percenter100 text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-success increase" id="${
                                      item.id
                                    }">+</button>
                                    <button type="button" class="btn btn-outline-danger decrease" id="${
                                      item.id
                                    }">-</button>
                                    <button type="button" class="btn btn-outline-primary disabled">${
                                      item.qty
                                    }</button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="percenter100 text-center"> <span class="fw-light">
                            ${item.qty * item.price}</span></div>
                        </td>
                    </tr>
                                `;
      });
      cartItems += `
                            
                            </tbody>
                        </table>
                        
                    </div>
                    </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-light">Cart totals</h5>
                        <table class="table .table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="percenter100 text-center">Subtotal</div>
                                    </td>
                                    <td>
                                        <div class="removeItem percenter100 text-center">"\u20A6" ${
                                          product.totalinCart
                                        }</div>
                                    </td>
                                </tr>                              
                               
                                <tr>
                                    <td>
                                        <div class="percenter100 fw-bold text-center">Total</div>
                                    </td>
                                    <td>
                                        <div class="removeItem percenter100 subtotal_amount text-center">"\u20A6" ${product.totalinCart.toLocaleString()}</div>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <div class="d-grid gap-2">
                            <a href="auth/login.php" class="btn btn-success customBtn" type="button">Checkout \u20A6 ${product.totalBill.toLocaleString()}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
    } else {
      cartItems = `
            <div class="EmptyCart">
                <i class="fa fa-shopping-cart"></i>
                <p class="text-center">Cart is Empty</p>  
                <a href="menu.php" class="mybtn btn-black customBtn">ORDER NOW</a>
            </div>
        `;
    }

    this.appendToDash(".cartInner", cartItems);
    const increase = document.getElementsByClassName("increase");
    for (let i = 0; i < increase.length; i++) {
      increase[i].addEventListener("click", () => {
        let id = increase[i].getAttribute("id");
        product.increaseQty(id);
      });
    }
    const decrease = document.getElementsByClassName("decrease");
    for (let i = 0; i < decrease.length; i++) {
      decrease[i].addEventListener("click", () => {
        let id = decrease[i].getAttribute("id");
        product.decreaseQty(id);
      });
    }

    let removeItem = document.getElementsByClassName("removeItem");
    for (let i = 0; i < removeItem.length; i++) {
      removeItem[i].addEventListener("click", () => {
        let id = removeItem[i].getAttribute("id");
        product.removeCartItem(id);
        this.loadCartPanel();
      });
    }
  }

  Invoice() {
    let display = "";
    if (product.cart.length > 0) {
      display += `
        <div class="row">
        <div class="col-sm-12">
            <div class="table_cont">
            <div class="scrollTable">
                <table class="table table-striped " style="min-width: 100%">
                    <thead>
                        <tr>                            
                            <th scope="col" class="text-center removeOnMobile">#</th>
                            <th scope="col" class="text-center">Description</th>                           
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-center">Amount</th>
                            
                      </tr>                     
                    </thead>
                    <tbody>`;
      product.cart.forEach((item) => {
        display += `
                        <tr>
                            <th scope="row" class="removeOnMobile"> <div class="text-center check"><span class="material-symbols-outlined">check_circle</span></div></th>
                            <td class="text-center">${item.name.toUpperCase()}</td>
                            <td class="text-center price">${item.price.toFixed(
                              2
                            )}</td>
                            <td class="text-center">${item.qty}</td>
                            <td class="text-center">${(
                              item.qty * item.price
                            ).toFixed(2)}</td>
                        </tr>
                    `;
      });
      display += `
                              
                    </tbody>
                </table>
                </div>
                          
            </div>
                      <div class="summary-invoice">
                       <div class="summary-inner">
                            <div class="item">
                                <p>Subtotal</p>
                                <p>${product.totalinCart}</p>
                            </div>
                            <div class="item">
                                <p>Processing fee</p>
                                <p>${product.serviceCharge.toFixed(2)}</p>
                            </div>
                            <div class="item">
                                <p class="price">Delivery fee</p>
                                <p class="price">${product.deliveryPrice.toFixed(
                                  2
                                )}</p>
                            </div>
                            <hr>
                            <div class="item">
                                <p class="gTotal">Grand Total</p>
                                <p class="gTotal price">"\u20A6" ${product.totalBill.toLocaleString()}</p>
                            </div>
                            <input type="hidden" name="totalBill" id="totalBill" value=" ${
                              product.totalBill
                            }" />
                            <input type="hidden" name="deliveryType" id="deliveryType" value=" ${
                              product.deliveryType
                            }" />
                            <div class="d-grid gap-2">
                                <button class="btn btn-success customBtn" id="payFormBtn" type="button" onclick="payWithPaystack()">PAYMENT</button>
                            </div>
                            <div class="spinner"></div>
                            <div class="serverFeedback"></div>
                       </div>
                      </div>
                    </div>
                </div>`;
    } else {
      display = `
            <p>Cart is empty</p>
        `;
    }
    this.appendToDash(".InvoiceItems", display);
    const payFormBtn = document.querySelector("#payFormBtn");
    const payForm = document.querySelector("#payForm");
    if (payFormBtn) {
      payFormBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let fullname = document.querySelector("#fullname").value;
        let address = document.querySelector("#address").value;
        let email = document.querySelector("#email").value;
        let invoiceID = document.querySelector("#invoiceID").value;
        let totalBill = document.querySelector("#totalBill").value;
        let invoiceDate = document.querySelector("#invoiceDate").value;
        let phone = document.querySelector("#phone").value;
        let deliveryType = document.querySelector("#deliveryType").value;

        let orderDetails = localStorage.getItem("checkOutData") ? [] : [];
        orderDetails.push({
          fullname,
          address,
          phone,
          email,
          invoiceID,
          totalBill,
          invoiceDate,
          deliveryType,
        });
        localStorage.setItem("sender", JSON.stringify(orderDetails));
      });
    }
  }

  displayOrderDetail(response) {
    let display = "";
    if (typeof response == "object") {
      response.forEach((item) => {
        display += `
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th></th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>

                    <tr>                  
                        <td>
                            Reference
                            
                        </td>
                        <td class="removeItem">
                             ${item.payRef}
                        </td>
                    </tr>
                    <tr>                  
                        <td>
                          Invoiced to
                            
                        </td>
                        <td class="removeItem">
                             ${item.customer}
                        </td>
                    </tr>
                    <tr>                  
                        <td>
                            Delivery                            
                        </td>
                        <td class="removeItem">
                             ${item.delivery}
                        </td>
                    </tr>                    
                    <tr>                  
                        <td>
                        Date                            
                        </td>
                        <td class="removeItem">
                             ${item.order_date}
                        </td>
                    </tr>                  
                   
                         
                  </tbody>
                </table>
              `;
      });
    } else {
      display += `
                <div class="">
                  <p class="text-center sub_header" style="color:red"> ${response}</p>
                </div>
                `;
    }

    this.appendToDash(".displayOrderDetail", display);
  }

  displayProductDropDown(response, className) {
    let display = "";
    let status = "";
    if (response.length > 3) {
      status = "showScrollDisplay";
    }
    if (typeof response == "object") {
      display += `    
          <div class="card">
            <div class="serverFeedback addToCartMsg"></div>
            <div class="spinner"></div>
              <div class="scrollDisplay ${status} scrollDisplayUp animate__animated animate__pulse animate__faster animate__infinite hide_on_mobile">
                  <span class="material-symbols-outlined">
                      expand_less
                  </span>
              </div>
              <div class="card-body productContain">
                            `;
      response.forEach((item) => {
        display += `
                 
                    <div class="productFlex2">
                        <div class="prodDetails">
                            <h5 class="productname">${item.productName.toUpperCase()}</h5>
                            <p class="size">${item.size.toUpperCase()}</p>
                            <p class="price">"\u20A6" ${Number(
                              item.price
                            ).toLocaleString(2)}</p>
                        </div>
                        <div class="prodButton">
                        <button class="btn btn-danger btn-sm" onclick="product.addToCart(${
                          item.id
                        },${item.price},'${item.productName}','${
          item.category
        }','${item.size}')">
                                Add To Cart
                            </button>
                        </div>
                    </div>
           
                
                            `;
      });
      display += ` 
              </div>                        
            <div class="scrollDisplay ${status} scrollDisplayDown animate__animated animate__pulse animate__faster animate__infinite hide_on_mobile">
            <span class="material-symbols-outlined">
            expand_more
            </span>
        </div>
      </div>
         
    `;
    } else {
      display = ` <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="fw-light">Product is not available at the moment</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
    `;
    }

    this.appendToDash(className, display);
  }
}

const appview = new ApplicationView();
