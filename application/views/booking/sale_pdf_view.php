<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/favicon.jpg">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<style type="text/css">
     .table-responsive {
         overflow-x: hidden;
     }


     
</style>
</head>
<body style="width:820px;margin: 0 auto;">
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper" style="display:table;padding:0;margin:0 auto;">
<?php
        $company_master = $this->db->get('company_master')->result_array();
        $sale_data = $this->api_model->get_one_detail('sale', $sale_id);
        $customer_data = $this->api_model->get_one_detail('customer', $sale_data[0]['customer_id']);
        $sale_items = $this->api_model->fetch_related_data('sale_items', $sale_id, 'sale_id');
    ?>

<?php //$this->load->view('common/header');?>


<?php //$this->load->view('common/sidebar');?>

<div class="page-wrapper" style="margin: 0;padding:0;">
<div class="content" style="padding: 0;">

<div class="card" style="margin: 0;border: 1px solid #000;border-radius: unset;">
<div class="card-body" style="padding: 20px 0;">
    <div class="row" style="margin:0;">
        <div class="col-md-2">
            <img src="<?php echo base_url().$this->config->item('upload_url').'/'.$this->config->item('company_master_upload_url').'/'.$company_master[0]['company_logo'];?>" style="max-width:100px;">
        </div>
        <div class="col-md-8 text-center">
            <h4 style="font-weight: bold;font-family: ui-sans-serif;font-size: 24px;color: #3c2b96;"><?php echo $company_master[0]['name'];?></h4>
            <?php
                if(isset($company_master[0]['tagline']) && $company_master[0]['tagline'] != '')
                {
                    echo '<h6 style="margin: 0 auto;width: max-content;padding: 0px 60px;background-color: #fcc800;font-size: 14px;border-radius: 5px;font-family: ui-sans-serif;font-weight: bold;">'.$company_master[0]['tagline'].'</h6>';
                }
            ?>
            
            <p style="margin: 0;font-size:11px;">
                <?php echo $company_master[0]['office_address'] != '' ? 'Office - '.$company_master[0]['office_address'] : '';?>
                <?php echo $company_master[0]['showroom_address'] != '' ? '<br>Showroom - '.$company_master[0]['showroom_address'] : '';?><br>
                Mobile No - <?php echo $company_master[0]['phone'];?>, Email - <?php echo $company_master[0]['email'];?> 
            </p>
            <h6 style="font-weight: bold;font-family: ui-sans-serif;font-size:14px;color: #3c2b96;">GST NO - <?php echo $company_master[0]['gst_no'];?></h6>
            <h6 style="margin: 0 auto;width: max-content;padding: 0px 10px;background-color: #fcc800;font-size: 18px;border-radius: 5px;font-family: ui-sans-serif;font-weight: bold;">TAX-INVOICE</h6>
            </div>
        <div class="col-md-2" style="width:max-width:100px;">
            <img src="<?php echo base_url().$this->config->item('upload_url').'/'.$this->config->item('company_master_upload_url').'/'.$company_master[0]['qr_code'];?>" style="max-width:100px;">
            </div>
    </div>


<div class="invoice-box table-height" style="max-width: 1600px;width:100%;overflow: auto;margin:15px auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">

</td>
    </tr>

</tbody></table>

<div class="row" style="margin: 0;">
<div class="col-md-4" style="padding: 0;">
<table class="table" border="1px" style="margin-bottom:0px;">
        							<thead style="background-color: #fff;">
                                        <tr style="border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                            <th colspan="7" style="border:none;padding:0;text-align:center;color: #3c2b96;">Customer Details</th>
                                        </tr>
                                        <tr>
                                            <th style="border:none;padding: 0 10px;">Party</th>
                                            
                                            <th style="font-weight: normal;" colspan="6"><?php echo $customer_data[0]['name'];?><br><?php echo $customer_data[0]['address'];?><br><?php echo $customer_data[0]['phone'];?></th>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <th style="border:none;padding: 0 10px;">Mobile No</th>
                                            
                                            <th colspan="6" style="padding: 0 10px;font-weight: normal;"><?php echo $customer_data[0]['phone'];?></th>                                            
                                            
                                        </tr>
                                        <tr>
                                            <th style="border:none;padding: 0 10px;">GST No</th>
                                            
                                            <th colspan="6" style="padding: 0 10px;font-weight: normal;"><?php echo $customer_data[0]['gst_no'];?></th>                                            
                                            
                                        </tr>
        								
        							</thead>
        							
        						</table>
