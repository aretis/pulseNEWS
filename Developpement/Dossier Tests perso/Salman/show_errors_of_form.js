/* Function which display errors of the form in JS
	Salman ALAMDAR
	19/04/12*/

<script type="text/javascript">
<!--

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#FFFD55";
   else
      champ.style.backgroundColor = "";
}

function onlyLetters(champ)
{
    var regex = /^[a-zA-Z]+$/;
	if(champ.value != NULL)
	{
		if(regex.test(champ.value))
		{
			surligne(champ, false);
		}
		else
		{
			surligne(champ, true);
			alert('Les champs nom et prénom ne peuvent contenir que des lettres !')
		}
	}
}

function verifPseudo(champ)
{
   if(champ.value.length < 4 || champ.value.length > 20)
   {
		surligne(champ, true);
		alert('Votre pseudo doit être compris entre 4 et 20 caractères !')
   }
   else
   {
		surligne(champ, false);
   }
}

function verifName(champ)
{
   if(champ.value.length < 2 || champ.value.length > 50)
   {
		surligne(champ, true);
		alert('Le champ nom et prénom doivent être compris entre 2 et 50 caractères !')
   }
   else
   {
		surligne(champ, false);
   }
   
   onlyLetters(champ)
}

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(regex.test(champ.value))
   {
		surligne(champ, false);
   }
   else
   {
		surligne(champ, true);
		alert("Ce n'est pas une adresse électronique!");
   }
}

function verif_formulaire()
{
 if(document.formulaire.pseudo.value == "")  {
   alert("Veuillez entrer votre pseudo!");
   document.formulaire.pseudo.focus();
   surligne(champ, true);
  }
 if(document.formulaire.surname.value == "") {
   alert("Veuillez entrer votre nom!");
   document.formulaire.surname.focus();
   surligne(champ, true);
  }
  if(document.formulaire.firstname.value == "") {
   alert("Veuillez entrer votre prénom!");
   document.formulaire.firstname.focus();
   surligne(champ, true);
  }
  if(document.formulaire.password.value == "") {
   alert("Veuillez entrer votre mot de passe!");
   document.formulaire.password.focus();
   surligne(champ, true);
  }
  if(document.formulaire.confirmpassword.value == "") {
   alert("Veuillez confirmer votre mot de passe!");
   document.formulaire.confirmpassword.focus();
   surligne(champ, true);
  }
 if(document.formulaire.mail.value == "") {
   alert("Veuillez entrer votre adresse électronique!");
   document.formulaire.mail.focus();
   surligne(champ, true);
   }
   if(document.formulaire.password.value != document.formulaire.confirmpassword.value) 
   {
	alert("Les deux mots de passe ne correspondent pas !");
   document.formulaire.password.focus();
   document.formulaire.confirmpassword.focus();
   surligne(champ, true);
  }
}

//-->
</script>