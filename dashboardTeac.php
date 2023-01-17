<?php

include "leftSideBarTeac.php";
?>

<!--Main container start -->
<main class="ttr-wrapper">
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Dashboard</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li>Dashboard</li>
        </ul>
    </div>	
    <!-- Card -->
    <div class="row">
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg1">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        Total Frofit
                    </h4>
                    <span class="wc-des">
                        All Customs Value
                    </span>
                    <span class="wc-stats">
                        $<span class="counter">18</span>M 
                    </span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Change
                        </span>
                        <span class="wc-number ml-auto">
                            78%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg2">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                         New Feedbacks
                    </h4>
                    <span class="wc-des">
                        Customer Review
                    </span>
                    <span class="wc-stats counter">
                        120 
                    </span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Change
                        </span>
                        <span class="wc-number ml-auto">
                            88%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg3">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        New Orders 
                    </h4>
                    <span class="wc-des">
                        Fresh Order Amount 
                    </span>
                    <span class="wc-stats counter">
                        772 
                    </span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Change
                        </span>
                        <span class="wc-number ml-auto">
                            65%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg4">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        New Users 
                    </h4>
                    <span class="wc-des">
                        Joined New User
                    </span>
                    <span class="wc-stats counter">
                        350 
                    </span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Change
                        </span>
                        <span class="wc-number ml-auto">
                            90%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
    </div>
    <!-- Card END -->
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-8 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Your Profile Views</h4>
                </div>
                <div class="widget-inner">
                    <canvas id="chart" width="100" height="45"></canvas>
                </div>
            </div>
        </div>
        <!-- Your Profile Views Chart END-->
        <div class="col-lg-4 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Notifications</h4>
                </div>
                <div class="widget-inner">
                    <div class="noti-box-list">
                        <ul>
                            <li>
                                <span class="notification-icon dashbg-gray">
                                    <i class="fa fa-check"></i>
                                </span>
                                <span class="notification-text">
                                    <span>Sneha Jogi</span> sent you a message.
                                </span>
                                <span class="notification-time">
                                    <a href="#" class="fa fa-close"></a>
                                    <span> 02:14</span>
                                </span>
                            </li>
                            <li>
                                <span class="notification-icon dashbg-yellow">
                                    <i class="fa fa-shopping-cart"></i>
                                </span>
                                <span class="notification-text">
                                    <a href="#">Your order is placed</a> sent you a message.
                                </span>
                                <span class="notification-time">
                                    <a href="#" class="fa fa-close"></a>
                                    <span> 7 Min</span>
                                </span>
                            </li>
                            <li>
                                <span class="notification-icon dashbg-red">
                                    <i class="fa fa-bullhorn"></i>
                                </span>
                                <span class="notification-text">
                                    <span>Your item is shipped</span> sent you a message.
                                </span>
                                <span class="notification-time">
                                    <a href="#" class="fa fa-close"></a>
                                    <span> 2 May</span>
                                </span>
                            </li>
                            <li>
                                <span class="notification-icon dashbg-green">
                                    <i class="fa fa-comments-o"></i>
                                </span>
                                <span class="notification-text">
                                    <a href="#">Sneha Jogi</a> sent you a message.
                                </span>
                                <span class="notification-time">
                                    <a href="#" class="fa fa-close"></a>
                                    <span> 14 July</span>
                                </span>
                            </li>
                            <li>
                                <span class="notification-icon dashbg-primary">
                                    <i class="fa fa-file-word-o"></i>
                                </span>
                                <span class="notification-text">
                                    <span>Sneha Jogi</span> sent you a message.
                                </span>
                                <span class="notification-time">
                                    <a href="#" class="fa fa-close"></a>
                                    <span> 15 Min</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>New Users</h4>
                </div>
                <div class="widget-inner">
                    <div class="new-user-list">
                        <ul>
                            <li>
                                <span class="new-users-pic">
                                    <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                                </span>
                                <span class="new-users-text">
                                    <a href="#" class="new-users-name">Anna Strong </a>
                                    <span class="new-users-info">Visual Designer,Google Inc </span>
                                </span>
                                <span class="new-users-btn">
                                    <a href="#" class="btn button-sm outline">Follow</a>
                                </span>
                            </li>
                            <li>
                                <span class="new-users-pic">
                                    <img src="assets/images/testimonials/pic2.jpg" alt=""/>
                                </span>
                                <span class="new-users-text">
                                    <a href="#" class="new-users-name"> Milano Esco </a>
                                    <span class="new-users-info">Product Designer, Apple Inc </span>
                                </span>
                                <span class="new-users-btn">
                                    <a href="#" class="btn button-sm outline">Follow</a>
                                </span>
                            </li>
                            <li>
                                <span class="new-users-pic">
                                    <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                                </span>
                                <span class="new-users-text">
                                    <a href="#" class="new-users-name">Nick Bold  </a>
                                    <span class="new-users-info">Web Developer, Facebook Inc </span>
                                </span>
                                <span class="new-users-btn">
                                    <a href="#" class="btn button-sm outline">Follow</a>
                                </span>
                            </li>
                            <li>
                                <span class="new-users-pic">
                                    <img src="assets/images/testimonials/pic2.jpg" alt=""/>
                                </span>
                                <span class="new-users-text">
                                    <a href="#" class="new-users-name">Wiltor Delton </a>
                                    <span class="new-users-info">Project Manager, Amazon Inc </span>
                                </span>
                                <span class="new-users-btn">
                                    <a href="#" class="btn button-sm outline">Follow</a>
                                </span>
                            </li>
                            <li>
                                <span class="new-users-pic">
                                    <img src="assets/images/testimonials/pic3.jpg" alt=""/>
                                </span>
                                <span class="new-users-text">
                                    <a href="#" class="new-users-name">Nick Stone </a>
                                    <span class="new-users-info">Project Manager, Amazon Inc  </span>
                                </span>
                                <span class="new-users-btn">
                                    <a href="#" class="btn button-sm outline">Follow</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Orders</h4>
                </div>
                <div class="widget-inner">
                    <div class="orders-list">
                        <ul>
                            <li>
                                <span class="orders-title">
                                    <a href="#" class="orders-title-name">Anna Strong </a>
                                    <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                </span>
                                <span class="orders-btn">
                                    <a href="#" class="btn button-sm red">Unpaid</a>
                                </span>
                            </li>
                            <li>
                                <span class="orders-title">
                                    <a href="#" class="orders-title-name">Revenue</a>
                                    <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                </span>
                                <span class="orders-btn">
                                    <a href="#" class="btn button-sm red">Unpaid</a>
                                </span>
                            </li>
                            <li>
                                <span class="orders-title">
                                    <a href="#" class="orders-title-name">Anna Strong </a>
                                    <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                </span>
                                <span class="orders-btn">
                                    <a href="#" class="btn button-sm green">Paid</a>
                                </span>
                            </li>
                            <li>
                                <span class="orders-title">
                                    <a href="#" class="orders-title-name">Revenue</a>
                                    <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                </span>
                                <span class="orders-btn">
                                    <a href="#" class="btn button-sm green">Paid</a>
                                </span>
                            </li>
                            <li>
                                <span class="orders-title">
                                    <a href="#" class="orders-title-name">Anna Strong </a>
                                    <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                </span>
                                <span class="orders-btn">
                                    <a href="#" class="btn button-sm green">Paid</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Basic Calendar</h4>
                </div>
                <div class="widget-inner">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
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
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<script>
$(document).ready(function() {

$('#calendar').fullCalendar({
header: {
left: 'prev,next today',
center: 'title',
right: 'month,agendaWeek,agendaDay,listWeek'
},
defaultDate: '2019-03-12',
navLinks: true, // can click day/week names to navigate views

weekNumbers: true,
weekNumbersWithinDays: true,
weekNumberCalculation: 'ISO',

editable: true,
eventLimit: true, // allow "more" link when too many events
events: [
{
  title: 'All Day Event',
  start: '2019-03-01'
},
{
  title: 'Long Event',
  start: '2019-03-07',
  end: '2019-03-10'
},
{
  id: 999,
  title: 'Repeating Event',
  start: '2019-03-09T16:00:00'
},
{
  id: 999,
  title: 'Repeating Event',
  start: '2019-03-16T16:00:00'
},
{
  title: 'Conference',
  start: '2019-03-11',
  end: '2019-03-13'
},
{
  title: 'Meeting',
  start: '2019-03-12T10:30:00',
  end: '2019-03-12T12:30:00'
},
{
  title: 'Lunch',
  start: '2019-03-12T12:00:00'
},
{
  title: 'Meeting',
  start: '2019-03-12T14:30:00'
},
{
  title: 'Happy Hour',
  start: '2019-03-12T17:30:00'
},
{
  title: 'Dinner',
  start: '2019-03-12T20:00:00'
},
{
  title: 'Birthday Party',
  start: '2019-03-13T07:00:00'
},
{
  title: 'Click for Google',
  url: 'http://google.com/',
  start: '2019-03-28'
}
]
});

});

</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>