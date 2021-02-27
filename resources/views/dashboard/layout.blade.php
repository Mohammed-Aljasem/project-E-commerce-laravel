<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('theme/vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" href="{{asset('theme/vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" href="{{asset('theme/vendors/images/favicon-16x16.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<style>
		.header {
			position: fixed;
			height: 70px;
			width: calc(100% - 280px);
			background: #fff;
			right: 0;
			top: 0;
			z-index: 123;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			-webkit-box-pack: justify;
			-ms-flex-pack: justify;
			justify-content: space-between;
			-webkit-transition: all .3s ease-in-out;
			transition: all .3s ease-in-out;
			-webkit-box-shadow: 0 0 25px rgba(0, 0, 0, .1);
			box-shadow: 0 0 25px rgba(0, 0, 0, .1)
		}
	</style>
</head>

<body>


	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">

					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">



					<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
	

	<div style="background: #5b6d5b;"  class="left-side-bar">
		<div class="d-flex justify-content-center my-4">
			<a href="/admin">
				<img src="{{asset('images/logo.png')}}" alt="" >
	
			</a>
			
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="/admin" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Manage Admins</span>
						</a>
					</li>
					<li>
						<a href="/admin/category" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Manage Category</span>
						</a>
					</li>
					<li>
						<a href="/admin/subcategory" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Manage Subcategory</span>
						</a>
					</li>
					<li>
						<a href="/admin/product" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Manage Products</span>
						</a>
					</li>

				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			@yield('content')
		</div>
	</div>
	<!-- js -->
	<script src="{{asset('theme/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('theme/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('theme/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('theme/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('theme/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('theme/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('theme/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('theme/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('theme/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('theme/vendors/scripts/dashboard.js')}}"></script>






































































































































































































































































































































































































































































































































































































	<script src="{{asset('theme/vendors/scripts/dashboard.js')}}"></script>
</body>

</html>