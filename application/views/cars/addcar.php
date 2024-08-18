<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Goa Car Rental</title>

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/fav.png">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<style type="text/css">
    .error{color: #ff0000!important;}
</style>
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">

<?php $this->load->view('common/header');?>


<?php $this->load->view('common/sidebar');?>

<div class="page-wrapper">
<div class="content">

<div class="page-header">
<div class="page-title">
<h4>Add Car</h4>
<h6>Create new Car</h6>
</div>
</div>

<form action="<?php echo isset($edit_data[0]['id']) ? base_url().'cars/form_action/'.$edit_data[0]['id'] : base_url().'cars/form_action';?>" method="post" enctype="multipart/form-data" id="product_form">
<div class="card">

<div class="card-body">
    <div class="row">

<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Car Name</label>
<input type="text" class="form-control" name="name" id="name" placeholder="Car Name" value="<?php echo isset($edit_data[0]['name']) ? $edit_data[0]['name'] : '';?>">
</div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Price</label>
<input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo isset($edit_data[0]['price']) ? $edit_data[0]['price'] : '';?>">
</div>
</div>



<div class="col-lg-6 col-sm-6 col-12">
<div class="custom-file-container" data-upload-id="myFirstImage">
<label>Category Logo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
<label class="custom-file-container__custom-file">
<input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image" id="image">
<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
<input type="hidden" name="saved_image" value="<?php echo isset($edit_data[0]['image']) && !empty($edit_data[0]['image']) ? $edit_data[0]['image'] : '';?>" />
<span class="custom-file-container__custom-file__custom-file-control"></span>
</label>
<div class="custom-file-container__image-preview">
    <?php
          if(isset($edit_data[0]['image']) && $edit_data[0]['image'] != '')
          {
              echo '<img id="product_logo_preview" src="'.base_url().'uploads/car/'.$edit_data[0]['image'].'" alt="'.$edit_data[0]['image'].'"  style="max-width: 200px;">';
          }
          else{
            echo '<img id="product_logo_preview" src="'.base_url().'assets/img/default_img.jpg" style="max-width: 200px;">';
        }
      ?>
</div>
</div>
</div>

<div class="col-lg-12">
    <div class="text-end">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
<!-- <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
<a href="categorylist.html" class="btn btn-cancel">Cancel</a> -->
</div>
</div>

</div>



</div>
</form>



</div>
</div>
</div>


<script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>

<script src="<?php echo base_url();?>assets/js/feather.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/fileupload/fileupload.min.js"></script>

<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url();?>assets/js/script.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(function(){
  

  $('#image').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#product_logo_preview').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
    else
    {
      $('#product_logo_preview').attr('src', '<?php echo base_url();?>assets/img/default_img.jpg');
    }
  });


  

});

    $('#product_form').validate({
  rules: {
  	
    name: 'required',
    //sub_category_id: 'required',
    
    
    price: 'required',
    // image: 'required',
    // user_email: {
    //   required: true,
    //   email: true,
    // },
    // psword: {
    //   required: true,
    //   minlength: 8,
    // }
  },
  messages: {
  	
    name: 'This field is required',
    //sub_category_id: 'This field is required',
    

    price: 'This field is required',
    // image: 'This field is required',
    // user_email: 'Enter a valid email',
    // psword: {
    //   minlength: 'Password must be at least 8 characters long'
    // }
  },
  submitHandler: function(form) {
    form.submit();
  }
});


    

</script>

</body>
</html>