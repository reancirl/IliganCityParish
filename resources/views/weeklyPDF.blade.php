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
    <hr class="mt-2">
    <h5 class="mb-2">Total number of marriage this week is ({{count($count)}})</h5>
        <div class="grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href="{{route('generatePDF')}}">
                <button type="button" class="btn btn-success btn-lg float-right">
                  <i class="typcn typcn-document"></i>Download report
                </button>
            </a>
            <table class="table table-hover table-bordered rounded">
            <h2 class="text-center ml-5 mb-3">Current week report</h2>

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
    <hr>
Previous Week
@foreach($previous as $p)
    <ol>
        @foreach($p as $prev)
            <li>(Husband) - {{$prev->husband->confirmation->baptismal->last_name}}, {{$marriage->husband->confirmation->baptismal->first_name}} {{$marriage->husband->confirmation->baptismal->middle_name}} ... (Wife) - {{$prev->wife->confirmation->baptismal->last_name}}, {{$marriage->wife->confirmation->baptismal->first_name}} {{$marriage->wife->confirmation->baptismal->middle_name}}</li>
        @endforeach
    </ol>
    <hr class="mt-2">
@endforeach
</section>

</body>
</html>