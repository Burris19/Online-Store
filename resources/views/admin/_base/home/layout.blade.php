<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <title>Admin Simulacion</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      @include('admin._base.home.style')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
      @yield('models','')
      <div class="wrapper">
        @include('admin._base.home.header')
        <aside class="main-sidebar">
            @include('admin._base.home.sidebar')
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                  Dashboard
                  <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('admin._base.home.footer')
      </div>
      @include('admin._base.home.script')
      @yield('other-scripts')
  </body>
</html>
