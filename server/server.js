class Server {
  constructor() {}

  alerts(flag, responseMsg) {
    let feedbackMsg = document.querySelector(".serverFeedback");
    if (flag == "s") {
      feedbackMsg.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
         <p class="fw-light">${responseMsg}.</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
    } else {
      feedbackMsg.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p class="fw-light">${responseMsg}.</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
    }
  }

  //Fetch Data
  fetchData = async (url) => {
    loadProgressBar();
    let spinner = document.querySelector(".spinner");
    spinner.innerHTML = `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
      <span class="visually-hidden">Loading...</span>`;
    let response = await axios.get(url);
    spinner.innerHTML = "";
    return response.data;
  };

  //Post Data
  postData = async (url, data) => {
    loadProgressBar();
    let spinner = document.querySelector(".spinner");
    spinner.innerHTML = `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
      <span class="visually-hidden">Loading...</span>`;
    let response = await axios.post(url, data);
    spinner.innerHTML = "";
    return response.data;
  };

  //Update Data
  updateData = async (url) => {
    loadProgressBar();
    let spinner = document.querySelector(".spinner");
    spinner.innerHTML = `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
      <span class="visually-hidden">Loading...</span>`;
    let response = await axios.put(url);
    spinner.innerHTML = "";
    return response.data;
  };

  //Delete Data
  deleteData = async (url) => {
    loadProgressBar();
    let spinner = document.querySelector(".spinner");
    spinner.innerHTML = `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
      <span class="visually-hidden">Loading...</span>`;
    let response = await axios.delete(url);
    spinner.innerHTML = "";
    return response.data;
  };

  getProductCategory(id) {
    let alertMsg = "";
    let displayPizza = document.querySelector(".displayPizza");
    let displayShawarma = document.querySelector(".displayShawarma");
    let displayDrinks = document.querySelector(".displayDrinks");
    let display = document.getElementsByClassName("dropDownProduct");
    let spinner = document.getElementsByClassName("spinner");
    for (let i = 0; i < display.length; i++) {
      display[i].classList.remove("showdropDownProduct");
    }

    this.fetchData("Models/appModel.php?getProduct=" + id).then(
      (response) => {
        if (id == "PIZZA") {
          appview.displayProductDropDown(response, ".displayPizza");
          displayPizza.classList.add("showdropDownProduct");
        } else if (id == "SHARWAMA") {
          appview.displayProductDropDown(response, ".displayShawarma");
          displayShawarma.classList.add("showdropDownProduct");
        } else {
          appview.displayProductDropDown(response, ".displayDrinks");
          displayDrinks.classList.add("showdropDownProduct");
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  loginAttempt(data) {
    let alertMsg = "";
    this.postData("../Models/authModel.php?login", data).then(
      (response) => {
        if (response == "0") {
          alertMsg =
            "Account not found. Please <a href='signup.php'>sign up</a> here.";
          this.alerts("d", alertMsg);
        } else if (response == "1") {
          alertMsg = "Welcome back!";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Continue with checkout";
          this.alerts("s", alertMsg);
          setTimeout(() => {
            location.href = "../checkout.php";
          }, 1000);
        } else if (response == "a") {
          location.href = "../admin/index.php";
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = `Network unavailable at the moment`;
        this.alerts("d", alertMsg);
      }
    );
  }

  signupUser(data) {
    let alertMsg = "";
    this.postData("../Models/authModel.php?signup", data).then(
      (response) => {
        if (response == "0") {
          alertMsg = "Sign up failed. Try again later or call: 0805 5544 014";
          this.alerts("d", alertMsg);
        } else if (response == "1") {
          alertMsg = "Welcome back! ";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Welcome back! continue with checkout";
          this.alerts("s", alertMsg);
          setTimeout(() => {
            location.href = "../checkout.php";
          }, 1000);
        } else if (response == "3") {
          alertMsg = "User already exists";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  uploadOrder(order, cart) {
    let alertMsg = "";
    this.fetchData(
      "Models/appModel.php?uploadOrder=" + order + "&cart=" + cart
    ).then(
      (response) => {
        if (typeof response == "object") {
          appview.displayOrderDetail(response);
        } else if (response == "0") {
          alertMsg = "Order submission failed";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  trackOrder(data) {
    let alertMsg = "";
    this.postData("Models/appModel.php?track", data).then(
      (response) => {
        if (response == "0") {
          alertMsg = "Your order is not yet ready. We are working on it.";
          this.alerts("d", alertMsg);
        } else if (response == "1") {
          alertMsg =
            "Your order is ready and will get to you soon. Thanks for your patience";
          this.alerts("s", alertMsg);
        } else if (response == "3") {
          alertMsg = "Order number does not exist";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  deleteCustomer(id) {
    let alertMsg = "";
    this.deleteData("../Models/adminModel.php?deleteCustomer=" + id).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Customer deleted. Refresh page";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Customer failed to delete. Contact administrator";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  deleteProduct(id) {
    let alertMsg = "";
    this.deleteData("../Models/adminModel.php?deleteProduct=" + id).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Product deleted. Refresh page";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Product failed to delete. Contact administrator";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  newProduct(data) {
    let alertMsg = "";
    this.postData("../Models/adminModel.php?newProduct", data).then(
      (response) => {
        if (response == "1") {
          alertMsg = "New Product Saved.";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "New product failed to save";
          this.alerts("d", alertMsg);
        } else if (response == "3") {
          alertMsg = "Product with same code already exist. Try again";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  editProduct(data) {
    let alertMsg = "";
    this.postData("../Models/adminModel.php?editProduct", data).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Updated Product Saved.";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "product update failed to save";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }
  readyOrder(id) {
    let alertMsg = "";
    this.updateData("../Models/adminModel.php?readyOrder=" + id).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Order status changed to ready. Refresh page";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Order status failed to change";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  deleteOrder(id) {
    let alertMsg = "";
    this.deleteData("../Models/adminModel.php?deleteOrder=" + id).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Order deleted. Refresh page";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Order failed to delete. Contact administrator";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  pendOrder(id) {
    let alertMsg = "";
    this.updateData("../Models/adminModel.php?pendOrder=" + id).then(
      (response) => {
        if (response == "1") {
          alertMsg =
            "Order status changed to <span  style='color:red'>'Not Ready'</span>. Refresh page";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Order status failed to change";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  saveZone(data) {
    let alertMsg = "";
    this.postData("../Models/adminModel.php?saveZone", data).then(
      (response) => {
        if (response == "1") {
          alertMsg = "New zone Saved.";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "New zone failed to save";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  editZone(data) {
    let alertMsg = "";
    this.postData("../Models/adminModel.php?editZone", data).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Zone edited successfully";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Zone failed to edit";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  deleteZone(id) {
    let alertMsg = "";
    this.deleteData("../Models/adminModel.php?deleteZone=" + id).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Zone deleted. Refresh page";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Zone failed to delete. Contact administrator";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }

  saveAdmin(data) {
    let alertMsg = "";
    this.postData("../Models/adminModel.php?saveAdmin", data).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Admin saved successfully";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Admin failed to save";
          this.alerts("d", alertMsg);
        } else if (response == "3") {
          alertMsg = "Admin already exists";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }
  editAdmin(data) {
    let alertMsg = "";
    this.postData("../Models/adminModel.php?editAdmin", data).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Admin update saved successfully";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Admin update failed to save";
          this.alerts("d", alertMsg);
        } else if (response == "3") {
          alertMsg = "Admin email already exists and cannot be used";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }
  deleteAdmin(id) {
    let alertMsg = "";
    this.deleteData("../Models/adminModel.php?deleteAdmin=" + id).then(
      (response) => {
        if (response == "1") {
          alertMsg = "Admin deleted. Refresh page";
          this.alerts("s", alertMsg);
        } else if (response == "2") {
          alertMsg = "Admin failed to delete. Contact administrator";
          this.alerts("d", alertMsg);
        } else {
          alertMsg = "Error:" + response;
          this.alerts("d", alertMsg);
        }
      },
      (error) => {
        alertMsg = "Network unavailable at the moment";
        this.alerts("d", alertMsg);
      }
    );
  }
}

const server = new Server();
