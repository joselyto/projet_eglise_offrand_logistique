<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Eglise Mahanaim - gestion logistique et offrande</title>

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
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
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
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{ asset('vendors/images/') }}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Chargement...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu">
				
			</div>
			
		</div>
		<div class="header-right">
			@auth
				@if(Auth::user()->types == 5)
					<div class="head-btn pd-10">
						<a href="{{ route('menu') }}" class="text-blue">Retour au menu</a>
					</div>
				@endif		
			@endauth
		
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					
						<span class="user-name">
							@auth
								{{ Auth::user()->prenom }}  {{ Auth::user()->nom }}	
							@endauth
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						
						<a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i> Quitter</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{ route('index') }}">
				<img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
				<img src="{{ asset('vendors/images/logo.jpg') }}" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-money-1"></span><span class="mtext">Offrandes ordinaires</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('offrande.ordinaire') }}">Vue d'ensemble</a></li>
							<li><a href="{{ route('offrande.ordinaireForm') }}">Nouveau</a></li>
						</ul>
					</li>
					<li >
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-11 "></span><span class="mtext">Social</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('offrande.social') }}">Vue d'ensemble</a></li>
							<li><a href="{{ route('offrande.socialForm') }}">Nouveau</a></li>
						</ul>
						
					</li>
					
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			

				<!-- Export Datatable start -->
			{{-- =============================================CONTENU================================= --}}
                @yield('content')

        	{{-- =============================================END CONTENU================================= --}}

				
				<!-- Export Datatable End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Crée par l'equipe de <a href="https://gamu-center.com" target="_blank">Gamu-center</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>
	<!-- Datatable Setting js -->
	<script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script></body>
</html>