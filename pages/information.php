<?php
$date = date("d-m-Y");
$format="pdf";
	if(isset($_GET['envoy']))
	{
		if(empty($_GET['der'])==true)
		{
			$erreur_der= "Choisissez !";
		}
		if(empty($_GET['email'])==true)
		{
			$erreur_email= "Obligatoire !";
		}
		if(empty($_GET['html'])==false)
		{
			$format="html";
		}
		if(empty($_GET['der'])==false)
		{
			if(empty($_GET['email'])==false)
			{
				if(empty($_GET['nombre'])==false)
				{
					if(empty($_GET['etu'])==false)
					{
						if(empty($_GET['pseudo'])==false)
						{
							print "Cher ".$_GET['pseudo'].",<br>";
							print "Merci d'avoir complété le formulaire ce ".$date.". Nous vous envoyons à votre adresse ".$_GET['email']." ".$_GET['nombre']." exemplaire(s) de la brochure ".$_GET['der'].", au format ".$format.".<br>";
							if($_GET['etu']=="oui")
							{
								print "En votre qualité d'étudiant, nous vous envoyons également un formulaire d'abonnement annuel à nos publications au prix de 15€";
							}
							else
							{
								print"Vous trouverez en pièce jointe un formulaire d'abonnement annuel à nos publications au prix de 35€";
							}
						}
					}
				}
			}
		}
	}
?>
<h2>Demande de brochures</h2>
<form method="get" action="<?php print $_SERVER['PHP_SELF'];?>">
	<label for="brochure">Brochure :</label>
	<?php
		if(isset($erreur_der))
		{
		?>
		<select class="erreur_input" name="der">
			<option>Le pont de Normandie</option>
			<option>Le pont de Tancarville</option>
			<option>Le Golden Gate Bridge</option>
			<option>Le pont de Chavanon</option>
		</select>
		<?php
		print "<span class='txtRouge txtGras'>".$erreur_der."</span>";
		}
		else
		{
			?>
			<select name="der">
				<option></option>
				<option>Le pont de Normandie</option>
				<option>Le pont de Tancarville</option>
				<option>Le Golden Gate Bridge</option>
				<option>Le pont de Chavanon</option>
			</select>
			<?php
		}
	?>
	<br>
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" id="nombre"/><br>
	<label for="format">Format (Pdf par defaut)</label>
	<label for="pdf">PDF</label>
	<input type="checkbox" name="pdf" id="pdf"/>
	<label for="html">HTML</label>
	<input type="checkbox" name="html" id="html"/><br>
	<label for="email">Votre email</label>
	<?php
		if(isset($erreur_email))
		{
			?>
			<input class="erreur_input" type="text" name="email" id="email"/>
			<?php
			print  "<span class='txtRouge txtGras'>".$erreur_email."</span>";
		}
		else
		{
			?>
			<input type="text" name="email" id="email"/>
			<?php
		}
	?>
	<br>
	<label for="etu">Etudiant</label>
	<label for="oui">Oui</label>
	<input type="radio" name="etu" id="oui" value="oui"/>
	<label for="non">Non</label>
	<input type="radio" name="etu" id="non" value="non"/><br>
	<label for="pseudo">Pseudo</label>
	<input type="text" name="pseudo" id="pseudo"/><br>
	<input type="submit" name="envoy" id="envoy" value="Envoyer"/>
	<input type="reset" name="annuler" id="annuler" value="Annuler"/>
	
</form>