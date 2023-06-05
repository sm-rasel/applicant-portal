// function checkApplicantName()
// {
//     var appName = $('#appName').val();
//     var regex = /^[a-zA-Z- ]{2,30}$/;
//     if (appName.length > 0)
//     {
//         // $('#subBtn').prop('disabled', false);
//         $('#appNameError').text('');
//         // return true;
//     }
//     else
//     {
//         // $('#subBtn').prop('disabled', true);
//         $('#appNameError').text('Name field is required and min 5 letter');
//         // return false;
//     }
// }
// $('#appName').blur(function (){
//   checkApplicantName()
// });
// //Slider Button text validation End
//
// //Slider Url validation-view (slider_section)
// function checkUrl() {
//     var buttonUrl = $('#buttonUrl').val();
//     var regex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig;
//     if (regex.test(buttonUrl))
//     {
//         $('#sliderBtn').prop('disabled', false);
//         $('#buttonUrlError').text(' ');
//         return true;
//     }
//     else
//     {
//         $('#sliderBtn').prop('disabled', true);
//         $('#buttonUrlError').text('Please Type Valid Url !');
//         return false;
//     }
// }
// $('#buttonUrl').keyup(function (){
//     checkUrl();
// });
// //Slider Url validation End
//
// //Slider Order number validation
// function checkNumber()
// {
//     var number = $('#sliderOrder').val();
//     var regex = /^[0-9]*$/;
//     if (regex.test(number))
//     {
//         $('#sliderBtn').prop('disabled', false);
//         $('#sliderOrderError').text('');
//         return true;
//     }
//     else
//     {
//         $('#sliderBtn').prop('disabled', true);
//         $('#sliderOrderError').text('Please provide a valid Enrollment Number');
//         return false;
//     }
// }
// $('#sliderOrder').keyup(function (){
//     checkNumber();
// })
// //Slider Order number validation End
//
// $('#sliderForm').submit(function () {
//     if (checkUrl() == true && checkNumber() == true && checkButtonText() == true)
//     {
//         return true;
//     }
//     else
//     {
//         return false;
//     }
// });

// Image Preview-view (slider_section)
var loadFile = function(event) {
    var output= document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};


