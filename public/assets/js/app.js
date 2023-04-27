let cartItems = [];

cartItems[1] = { id: 1, quantity: 1, price: 5.55, name: "Good Cod!" };
//cartItems[2] = { "id": 2, "quantity": 1, 'price': 5.55, 'name': 'Billingsgate Haddock' };
//cartItems[3] = { "id": 3, "quantity": 1, 'price': 5.55, 'name': 'Grandma\'s Favourite Plaice' };
//cartItems[4] = { "id": 4, "quantity": 1, 'price': 5.55, 'name': 'Rock On' };

var App = (function () {
  var loadSlider = function () {
    var TestimonialSlider = $(".testimonial-slider");

    if (TestimonialSlider.length > 0) {
      TestimonialSlider.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        items: 1,
        autoWidth: true,
        responsive: {
          768: {
            items: 3,
            nav: true,
            autoWidth: false,
          },
          1000: {
            items: 4,
            nav: true,
            autoWidth: false,
          },
        },
      });
    }
  };

  return {
    init: function () {
      loadSlider();
    },
  };
})();



$(document).ready(function () {
  App.init();
});

/* custom programming by rigic */
$(document).ready(function () {
  /*registration form validation */
  $("#registeraccount").validate({
    rules: {
      fullname: "required",
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6,
      },
      confirmpassword: {
        minlength: 6,
        required: true,
        equalTo: "#registerpassword",
      },
    },
    submitHandler: function (form) {
      //set the button text
      $("#btncreateaccount").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btncreateaccount").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/register",
        data: {
          name: $("#registerfirstname").val(),
          email: $("#registeremail").val(),
          password: $("#registerpassword").val(),
        },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btncreateaccount").html("Create Account");
            $("#btncreateaccount").prop("disabled", false);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btncreateaccount").html("Create Account");
            $("#btncreateaccount").prop("disabled", false);
            $("#CreateAccountModel").modal("hide");
            $("#VerifyEmailModel").modal("show");
            //VerifyEmailModel show
          },
        },
      });
      //alert($('#registeraccount').serialize());
      //ajax call
      return false;
    },
  });

  /* forgot password validation */
  $("#forgotpassword").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
    },
    submitHandler: function (form) {
      //set the button text
      $("#btnforgotpassword").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btnforgotpassword").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/forget-password",
        data: { email: $("#resetemail").val() },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnforgotpassword").html("Reset Password");
            $("#btnforgotpassword").prop("disabled", false);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnforgotpassword").html("Reset Password");
            $("#btnforgotpassword").prop("disabled", false);
            $("#forgorpasswordModel").modal("hide");
            $("#forgorpasswordEmailModel").modal("show");
            //VerifyEmailModel show
          },
        },
      });
      //alert($('#registeraccount').serialize());
      //ajax call
      return false;
    },
  });

  /* login */
  /* forgot password validation */
  $("#loginfrm").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: "required",
    },
    submitHandler: function (form) {
      //set the button text
      $("#btnlogin").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btnlogin").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/login",
        data: {
          email: $("#loginemail").val(),
          password: $("#loginpassword").val(),
        },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            $(".login-error").show();
            $("#btnlogin").html("Login");
            $("#btnlogin").prop("disabled", false);
            setTimeout(function () {
              $(".login-error").hide();
            }, 5000);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnlogin").html("Login");
            $("#btnlogin").prop("disabled", false);
            $("#btnlogin").modal("hide");
            window.location.href = "/my-account";
          },
          423: function () {
            $(".login-error-verify").show();
            $("#btnlogin").html("Login");
            $("#btnlogin").prop("disabled", false);
            setTimeout(function () {
              $(".login-error-verify").hide();
            }, 5000);
          },
        },
      });
      //alert($('#registeraccount').serialize());
      //ajax call
      return false;
    },
  });

  /* my account change name */
  $("#frmchangename").validate({
    rules: {
      fullname: "required",
    },
    submitHandler: function (form) {
      //set the button text
      $("#btnchangename").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btnchangename").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/my-account/changename",
        data: { name: $("#fullname").val() },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangename").html("Save");
            $("#btnchangename").prop("disabled", false);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangename").html("Save");
            $("#btnchangename").prop("disabled", false);
            $("#changeNameModel").modal("hide");
            window.location.reload();
            //VerifyEmailModel show
          },
        },
      });
      //alert($('#registeraccount').serialize());
      //ajax call
      return false;
    },
  });

  /* my account change password */
  $("#frmchangepassword").validate({
    rules: {
      oldpassword: "required",
      newpassword: {
        required: true,
        minlength: 6,
      },
      confirmpassword: {
        minlength: 6,
        required: true,
        equalTo: "#changenewpassword",
      },
    },
    submitHandler: function (form) {
      //set the button text
      $("#btnchangepassword").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btnchangepassword").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/my-account/changepassword",
        data: {
          oldpassword: $("#oldpassword").val(),
          newpassword: $("#changenewpassword").val(),
          confirmpassword: $("#changeconfirmpassword").val(),
        },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangepassword").html("Save");
            $("#btnchangepassword").prop("disabled", false);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangepassword").html("Save");
            $("#btnchangepassword").prop("disabled", false);
            $("#changePasswordModel").modal("hide");
            //window.location.reload();
            //VerifyEmailModel show
          },
        },
      });
      //alert($('#registeraccount').serialize());
      //ajax call
      return false;
    },
  });

  /* my account Support Create Ticket */
  $("#frmcreateticketname").validate({
    rules: {
      subject: "required",
    },
    submitHandler: function (form) {
      //set the button text
      $("#btncreateticket").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btncreateticket").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/my-account/createticket",
        data: {
          subject: $("#subject").val(),
          description: $("#description").val(),
        },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btncreateticket").html("Save");
            $("#btncreateticket").prop("disabled", false);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btncreateticket").html("Save");
            $("#btncreateticket").prop("disabled", false);
            $("#newTicketModel").modal("hide");
            window.location.reload();
            //VerifyEmailModel show
          },
        },
      });
      //alert($('#registeraccount').serialize());
      //ajax call
      return false;
    },
  });

  $("#shippingcountry").select2({
    dropdownParent: $("#change-shippingadd"),
  });
  $("#billingcountry").select2({
    dropdownParent: $("#change-billingadd"),
  });

  /* shipping change */

  /*Shipping form validation */
  $("#frmshipping").validate({
    rules: {
      fullname: "required",
      phonenumber: "required",
      address1: "required",
      country: "required",
      state: "required",
      city: "required",
      postalcode: "required",
    },
    submitHandler: function (form) {
      //set the button text
      $("#btnchangeshipping").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btnchangeshipping").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/my-account/changeshippingaddress",
        data: {
          fullname: $("#shippingfullname").val(),
          phonenumber: $("#shippingphonenumber").val(),
          address1: $("#shippingaddress1").val(),
          address2: $("#shippingaddress2").val(),
          country: $("#shippingcountry").val(),
          state: $("#shippingstate").val(),
          city: $("#shippingcity").val(),
          postalcode: $("#shippingpostalcode").val(),
        },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangeshipping").html("Save");
            $("#btnchangeshipping").prop("disabled", false);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangeshipping").html("Create Account");
            $("#btnchangeshipping").prop("disabled", false);
            $("#change-shippingadd").modal("hide");
            window.location.reload();
          },
        },
      });
      return false;
    },
  });
  // frmbilling validation
  $("#frmbilling").validate({
    rules: {
      fullname: "required",
      phonenumber: "required",
      address1: "required",
      country: "required",
      state: "required",
      city: "required",
      postalcode: "required",
    },
    submitHandler: function (form) {
      //set the button text
      $("#btnchangebilling").html('<i class="fa fa-refresh fa-spin"></i>');
      $("#btnchangebilling").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $.ajax({
        url: ajaxCallURL + "/my-account/changebillingaddress",
        data: {
          fullname: $("#billingfullname").val(),
          phonenumber: $("#billingphonenumber").val(),
          address1: $("#billingaddress1").val(),
          address2: $("#billingaddress2").val(),
          country: $("#billingcountry").val(),
          state: $("#billingstate").val(),
          city: $("#billingcity").val(),
          postalcode: $("#billingpostalcode").val(),
        },
        method: "POST",
        dataType: "json",
        headers: {
          Accept: "application/json",
        },
        statusCode: {
          422: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangebilling").html("Save");
            $("#btnchangebilling").prop("disabled", false);
          },
          200: function (responseObject, textStatus, jqXHR) {
            console.log("object", responseObject.responseJSON);
            $("#btnchangebilling").html("Create Account");
            $("#btnchangebilling").prop("disabled", false);
            $("#change-billingadd").modal("hide");
            window.location.reload();
          },
        },
      });
      return false;
    },
  });

  /* forgot password validation */
});

$('.company-logo-slider').owlCarousel({
  loop: true,
  responsiveClass: true,
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
      nav: true
    },
    600: {
      items: 3,
      nav: false
    },
    1000: {
      items: 4,
      nav: true,
      loop: false
    }
  }
})
