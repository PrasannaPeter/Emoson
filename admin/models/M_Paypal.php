<?php

class M_Paypal extends Paypal
{

	

	static function ajoutPaypalInfo($id_payement, $nom_payement, $email_payement, $montant, $data, $id_user)
        {
                $bdd = PDO();

                $sql_insert =$bdd->prepare('
                            INSERT INTO payement(id_payement, nom_payement, email_payement, montant, datas, id_utilisateur)
                            VALUES (:id_payement, :nom_payement, :email_payement, :montant, :datas, :id_user)
                                            ');
                $sql_insert->execute(array(
						'id_payement' => $id_payement,
						'nom_payement' => $nom_payement,
						'email_payement' => $email_payement,
						'montant' => $montant,
						'datas' => $data,
						'id_user' => $id_user,
                                            ));
               return($sql_insert);
        }
        
}

?>
        