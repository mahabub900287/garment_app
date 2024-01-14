(function ($) {
  ("use strict");

  /*========================================
       modal show
      ========================================*/
  $(window).on("load", function () {
    $("#exampleModal").modal("show");
  });

  /*========================================
            Preloader
        ========================================*/

  $(window).on("load", function () {
    $(".ic-loading").fadeOut(500);
  });
  /*========================================
      Ic Mobile menu activation
     ========================================*/

  $(".ic-mobile-menu-open,.ic-mobile-menu-overlay").on("click", function () {
    $(".ic-mobile-menu-warper,.ic-mobile-menu-overlay").addClass("active");
  });

  $(".ic-menu-close,.ic-mobile-menu-overlay").on("click", function () {
    $(".ic-mobile-menu-warper,.ic-mobile-menu-overlay").removeClass("active");
  });

  /*========================================
     Scroll  top
    ========================================*/
  if ($(window).width() < 1200) {
    $(".mega-link").on("click", function () {
      handleOnClick($(this));
    })
  } else {
    $(".mega-link").hover(function () {
      handleOnHover($(this));
    })
  }

  function handleOnClick(element) {
    $(".mega-link").removeClass("active");
    element.addClass("active");
    const id = element.attr("data-link");
    $(".ic-mega-menu-items").hide();
    $(`#${id}`).show();
  }

  function handleOnHover(element) {
    $(".mega-link").removeClass("active");
    element.addClass("active");
    const id = element.attr("data-link");
    $(".ic-mega-menu-items").hide();
    $(`#${id}`).show();
  }

  /*========================================
     Scroll  top
    ========================================*/

  var scrollTop = $(".ic-scroll-top");
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      scrollTop.css({
        bottom: "4%",
        opacity: "1",
        transition: "all .5s ease-in-out",
      });
    } else {
      scrollTop.css({
        bottom: "-5%",
        opacity: "0",
        transition: "all .5s ease-in-out",
      });
    }
  });
  scrollTop.on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      0
    );
    return false;
  });
  /*========================================
   category toggle
   ========================================*/
  $(".ic-shop-by-categories-link").on("click", function () {
    $(".shop-by-categories-dropdown").slideToggle("slow");
  });
  /*========================================
     banner slider
     ========================================*/
  $(".ic-banner-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1000,
    // fade: !0,
    cssEase: "linear",
    autoplay: true,
    autoplaySpeed: 8000,
    dots: true,
    arrows: false,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="ri-arrow-right-s-line"></i></button>',
  });
  /*========================================
     banner slider
     ========================================*/
  $("#icPopularSlider").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    rows: 3,
    speed: 1000,
    // fade: !0,
    cssEase: "linear",
    autoplay: true,
    autoplaySpeed: 8000,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="ri-arrow-right-s-line"></i></button>',
    responsive: [
      {
        breakpoint: 480,
        settings: {
          // responsive options
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 481,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 1366,
        settings: {
          // responsive options
          slidesToShow: 5,
        },
      },
    ],
  });

  // ====== Top deal slider =========////
  $("#icTopDealSlider").slick({
    slidesToShow: 6,
    slidesToScroll: 1,

    speed: 500,
    // fade: !0,
    cssEase: "linear",
    autoplay: true,
    autoplaySpeed: 8000,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="ri-arrow-right-s-line"></i></button>',
    responsive: [
      {
        breakpoint: 480,
        settings: {
          // responsive options
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 481,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 1366,
        settings: {
          // responsive options
          slidesToShow: 5,
        },
      },
    ],
  });

  $("#icCashSlider").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    speed: 1000,
    // fade: !0,
    cssEase: "linear",
    autoplay: true,
    autoplaySpeed: 8000,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="ri-arrow-right-s-line"></i></button>',
    responsive: [
      {
        breakpoint: 480,
        settings: {
          // responsive options
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 481,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 1366,
        settings: {
          // responsive options
          slidesToShow: 5,
        },
      },
    ],
  });
  /*========================================
     categories 
     ========================================*/
  $(".ic-top-categories-slider").slick({
    slidesToShow: 8,
    slidesToScroll: 1,
    rows: 2,
    speed: 1000,
    // fade: !0,
    cssEase: "linear",
    autoplay: true,
    autoplaySpeed: 8000,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="ri-arrow-right-s-line"></i></button>',
    responsive: [
      {
        breakpoint: 480,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 481,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 1400,
        settings: {
          // responsive options
          slidesToShow: 7,
        },
      },
    ],
  });

  // scroll to add active class
  function updateActiveMenuItem() {
    var scroll = $(window).scrollTop();
    var sections = $(".ic-blog-items-wrap");

    sections.each(function () {
      var sectionTop = $(this).offset().top - 120;
      var sectionBottom = sectionTop + $(this).outerHeight();
      if (scroll >= sectionTop && scroll < sectionBottom) {
        var targetId = $(this).attr("id");
        $(".ic-blog-cat-menu li a").removeClass("active");
        $(".ic-blog-cat-menu li a[href='#" + targetId + "']").addClass("active");
      }
    });
  }

  // Scroll event handler
  $(window).scroll(function () {
    var sticky = $(".ic-blog-cat-menu");
    var scroll = $(window).scrollTop();

    if (scroll >= 600) {
      sticky.addClass("fixed");
    } else {
      sticky.removeClass("fixed");
    }

    updateActiveMenuItem();
  });

  $('a[href^="#"]').on("click", function () {
    $(".ic-blog-cat-menu li a").removeClass("active");
    $(this).addClass("active");
  });

  $(".ic-blog-cat-menu li a").on("click", function (event) {
    var target = $(this.getAttribute("href"));
    if (target.length) {
      event.preventDefault();
      $("html, body").stop().animate(
        {
          scrollTop: target.offset().top - 100,
        },
        200,
        function () {
          // Call the function to update the active menu item after scrolling is complete
          updateActiveMenuItem();
        }
      );
    }
  });


  // arrow js
  const element = document.querySelector(".ic-categories-menus");
  if (element) {
    const left = document.querySelector(".ic-left-arrow");
    const right = document.querySelector(".ic-right-arrow");

    if (element.scrollWidth > element.clientWidth) {
      left.style.display = "block";
      right.style.display = "block";
    }

    left.addEventListener("click", function () {
      element.scrollBy(-50, 0);
    });

    right.addEventListener("click", function () {
      element.scrollBy(50, 0);
    });
  }

  $(".ic-blog-cat-menu .mobile").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="ri-arrow-right-s-line"></i></button>',
    responsive: [
      {
        breakpoint: 380,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 480,
        settings: {
          // responsive options
          slidesToShow: 4,
        },
      },

      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 6,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 7,
        },
      },
      {
        breakpoint: 1400,
        settings: {
          // responsive options
          slidesToShow: 8,
        },
      },
    ],
  });

  /* ======================
  Latest review card slider
  ===========================*/

  $(".ic-slide-card-area").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 500,
    cssEase: "linear",
    autoplay: false,
    autoplaySpeed: 2000,
    dots: false,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="ri-arrow-right-s-line"></i></button>',
  });
  /* ======================
    Blog-details-footer-slider
  ===========================*/

  $(".ic-blog-details-footer-slider").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    speed: 500,
    cssEase: "linear",
    autoplay: false,
    autoplaySpeed: 2000,
    dots: false,
    arrows: false,

    responsive: [
      {
        breakpoint: 575,
        settings: {
          // responsive options
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 4,
        },
      },
    ],
  });

  /* ======================
  Sidebar toggle 
  ======================*/
  $('.ic-collapse-btn').on("click", function () {
    console.log('click');
    $(".ic-blog-details-right-side").toggleClass("active");
  });

  // ==== Reply modal ========
  // $('.ic-reply-btn').on("click", function () {
  //   console.log('click');
  //   $(".reply-modal").addClass("show");
  // });
  // $('.reply-modal-close-btn').on("click", function () {
  //   console.log('click');
  //   $(".reply-modal").removeClass("show");
  // });


  // ====== Top deals slider ======
  $(".top-deals-slider").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    speed: 500,
    cssEase: "linear",
    autoplay: false,
    autoplaySpeed: 2000,
    dots: false,
    rows: 2,
    arrows: true,
    prevArrow:
      '<button class="slide-arrow slick-prev"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow slick-next"><i class="ri-arrow-right-s-line"></i></button>',

    responsive: [
      {
        breakpoint: 480,
        settings: {
          // responsive options
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 4,
        },
      },
    ],
  })

  // ======= Best Value deals =======
  $(".best-velue-slider").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    speed: 500,
    cssEase: "linear",
    autoplay: false,
    autoplaySpeed: 2000,
    dots: false,
    arrows: true,
    prevArrow:
      '<button class="slide-arrow slick-prev"><i class="ri-arrow-left-s-line"></i></button>',
    nextArrow:
      '<button class="slide-arrow slick-next"><i class="ri-arrow-right-s-line"></i></button>',

    responsive: [
      {
        breakpoint: 480,
        settings: {
          // responsive options
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          // responsive options
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          // responsive options
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1199,
        settings: {
          // responsive options
          slidesToShow: 4,
        },
      },
    ],
  });

  // ===== user dropdownn toggle =====

  // $('.ic-user-profile-btn').on("click", function () {
  //   console.log('click');
  //   $('.ic-user-dropdown').toggleClass("active");

  // });


  $('.ic-action-btn').on("click", function () {
    console.log('click');
    $(this).next().toggleClass("active");

  });

  //  pricing switch
  $('.pricing-switch').on('click', function () {
    if ($(this).is(':checked')) {
      $(this).closest('.switch-btn').find('.all-time').addClass('active');
      $(this).closest('.switch-btn').find('.seven-days').removeClass('active');


    } else {
      $(this).closest('.switch-btn').find('.all-time').removeClass('active');
      $(this).closest('.switch-btn').find('.seven-days').addClass('active');

    }
  });


})(jQuery);
