<?php

class Liste
{
	static function Administrateur($idAdministrateur=NULL)
	{
		$bdd = PDO();

		$sql = "SELECT idAdministrateur, nomAdministrateur, prenomAdministrateur
				FROM Administrateurs";

		$Administrateur = $bdd->query($sql);

		?><select name="idAdministrateur"><?php

		while($Administrateur2 = $Administrateur->fetch())
		{
			$nomAdministrateur = $administrateur2['prenomAdministrateur']{0}.". ".$administrateur2['nomAdministrateur'];

			if($idAdministrateur == $administrateur2['idAdministrateur'])
			{
				?><option selected="selected" value="<?php echo $administrateur2['idAdministrateur']; ?>"><?php echo $nomAdministrateur; ?></option><?php
			}
			else
			{
				?><option value="<?php echo $administrateur2['idAdministrateur']; ?>"><?php echo $nomAdministrateur; ?></option><?php
			}
		}
		?></select><?php
	}

	static function Role($roleSelected)
	{
		$array_role = array('VISITEUR', 'ADMIN', 'GRAPHISTE', 'ENTREPRISE');

		?><select class="form-control" name="roleUtilisateur"><?php

		foreach($array_role as $role)
		{
			if($role == $roleSelected)
			{
				?><option selected="selected" value="<?php echo $role; ?>"><?php echo $role; ?></option><?php
			}
			else
			{
				?><option value="<?php echo $role; ?>"><?php echo $role; ?></option><?php
			}
		}
		?></select><?php
	}


	static function Entreprise($idEntreprise=NULL)
	{
		$bdd = PDO();

		$sql = "SELECT idEntreprise, raisonsocialeEntreprise
				FROM entreprises";

		$Entreprise = $bdd->query($sql);

		?><select name="idEntreprise"><?php

		while($Entreprise2 = $Entreprise->fetch())
		{
			if($idEntreprise == $Entreprise2['idEntreprise'])
			{
				?><option selected="selected" value="<?php echo $Entreprise2['idEntreprise']; ?>"><?php echo $Entreprise2['raisonsocialeEntreprise']; ?></option><?php
			}
			else
			{
				?><option value="<?php echo $Entreprise2['idEntreprise']; ?>"><?php echo $Entreprise2['raisonsocialeEntreprise']; ?></option><?php
			}
		}
		?></select><?php
	}


	static function Projet($idProjet=NULL)
	{
		$bdd = PDO();

		$sql = "SELECT idProjet, libProjet
				FROM Projets";

		$Projet = $bdd->query($sql);

		?><select name="idProjet"><?php

		while($Projet2 = $Projet->fetch())
		{
			if($idProjet == $Projet2['idProjet'])
			{
				?><option selected="selected" value="<?php echo $Projet2['idProjet']; ?>"><?php echo $Projet2['libProjet']; ?></option><?php
			}
			else
			{
				?><option value="<?php echo $Projet2['idProjet']; ?>"><?php echo $Projet2['libProjet']; ?></option><?php
			}
		}
		?></select><?php
	}



	static function Classe($idClasse=NULL)
	{
		$bdd = PDO();

		$sql = "SELECT idClasse, libClasse, anneeClasse
				FROM classes";

		$Classe = $bdd->query($sql);

		?><select name="idClasse"><?php

		while($Classe2 = $Classe->fetch())
		{
			if($idClasse == $Classe2['idClasse'])
			{
				?><option selected="selected" value="<?php echo $Classe2['idClasse']; ?>"><?php echo $Classe2['libClasse'].$Classe2['anneeClasse']; ?></option><?php
			}
			else
			{
				?><option value="<?php echo $Classe2['idClasse']; ?>"><?php echo $Classe2['libClasse']." ".$Classe2['anneeClasse']; ?></option><?php
			}
		}
		?></select><?php
	}


	static function Graphiste($idGraphiste=NULL)
	{
		$bdd = PDO();

		$sql = "SELECT idGraphiste, nomGraphiste, prenomGraphiste
				FROM Graphistes";

		$Graphiste = $bdd->query($sql);

		?><select name="idGraphiste"><?php

		while($Graphiste2 = $Graphiste->fetch())
		{
			if($idGraphiste == $Graphiste2['idGraphiste'])
			{
				?><option selected="selected" value="<?php echo $Graphiste2['idGraphiste']; ?>"><?php echo $Graphiste2['nomGraphiste']." ".$Graphiste2['prenomGraphiste']; ?></option><?php
			}
			else
			{
				?><option value="<?php echo $Graphiste2['idGraphiste']; ?>"><?php echo $Graphiste2['nomGraphiste']." ".$Graphiste2['prenomGraphiste']; ?></option><?php
			}
		}
		?></select><?php
	}


	static function Type_Entreprise($idType=NULL)
	{
		$bdd = PDO();

		$sql = "SELECT idType, libType
				FROM types_entreprises";

		$Type_Entreprise = $bdd->query($sql);

		?><select name="idType"><?php

		while($Type_Entreprise2 = $Type_Entreprise->fetch())
		{

			if($idType == $Type_Entreprise2['idType'])
			{
				?><option selected="selected" value="<?php echo $Type_Entreprise2['idType']; ?>"><?php echo $Type_Entreprise2['libType']; ?></option><?php
			}
			else
			{
				?><option value="<?php echo $Type_Entreprise2['idType']; ?>"><?php echo $Type_Entreprise2['libType']; ?></option><?php
			}
		}
		?></select><?php
	}
}

