


				function surligne(champ, erreur)
			{
   				if(erreur)
      				champ.style.backgroundColor = "#fba";
   				else
      				champ.style.backgroundColor = "#a1ff84";
			}


			



			function verifPrenom(prenom)

			{

			   if(prenom.value.length == 1 || prenom.value.length > 25)

			   {

			      surligne(prenom, true);

			      return false;

			   }

			   else if(prenom.value.length == 0)
			   {
			   		return false;
			   }

			   else

			   {

			      surligne(prenom, false);

			      return true;

			   }

			}

			function verifNom(nom)

			{

			   if(nom.value.length == 1 || nom.value.length > 25)

			   {

			      surligne(nom, true);

			      return false;

			   }


			   else if(nom.value.length == 0)
			   {
			   		return false;
			   }

			   else

			   {

			      surligne(nom, false);

			      return true;

			   }

			}

			function verifMdp(pass)
			{
			   if(pass.value.length < 4 || pass.value.length > 16)
			   {
			      surligne(pass, true);
			      return false;
			   }
			   else
			   {
			      surligne(pass, false);
			      return true;
			   }
			}

			function verifEmail(email)

			{
				if (email.value.length > 0)
				{	

				   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

				   if(!regex.test(email.value))

				   {

				      surligne(email, true);

				      return false;

				   }


				   else

				   {

				      surligne(email, false);

				      return true;

				   }
				}

				else
				{
					return false;
				}

			}

			function verifTelephone (telephone)
			{

				if(telephone.value.length > 0)
				{	
					var reg = /^0[1-8]([-. ]?[0-9]{2}){4}$/;

					if(!reg.test(telephone.value))
					{
						surligne(telephone,true);
						
						return false;


					}
 
					else
					{
						surligne(telephone,false);
						return true;
					}
				}
				else
				{
					return true;
				}

			}




			function verifVerif (verifpass,pass)
			{
				if(pass.value.length > 0)

				{	
					if(verifpass.value == pass.value)
					{
						surligne(verifpass,false);
						return true;
					}

					else
					{
						surligne(verifpass,true);
						return false;
					}
				}
				

			}


			

		






