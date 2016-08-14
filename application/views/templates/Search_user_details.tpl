

<div class="">
    <div class="search">
        {*<form action="pages-search-results.html" >*}
        {if $common_searching=='yes'}
        <form action="" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data" name="search_form">
            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">   
            <div class="form-group">
                <input type="text" id="input_search" class="form-control" placeholder="type something" name="input_search" value="" onKeyUp="getAllDetails()" autocomplete='Off' />
                <button type="submit" class="btn btn-default" name="search_user" id="search_user" value="submit"><i class="ion-search"></i></button>
            </div>
        </form>
         {else}
             <input type="hidden" name="path_root" id="path_root" value="{$base_url}">   
            <div class="form-group">
                <input type="text" id="input_search" class="form-control" placeholder="type something" name="input_search" value="" onKeyUp="getAllDetails()" autocomplete='Off' />
                <button type="submit" class="btn btn-default" name="search_user" id="search_user" value="submit"><i class="ion-search"></i></button>
            </div>
        {/if}
    </div>
    <div class="results">
        <div class="row">
            <div class="col-md-4" id="list_drivers">
                <div class="result result-users">
                    <h4>PILOTS <small>({count($driver_search_details)})</small></h4>

                    <ul class="list-material" id="list_drivers1">
                        {foreach from=$driver_search_details item=v}
                            <li class="has-action-left">
                                <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                <a href="#" class="visible">
                                    <div class="list-action-left">
                                        <img src="{$image_path}faces/{$v.profile_pic}" class="face-radius" alt="">
                                    </div>
                                    <div class="list-content">
                                        <span class="title">{$v.first_name}</span>
                                        <span class="caption"><a href="{$base_url}Profile/Profile_view/{$v.user_id}"><div class="caption"><strong>View Profile</strong></div></a></span>                                        
                                    </div>
                                </a>
                            </li>
                        {/foreach}
                    </ul>

                </div><!--.results-driver-->
            </div><!--.col-->
            <div class="col-md-4" id="list_users">
                <div class="result result-users">
                    <h4>PASSENGERS <small>({count($user_search_details)})</small></h4>

                    <ul class="list-material" id="list_users1">
                        {foreach from=$user_search_details item=v}
                            <li class="has-action-left">
                                <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                <a href="#" class="visible">
                                    <div class="list-action-left">
                                        <img src="{$image_path}faces/passenger/{$v.profile_pic}" class="face-radius" alt="">
                                    </div>
                                    <div class="list-content">
                                        <span class="title">{$v.user_name}</span>
                                        <span class="caption"><a href="{$base_url}Customer/Profile_view/{$v.user_id}"><div class="caption"><strong>View Profile</strong></div></a></span>                                        
                                    </div>
                                </a>
                            </li>
                        {/foreach}

                    </ul>

                </div><!--.results-user-->
            </div>

        </div><!--.row-->
    </div><!--.results-->
</div>
<script src="{$js_path}search.js"></script>
