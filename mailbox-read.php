<?php

include "leftSideBar.php";
?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Mail Read</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Mail Read</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="email-wrapper">
							<div class="email-menu-bar">
								<div class="compose-mail">
									<a href="mailbox-compose.html" class="btn btn-block">Compose</a>
								</div>
								<div class="email-menu-bar-inner">
									<ul>
										<li class="active"><a href="mailbox.html"><i class="fa fa-envelope-o"></i>Inbox <span class="badge badge-success">8</span></a></li>
										<li><a href="mailbox.html"><i class="fa fa-send-o"></i>Sent</a></li>
										<li><a href="mailbox.html"><i class="fa fa-file-text-o"></i>Drafts <span class="badge badge-warning">8</span></a></li>
										<li><a href="mailbox.html"><i class="fa fa-cloud-upload"></i>Outbox <span class="badge badge-danger">8</span></a></li>
										<li><a href="mailbox.html"><i class="fa fa-trash-o"></i>Trash</a></li>
									</ul>
								</div>
							</div>
							<div class="mail-list-container">
								<div class="mail-toolbar">
									<div class="mail-search-bar">
										<input type="text" class="form-control" placeholder="Search"/>
									</div>
									 <div class="dropdown all-msg-toolbar">
										<span class="btn btn-info-icon" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></span>
										<ul class="dropdown-menu">
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
											<li><a href="#"><i class="fa fa-arrow-down"></i> Archive</a></li>
											<li><a href="#"><i class="fa fa-clock-o"></i> Snooze</a></li>
											<li><a href="#"><i class="fa fa-envelope-open"></i> Mark as unread</a></li>
										</ul>
									</div> 
									<div class="next-prev-btn">
										<a href="#"><i class="fa fa-angle-left"></i></a>
										<a href="#"><i class="fa fa-angle-right"></i></a>
									</div>
								</div>
								<div class="mailbox-view">
									<div class="mailbox-view-title">
										<h5 class="send-mail-title">Your message title goes here</h5>
									</div>
									<div class="send-mail-details">
										<div class="d-flex">
											<div class="send-mail-user">
												<div class="send-mail-user-pic">
													<img src="assets/images/testimonials/pic3.jpg" alt="">
												</div>
												<div class="send-mail-user-info">
													<h4>Pavan kumar</h4>
													<h5>From: example@info.com</h5>
												</div>
											</div>
											<div class="ml-auto send-mail-full-info">
												<div class="time"><span>10:25 PM</span></div>
												<span class="btn btn-info-icon">Reply</span>
												<div class="dropdown all-msg-toolbar ml-auto">
													<span class="btn btn-info-icon" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></span>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
														<li><a href="#"><i class="fa fa-arrow-down"></i> Archive</a></li>
														<li><a href="#"><i class="fa fa-clock-o"></i> Snooze</a></li>
														<li><a href="#"><i class="fa fa-envelope-open"></i> Mark as unread</a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="read-content-body">
											<h5 class="read-content-title">Hi,Ingredia,</h5>
											<p><strong>Ingredia Nutrisha,</strong> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</p>
											<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of
												Grammar. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
											</p>
											<p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
												Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
												sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
												
											<h5 class="read-content-title">Kind Regards</h5>
											<p class="read-content-name">Mr Smith</p>
											<hr>
											<h6> <i class="fa fa-download m-r5"></i> Attachments <span>(3)</span></h6>
											<div class="mailbox-download-file">
												<a href="#"><i class="fa fa-file-image-o"></i> photo.png</a>
												<a href="#"><i class="fa fa-file-text-o"></i> dec.text</a>
												<a href="#"><i class="fa fa-file"></i> video.mkv</a>
											</div>
											<hr>
											<div class="form-group">
												<h6>Reply Message</h6>
												<div class="m-b15">
													<textarea class="form-control"> </textarea>
												</div>
												<button class="btn">Reply Now</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/mailbox-read.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:45 GMT -->
</html>