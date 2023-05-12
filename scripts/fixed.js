window.onload = function() {
  let new_entry = document.getElementById("new_entry");
  let new_entry_cancel = document.getElementById("cancel");
  let new_entry_form = document.getElementById("new_entry_form");
  new_entry.addEventListener("click", function () {
    new_entry_form.style.display = "block";
  });
  new_entry_cancel.addEventListener("click", function () {
    new_entry_form.style.display = "none";
  });
};