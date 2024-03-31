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
      <!-- Font Awesome -->
      {{-- <link rel="stylesheet" href="{{ asset('theme/employeeapp/css/bootstrap.min.css')}}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('theme/employeeapp/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/employeeapp/css/ionicons.min.css') }}">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

      <link href="{{ asset('theme/employeeapp/css/jquery.dataTables.min.css') }}" rel="stylesheet">
      <!-- Tempusdominus Bbootstrap 4 -->

      <link rel="stylesheet" href="{{ asset('theme/employeeapp/css/AdminLTE.min.css') }}">
      <link rel="stylesheet" href="{{ asset('theme/employeeapp/css/_all-skins.min.css')}}">

      <link rel="stylesheet" href="{{ asset('theme/employeeapp/css/style.css') }}">

      <link rel="stylesheet" href="{{ asset('theme/employeeapp/vendor/jQueryUI/jquery-ui-1.10.3.custom.css')}}"> --}}

      <link rel="stylesheet" href="{{ asset('css/master.css') }}">

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
      <!-- <div class="notice sticky">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-2 col-xs-12 padding-0">
                        <div class="flash-box hidden-xs">
                            <p>
                                <span style="float: left; margin: 0px 45px 0px 45px; padding: 5px 0px 0px;">
                                    <i class="fa fa-bullhorn blink_me" style="font-size: 25px; color: #dedede"></i>
                                </span> Notice
                            </p>
                        </div>
                    </div> -->
                    <!-- for notice slider -->
                    <!-- <div class="col-lg-10 col-md-9 col-sm-10 col-xs-12">
                        <marquee scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
                            <ul class="list-inline">

                            </ul>
                        </marquee>
                    </div> -->
                    <!-- end notice slider -->
                <!-- </div>
            </div>
        </div> -->
        
      {{-- <div class="wrapper">
        <!-- Navbar -->
        <header class="main-header">
          @include('partials.nav')
        </header>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar">
          @include('partials.sidebar')
        </aside> --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Main content -->
          <section class="content">
            {{-- @if (Session::has('msg'))
            <div class="alert alert-info">
              {{ Session::get('msg') }}
              <button class="close" data-dismiss="alert" aria-label="close" style="opacity: 1; color: #ed1c24;"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif --}}

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


        {{-- <footer class="main-footer">
          @include('partials.footer')
          @yield('footer')
          <!-- Delete Modal -->
          <div class="modal fade modal-danger" id="mi-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete? </h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline btn-flat" data-dismiss="modal" id="modal-btn-yes">YES
                  </button>
                  <button type="button" class="btn btn-outline btn-flat" data-dismiss="modal" id="modal-btn-no">NO
                  </button>
                </div>
              </div>
            </div>
          </div>
        </footer> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
  </html>
@section('scripts')
@show
@stack('js-stack')