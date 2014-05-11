<script language="javascript">

	function verif() {


			n=document.monFormulaire.amount.value;
			e=document.monFormulaire.business.value;

			if (n!=1) {
				document.monFormulaire.amount.value = 1;
				alert ("Le montant est incorrect");
			
			}
			
			if (e!="vendeur2Vik@gmail.com") {
				document.monFormulaire.business.value = "vendeur2Vik@gmail.com";;
				alert ("L'email est incorrect");
			
			}

	}

</script>

<?php
$prix = 1; 
$email = "vendeur2Vik@gmail.com";
?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="monFormulaire">
	<input name="amount" type="hidden" value="<?php echo $prix; ?>" />
	<input name="currency_code" type="hidden" value="EUR" />
	<input name="shipping" type="hidden" value="0.00" />
	<input name="tax" type="hidden" value="0.00" />
	<input name="return" type="hidden" value="http://votredomaine/paiementValide.php" />
	<input name="cancel_return" type="hidden" value="http://votredomaine/paiementAnnule.php" />
	<input name="notify_url" type="hidden" value="http://emoson.url.ph/ipn.php" />
	<input name="cmd" type="hidden" value="_xclick" />
	<input name="business" type="hidden" value=<?php echo $email; ?> />
	<input name="item_name" type="hidden" value="Nom de votre produit" />
	<input name="no_note" type="hidden" value="1" />
	<input name="lc" type="hidden" value="FR" />
	<input name="bn" type="hidden" value="PP-BuyNowBF" />
	<input name="custom" type="hidden" value="ID_ACHETEUR" />

	<input type = "submit" name = "submit" value = "Payer" onCLick="javascript:verif()">

</form>