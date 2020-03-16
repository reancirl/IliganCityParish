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
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style1.css')}}">
    <link rel="shortcut icon" href="{{asset('beforeLogin/img/cross.png')}}" />
    <style type="text/css">
        hr{
            border: 1px solid #0078ff;
        }
    </style>
</head>
<body>

<section class="container pt-5">
	<a href="{{route('home')}}">
		<button type="button" class="btn btn-outline-primary btn-lg">
		  <i class="typcn typcn-arrow-left"></i>Go Back
		</button>
	</a>
	<a href="{{route('generateYearlyPDF')}}">
		<button type="button" class="btn btn-success btn-lg float-right">
		  <i class="typcn typcn-document"></i>Download report
		</button>
	</a>
	<hr class="mt-2">
	<div>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Total Baptismal Records</th>
                    <td>{{ $baptismal }}</td>
                </tr>
                <tr>
                    <th scope="row">Total Confirmation Records</th>
                    <td>{{ $confirmation }}</td>
                </tr>
                <tr>
                    <th scope="row">Total Marriage Records</th>
                    <td>{{ $marriage }}</td>
                </tr>
                <tr>
                    <th scope="row">Total First Communion Records</th>
                    <td>100</td>
                </tr>
            </tbody>
        </table>
	</div>
</section>

</body>
</html>