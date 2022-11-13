<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/style3.css'>
  
</head>
<body>
 
<div class="row">
  <section class="section">
    <header>
      <h3>Register</h3>
      <h4>Please fill your information bellow</h4>
    </header>
    <main>
      <form>
        <div class="form-item box-item">
          <input type="text" name="name" placeholder="Name" data-required>
          <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> required field</small>
        </div>
        <div class="form-item box-item">
          <input type="email" name="email" placeholder="Email" data-email data-required>
          <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> required field</small>
          <small class="errorEmail"><i class="fa fa-asterisk" aria-hidden="true"></i> email is not valid</small>
        </div>
        <div class="form-item box-item">
          <div class="form-item-triple">
            <div class="radio-label"> 
              <label class="label">Gender</label>
            </div>
            <div class="form-item"> 
              <input id="Male" type="radio" name="gender" value="Male" data-once>
              <label for="Male">Male</label>
            </div>
            <div class="form-item"> 
              <input id="Female" type="radio" name="gender" value="Female" data-once>
              <label for="Female">Female</label>
            </div>
          </div>
          <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
        </div>
        <div class="form-item box-item">
          <div class="form-item-triple">
            <div class="radio-label"> 
              <label class="label">Type</label>
            </div>
            <div class="form-item"> 
              <input id="sponsored" type="radio" name="gender2" value="sponsored" data-once>
              <label for="sponsored">sponsored</label>
            </div>
            <div class="form-item"> 
              <input id="paid" type="radio" name="gender2" value="paid" data-once>
              <label for="paid">paid</label>
            </div>
          </div>
          <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
        </div>
        <div class="form-item box-item">
          <input type="text" name="address" placeholder="Address" data-required>
          <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> required field</small>
        </div>
        <div class="form-item-double box-item">
          <div class="form-item ">
            <input type="text" name="strNumber" placeholder="Str Number" data-required data-number>
            <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> required field</small>
            <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> must be a number</small>
          </div>
          <div class="form-item">
            <input type="text" name="zCode" placeholder="Zip Code" data-required data-number>
            <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> required field</small>
            <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> must be a number</small>
          </div>
        </div>
        <div class="form-item box-item">
          <input type="text" name="phone" placeholder="Phone" data-required data-number data-count="10">
          <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> required field</small>
          <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> must be a number</small>
          <small class="errorChar"><i class="fa fa-asterisk" aria-hidden="true"></i> must be 10 digits</small>
        </div>
        <div class="form-item">
          <span id="submit" class="submit">Submit</span>
        </div>
      </form>
    </main>
    <footer>
      <p>Already have an account? <a href="#">Login here</a></p>
    </footer>
    <i class="wave"></i>
  </section>
</div>
</body>
</html>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script id="rendered-js" >
$(document).ready(function () {
var Validation = function () {
  var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var digitReg = /^\d+$/;
  var isEmail = function (email) {
    return emailReg.test(email);
  };
  var isNumber = function (value) {
    return digitReg.test(value);
  };
  var isRequire = function (value) {
    return value == "";
  };
  var countChars = function (value, count) {
    return value.length == count;
  };
  var isChecked = function (el) {
    var hasCheck = false;
    el.each(function () {
      if ($(this).prop('checked')) {
        hasCheck = true;
      }
    });
    return hasCheck;
  };
  return {
    isEmail: isEmail,
    isNumber: isNumber,
    isRequire: isRequire,
    countChars: countChars,
    isChecked: isChecked };
}();
var required = $('form').find('[data-required]');
var numbers = $('form').find('[data-number]');
var emails = $('form').find('[data-email]');
var once = $('form').find('[data-once]');
var radios = $('.form-item-triple');
var groups = [];
radios.each(function () {
  groups.push($(this).find('[data-once]'));
});
var counts = $('form').find('[data-count]');
$('#submit').on('click', function () {
  required.each(function () {
    if (Validation.isRequire($(this).val())) {
      $(this).siblings('small.errorReq').show();
    }
  });
  emails.each(function () {
    if (!Validation.isEmail($(this).val())) {
      $(this).siblings('small.errorEmail').show();
    }
  });
  $.each(groups, function () {
    if (!Validation.isChecked($(this))) {
      $(this).parents('.form-item').find('small.errorOnce').show();
    }
  });
  numbers.each(function () {
    if (!Validation.isNumber($(this).val())) {
      $(this).siblings('small.errorNum').show();
    }
  });
  counts.each(function () {
    if (!Validation.countChars($(this).val(), $(this).data('count'))) {
      $(this).siblings('small.errorChar').show();
    }
  });
});
required.on('keyup blur', function () {
  if (!Validation.isRequire($(this).val())) {
    $(this).siblings('small.errorReq').hide();
  }
});
emails.on('keyup blur', function () {
  if (Validation.isEmail($(this).val())) {
    $(this).siblings('small.errorEmail').hide();
  }
});
once.on('change', function () {
  $.each(groups, function (i) {
    if (Validation.isChecked(groups[i])) {
      groups[i].parents('.form-item').find('small.errorOnce').hide();
    }
  });
});
numbers.on('keyup blur', function () {
  if (Validation.isNumber($(this).val())) {
    $(this).siblings('small.errorNum').hide();
  }
});
counts.on('keyup blur', function () {
  if (Validation.countChars($(this).val(), $(this).data('count'))) {
    $(this).siblings('small.errorChar').hide();
  }
});
});
//# sourceURL=pen.js
  </script>