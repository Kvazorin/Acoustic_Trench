$(function () {
  function showCart(cart) {
    $("#cart-modal .modal-cart-content").html(cart);
    $("#cart-modal").modal();

    let cartQty = $("#modal-cart-qty").text() ? $("#modal-cart-qty").text() : 0;
    $(".mini-cart-qty").text(cartQty);
  }

  $(".add-to-cart").on("click", function (e) {
    e.preventDefault();
    let id = $(this).data("id");

    $.ajax({
      url: "cart.php",
      type: "GET",
      data: { cart: "add", id: id },
      dataType: "json",
      success: function (res) {
        if (res.code == "ok") {
          showCart(res.answer);
        } else {
          alert(res.answer);
        }
      },
      error: function () {
        alert("Error");
      },
    });
  });

  $("#get-cart").on("click", function (e) {
    e.preventDefault();

    $.ajax({
      url: "cart.php",
      type: "GET",
      data: { cart: "show" },
      success: function (res) {
        showCart(res);
      },
      error: function () {
        alert("Error");
      },
    });
  });

  $("#cart-modal .modal-cart-content").on("click", "#clear-cart", function () {
    $.ajax({
      url: "cart.php",
      type: "GET",
      data: { cart: "clear" },
      success: function (res) {
        showCart(res);
      },
      error: function () {
        alert("Error");
      },
    });
  });
});

//Slider - JS
$(".slider").slick({
  slidesToShow: 1,
  slidesToScroll: 3,
  autoplay: true,
  variableWidth: true,
  autoplaySpeed: 4500,
  infinite: true,
  centerMode: true,
  prevArrow: $(".slick-prev"),
  nextArrow: $(".slick-next"),
});
$(".slider-small").slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  draggable: true,
  autoplay: false,
  variableWidth: true,
  infinite: false,
  centerMode: false,
  dots: true,
  prevArrow: false,
  nextArrow: false,
  _responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
      },
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
    },
  ],
  get responsive() {
    return this._responsive;
  },
  set responsive(value) {
    this._responsive = value;
  },
});
