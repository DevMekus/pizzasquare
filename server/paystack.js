var paymentForm = document.getElementById("paymentForm");

if (paymentForm) {
  paymentForm.addEventListener("submit", payWithPaystack, false);
}

function payWithPaystack() {
  var handler = PaystackPop.setup({
    key: "pk_live_062d2833172c26d4cc06cb22ab17bd9c0d24f489", // Replace with your public key
    // key: "pk_test_c493010f516ea7041db5c1e13442e4edf5337b2e", // Replace with your public key
    email: document.getElementById("email").value,
    amount: document.getElementById("totalBill").value * 100,
    firstname: document.getElementById("fullname").value,
    ref: document.getElementById("invoiceID").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    currency: "NGN", // Use GHS for Ghana Cedis or USD for US Dollars

    callback: function (response) {
      //this happens after the payment is completed successfully
      let reference = response.reference;
      // alert("Payment complete! Reference: " + reference);
      window.location = "success.php";
      // Make an AJAX call to your server with the reference to verify the transaction
    },
    onClose: function () {
      alert("Transaction was not completed, window closed.");
    },
  });
  handler.openIframe();
}
