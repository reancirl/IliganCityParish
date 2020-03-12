<!DOCTYPE html>
<html>
<head>
	<title>Weekly Report</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style1.css')}}">
</head>
<body>

<h1>Yearly Report</h1>
<div>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Total Baptismal Records</th>
                <td>{{count($baptismal)}}</td>
            </tr>
            <tr>
                <th scope="row">Total Confirmation Records</th>
                <td>{{count($confirmation)}}</td>
            </tr>
            <tr>
                <th scope="row">Total Marriage Records</th>
                <td>{{count($marriage)}}</td>
            </tr>
            <tr>
                <th scope="row">Total First Communion Records</th>
                <td>100</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>