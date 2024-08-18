<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="<?php echo $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'active' : '';?>">
<a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i><span> Dashboard</span> </a>
</li>

<!-- <li class="<?php echo $this->uri->segment(1) == 'company' ? 'active' : '';?>">
<a href="<?php echo base_url();?>company"><i class="fa fa-building"></i><span>Company</span> </a>
</li> -->

<!-- <li class="submenu">
<a href="<?php echo base_url();?>javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/product.svg" alt="img"><span> Masters</span> <span class="menu-arrow"></span></a>
<ul>
    <li><a href="<?php echo base_url();?>category" class="<?php echo $this->uri->segment(1) == 'category' && $this->uri->segment(2) == '' ? 'active' : '';?>">Category List</a></li>

    <li><a href="<?php echo base_url();?>category/addcategory" class="<?php echo $this->uri->segment(2) == 'addcategory' || $this->uri->segment(2) == 'editcategory' ? 'active' : '';?>">Add Category</a></li>

    <li><a href="<?php echo base_url();?>brand" class="<?php echo $this->uri->segment(1) == 'brand' && $this->uri->segment(2) == '' ? 'active' : '';?>">Brand List</a></li>

    <li><a href="<?php echo base_url();?>brand/addbrand" class="<?php echo ($this->uri->segment(2) == 'addbrand' || $this->uri->segment(2) == 'editbrand') ? 'active' : '';?>">Add Brand</a></li>
</ul>
</li> -->

<!-- <li class="submenu">
<a href="<?php echo base_url();?>javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/users1.svg" alt="img"><span> Customer</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="<?php echo base_url();?>customers" class="<?php echo $this->uri->segment(1) == 'customers' && $this->uri->segment(2) == '' ? 'active' : '';?>">Customer List</a></li>

<li><a href="<?php echo base_url();?>customers/addcustomer" class="<?php echo $this->uri->segment(2) == 'addcustomer' || $this->uri->segment(2) == 'editcustomer' ? 'active' : '';?>">Add Customer</a></li>

</ul>
</li> -->


<li class="submenu">
<a href="<?php echo base_url();?>javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/product.svg" alt="img"><span> Cars</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="<?php echo base_url();?>cars" class="<?php echo $this->uri->segment(1) == 'cars' && $this->uri->segment(2) == '' ? 'active' : '';?>">Car List</a></li>
<li><a href="<?php echo base_url();?>cars/addcar" class="<?php echo $this->uri->segment(2) == 'addcar' || $this->uri->segment(2) == 'editcar' ? 'active' : '';?>">Add Car</a></li>

</ul>
</li>
<li class="submenu">
<a href="<?php echo base_url();?>javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/sales1.svg" alt="img"><span> Bookings</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="<?php echo base_url();?>booking" class="<?php echo $this->uri->segment(1) == 'booking' && $this->uri->segment(2) == '' ? 'active' : '';?>">Booking List</a></li>

<!-- <li><a href="<?php echo base_url();?>booking/addbooking" class="<?php echo $this->uri->segment(1) == 'booking' && ($this->uri->segment(2) == 'addbooking' || $this->uri->segment(2) == 'editbooking') ? 'active' : '';?>">New Booking</a></li> -->

</ul>
</li>

<li class="submenu">
<a href="<?php echo base_url();?>javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/sales1.svg" alt="img"><span> Estimate</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="<?php echo base_url();?>estimate" class="<?php echo $this->uri->segment(1) == 'estimate' && $this->uri->segment(2) == '' ? 'active' : '';?>">Estimate List</a></li>

<li><a href="<?php echo base_url();?>estimate/addestimate" class="<?php echo $this->uri->segment(1) == 'estimate' && ($this->uri->segment(2) == 'addestimate' || $this->uri->segment(2) == 'editbooking') ? 'active' : '';?>">New Estimate</a></li>

</ul>
</li>


</ul>
</div>
</div>
</div>