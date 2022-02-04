const searchUser = () => {
  let search_input = document
    .getElementById("search-input")
    .value.toUpperCase();
  let input = document.querySelectorAll(".row .mid h1");
  for (var i = 0; i < input.length; i++) {
    input = document
      .querySelectorAll(".row .mid h1")
      [i].textContent.toUpperCase();
    let row = document.getElementsByClassName("row");
    if (input.indexOf(search_input) > -1) row[i].style.display = "";
    else row[i].style.display = "none";
  }
};

const searchUserFromAll = () => {
  let search_input = document
    .getElementById("search-input")
    .value.toUpperCase();
  let input = document.querySelectorAll(".card .card-body h1");
  for (var i = 0; i < input.length; i++) {
    let row = document.getElementsByClassName("card");
    if (input[i].textContent.toUpperCase().indexOf(search_input) > -1) {
      row[i].style.display = "";
    } else {
      row[i].style.display = "none";
    }
  }
};

// Auto expand textarea
function getScrollHeight(elm) {
  var savedValue = elm.value;
  elm.value = "";
  elm._baseScrollHeight = elm.scrollHeight;
  elm.value = savedValue;
}

function onExpandableTextareaInput({ target: elm }) {
  if (!elm.classList.contains("autoExpand") || !elm.nodeName == "TEXTAREA")
    return;

  var minRows = elm.getAttribute("data-min-rows") | 0,
    rows;
  !elm._baseScrollHeight && getScrollHeight(elm);

  elm.rows = minRows;
  rows = Math.ceil((elm.scrollHeight - elm._baseScrollHeight) / 16);
  elm.rows = minRows + rows;
}

// global delegated event listener
document.addEventListener("input", onExpandableTextareaInput);
