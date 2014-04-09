<?php require_once('core/init.php'); ?>
<?php require_once('views/global/header.php'); ?>


<body class="page-body login-page login-form-fall">

<div class="login-container">

	<div class="login-header login-caret">

		<div class="login-content">

			<a href="#" class="logo">
				<img src="./assets/images/logo.png" alt="" />
			</a>

			<p class="description">Bonjour, merci de vous connecter pour accéder à cet espace !</p>

			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>Connexion...</span>
			</div>
		</div>

	</div>

	<div class="login-progressbar">
		<div></div>
	</div>

	<div class="login-form">

		<div class="login-content">

			<form method="post" action="connexion.php">

				<div class="form-group">

					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>

						<input type="text" class="form-control" name="login" id="login" placeholder="Login" autocomplete="off" />
					</div>

				</div>

				<div class="form-group">

					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>

						<input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" autocomplete="off" />
					</div>

				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						Connexion
						<i class="entypo-login"></i>
					</button>
				</div>

			</form>


			<div class="login-bottom-links">

				<a href="#" class="link">Mot de passe oublié ?</a>

				<br />

				<a href="#">Vie privée</a>  - <a href="#">Termes et conditions</a>

			</div>

		</div>

	</div>

</div>


	<script src="assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="assets/js/joinable.js" id="script-resource-4"></script>
	<script src="assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="assets/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="assets/js/neon-login.js" id="script-resource-8"></script>
	<script src="assets/js/neon-custom.js" id="script-resource-9"></script>
	<script src="assets/js/neon-demo.js" id="script-resource-10"></script>
<!--	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script> -->

</body>
</html>