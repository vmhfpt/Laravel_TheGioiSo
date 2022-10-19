
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('admin.layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{$title}}</h3>
                </div>
@yield('content')
              </div>


              </div>
          </div>
        </div>
      </section>
  </div>

@include('admin.layout.footer')

</body>
</html>
