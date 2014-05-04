<?php

        require_once MODELS.'M_Paypal.php';

        $email_account = "vendeur2Vik@gmail.com";
	$montant = 1.00;


	$req = 'cmd=_notify-validate';

	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$req .= "&$key=$value";
	}
 
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Host: www.sandbox.paypal.com\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);


	$nom_payement = $_POST['last_name'];
	$payment_status = $_POST['payment_status'];
	$payment_amount = $_POST['mc_gross'];
	$payment_currency = $_POST['mc_currency'];
	$id_payement = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	$email_payement = $_POST['payer_email'];
        $id_user = $_POST['custom'];
 
	if (!$fp) {
	
	} else {
		fputs ($fp, $header . $req);

		while (!feof($fp)) {

			$res = fgets($fp, 1024);

			if (strcmp ($res, "VERIFIED") == 0) {	

				// vérifier que payment_status a la valeur Completed
				if ( $payment_status == "Completed") {	
					if ( $email_account == $receiver_email && $payment_amount == $montant) {	

						//file_put_contents("log.txt",print_r($_POST,true));
						M_Paypal::ajoutPaypalInfo($id_payement, $nom_payement, $email_payement, $montant, $data, $id_user);
					}
				}
				else {
				// Statut de paiement: Echec
				}
				exit();
			}
			else if (strcmp ($res, "INVALID") == 0) {
			// Transaction invalide
			}
		}
		fclose ($fp);
	}	