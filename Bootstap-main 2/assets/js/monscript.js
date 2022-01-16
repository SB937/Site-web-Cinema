/*
vérifier le formulaire 
*/

var confmail=false;
var confmdp=false;
var confcheck=false;

const nom=document.getElementById('nom');
const email=document.getElementById('email');
const lab=document.getElementsByClassName('form-check-label');
const mdp1 = document.getElementById("mdp1");
const mdp2 = document.getElementById("mdp2");
const check = document.getElementsByClassName('form-check-input');
const form = document.getElementById('form');

form.addEventListener("submit",(e)=>{
  e.preventDefault();
  if(email.value==""){
    email.style.borderColor="red";
  }
  else
  {
    email.style.borderColor="green";
    confmail=true;
  }


  if (check.checked == false)
  {
    lab.style.color = "red";
  }
  else
  {
    lab.style= "color:green";
    confcheck=true;
  }

  if (mdp1.value=="")
  {
    mdp1.style.borderColor="red"
  }
  else if (mdp1.value!="")
  {
    mdp1.style.borderColor="green"
  }
  if (mdp2.value=="")
  {
    mdp2.style.borderColor="red"
  }
  else if (mdp2.value!="")
  {
    mdp2.style.borderColor="green"
  }
  if (mdp1.value==mdp2.value && mdp1.value!="" && mdp2.value!=""){
    mdp1.style.borderColor="green"
    mdp2.style.borderColor="green"
    confmdp=true;
  }

  if(confmdp==true && confcheck==true && confmail==true){
    let log={
      page:"signup",
      nom:nom.value,
      email:email.value,
      mdp:mdp1.value,
    };
    console.log(log);
    SendAjax(log);
    alert("Marche");
  }
})


function SendAjax(obj){
  $.ajax({
    url: "traitementInscription.php",
    method: "GET",
    dataType : "json",
    data:obj,
    success: (response) =>{
      console.log(response);
      if (response.StatusId==0) {//Mail et mdp correcte
        window.location.replace("login.html?email="+response.email);
      }else if (response.StatusId==1) {//Le mail est déja enregistrer

      }else if (response.StatusId==2) {

      }else if (response.StatusId==3) {

      }else if (response.StatusId==4) {
        window.location.replace("login.html?email="+response.email);
      }
    }
  });
}

