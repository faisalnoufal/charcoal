
{include file="header.tpl"  name=""}  
{include file="page_header.tpl"  name=""}  


<div class="content">
    <div style="float:right">
        <form action="" class="form-horizontal form-striped form-bordered" method="post" name="search_form">
            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">   
            <div class="form-group">
                <input type="text" id="input_search" class="form-control" placeholder="Search pilot" name="input_search" value="" onKeyUp="get_drivers()" autocomplete='Off' />
            </div>
        </form>
    </div>

    <div class="row user-profile">
        <div class="col-md-12">
            <div class="tab-content without-border">
                
                <div id="trips" class="tab-pane active">
                    <div class="row" id='user_list'>
                        {foreach from = $drivers  item=v}
                            <div class="col-md-6">
                                <div class="card tile card-friend">
                                    <img src="{$image_path}/faces/{$v.profile_pic}" class="user-photo" alt="">
                                    <div class="friend-content">
                                        <p class="title"><a href="{$base_url}Profile/Profile_view/{$v.user_id}"class="btn btn-flat btn-primary btn-xs" target="_blank">{$v.fullname}</a></p>
                                        <p><a href="#">{$v.total_trip} Trips</a></p>
                                        <a href="{$base_url}Location/Driver_location/{$v.user_id}"class="btn btn-flat btn-primary btn-xs">View Location</a>
                                    </div><!--.friend-content-->
                                </div><!--.card-->
                            </div><!--.col-md-6-->
                        {/foreach}
                    </div><!--.row-->                            
                </div>
            </div><!--.tab-content-->
        </div><!--.col-->
        
        <div style="float:right" id='page_link'>
            {$page_links}
        </div>

    </div>
 </div> 
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}

<script src="{$js_path}driver_location.js"></script>

<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();   

    });
</script>
{include file="page_close.tpl"  name=""} 
