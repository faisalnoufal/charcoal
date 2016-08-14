
{include file="header.tpl"  name=""}
{include file="page_header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">        
<!-- END PLUGINS CSS -->
{*<script src="https://geoxml3.googlecode.com/svn/branches/polys/geoxml3.js"></script>*}
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing"></script>
{*<script src="http://www.google.com/jsapi"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>*}

<style>  
    #map-canvas {
        height: 500px;
        width: 100%;
        background-color: gray;
    }
</style>

<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"><h3>{$area_name}</h3></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                        <div id="map-canvas"></div>
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-6-->

        </div><!--.row-->
    </div><!--.col-md-6-->
</div>


{if isset($driver_list)}

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h3>Pilot List</h3></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th width=''>Sl.No</th>
                                    <th width=''>Pilot Name</th> 
                                    <th width=''>Email</th>   
                                    <th width=''>Mobile</th>  
                                    <th width=''>User Name</th>                  
                                    <th width=''>Status</th>                  
                                        {*<th>latitude</th>
                                        <th>longitude</th> *}
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$driver_list item=v}

                                    <tr>
                                        <td>{counter}</td> 
                                        <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" target="_blank"> {$v.driver_name} </a</td>
                                        <td>{$v.user_name}</td>
                                        <td>{$v.email}</td>
                                        <td>{$v.mobile}</td>
                                        <td>{if $v.status==0}
                                            Ready
                                            {elseif $v.status==1}Offline
                                                {elseif $v.status==2}Running
                                                    {elseif $v.status==3}Waiting
                                                        {elseif $v.status==4}Going to pick up
                                                            {else}
                                                                Status Missing
                                                                {/if}
                                                                </td>
                                                                {* <td>{$v.latitude}</td>
                                                                <td>{$v.longitude}</td>*}

                                                            </tr>
                                                            {/foreach}
                                                            </tbody>
                                                        </table>
                                                    </div><!--.overflow-table-->
                                                </div><!--.panel-body-->
                                            </div><!--.panel-->
                                        </div><!--.col-md-12-->
                                    </div><!--.row-->

                                    {/if}

                                        <div>
                                            <a href='{$base_url}Surge/Surge_management'>
                                                <button type="button" class="btn btn-blue" >
                                                    <span class="glyphicon glyphicon-circle-arrow-left" > Back</span>
                                                </button>
                                            </a>

                                        </div>
                                        {include file="page_footer.tpl"  name=""}  
                                        {include file="layer.tpl"  name=""}  
                                        {include file="footer.tpl"  name=""} 

                                        <script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
                                        <script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
                                        <!-- END PLUGINS AREA -->

                                        <!-- PLUGINS INITIALIZATION AND SETTINGS -->
                                        <script src="{$js_path}/tables-datatables.js"></script>
                                        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
                                        <script src="{$js_path}surge_create.js"></script>


                                        <script>
                                            $(document).ready(function () {
                                                Pleasure.init();
                                                Layout.init();
                                                 TablesDataTables.init();
                                                MapsGoogle.init({$location},{$radious},{$latitude},{$longitude});
                                            });
                                        </script>
                                        {include file="page_close.tpl"  name=""} 
