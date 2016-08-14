{*<br>
<div class="display-animation">
<h3 style="">ONGOING TRIPS</h3>
<div class="row image-row margin-bottom-40" id="active_trip_array">  *}
{*{assign var=i value="0"}
{foreach from = $drivers  item=v}          
{if $i<8} 
<div class="col-md-6">
<div class="card tile card-friend">                        
<img src="{$image_path}/faces/{$v.profile_pic}" class="user-photo" alt="">
<div class="friend-content">
<p class="title">{$v.first_name}</p>
<p><a href="#">{1|rand:200} Trips</a></p>
<a href="{$base_url}Location/Driver_location/{$v.user_id}"class="btn btn-flat btn-primary btn-xs">View Location</a>
</div><!--.friend-content-->                               
</div>
</div>
{/if} 
{$i=$i+1}                       
{/foreach}*}
{*</div><!--.row-->
</div>*}


{*<br>
<div class="row display-animation">  
    <div class="col-md-12" >
        <div class="card card-pricing card-pricing-dark active">

            <div class="card-heading">
                <h4>Ongoing Trips</h4>
            </div><!--.card-heading-->

            <div class="card-body col-centered">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body" id="active_trip_array" >

                        </div><!--.panel-body-->
                    </div><!--.panel-->
                </div>
            </div><!--.card-body-->
        </div><!--.card-->
    </div><!--.col-md-3-->
</div>*}

<div class="search-results">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-news">
                <div class="card-heading bg-black bg-image bg-opaque7 sample-bg-image5">
                    
                    <h3 class="card-title">Ongoing Trips<small></small></h3><!--.card-title-->
                </div><!--.card-heading-->

                <div class="card-body" id="active_trip_array">
                    <h4>NO TRIPS FOUND!!</h4>
                    {*<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer...</p>*}
                </div><!--.card-body-->
            </div><!--.card-->
        </div><!--.col-md-6-->
    </div><!--.col-md-6-->
</div><!--.col-md-6-->