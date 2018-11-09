/*------- Page Loader -------*/

if ((".loader").length) {
  // show Preloader until the website ist loaded
  $(window).on('load', function () {
    $(".loader").fadeOut("slow");
  });
}

/*------- Smooth Scroll -------*/

$('a[href^="#"]').on('click', function (event) {

  var target = $($(this).attr('href'));

  if (target.length) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: target.offset().top
    }, 1000);
  }

});

/*------- Swiper Slider -------*/
var swiper = new Swiper('.swiper-container', {
  pagination: '.swiper-pagination',
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  paginationClickable: true,
  centeredSlides: true,
  autoplay: 3500,
  speed: 1500,
  loop: true,
  autoplayDisableOnInteraction: false
});

/* Istope Portfolio
-----------------------------------------------*/
$(document).ready(function ($) {

  if ($('.iso-box-wrapper').length > 0) {

    var $container = $('.iso-box-wrapper'),
      $imgs = $('.iso-box img');

    $container.imagesLoaded(function () {

      $container.isotope({
        layoutMode: 'fitRows',
        itemSelector: '.iso-box'
      });

      $imgs.load(function () {
        $container.isotope('reLayout');
      })

    });

    //filter items on button click

    $('.filter-wrapper li a').click(function () {

      var $this = $(this), filterValue = $this.attr('data-filter');

      $container.isotope({
        filter: filterValue,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false,
        }
      });

      // don't proceed if already selected 

      if ($this.hasClass('selected')) {
        return false;
      }

      var filter_wrapper = $this.closest('.filter-wrapper');
      filter_wrapper.find('.selected').removeClass('selected');
      $this.addClass('selected');

      return false;
    });

  }

});


var donationID = -1;
var hoveroninsidedog = false;

Dropzone.options.buktiupload = {
  maxFilesize: 500,
  autoProcessQueue: false,
  init: function () {

    var submitButton = document.querySelector("#submit-buktiprofile");
    myDropzone = this;

    submitButton.addEventListener("click", function () {

      /* Check if file is selected for upload */
      if(donationID == -1) {
        alert("pilih donasi yang anda ingin bayar!");
        return false;
      }
      if (myDropzone.getUploadingFiles().length === 0 && myDropzone.getQueuedFiles().length === 0) {
        alert('No file selected for upload');
        return false;
      }
      else {
        /* Remove event listener and start processing */
        myDropzone.removeEventListeners();
        myDropzone.processQueue();

      }
    });

    this.on("sending", function (file, xhr, formData) {
      var input = $("<input>")
        .attr("type", "hidden")
        .attr("name", "donationID").val(donationID);
      $('#buktiupload').append(input);
      console.log(input);
    });
    /* On Success, do whatever you want */
    this.on("success", function (file, responseText) {
      location.reload();
    });
  }
};

var donationID = -1;

function topdogtickle(value) {
  $("#donasiku").text("Donasi dengan pesan: " + $(value).parent().prev().prev().text());
  donationID = $(value).data("dog");
  $('.topdog').hide();
}

$('.insidedog').mouseover(function () {
  hoveroninsidedog = true;
  console.log("dogover", hoveroninsidedog);
});
$('.insidedog').mouseout(function () {
  hoveroninsidedog = false;
  console.log("dogout", hoveroninsidedog);
});

$('.topdog').hide();
$('#btn-pilihdonasi').click(function () {
  $('.topdog').show();
});
$('.topdog').click(function () {
  if (!hoveroninsidedog) {
    console.log("dogklik", hoveroninsidedog);
    $('.topdog').hide();
  }
});

function topdogtickle(value) {
  $("#donasiku").text("Donasi dengan pesan: " + $(value).parent().prev().prev().text());
  donationID = $(value).data("dog");
  $('.topdog').hide();
}

$('.insidedog').mouseover(function () {
  hoveroninsidedog = true;
  console.log("dogover", hoveroninsidedog);
});
$('.insidedog').mouseout(function () {
  hoveroninsidedog = false;
  console.log("dogout", hoveroninsidedog);
});

$('.topdog').hide();
$('#btn-pilihdonasi').click(function () {
  $('.topdog').show();
});
$('.topdog').click(function () {
  if (!hoveroninsidedog) {
    console.log("dogklik", hoveroninsidedog);
    $('.topdog').hide();
  }
});

