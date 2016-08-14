
{include file="header.tpl"  name=""}
{include file="page_header.tpl"  name=""}
{*<script src="https://geoxml3.googlecode.com/svn/branches/polys/geoxml3.js"></script>*}
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing"></script>
{*<script src="http://www.google.com/jsapi"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>*}

<style>  
    #map-canvas {
        height: 400px;
        width: 100%;
        background-color: gray;
    }
</style>

<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body">
                        <div id="map-canvas"></div>
                        <br>
                        <section>
                            <legend>Details</legend>
                        <div style="font-size: small">
                            
                            <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" enctype="multipart/form-data">
                                 
                            
                                <div class="row">
                                    <div class="col-md-4">Name</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7">
                                        <input  type="text" class="form-control" placeholder="Surge Name" data-parsley-error-message="Surge Name Required" name="surge_name" required="">
                                    </div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Radius</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7">
                                        <input  type="label" class="form-control" placeholder="Surge Radius" name="surge_radious" data-parsley-error-message="Surge Radius Required" id="map-radius" required="">
                                       
                                    </div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Latitude </div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7">
                                         <input  type="text" class="form-control" name="surge_lat"  id="map-lat" data-parsley-error-message="Surge Latitude Required" placeholder="Surge Latitude" required="">
                                    </div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Longitude</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"> 
                                        <input  type="text" class="form-control" name="surge_lng"  id="map-lng" placeholder="Surge Longitude" data-parsley-error-message="Surge Longitude Required" required="">
                                    </div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4"></div><!--.col-md-3-->

                                    <div class="col-md-8"> 
                                        <button type="submit" class="btn btn-blue" value="submit"  name="submit">Submit</button>
                                    </div><!--.col-md-9-->
                                </div><!--.row-->
                          
                       
                    </form>
                            
                            
                        </div>
                        </section>
                        
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-6-->
          
               
        </div><!--.row-->
    </div><!--.col-md-6-->
</div>
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

<script src="{$js_path}surge_area.js"></script>
 <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
{* <script src="{$js_path}forms-validations-parsley.js"></script>*}
<script src="{$js_path}validate_Cab_Management.js"></script>

<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        FormsValidationsParsley.init();
    });
</script>
{include file="page_close.tpl"  name=""} 
