$(document).ready(function () {
  var url = window.location.href;

  $(".account-setting li a").removeClass("active");
  $(".account-setting li a").each(function () {
    if ($(this).prop("href") === url) {
      $(this).addClass("active");
      localStorage.setItem("activeLink", url);
    }
  });
  var activeLink = localStorage.getItem("activeLink");
  if (activeLink) {
    $('.account-setting li a[href="' + activeLink + '"]').addClass("active");
  }

 


});

// upload image
// const fileInput = document.getElementById("fileUpload");
// const imgElement = document.getElementById("userImg");

// fileInput.addEventListener("change", (event) => {
//   const file = event.target.files[0];
//   const reader = new FileReader();
//   reader.onload = function (e) {
//     imgElement.src = e.target.result;
//     localStorage.setItem("userImage", e.target.result);
//   };
//   reader.readAsDataURL(file);
// });

// if (localStorage.getItem("userImage")) {
//   imgElement.src = localStorage.getItem("userImage");
// }

