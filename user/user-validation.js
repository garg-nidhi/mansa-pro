// Wait for the DOM to be ready
$(function() {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();
   if(dd<10){
      dd='0'+dd
   }
   if(mm<10){
      mm='0'+mm
   }

  today = yyyy+'-'+mm+'-'+dd;
  document.getElementById("datepicker").setAttribute("min", today);
  //$( "#datepicker" ).datepicker();
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
  }, "Only Letters and Space is allowed");

  jQuery.validator.addMethod("timeonly", function(value, element) {
    return this.optional(element) || /^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/i.test(value);
  }, "Please use 24 hour in hh:mm format");

  $("form[name='user']").validate({
    // Specify validation rules
    rules: {
      name: {
        required: true,
        lettersonly: true
      },
      designation: {
        required: true,
        lettersonly: true
      },
      reporting_person: {
        required: true,
        lettersonly: true
      },
      date: {
        required: true
      },
      time: {
        timeonly: true
      },
      leaves_availed: {
        number:true
      },
      days: {
        required: true,
        number:true
      }
    },
    messages: {
      name: {
        required: "Please enter your name"
      },
      designation: {
        required: "Please enter your designation"
      },
      reporting_person: {
        required: "Please enter your Reporting Person"
      },
      date: {
        required: "Please select the date"
      },
      leaves_availed: {
        number: "Only numbers are allowed"
      },
      days: {
        required: "Please enter the number of days",
        number: "Only numbers are allowed"
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
