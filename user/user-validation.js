$(document).ready(function(){
  $("#name").focus();
    $("#submit_btn").click(function(e){
      var fname= $("#name").val();
      var desg= $("#designation").val();
      var rep_person= $("#reporting_person").val();
      // var pass= $("#leave_type").val();
      var date= $("#datepicker").val();
      var mbl= $("#date").val();
        var leave_day= $("#days").val();
          var leave_time= $("#time").val();
            var leave_avail= $("#leaves_availed").val();
            var sel_department= $("#department").val();
            
      var letters =/^[A-za-z]+$/;
      var password  = /^[a-zA-Z0-9]{6,16}$/
      var mobile =/^[0-9!@#$%^&*]{10}$/
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;


      if(leave_avail==""){
                          $("#leaves_availed").focus();
                    $("#leaves_availed").addClass('abc');
                         $('#lavail').text("*Please enter number of leaves availed*");   e.preventDefault();
                      }

                     if(leave_day==""){
                          $("#days").focus();
                    $("#days").addClass('abc');
                         $('#lday').text("*Please enter number of days*");   e.preventDefault();
                      }


                     if(leave_time==""){
                          $("#time").focus();
                    $("#time").addClass('abc');
                         $('#ltime').text("*Please enter time*");   e.preventDefault();
                      }
                      


                    if(date==""){
                          $("#datepicker").focus();
                    $("#datepicker").addClass('abc');
                         $('#ldate').text("*Please select date*");
                    e.preventDefault();
                   }
              


                   if(rep_person==""){
                      $("#reporting_person").focus();
                   $("#reporting_person").addClass('abc');
               
                       $('#lead').text("*Please enter your reporting person name*");
                          e.preventDefault();
                   }

                    if(desg=="" ){
                          $("#designation").focus();
                    $("#designation").addClass('abc');
                          $('#desig').text("*Please enter your Designation*");
                   e.preventDefault();
                   } 
            
                      

                          if(fname=="" ){
                    $("#name").focus();
                 $("#name").addClass('abc');

                 $('#fname').text("*Please enter your full name*");
                        e.preventDefault();
                  }




$(document).ready(function(){
              
    $("#name").change(function(){
    var fname= $("#name").val();
        var letters =/^[A-za-z]+$/;

                   
                    if(!letters.test(fname)){
                      $("#name").removeClass('abcc');
                  $("#name").addClass('abc');
                     $('#fname').text("*Please enter Alphabatics*");
                          }
                          else {
                            $("#name").removeClass('abc');
                              $("#name").addClass('abcc');  
                            $("#fname").html('');
                        }

                      });

                      });


$(document).ready(function(){

                  $("#designation").change(function(){
      var desg= $("#designation").val();
      var letters =/^[A-za-z]+$/;
      
                   

                                
                         if(!letters.test(desg)){
                            $("#designation").removeClass('abcc');
                        $("#designation").addClass('abc');
                         $('#desig').text("*Please enter alphabatic*");
                       }
                          else
                   {
                    $("#designation").removeClass('abc');
                    $("#designation").addClass('abcc'); 
                     $("#desig").html('');
                   }

                      });
                           });


$(document).ready(function(){

                  $("#reporting_person").change(function(){
      var rep_person= $("#reporting_person").val();
      var letters =/^[A-za-z]+$/;

      
                   

                                
                         if(!letters.test(rep_person)){
                            $("#reporting_person").removeClass('abcc');
                        $("#reporting_person").addClass('abc');
                         $('#lead').text("*Please enter alphabatic*");
                       }
                          else
                   {
                    $("#reporting_person").removeClass('abc');
                    $("#reporting_person").addClass('abcc'); 
                     $("#lead").html('');
                   }

                      });
                           });


$(document).ready(function(){

                  $("#time").change(function(){
      var leave_time= $("#time").val();
       var letters =/^[A-za-z]+$/;
      
                   

                                
                         if(letters.test(leave_time) ){
                            $("#time").removeClass('abcc');
                        $("#time").addClass('abc');
                         $('#ltime').text("*Please enter numbers*");
                       }
                          else
                   {
                    $("#time").removeClass('abc');
                    $("#time").addClass('abcc'); 
                     $("#ltime").html('');
                   }

                      });
                           });

$(document).ready(function(){

                  $("#days").change(function(){
      var leave_time= $("#days").val();
       var letters =/^[A-za-z]+$/;
      
                   

                                
                         if(letters.test(leave_time) ){
                            $("#days").removeClass('abcc');
                        $("#days").addClass('abc');
                         $('#lday').text("*Please enter numbers*");
                       }
                          else
                   {
                    $("#days").removeClass('abc');
                    $("#days").addClass('abcc'); 
                     $("#lday").html('');
                   }

                      });
                           });


$(document).ready(function(){

                  $("#leaves_availed").change(function(){
      var leave_avail= $("#leaves_availed").val();
      var letters =/^[A-za-z]+$/;
                                
                         if(letters.test(leave_avail) ){
                            $("#leaves_availed").removeClass('abcc');
                        $("#leaves_availed").addClass('abc');
                         $('#lavail').text("*Please enter numbers*");
                       }
                          else
                   {
                    $("#leaves_availed").removeClass('abc');
                    $("#leaves_availed").addClass('abcc'); 
                     $("#lavail").html('');
                   }

                      });
                           });

// $(document).ready(function() {
//     $("#leaves_availed,#days,#time").keydown(function (e) {
//         // Allow: backspace, delete, tab, escape, enter and .
//         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
//              // Allow: Ctrl/cmd+A
//             (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
//              // Allow: Ctrl/cmd+C
//             (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
//              // Allow: Ctrl/cmd+X
//             (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
//              // Allow: home, end, left, right
//             (e.keyCode >= 35 && e.keyCode <= 39)) {
//                  // let it happen, don't do anything
//                  return;
//         }
//         // Ensure that it is a number and stop the keypress
//         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
//             e.preventDefault();
//         }
//     });
// });



$(document).ready(function(){

                  $("#datepicker").change(function(){
      var date= $("#datepicker").val();
      
                   

                                
                         if((date == null) ){
                            $("#datepicker").removeClass('abcc');
                        $("#datepicker").addClass('abc');
                         $('#ldate').text("*Please enter numbers*");
                       }
                          else
                   {
                    $("#datepicker").removeClass('abc');
                    $ 
                     $("#ldate").html('');
                   }

                      });
                           });



       
    });
    });




