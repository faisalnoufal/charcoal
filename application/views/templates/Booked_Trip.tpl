{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$plugin_path}chosen/chosen.min.css">
<link rel="stylesheet" href="{$css_path}plugins.css">        
{include file="page_header.tpl"  name=""}
<input type="hidden" name="path_root" id="path_root" value="{$base_url}">
{if isset($available_drivers)}
    <div class="row">
        <div class="col-md-12">

            <div class="panel"  style="font-size: small">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Assign Pilot - Trip Id : {$trip_detail['unique_id']}</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">

                    <form action="" class="form-horizontal form-striped form-bordered" method="post">

                        <div class="form-content">
                            <div class="form-group">                                
                                <label class="control-label col-md-3" id="driver_select"> Diver Name</label>
                                <div class="col-md-5">
                                    <select data-placeholder="Select Pilot" id="driver_select" data-width="100%" name="driver_select" class="chosen-select">
                                        
                                        {assign var=opt_group value=''}
                                        {assign var=group_count value=0}

                                        {foreach  from=$available_drivers item=v}

                                            {if $opt_group != $v.cab}

                                                {if $group_count > 0}
                                                    </optgroup>
                                                {/if}

                                                <optgroup label="{$v.cab}">

                                                {$opt_group = $v.cab}
                                                {$group_count = $group_count + 1}

                                            {/if}

                                            <option value={$v.id}>{$v.name}</option>

                                        {/foreach}

                                        {if $group_count > 0}
                                            </optgroup>
                                        {/if}

                                    </select>
                                </div><!--.col-md-9-->
                            </div><!--.row-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Passenger Name</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="passenegr" class="form-control" value="{$trip_detail['passenger_name']}" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Location</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="from_date" class="form-control" value="{$trip_detail['location']}" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">From Date</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="from_date" class="form-control" value="{$trip_detail['from_date']}" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">To Date</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="to_date" class="form-control" value="{$trip_detail['to_date']}" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->

                        </div><!--.form-content-->
                        <input type="hidden" name="trip_id" value="{$trip_detail['trip_id']}">
                        <div class="form-buttons">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">

                                    <button type="submit" class="btn btn-blue" value="submit" name="submit">Submit</button>

                                </div>
                            </div>
                        </div>
                    </form>

                </div><!--.panel-body-->
            </div><!--.panel-->

        </div><!--.col-md-12-->
    </div><!--.row-->

{/if}

<div class="row">
    <div class="col-md-12">
        <div class="panel"  style="font-size: small">
            <!-- <div class="panel-heading" style="font-size: small">
                <div class="panel-title"><h4>Booked Trips</h4></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <div class="overflow-table">

                    {if count($trip_details) > 0}

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th>Sl.No</th> 
                                    <th>Trip Id</th> 
                                    <th>Passenger Name</th>
                                    <th>Place</th>
                                    <th>Trip Start Date</th>
                                    <th>Trip End Date</th>
                                    <th>Cab Preferred</th>
                                    <th>Allocated Driver</th>
                                    <th>Cancel</th>
                                    <th>Action</th>                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$trip_details item=v}
                                    <tr>
                                        <td>{counter}</td>
                                        <td>{$v.unique_id}</td>
                                        <td><a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" title="View Profile" target="_blank">{$v.passenger_name}</a></td>
                                        <td>{$v.location}</td>
                                        <td>{$v.from_date}</td>
                                        <td>{$v.to_date}</td>
                                        <td>{$v.cab_type}</td>
                                        <td>
                                            {if !empty($v.driver_id)}
                                                <a href="{$base_url}Profile/Profile_view/{$v.driver_id}" title="View Profile" target="_blank">{$v.driver_name}</a>
                                            {else}
                                                Unallocated
                                            {/if}
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-xs dt-delete" title="Cancel Trip" onclick="javascript:cancel_trip({$v.trip_id})"><span class="glyphicon glyphicon-trash"></span></button>

                                        </td>
                                        <td>
                                            {if !empty($v.driver_id)}
                                                <button class="btn btn-green btn-xs" title="Allocate To A New Driver" onclick="javascript:allocate_trip({$v.trip_id})"><span class="glyphicon glyphicon-edit"></span></button>
                                            {else}
                                                <button class="btn btn-blue btn-xs" title="Allocate Driver" onclick="javascript:allocate_trip({$v.trip_id})"><span class="glyphicon glyphicon-edit"></span></button>
                                            {/if}
                                        </td>                                        
                                    </tr>
                                {/foreach}
                            </tbody>  
                            <tfoot>                                       
                                <tr style="text-align:left;font-size: 18px">
                                    <td colspan="10">
                                        <form method="post" action="{$base_url}Excel/Booked_trip">
                                    <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>                          
                        </table>

                    {else}
                        <br>
                        <h4>No Details Found!</h4>

                    {/if}


                </div><!--.overflow-table-->

            </div><!--.panel-body-->
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div>


{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 
<script src="{$js_path}/surcharge.js"></script>
<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
<script src="{$plugin_path}chosen/chosen.jquery.min.js"></script>
<script src="{$js_path}/tables-datatables.js"></script>
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
        FormsSelect.init();
    });

    var FormsSelect = {

        chosenSelect: function () {
            $('.chosen-select').chosen({
                width: '100%'
            });
        },
       
        init: function () {
            this.chosenSelect();          
        }
    }
</script>
{include file="page_close.tpl"  name=""} 