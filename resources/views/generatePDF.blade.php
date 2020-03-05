<!DOCTYPE html>
<html>
<head>
	<title>Weekly Report</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style1.css')}}">
</head>
<body>
<div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered rounded">
          <thead>
            <tr>
                <th>Husband Name</th>
                <th>Wife Name</th>
                <th>Date of Marriage</th>
            </tr>
          </thead>
          <tbody>
            @foreach($marriage as $m)
                @foreach($m as $marriage)
                    
                    <tr>
                        <td>{{$marriage->husband->confirmation->baptismal->last_name}}, {{$marriage->husband->confirmation->baptismal->first_name}} {{$marriage->husband->confirmation->baptismal->middle_name}}
                        </td>
                        <td>{{$marriage->wife->confirmation->baptismal->last_name}}, {{$marriage->wife->confirmation->baptismal->first_name}} 
                        {{$marriage->wife->confirmation->baptismal->middle_name}}
                        </td>
                        <td>{{Carbon\Carbon::parse($marriage->date)->formatLocalized('%b %d, %Y')}}</td>
                    </tr>
                    
                @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

</body>
</html>