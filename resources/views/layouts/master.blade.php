<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('includes.styles')
    @yield('style')
  </head>
  <body>
    <div class="container-scroller">
      @include('includes.navbar')
      <div class="container-fluid page-body-wrapper">
        @include('includes.sidebar')
        <div class="main-panel">
          <div class="content-wrapper"> 
            @yield('content')
          </div>
          @include('includes.footer')
        </div>
      </div>
    </div>
    @yield('javaScript')
    @include('includes.scripts')
  </body>
</html>