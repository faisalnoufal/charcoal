
<!DOCTYPE html>
{include file="header.tpl"  name=""}  

{include file="page_header.tpl"  name=""}  


<div class="content">

    {*<!-- <div class="page-header full-content parallax" style="height: 100px; overflow: hidden">
        <div class="row">
            <div class="col-sm-6">
                <h1>Customer Profile <small> </small></h1>
            </div>
             <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="ion-home"></i></a></li>

                    <li><a href="#" class="active">Customer Profile</a></li>
                </ol>
            </div>
        </div>
    </div> -->*}

    <div style="float:right">
        <form action="" class="form-horizontal form-striped form-bordered" method="post" name="search_form">
            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">   
            <div class="form-group">
                <input type="text" id="input_search" class="form-control" placeholder="Search passenger" name="input_search" value="" onKeyUp="get_passenger_profile()" autocomplete='Off' />
            </div>
        </form>
    </div>

    <div class="row user-profile">
        <div class="col-md-12">
            <div class="tab-content without-border">
                <div id="trips" class="tab-pane active">

                    <div class="row" id='user_list'>
                        {foreach from = $customer  item=v}
                            <div class="col-md-6">
                                <div class="card tile card-friend">
                                    <img src="{$image_path}faces/passenger/{$v.profile_pic}" class="user-photo" alt="">
                                    <div class="friend-content">
                                        <p class="title">{$v.fullname}</p>
                                        <p><a href="#">Rate {$v.rating|string_format:"%.2f"}</a></p>
                                        <a href="{$base_url}Customer/Profile_view/{$v.user_id}"class="btn btn-flat btn-primary btn-xs">View Profile</a>
                                    </div><!--.friend-content-->
                                </div><!--.card-->
                            </div><!--.col-md-6-->
                        {/foreach}

                    </div><!--.row-->

                    <div style="float:right" id='page_link'>
                        {$page_links}
                    </div>

                </div>


            </div><!--.tab-content-->
        </div><!--.col-->
    </div><!--.row-->


</div><!--.content-->


{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}  
<script src="{$js_path}driver_location.js"></script>
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        // UserPages.profile();
    });
</script>
{include file="page_close.tpl"  name=""} 