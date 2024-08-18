<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Goa Car Rental</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/favicon.jpg">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
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
        <h4>Add Estimate</h4>
        <h6>Add your new Estimate</h6>
    </div>
</div>
<div class="card">
    <form action="<?php echo isset($edit_data[0]['id']) ? base_url().'estimate/form_action/'.$edit_data[0]['id'] : base_url().'estimate/form_action/';?>" method="post" id="sale_form">
<div class="card-body">

    <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>From Date <span style="color:red;">*</span></label>
                <div class="input-groupicon">
                    <input type="text" placeholder="Choose Date" class="datetimepicker" name="from_date" id="from_date" value="<?php echo isset($edit_data[0]['from_date']) && $edit_data[0]['from_date'] != '' ? date('d-m-Y', strtotime($edit_data[0]['from_date'])) : '';?>">
                    <a class="addonset">
                    <img src="<?php echo base_url();?>assets/img/icons/calendars.svg" alt="img">
                    </a>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>To Date <span style="color:red;">*</span></label>
                <div class="input-groupicon">
                    <input type="text" placeholder="Choose Date" class="datetimepicker" name="to_date" id="to_date" value="<?php echo isset($edit_data[0]['to_date']) && $edit_data[0]['to_date'] != '' ? date('d-m-Y', strtotime($edit_data[0]['to_date'])) : '';?>">
                    <a class="addonset">
                    <img src="<?php echo base_url();?>assets/img/icons/calendars.svg" alt="img">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Car <span style="color:red;">*</span></label>
                <div class="row">
                    <div class="col-lg-10 col-sm-10 col-10">
                        <select class="select" name="car_id" id="car_id" onchange="calculate_total();">
                        <option value="">Choose</option>
                        <?php
                            $cars = $this->api_model->get_columns('cars', 'id, name');
                            if(!empty($cars))
                            {
                                foreach($cars as $c)
                                {
                                    $selected = isset($edit_data[0]['car_id']) && $edit_data[0]['car_id'] == $c['id'] ? 'selected' : '';
                                    echo '<option value="'.$c['id'].'" '.$selected.'>'.$c['name'].'</option>';
                                }
                            }
                        ?>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Price <span style="color:red;">*</span></label>
                <div class="row">
                    <div class="col-lg-10 col-sm-10 col-10">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" readonly value="<?php echo isset($edit_data[0]['price']) ? $edit_data[0]['price'] : '';?>">
                        <input type="hidden" name="days" id="days" value="">
                    </div>

                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="table-responsive mb-3">
        <table class="table">
        <tfoot>
        <tr>
                                                <td colspan="8" style="text-align:right;">Total:</td>
                                                
                                                <td colspan="3">
                                                    <input type="text" name="amount" class="form-control amount" id="amount" readonly = "readonly" placeholder="Amount" value="<?php echo isset($edit_data[0]['amount']) ? $edit_data[0]['amount'] : 0;?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" style="text-align:right;">CGST:</td>
                                                
                                                <td colspan="3">
                                                    <input type="text" id="cgst_amt" name="cgst_amt" class="form-control cgst_amt" readonly = "readonly" placeholder="CGST Amt" value="<?php echo isset($edit_data[0]['cgst_amt']) ? $edit_data[0]['cgst_amt'] : 0;?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="8" style="text-align:right;">SGST:</td>
                                            
                                                <td colspan="3">
                                                    <input type="text" id="sgst_amt" name="sgst_amt" class="form-control sgst_amt" readonly = "readonly" placeholder="SGST Amt" value="<?php echo isset($edit_data[0]['sgst_amt']) ? $edit_data[0]['sgst_amt'] : 0;?>">
                                                </td>
                                            </tr>
                                            
                                            

                                            <tr>
                                                <td colspan="8" style="text-align:right;">Final Total:</td>
                                            
                                                <td colspan="3">
                                                    <input type="text" name="final_total" id="final_total" class="form-control final_total" placeholder="Final Total" value="<?php echo isset($edit_data[0]['final_total']) ? $edit_data[0]['final_total'] : 0;?>">
                                                </td>
                                            </tr>

                        
                                        </tfoot>
        </table>
        </div>
    </div>
    <div class="row">
    
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </div>
</div>

</form>
</div>


</div>
</div>
</div>


<script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>

<script src="<?php echo base_url();?>assets/js/feather.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="<?php echo base_url();?>assets/js/script.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
    $('#sale_form').validate({
    rules: {
        customer_id: 'required',
        customer_id: 'required',
    },
    messages: {
        customer_id: 'This field is required',
        customer_id: 'This field is required',

    },
    submitHandler: function(form) {
        form.submit();
    }
    });
</script>
<script type="text/javascript"> 

    function calculate_total()
    {
        if($('#from_date').val() != '' && $('#to_date').val() != '' && $('#car_id').val() != '') 
        {
            fetch('<?php echo base_url();?>estimate/calculate_total', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 
                    car_id: $('#car_id').val(),
                    from_date:$('#from_date').val(),
                    to_date:$('#to_date').val() 
                })
            })
            .then(response => {
                if (!response.status) {
                    throw new Error('Login failed');
                }
                return response.json(); // Parse the JSON from the response
            })
            .then(data => {
                // Handle the success case
                
                $('#price').val(parseFloat(data.price).toFixed(2));
                $('#amount').val(parseFloat(data.amount).toFixed(2));
                $('#cgst_amt').val(parseFloat(data.cgst_amt).toFixed(2));
                $('#sgst_amt').val(parseFloat(data.sgst_amt).toFixed(2));
                $('#final_total').val(parseFloat(data.final_total).toFixed(2));
                $('#days').val(data.days);
                // You can redirect the user or do other actions here
            })
            .catch(error => {
                // Handle the error case
            
                console.error('Error:', error);
            });


            
        }     
    }



    $(function() {
    
    $('#from_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                showClose: true,
                showClear: true,
                showTodayButton: true,

            });
    });

</script>
</body>
</html>