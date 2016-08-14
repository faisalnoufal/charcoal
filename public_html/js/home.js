$(document).ready(function () {

    var dt = dynamicTable.config('data-table', 
                                 ['field1', 'field2', 'field3', 'field4'], 
                                 ['Trip ID', 'Date', 'Passenger', 'Pilot'], //set to null for field names instead of custom header names
                                 'There are no items to list...');
    dt.clear();
    // setInterval(get_content_reject, 1000);
    setInterval(get_latest, 5000);
    setInterval(get_dynamic, 5000);
});

// function get_content_reject() {        
    
//     var path_root=$("#path_root").val();

//     var get_details = path_root + 'Home/get_content_reject';    

//     $.post(get_details, {}, function (data) 
//     {	
//     	if(data == 'no') {
//     		$("#content_reject").replaceWith('<div class="card-body" id="content_reject"></div>');
//     		$("#reject").hide();
//     	} else {
//     		$("#content_reject").replaceWith(data);
//     		$("#reject").show();
//     	}
//     });
// }

function get_latest() {        
    
    var path_root=$("#path_root").val();
    var last_trp_id=$("#last_trp_id").val();

    var get_details = path_root + 'Home/get_last_reject';    

    $.post(get_details, {last_trp_id : last_trp_id}, function (data) 
    {   
        if(data === 'no') {
            
        } else {
            data = JSON.parse(data);
            $("#last_trp_id").val(data.reject_id);

            var dt = dynamicTable.config('data-table', 
                                 ['field1', 'field2', 'field3', 'field4'], 
                                 ['Trip ID', 'Date', 'Passenger', 'Pilot'], //set to null for field names instead of custom header names
                                 'There are no items to list...');

            var data1 = [
                { field1: data.unique_id, field2: data.order_date, field3: data.fullname, field4: data.fullname1 }                
                ];

            dt.load(data1, true);

            // var content = '<button id="noti_button" class="html5-create-notification" data-notification-title="Cab Management" data-notification-body="Trip - ' 
            //                 + data.unique_id 
            //                 + '  -- Passenger - ' 
            //                 + data.fullname 
            //                 + ' -- Pilot Rejected - ' 
            //                 + data.fullname1 
            //                 + 'data-notification-icon="../../../public_html/images/ajoul.gif" data-notification-href="http://themeforest.net/user/teamfox">hi</button>';
            // $("#not_div").html(content);
            // $("#noti_button").trigger("click");
        }
    });
}

var dynamicTable = (function() {
    
    var _tableId, _table, 
        _fields, _headers, 
        _defaultText;
    
    /** Builds the row with columns from the specified names. 
     *  If the item parameter is specified, the memebers of the names array will be used as property names of the item; otherwise they will be directly parsed as text.
     */
    function _buildRowColumns(names, item) {
        var row = '<tr>';
        if (names && names.length > 0)
        {
            $.each(names, function(index, name) {
                var c = item ? item[name+''] : name;
                row += '<td>' + c + '</td>';
            });
        }
        row += '<tr>';
        return row;
    }
    
    /** Builds and sets the headers of the table. */
    function _setHeaders() {
        // if no headers specified, we will use the fields as headers.
        _headers = (_headers == null || _headers.length < 1) ? _fields : _headers; 
        var h = _buildRowColumns(_headers);
        if (_table.children('thead').length < 1) _table.prepend('<thead></thead>');
        _table.children('thead').html(h);
    }
    
    function _setNoItemsInfo() {
        if (_table.length < 1) return; //not configured.
        var colspan = _headers != null && _headers.length > 0 ? 
            'colspan="' + _headers.length + '"' : '';
        var content = '<tr class="no-items"><td ' + colspan + ' style="text-align:center">' + 
            _defaultText + '</td></tr>';
        if (_table.children('tbody').length > 0)
            _table.children('tbody').html(content);
        else _table.append('<tbody>' + content + '</tbody>');
    }
    
    function _removeNoItemsInfo() {
        var c = _table.children('tbody').children('tr');
        if (c.length == 1 && c.hasClass('no-items')) _table.children('tbody').empty();
    }
    
    return {
        /** Configres the dynamic table. */
        config: function(tableId, fields, headers, defaultText) {
            _tableId = tableId;
            _table = $('#' + tableId);
            _fields = fields || null;
            _headers = headers || null;
            _defaultText = defaultText || 'No items to list...';
            _setHeaders();
            _setNoItemsInfo();
            return this;
        },
        /** Loads the specified data to the table body. */
        load: function(data, append) {
            if (_table.length < 1) return; //not configured.
            _setHeaders();
            _removeNoItemsInfo();
            if (data && data.length > 0) {
                var rows = '';
                $.each(data, function(index, item) {
                    rows += _buildRowColumns(_fields, item);
                });
                var mthd = append ? 'append' : 'html';
                _table.children('tbody')[mthd](rows);
            }
            else {
                _setNoItemsInfo();
            }
            return this;
        },
        /** Clears the table body. */
        clear: function() {
            _setNoItemsInfo();
            return this;
        }
    };
}());

