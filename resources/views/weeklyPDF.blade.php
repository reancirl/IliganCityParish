<!DOCTYPE html>
<html>
<head>
	<title>Weekly Report</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style1.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('beforeLogin/img/cross.png')}}" />
</head>
<body>

<section class="container pt-5">
	<a href="{{route('home')}}">
		<button type="button" class="btn btn-outline-primary btn-lg">
		  <i class="typcn typcn-arrow-left"></i>Go Back
		</button>
	</a>
	<a href="{{route('generatePDF')}}">
		<button type="button" class="btn btn-success btn-lg float-right">
		  <i class="typcn typcn-document"></i>Download PDF
		</button>
	</a>
	<hr style="border: 1px solid #0078ff;" class="mt-2">
	<div class="text-center">
		<h1>Week 1</h1>
	</div>
</section>

</body>
</html>