</div>
<div class="col-md-8" style="padding: 0;">
<table class="table" border="1px" style="margin-bottom:0px;">
        							<thead style="border-top: 1px solid #000;
    background-color: #fff;
    border-left: 1px solid #000;">
                                        
                                        <tr>                                           
                                            
                                            <th colspan="3" style="padding: 0 10px;">Invoice No:</th>
                                            <th style="padding: 0 10px;"><?php echo $sale_data[0]['bill_no'];?></th>
                                            <th colspan="3" style="padding: 0 10px;">Dated:</th>
                                            <th style="padding: 0 10px;color:#3c2b96;"><?php echo date('d-m-Y', strtotime($sale_data[0]['sale_date']));?></th>
                                           
                                        </tr>
                                        <tr>                                           
                                            
                                            <th colspan="3" style="padding: 0 10px;">Transport:</th>
                                            <th style="padding: 0 10px;">SELF</th>
                                            <th colspan="3" style="padding: 0 10px;">Due Date:</th>
                                            <th style="padding: 0 10px;color:green;"><?php echo date('d-m-Y', strtotime($sale_data[0]['sale_date']));?></th>
                                           
                                        </tr>
                                        <tr>                                           
                                            
                                            <th colspan="3" style="padding: 0 10px;">E-Way Bill No:</th>
                                            <th style="padding: 0 10px;"></th>
                                            <th colspan="3" style="padding: 0 10px;">place of supply:</th>
                                            <th style="padding: 0 10px;">Maharashtra(27)</th>
                                           
                                        </tr>
                                        <tr> 
                                        <th colspan="8" style="border:none;white-space:unset;">
                                        <p style="font-weight: normal;font-size: 12px;line-height: 18px;"><strong>Term & Conditions : </strong>Goods One Sold Will Not Be Taken Back
Interest @ 20% P.M. Will be Charged if the Payment in not made With The Stipulated Time.
Mobile No8888988408 Warranty From Mfg. Company Service Center As Per Mfg. Company T&C.
GST No All Disputes Subject To BHUSAWAL Jurisdication Only.</p></th>
                                            
                                                                                  
                                            
                                        </tr>
        								
        							</thead>
        							
        						</table>
