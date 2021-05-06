<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Covid Complaints</title>
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
<div >
  {{-- <div class="register-logo">
    <a href="#"><b> Plasma COVID-19 Donor Registration</b></a>
  </div> --}}

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Covid Complaints</p>

      <form action="{{ route('covid.complaints.store') }}" method="post" class="add_form">
        {{ csrf_field() }}
        {{-- <div class="input-group mb-3">
          <select name="district" class="form-control select2">
            <option selected disabled>Select Your District Name</option>
            @foreach ($districts as $district)
             <option value="{{ $district->d_id }}">{{ $district->Name_E }}</option> 
            @endforeach 
           </select> 
        </div>
        <p class="text-danger">{{ $errors->first('district') }}</p> --}} 
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Enter Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="father_name" class="form-control" placeholder="Enter Father Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div> 
        </div>
        <div class="input-group mb-3">
          <input type="text" name="mobile_no"  class="form-control" placeholder="Mobile No." maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
      
       
         <div class="input-group mb-3">
          <textarea name="address" class="form-control" placeholder="Enter Address"></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map"></span>
            </div>
          </div>
        </div>
       
        <div class="input-group mb-3">
          <select class="form-control" id="district_id" name="district_id" onclick="callAjax(this,'{{ route('block.mcs') }}','block_mcs')">
            <option selected="selected" value="">Select District</option>
            @foreach ($districts as $district)
              <option value="{{ $district->id }}">{{ $district->name_e }}</option>
            @endforeach 
          </select>
        </div>

        <div class="input-group mb-3" id="block_mcs">
          <select class="form-control" id="blood_group" name="blood_group"><option selected="selected" value="">Select Block MCS</option>
             
          </select>
        </div>

        <div class="input-group mb-3" id="village">
          <select class="form-control" id="village" name="village"><option selected="selected" value="">Select Village</option>
             
          </select>
        </div>
         
         <div class="input-group mb-3">
           <select class="form-control" id="complaint_type_id" name="complaint_type_id" onchange="this.value==1?showHideDiv(1,'other_complaint_div'):showHideDiv(0,'other_complaint_div')">
            <option selected="selected" value="">Select Complaints Type</option>
             @foreach ($ComplaintTypes as $complaints_type)
               <option value="{{ $complaints_type->id }}">{{ $complaints_type->name }}</option>
             @endforeach 
           </select>
         </div>

          <div class="input-group mb-3" id="other_complaint_div" style="display: none;">
           <textarea name="complaint_type_others" class="form-control" placeholder="Enter  Complaint Type Others"></textarea> 
         </div> 

         <div class="input-group mb-3">
           <select class="form-control" id="complaint_related_to" name="complaint_related_to"><option selected="selected" value="">Select Complaints Complaint Related To </option>
             @foreach ($OfficerComplaints as $OfficerComplaint)
               <option value="{{ $OfficerComplaint->id }}">{{ $OfficerComplaint->name }} ({{ $OfficerComplaint->designation }})</option>
             @endforeach 
           </select>
         </div>
         
        <div class="row"> 
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block">
          </div> 
        </div>
      </form> 
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('admin_asset/plugins/jQuery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
<script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
<script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
@include('admin.include.message')
</body>
</html>
