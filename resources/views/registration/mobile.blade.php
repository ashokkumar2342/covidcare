<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Plasma COVID-19 Donor Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome --> 
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/AdminLTE.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
</head>
<body class="hold-transition register-page" id="body_id">
<div class="register-box">
  {{-- <div class="register-logo">
    <a href="#"><b> Plasma COVID-19 Donor Registration</b></a>
  </div> --}}

  <div class="card">
    <div class="card-body register-card-body" id="verification">
      <p class="login-box-msg">Plasma COVID-19 Donor Registration</p>

      <form action="{{ route('user.mobile.verification.store') }}" method="get">
        {{ csrf_field() }} 
            <div class="input-group mb-3">
              <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No." maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            <p class="text-danger">{{ $errors->first('mobile_no') }}</p>
             <div class="captcha">
              <span>{!! captcha_img('flat') !!}</span>
              <button type="button" class="btn btn-warning" onclick="refresh()"><i class="fas fa-1x fa-sync-alt" ></i></button>
            </div>
            <div class="input-group mb-3" style="margin-top: 15px">
               <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"> 
               <div class="input-group-append">
                 <div class="input-group-text">
                    
                 </div>
               </div>
             </div> 
         <p class="text-danger">{{ $errors->first('captcha') }}</p>
        <div class="row"> 
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" value="Send Otp">
          </div> 
        </div>
      </form> 
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
<script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
<script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
@include('admin.include.message')
<script type="text/javascript">
  function refresh(){
    $.ajax({
     type:'GET',
     url:'{{ route('admin.refresh.captcha') }}',
     success:function(data){
        $(".captcha span").html(data);
     }
  });
  }
 
</script> 
<script data-ad-client="ca-pub-6986129570235357" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</body>
</html>
