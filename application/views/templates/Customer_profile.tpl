<!DOCTYPE html>
{include file="header.tpl"  name=""}  

{include file="page_header.tpl"  name=""}  
<link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">

<div class="content">

    <div class="page-header full-content parallax" style="height: 300px; overflow: hidden">
        <div class="parallax-bg" style="background: url('{$image_path}24.jpg') 50% 50%; background-size: cover; width: 100%; height: 100%; position: absolute; left: 0; top: 0;">
        </div>

        <div class="profile-info">
            <div class="profile-photo">
                <img src="{$image_path}faces/passenger/{$profile_pic}" alt="">
            </div><!--.profile-photo-->
            <div class="profile-text light">
                {$fullname}
                <span class="caption">Passenger</span>
            </div><!--.profile-text-->
        </div><!--.profile-info-->

        <div class="row">
            <div class="col-sm-6">
                <h1>Passenger Profile <!-- <small>{$fullname}</small> --></h1>
            </div><!--.col-->
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="ion-home"></i></a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#" class="active">Customer Profile</a></li>
                </ol>
            </div> --><!--.col-->
        </div><!--.row-->

        <div class="header-tabs scrollable-tabs sticky">
            <ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow">
                <li class="active"><a href="#about" data-toggle="tab" class="btn-ripple">About</a></li>
                {*<li><a href="#edit" data-toggle="tab" class="btn-ripple">Edit</a></li>*}

            </ul>
        </div>

    </div><!--.page-header-->

    <div class="row user-profile">
        <div class="col-md-12">
            <div class="tab-content without-border">

                <div id="about" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-tabs borderless vertical">
                                <li class="active"><a href="#about_overview" data-toggle="tab">Overview</a></li>
                                <li><a href="#about_timeline" data-toggle="tab">Timeline</a></li>
                            </ul>
                        </div><!--.col-md-3-->
                        <div class="col-md-9">
                            <div class="tab-content">

                                <div class="tab-pane active" id="about_overview">
                                    <div class="legend">Basic Information</div>
                                    <div class="row">
                                        <div class="col-md-3">Name</div><!--.col-md-3-->
                                        <div class="col-md-9">{$fullname}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Email</div><!--.col-md-3-->
                                        <div class="col-md-9">{$email}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Mobile</div><!--.col-md-3-->
                                        <div class="col-md-9">{$mobile}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Joining Date</div><!--.col-md-3-->
                                        <div class="col-md-9">{$join_date|date_format}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    
                                   {* <div class="legend">Bank Information</div>
                                    <div class="row">
                                        <div class="col-md-3">Bank Name</div><!--.col-md-3-->
                                        <div class="col-md-9">{$bank_name}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Account Number</div><!--.col-md-3-->
                                        <div class="col-md-9">{$acc_number}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Branch Code</div><!--.col-md-3-->
                                        <div class="col-md-9">{$branch_code}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Swift Code</div><!--.col-md-3-->
                                        <div class="col-md-9">{$swift_code}</div><!--.col-md-9-->
                                    </div><!--.row-->*}
                                </div><!--#about_overview.tab-pane-->

                                <div class="tab-pane" id="about_timeline">
                                    <div class="timeline single">
                                        {foreach from=$timeline item=v}
                                            <div class="frame">
                                                <div class="timeline-badge">
                                                    <i class="fa fa-headphones"></i>
                                                </div><!--.timeline-badge-->
                                                <span class="timeline-date">{$v.unique_id} - TRIP {$v.status}</span>
                                                <div class="timeline-content">
                                                    <p>Driver : {$v.drivername}</p>   
                                                    <p>Order Time : {$v.order_date}</p>
                                                    <p>Start Time : {$v.start_time}</p>
                                                    <p>Start Location : {$v.start_location}</p>
                                                    <p>End Location : {$v.end_location}</p>
                                                </div><!--.timeline-content-->
                                            </div><!--.frame-->
                                        {/foreach}                                       
                                    </div><!--.timeline-->
                                </div><!--#about_timeline.tab-pane-->

                            </div><!--.tab-content-->

                        </div><!--.col-md-9-->
                    </div><!--.row-->
                </div><!--#about.tab-pane-->

              
            </div><!--.tab-content-->
        </div><!--.col-->
    </div><!--.row-->

    {*<div class="footer-links margin-top-40">
        <div class="row no-gutters">
            <div class="col-xs-6 bg-blue-grey">
                <a href="#">
                    <span class="state">Tables</span>
                    <span>Datatable Extensions</span>
                    <span class="icon"><i class="ion-android-arrow-back"></i></span>
                </a>
            </div><!--.col-->
            <div class="col-xs-6 bg-indigo">
                <a href="#" target="_blank">
                    <span class="state">Pages</span>
                    <span>Lock Screen</span>
                    <span class="icon"><i class="ion-android-arrow-forward"></i></span>
                </a>
            </div><!--.col-->
        </div><!--.row-->
    </div><!--.footer-links-->*}

    <!-- Bootstrap Image Gallery lightbox -->
    <!-- To use original bootstrap modal window erase data-use-boostrap-model attr -->

</div><!--.content-->

<div class="layer-container">

    <!-- BEGIN MENU LAYER -->
    <div class="menu-layer">
        <ul>
            <li>
                <a href="index.html">Dashboard</a>
            </li>

        </ul>
    </div><!--.menu-layer-->
    <!-- END OF MENU LAYER -->

    <!-- BEGIN SEARCH LAYER -->
    <div class="search-layer">
        <div class="search">
            <form action="pages-search-results.html">
                <div class="form-group">
                    <input type="text" id="input-search" class="form-control" placeholder="type something">
                    <button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
                </div>
            </form>
        </div><!--.search-->

        <div class="results">
            <div class="row">
                <div class="col-md-4">
                    <div class="result result-users">
                        <h4>USERS <small>(3)</small></h4>

                        <ul class="list-material">
                            <li class="has-action-left">
                                <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                <a href="#" class="visible">
                                    <div class="list-action-left">
                                        <img src="../../assets/globals/img/faces/1.jpg" class="face-radius" alt="">
                                    </div>
                                    <div class="list-content">
                                        <span class="title">Pari Subramanium</span>
                                        <span class="caption">Legacy Response Assistant</span>
                                    </div>
                                </a>
                            </li>


                        </ul>

                    </div><!--.results-user-->
                </div><!--.col-->



            </div><!--.row-->
        </div><!--.results-->
    </div><!--.search-layer-->
    <!-- END OF SEARCH LAYER -->

</div><!--.layer-container-->
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}  

<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
<script src="{$js_path}validate_Cab_Management.js"></script>
<script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        //UserPages.profile();
        FormsValidationsParsley.init();
        FormsPickers.init();

    });

    var FormsPickers = {
        dateRangePicker: function () {
            $('.bootstrap-daterangepicker-basic').daterangepicker({
                singleDatePicker: true
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            }
            );
        },
        init: function () {
            this.dateRangePicker();
        }
    }
</script>

{include file="page_close.tpl"  name=""} 