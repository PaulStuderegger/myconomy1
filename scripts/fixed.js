window.onload = function() {
  let new_entry = document.getElementById("new_entry");
  let new_entry_cancel = document.getElementById("cancel");
  let new_entry_form = document.getElementById("new_entry_form");
  let new_balance_amount = document.getElementById("balanceamount");
  new_entry.addEventListener("click", function () {
    new_entry_form.style.display = "block";
  });
  new_entry_cancel.addEventListener("click", function () {
    new_entry_form.style.display = "none";
  });
  new_balance_amount.addEventListener("click", function () {
    if (balance > 0) {
      balanceElement.style.color = "green";
    } else if (balance < 0) {
        balanceElement.style.color = "red";
    } else {
        balanceElement.style.color = "black"; // Assuming zero balance should be displayed in black
    }
  });
};
