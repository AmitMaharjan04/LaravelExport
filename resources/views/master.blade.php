<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <script language="javascript">
        var SITE_URL = {!! json_encode(url('/')) !!};
      </script>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Laravel Project</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <meta id="token" name="token" value="{{ csrf_token() }}" />
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('css/master.css') }}">

      {{-- @vite(['resources/js/app.js']) --}}
    </head>

    <body class="hold-transition skin-blue sidebar-mini">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Main content -->
          <section class="content">
            @if (Session::has('error'))
            <div class="alert alert-danger" id="message_box" align="center">
            {{ Session::get('error') }}
            </div>
          @endif
          @if (Session::has('success'))
            <div class="alert alert-success" id="message_box" align="center">
            {{ Session::get('success') }}
            </div>
          @endif
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
                @yield('header')
                {{-- @yield('content') --}}
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="{{ asset('js/master.js') }}"></script>
        {{-- <script type="module" src="{{ mix('build/assets/app.js') }}"></script> --}}
        {{-- <script src="resources/js/app.js"></script> --}}
    </body>
  </html>
@section('scripts')
@show
@stack('js-stack')