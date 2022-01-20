// AJAX
/* 
let keyword = document.querySelector("#keyword");
let searchBtn = document.querySelector("#search-btn");
let container = document.querySelector("#container");

keyword.addEventListener("keyup", function () {
  // set AJAX
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", `ajax/siswa.php?keyword=${keyword.value}`, true);
  xhr.send();
}); */

// JQUERY
$(document).ready(function () {
  // hide search-btn
  if ($("#search-btn").is(":visible")) {
    $("#search-btn").hide();
  }

  // event keyword
  $("#keyword").on("keyup", function () {
    // show loader
    if (!$(".loader").is(":visible")) {
      $(".loader").show();
    }
    // $("#container").load("ajax/siswa.php?keyword=" + $("#keyword").val());
    $.get("ajax/siswa.php?keyword=" + $("#keyword").val(), function (data) {
      $("#container").html(data);
      if ($(".loader").is(":visible")) {
        $(".loader").hide();
      }
    });
  });
});