</div>

    </div>

    <div class="row" style="margin:0;">
        <div class="col-md-12" style="padding:0;">
            <table class="table">
                <thead>
                    <tr class="">
                        <th colspan="5" style="border-top: 1px solid #000;border-bottom: 1px solid #000;color:#000;vertical-align: middle;font-weight: bold;font-size: 13px;">
                        IRN -
                        </th>
                        <th  colspan="6" style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;color:#000;vertical-align: middle;font-weight: bold;font-size: 13px;">
                        , ACK NO.
                        </th>
                    </tr>
                    <tr class="">
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        S.N
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        Description of Goods
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        HSN/SAC<br> Code
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        Qty.
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        Unit
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        Price
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        CGST<br>Rate
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        CGST<br>Amount
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        SGST <br>Rate
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        SGST <br>Amount
                        </th>
                        <th style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-left: 1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                        Amount
                        </th>
                    </tr>
                </thead>
                
                    <?php
                        if(isset($sale_items) && !empty($sale_items))
                            {
                                $products = $this->api_model->get_columns('products', 'id, product_name,image, description');
                                $product_names = array_column($products, 'product_name');
                                $product_ids = array_column($products, 'id');
                                $product_images = array_column($products, 'image');
                                $product_description = array_column($products, 'description');

                                $total_quantity = array_sum(array_column($sale_items, 'qty'));

                                $total_tax_rate = 0;
                                $taxable_amt = 0;

                                $counter = 0;
                                foreach ($sale_items as $key => $value) 
                                {
                                    $total_tax_rate = $value['item_cgst'] + $value['item_sgst'];
                                    $hsn_code = $value['hsn_code'];
                                    $unit = $value['unit'];
                                    $image = $product_images[array_search($value['product_id'], $product_ids)];
                                    $description = $product_description[array_search($value['product_id'], $product_ids)];
                                    $taxable_amt += ($value['qty'] * $value['price']);
                                    $counter++;
                                    ?>
                                            <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-right: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $counter;?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top;align-items: center;">
                                                <?php
                                                    echo !empty($image) ? '<img src="'.base_url().$this->config->item('upload_url').'/'.$this->config->item('product_upload_url').'/'.$image.'" alt="'.$image.'" class="me-2" style="width:40px;height:40px;">' : '';
                                                ?>
                                                <?php echo $product_names[array_search($value['product_id'], $product_ids)];?>
                                                <br>
                                                
                                                <?php echo $description;?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['hsn_code'];?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['qty'];?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['unit'];?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['price'];?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['item_cgst'].' %';?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['item_cgst_amt'];?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['item_sgst'].' %';?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['item_cgst_amt'];?>
                                                </td>
                                                <td style="border-top: 1px solid #000;border-bottom: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;border-left: 1px solid #000;padding: 10px;vertical-align: top; ">
                                                <?php echo $value['sub_total'];?>
                                                </td>
                                            </tr>
                                    
                                    <?php
                                }
                            }
                    ?>

                    <tr class="">
                        <td colspan="3" style="color:#000;vertical-align: middle;font-weight: bold;font-size: 13px;text-align:right;">
                        Grand Total
                        </td>

                        <td style="color:#000;vertical-align: middle;font-weight: bold;font-size: 13px; ">
                        <?php echo $total_quantity;?>
                        </td>
                        <td style="color:#000;vertical-align: middle;font-weight: bold;font-size: 13px; ">
                        <?php echo $unit;?>
                        </td>
                        <td colspan="5" style="color:#000;vertical-align: middle;font-weight: bold;font-size: 13px; ">
                        </td>
                        <td style="color:#000;vertical-align: middle;font-weight: bold;font-size: 13px;border-bottom: 1px solid #000;
    border-left: 1px solid #000;">
                        <?php echo $sale_data[0]['final_total'];?>
                        </td>
                    </tr>

            </table>
        </div>
    </div>

    <div class="row" style="margin:0;">
        <div class="col-md-12" style="padding:0;">
        <table>
            <tr class="total_specification">
                <td style="border-bottom:1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px;text-align:center;">
                HSN/SAC
                </td>

                <td style="border-bottom:1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                Tax Rate
                </td>
                <td style="border-bottom:1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                Taxable Amt.
                </td>
                <td style="border-bottom:1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                CGST Amt.
                </td>
                <td style="border-bottom:1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                SGST Amt.
                </td>
                <td style="border-bottom:1px solid #000;color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                Total Tax
                </td>
            </tr>

            <tr class="">
                <td style="color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px;text-align:center;">
                <?php echo $hsn_code;?>
                </td>

                <td style="color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                <?php echo $total_tax_rate. '%';?>
                </td>
                <td style="color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                <?php echo $taxable_amt;?>
                </td>
                <td style="color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                <?php echo $sale_data[0]['totalCGstTax'];?>
                </td>
                <td style="color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                <?php echo $sale_data[0]['totalSGstTax'];?>
                </td>
                <?php
                    $total_tax = $sale_data[0]['totalCGstTax'] + $sale_data[0]['totalSGstTax'];
                ?>
                <td style="color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px; ">
                <?php echo $total_tax;?>
                </td>
            </tr>

            <tr class="6">
                <td colspan="" style="color:#000;padding: 5px;vertical-align: middle;font-weight: bold;font-size: 13px;padding: 10px;text-align:center;">
                <?php echo 'Rupees '.getCurrencyString($sale_data[0]['final_total']).' Only';?>
                </td>

                
            </tr>
        </table>
        </div>
    </div>

    <div class="row" style="margin:0;">
        <div class="col-md-12" style="padding:0;">  
        <table style="border-bottom: 1px solid #000;width: 100%;">
            <tr class="total_specification">
                <td style="text-align:center;border-top:1px solid #000;color:#000;padding: 5px;font-weight: bold;font-size: 13px;padding: 10px;text-align:center;">
                E-INVOICE QR CODE
                </td>

                <td colspan="2" style="text-align:center;border:1px solid #000;color:#000;padding: 5px;font-weight: bold;font-size: 13px;padding: 10px; ">
                Account Summary
                </td>
                <td style="text-align:center;border-top: 1px solid #000;border-bottom: 1px solid #000;color:#000;padding: 5px;font-weight: bold;font-size: 13px;padding: 10px; ">
                Authorised Signatory
                </td>
            </tr>

            <tr class="total_specification">
                <td style="border-top:1px solid #000;text-align:center;color:#000;padding: 5px;font-weight: bold;font-size: 13px;padding: 10px;text-align:center;">
                </td>
                <td style="border:1px solid #000;text-align:center;color:#000;padding: 5px;font-weight: bold;font-size: 13px;padding: 10px;text-align:center;">
                <ul>
                    <li>1) Total Account Balance :-3,300 Dr</li>
                    <li>2) Last Payment Amount :-27,750</li>
                    <li>3) Last Payment Date :-10-06-2023</li>
                    <li style="color:#3c2b96;">---------------------------Bank Details-----------------------</li>
                    <li>Current Account Name - <?php echo $company_master[0]['current_account_name'];?></li>
                    <li>Current Account Number - <?php echo $company_master[0]['current_account_number'];?></li>
                    <li>IFSC Code :- <?php echo $company_master[0]['ifsc_code'];?></li>
                    
                </ul>
                </td>
                <td style="text-align:center;color:#000;font-weight: bold;font-size: 13px;position:relative:left:10%;">
                <?php echo $company_master[0]['name'];?>   
                </td>
            </tr>
            <table>  
        </div>
    </div>   





</div>

</div>
</div>
</div>
</div>
</div>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>

<script src="<?php echo base_url();?>assets/js/feather.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="<?php echo base_url();?>assets/js/script.js"></script>
</body>
</html>