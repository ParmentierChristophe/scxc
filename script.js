$(function() {
 $(".flatpickr").flatpickr({enableTime:true});

 $("#test-rappel").on('click', function() {
   var message = "Je m'actualise sur le site Pole Emploi entre le 26/11 et le 15/12.";
   var phone = "33677719143";

   var url = "/api/index.php?message=" + encodeURIComponent(message) + "&phone=" + encodeURIComponent(phone);
   $.get(url, function(data) {
     console.log(data);
   });
  // alert(message);
 })
});
