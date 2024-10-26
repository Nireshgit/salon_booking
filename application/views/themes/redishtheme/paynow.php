<?php $theme_view('includes/head'); ?>
<?php $theme_view('includes/headEnd'); ?>
<?php $theme_view('includes/header'); ?>
	
	<div class="mainSection endUser">
		<div class="container">
            <div class="profileSetting selectionBoxMain clearfix">
                <h1 class="profileTitle"><a href="#"><i class=""></i></a><?php echo html_escape($title, true); ?></h1>
                <div class="pt-3">
                    <div class="afterContinueMain">
                        <div class="afterContinue">
                            <img class="serviceImg" src="<?php uploads("img/".$service['image']);?>" alt="">
                            <ul class="serviceDetail">
                                <li><h5><span id="serviceTitle"><?php echo html_escape($service['title'], true); ?></span></h5></li>
                                <li><span class="labels">Date:</span> <?php echo html_escape($booking['date'], true); ?></li>
                                <li><span class="labels">Time:</span> <?php echo html_escape($booking['timing'], true); ?></li>
                                <li><span class="labels">No of guest:</span> <?php echo html_escape($booking['adults'], true); ?> Adults - <?php echo html_escape($booking['childrens'], true); ?> Children</li>
                                <li><span class="labels">Service Price:</span> $<?php echo html_escape($service['price'], true); ?></li>
                                <li><span class="labels">Total Price:</span> $<?php echo (html_escape($booking['adults'], true) + html_escape($booking['childrens'], true))*html_escape($service['price'], true); ?></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <form id="serviceUserForm" method="post" action="<?php echo base_url('userbooking/paynow/'.html_escape($booking['id'], true));?>">
                    <div class="afterContinueMain">
                        <label for="">Select Payment Method</label>
                        <div class="singleInputform form-group">
                            <select class="custom-select" name="selectPayment" id="selectMethod" required>
                                <option value="0" selected>By Cash</option>
                                <?php if($stripe['status'] == 1){ ?><option value="1">Credit Card</option><?php } ?>
                            </select>
                            <span class="iconbadge"><span class="icon-credit-card"></span></span>
                            <span class="iconArrow"><span class="icon-cheveron-down"></span></span>
                        </div>
                        <div id="payment-card" data-val="1" class="d-none">
                            <div id="card-element"><!-- A Stripe Element will be inserted here. --></div>
                            <!-- Used to display form errors. -->
                            <small id="card-errors" role="alert" class="form-text text-danger"></small>
                        </div>
                        <button class="btn btn-dark formSubmitBtn btn-block" type="submit" id="serviceSubmit" name="submit">
                            <span class="loaderBeforeSubmit">Submit</span>
                            <div class="stage d-none"><div class="dot-floating"></div></div>
                        </button>
                    </div>
                    <!-- /afterContinueMain -->
                    </form>
                </div>
                <!-- /selectionBoxMain -->
            </div>



		</div>
	</div>
	<!-- /mainSection -->
	
<?php $theme_view('includes/foot'); ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
	// Create a Stripe client.
	var stripe = Stripe('<?php echo $stripe_publishable_key; ?>');
</script>
<script src="<?php $assets("js/paynow.js"); ?>"></script>
<?php $theme_view('includes/footEnd'); ?>