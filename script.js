const signin=document.getElementById("sign-in-btn");
const signup=document.getElementById("sign-up-btn");
const registeration=document.getElementById("registration-form");
const login=document.getElementById("login-form");
signup.addEventListener('click',function(){
  login.style.display="none";
  registeration.style.display="block";
})
signin.addEventListener('click',function(){
  registeration.style.display="none";
  login.style.display="block";
})

function editfood(productid) {
  window.location.href = "editfood.php?productid=" + productid;
}