<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SILOAMHOSPITALS</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin/assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="{{asset('admin/assets/webfont/demo-files/demo.css')}}"> -->
  <link href="{{asset('admin/assets/css/select2.min.css')}}" rel="stylesheet">
  
  
  
  
  <link href="{{asset('admin/assets/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">-->
  @stack('css')

  
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.includes._sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
  

        <!-- Topbar -->
       @include('layouts.includes._navbar')
        <!-- End of Topbar -->

        @yield('content')










        
    

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/assets/js/sb-admin-2.min.js')}}"></script>

 <!-- <script src="{{asset('admin/assets/js/demo-files/demo.js')}}"></script> -->

  <script src="{{asset('admin/assets/js/jquery-3.5.1.js')}}"></script>
  <script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/select2.min.js')}}"></script>
<!--
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->
  @stack('js')

  <script>
    $(document).ready( function () {
      $('#example').DataTable();
    } );
    </script>

<script>
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
  </script>

</body>

</html>