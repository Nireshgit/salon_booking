<?php $theme_view('includes/head'); ?>
<?php $theme_view('includes/headEnd'); ?>
<?php $theme_view('includes/header'); ?>
	
	<div class="mainSection endUser">
		<div class="container">
            <div class="profileSetting selectionBoxMain clearfix">
                <h1 class="profileTitle"><?php echo html_escape($title, true); ?></h1>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Service</th>
                                <th scope="col">Agent Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Adults</th>
                                <th scope="col">Childrens</th>
                                <th scope="col">Total Bill</th>
                                <th scope="col">Service Status</th>
                                <th scope="col">Payment Status</th>
                                <?php if($stripe['status'] == 1){ ?><th scope="col">Action</th><?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!$bookings){?>
                                <tr>
                                    <td colspan="9" class="text-center"><h4 class="text-muted">No Booking Found</h4></td>
                                </tr>
                            <?php } else{?>
                            <?php foreach ($bookings as $booking ){ ?>
                                <tr>
                                    <th scope="row"><?php echo html_escape($booking['id'], true); ?></th>
                                    <td><?php echo html_escape($booking['title'], true); ?></td>
                                    <td><?php if($booking['agentId'] == 0){ echo 'Any Agent'; }else{ echo html_escape($booking['agentName'], true); } ?></td>
                                    <td><?php echo html_escape($booking['date'], true); ?></td>
                                    <td><?php echo html_escape($booking['timing'], true) ?></td>
                                    <td><?php echo html_escape($booking['adults'], true) ?></td>
                                    <td><?php echo html_escape($booking['childrens'], true) ?></td>
                                    <td><?php echo '$'.(html_escape($booking['adults'], true) + html_escape($booking['childrens'], true))*html_escape($booking['price'], true) ?></td>
                                    <td><?php if(html_escape($booking['serviceStatus'], true) == '' || html_escape($booking['serviceStatus'], true) == '0'){ echo '<span class="badge badge-warning">Pending</span>'; } else if(html_escape($booking['serviceStatus'], true) == '1') { echo '<span class="badge badge-success">Confirmed</span>'; } else if(html_escape($booking['serviceStatus'], true) == '2') { echo '<span class="badge badge-secondary">Cancelled</span>'; } ?></td>
                                    <td><?php if(!html_escape($booking['orderId'],true)){ echo '<span class="badge badge-danger">Due</span>'; } else { echo '<span class="badge badge-success">paid</span>'; } ?></td>
                                    <?php if($stripe['status'] == 1){ ?>
                                        <td><?php if(!html_escape($booking['orderId'],true)){ echo '<a href="'.base_url('userbooking/paynow/'.html_escape($booking['id'], true)).'" class="btn btn-outline-primary btn-sm">Pay Now</span>'; } else { echo '<a target="_blank" href="'.html_escape($booking['receipt_url'],true).'" class="btn btn-primary btn-sm">Invoice</span>'; } ?></td>
                                    <?php } ?>

                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>



		</div>
	</div>
	<!-- /mainSection -->
	
<?php $theme_view('includes/foot'); ?>

<?php $theme_view('includes/footEnd'); ?>