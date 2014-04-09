<?php

function dateFormat($date, $conv)
{
	if (!empty($date) && $date != "")
	{
		if ( $conv == "mysql_to_fr" )
		{
			list($annee, $mois, $jour) = explode("-", $date);
			return ($jour."/".$mois."/".$annee);
		}
		elseif ( $conv== "fr_to_mysql" )
		{
			list($jour, $mois, $annee ) = explode("/", $date);
			return ( $annee."-".$mois."-".$jour);
		}
		elseif ( $conv=="angl_to_mysql")
		{
			list($mois, $jour, $annee ) = explode("/", $date);
			return ( $annee."-".$mois."-".$jour);
		}
		elseif ( $conv=="mysql_to_angl")
		{
			list($annee, $mois, $jour) = explode("-", $date);
			return ($mois."/".$jour."/".$annee);
		}
	}
	else
	{
		return;
	}
}

?>