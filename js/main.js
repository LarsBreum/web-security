console.log("JS works");

//editing users as an admin
function hideElement(element) {
  console.log(element);
  element.classList.add("hidden");
}

function showElement(element) {
  element.classList.remove("hidden");
}

function changeUsername(element) {
  const name = element.textContent;
  // hideElement(element);
  if (name === "admin") {
    alert("Not allowed to change username of admin");
    return;
  }

  const parent = element.parentNode;

  const input = document.createElement("form");
  input.action = "changeUsername.php";
  input.method = "POST";
  input.innerHTML =
    "<input type='text' placeholder=' " +
    name +
    "' name='newUsername'><input type='text' name='oldUsername' value='" +
    name +
    "' class='hidden'>";

  parent.replaceChild(input, element);
}
