<?php /* Smarty version 3.1.27, created on 2016-04-15 10:12:24
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Create_surge_area.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13625945985710be888e26a3_82601988%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5dced8d122ef957f54e7a93540405c450989526' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Create_surge_area.tpl',
      1 => 1455020142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13625945985710be888e26a3_82601988',
  'variables' => 
  array (
    'base_url' => 0,
    'js_path' => 0,
    'plugin_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710be88906ee3_43059831',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710be88906ee3_43059831')) {
function content_5710be88906ee3_43059831 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13625945985710be888e26a3_82601988';
?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<?php echo '<script'; ?>
 src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing"><?php echo '</script'; ?>
>


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
    <a href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Surge/Surge_management'>
        <button type="button" class="btn btn-blue" >
            <span class="glyphicon glyphicon-circle-arrow-left" > Back</span>
        </button>
    </a>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
surge_area.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_Cab_Management.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        FormsValidationsParsley.init();
    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
<?php }
}
?>