const deleteCustomer = document.getElementsByClassName("deleteCustomer");
const deleteProduct = document.getElementsByClassName("deleteProduct");
const newProduct = document.querySelector(".newProduct");
const saveZone = document.querySelector(".saveZone");
const editZone = document.querySelector(".editZone");
const saveAdmin = document.querySelector(".saveAdmin");
const editAdmin = document.querySelector(".editAdmin");
const editProduct = document.querySelector(".editProduct");
const readyOrder = document.getElementsByClassName("readyOrder");
const deleteOrder = document.getElementsByClassName("deleteOrder");
const pendOrder = document.getElementsByClassName("pendOrder");
const deleteZone = document.getElementsByClassName("deleteZone");
const deleteAdmin = document.getElementsByClassName("deleteAdmin");

//Delete Customer
if (deleteCustomer) {
  for (let i = 0; i < deleteCustomer.length; i++) {
    deleteCustomer[i].addEventListener("click", () => {
      if (confirm("Do you wish to delete customer?")) {
        let id = deleteCustomer[i].getAttribute("id");
        server.deleteCustomer(id);
      }
    });
  }
}

//Delete product
if (deleteProduct) {
  for (let i = 0; i < deleteProduct.length; i++) {
    deleteProduct[i].addEventListener("click", () => {
      if (confirm("Do you wish to delete product?")) {
        let id = deleteProduct[i].getAttribute("id");
        server.deleteProduct(id);
      }
    });
  }
}

//Submit a new product
if (newProduct) {
  newProduct.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = new FormData(newProduct);
    if (confirm("Do you want to save product")) {
      server.newProduct(data);
    }
  });
}

//Edit product
if (editProduct) {
  editProduct.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = new FormData(editProduct);
    if (confirm("Do you want to edit product")) {
      server.editProduct(data);
    }
  });
}

//make Order Ready
if (readyOrder) {
  for (let i = 0; i < readyOrder.length; i++) {
    readyOrder[i].addEventListener("click", () => {
      if (confirm("Do you want to ready this order?")) {
        let id = readyOrder[i].getAttribute("id");
        server.readyOrder(id);
      }
    });
  }
}

//Delete Order
if (deleteOrder) {
  for (let i = 0; i < deleteOrder.length; i++) {
    deleteOrder[i].addEventListener("click", () => {
      if (confirm("Do you want to delete this order?")) {
        let id = deleteOrder[i].getAttribute("id");
        server.deleteOrder(id);
      }
    });
  }
}

//Pend Order
if (pendOrder) {
  for (let i = 0; i < pendOrder.length; i++) {
    pendOrder[i].addEventListener("click", () => {
      if (confirm("Do you want to pend this order?")) {
        let id = pendOrder[i].getAttribute("id");
        server.pendOrder(id);
      }
    });
  }
}

//Delete zone
if (deleteZone) {
  for (let i = 0; i < deleteZone.length; i++) {
    deleteZone[i].addEventListener("click", () => {
      if (confirm("Do you want to delete this zone?")) {
        let id = deleteZone[i].getAttribute("id");
        server.deleteZone(id);
      }
    });
  }
}

//Save a delievry zone
if (saveZone) {
  saveZone.addEventListener("submit", (e) => {
    e.preventDefault();
    if (confirm("Do you want to save this zone?")) {
      let data = new FormData(saveZone);
      server.saveZone(data);
    }
  });
}

//Edit a delievry zone
if (editZone) {
  editZone.addEventListener("submit", (e) => {
    e.preventDefault();
    if (confirm("Do you want to save changes?")) {
      let data = new FormData(editZone);
      server.editZone(data);
    }
  });
}

//save an admin
if (saveAdmin) {
  saveAdmin.addEventListener("submit", (e) => {
    e.preventDefault();
    if (confirm("Do you want to save admin?")) {
      let data = new FormData(saveAdmin);
      server.saveAdmin(data);
    }
  });
}

//edit an admin
if (editAdmin) {
  editAdmin.addEventListener("submit", (e) => {
    e.preventDefault();
    if (confirm("Do you want to save changes?")) {
      let data = new FormData(editAdmin);
      server.editAdmin(data);
    }
  });
}

//Delete admin
if (deleteAdmin) {
  for (let i = 0; i < deleteAdmin.length; i++) {
    deleteAdmin[i].addEventListener("click", () => {
      if (confirm("Do you want to delete this admin?")) {
        let id = deleteAdmin[i].getAttribute("id");
        server.deleteAdmin(id);
      }
    });
  }
}