// $(document).ready(function(e) {
    
//     var data1 = [
//         { field1: 'value a1', field2: 'value a2', field3: 'value a3', field4: 'value a4' },
//         { field1: 'value b1', field2: 'value b2', field3: 'value b3', field4: 'value b4' },
//         { field1: 'value c1', field2: 'value c2', field3: 'value c3', field4: 'value c4' }
//         ];
    
//     var data2 = [
//         { field1: 'new value a1', field2: 'new value a2', field3: 'new value a3' },
//         { field1: 'new value b1', field2: 'new value b2', field3: 'new value b3' },
//         { field1: 'new value c1', field2: 'new value c2', field3: 'new value c3' }
//         ];
    
//     var dt = dynamicTable.config('data-table', 
//                                  ['field2', 'field1', 'field3'], 
//                                  ['header 1', 'header 2', 'header 3'], //set to null for field names instead of custom header names
//                                  'There are no items to list...');
    
    
//     $('#btn-load').click(function(e) {
//         dt.load(data1);
//     });
    
//     $('#btn-update').click(function(e) {
//         dt.load(data2);
//     });
    
//     $('#btn-append').click(function(e) {
//         dt.load(data1, true);
//     });
    
//     $('#btn-clear').click(function(e) {
//         dt.clear();
//     });
    
// });

function get_dynamic() {        
    
    var path_root=$("#path_root").val();
    
    var get_details = path_root + 'Home/get_dynamic_data';    

    $.post(get_details, { }, function (data) 
    {           
        data = JSON.parse(data);        
       
        var str = '<i class="fa fa-caret-up"></i> ' + data.trips + ' booking';
        if(data.trips > 1)
            str += 's';
        str+=' total';
        $("#trip_total").html(str);

        str = '<a href="' + path_root + 'Trips/Todays_bookings">' + data.trips_today + ' booking';
        if(data.trips_today > 1)
            str += 's';
        str+=' today</a>';
        $("#trip_today").html(str);

        str = '<i class="fa fa-caret-up"></i> ' + data.cancelled + ' cancelled trip';
        if(data.cancelled > 1)
            str += 's';
        str+=' total';
        $("#cancelled_total").html(str);

        str = '<a href="' + path_root + 'Trips/Cancelled_trips">' + data.cancelled_today + ' cancelled trip';
        if(data.cancelled_today > 1)
            str += 's';
        str+=' today</a>';
        $("#cancelled_today").html(str);

        str = '<a href="' + path_root + 'Customer/Online_users">' + data.online['passenger'] + ' passenger';
        if(data.online['passenger'] > 1)
            str += 's';
        str+=' online</a>';
        $("#online_passenger_today").html(str);

        str = '<a href="' + path_root + 'Drivers/Online_users">' + data.online['driver'] + ' pilot';
        if(data.online['driver'] > 1)
            str += 's';
        str+=' online</a>';
        $("#online_driver_today").html(str);

        str = '<i class="fa fa-caret-up"></i> ' + data.user['driver'] + ' pilot';
        if(data.user['driver'] > 1)
            str += 's';
        str +=' and ' + data.user['passenger'] + ' passenger';
        if(data.user['passenger'] > 1)
            str += 's';
        str+=' total';
        $("#passenger_driver_total").html(str);
    });
}