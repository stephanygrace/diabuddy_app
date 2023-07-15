function myFunction() {
    var x = document.getElementById("mySelect").value;
   document.getElementById("demo").innerHTML = x;
}

// login function
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
// toggle the type attribute
const type = password.getAttribute("type") === "password" ? "text" : "password";
password.setAttribute("type", type);
            
// toggle the icon
this.classList.toggle('bi-eye');
});

// alert closebtn function
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
}
}

// navbar active link
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("li");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}