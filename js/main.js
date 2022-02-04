const alertHideBtns = document.querySelectorAll(".alert-hide");
alertHideBtns.forEach((alertHideBtn) => {
  alertHideBtn.addEventListener("click", () => {
    alertHideBtn.parentElement.style.display = "none";
  });
});

function handleExtraSpaces(text) {
  let newText = text.split(/[ ]+/);
  setText(newText.join(" "));
  return newText;
}

// jquery profile pic upload
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#imagePreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#imagePreview").hide();
      $("#imagePreview").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function () {
  readURL(this);
});

// show character left info
var text;
var characterLimit = 250;
const countCharcter = document.getElementById("count");
const textarea = document.getElementById("bio");
countCharcter.innerHTML = "You can add upto 250 characters";
textarea.addEventListener("input", function () {
  text = textarea.value;
  if (characterLimit - text.length == 250) {
    countCharcter.innerHTML = "You can add upto 250 characters";
  } else if (characterLimit - text.length == 1) {
    countCharcter.innerHTML = characterLimit - text.length + " Character left";
  } else if (characterLimit - text.length == 0) {
    countCharcter.innerHTML = "No more character can be added!";
  } else {
    countCharcter.innerHTML = characterLimit - text.length + " Characters left";
  }
});
