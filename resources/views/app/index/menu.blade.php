<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Eglise Mahanaim - gestion des offrandes et logistiques</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/logo.jpg') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/logo.jpg') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/logo.jpg') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ route('index') }}">
					<img src="{{ asset('vendors/images/logo.jpg') }}" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="{{ route('logout') }}">Retour à la connexion</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
            <h1 class="text-center ">Menu Principal</h1>
			<div class="row align-items-center pt-20">
                @auth
					@if(Auth::user()->types == 1 || Auth::user()->types == 5)
						<div class="col-sm-12 col-md-4 mb-30">
							<div class="card card-box">
								<div class="card-header">
									Logistique
								</div>
								<div class="card-body">
									<h5 class="card-title">Gestion des outils et biens</h5>
									<p class="card-text">Gérer et suivre l'évolution des biens de l'église</p>
									<a href="{{ route('logistique') }}" class="btn btn-primary">Ouvrir</a>
								</div>
							</div>
						</div>
					@endif
							
				@endauth
				@auth
					@if(Auth::user()->types == 2 || Auth::user()->types == 5)
						<div class="col-sm-12 col-md-4 mb-30">
							<div class="card card-box">
								<div class="card-header">
									Offrandes
								</div>
								<div class="card-body">
									<h5 class="card-title">Gérer les entrées et sorties</h5>
									<p class="card-text">Gérer et suivre l'évolution de la caisse de l'église</p>
									<a href="{{ route('offrande.ordinaire') }}" class="btn btn-primary">Ouvrir</a>
								</div>
							</div>
						</div>
					@endif		
				@endauth
				@auth
					@if(Auth::user()->types == 3 || Auth::user()->types == 5|| Auth::user()->types == 4)
						<div class="col-sm-12 col-md-4 mb-30">
							<div class="card card-box">
								<div class="card-header">
									Paramètres
								</div>
								<div class="card-body">
									<h5 class="card-title">Gérer l'application</h5>
									<p class="card-text">Créer et gérer les utilisateurs de l'application</p>
									<a href="{{ route('demande') }}" class="btn btn-primary">Ouvrir</a>
								</div>
							</div>
						</div>
					@endif		
				@endauth
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>