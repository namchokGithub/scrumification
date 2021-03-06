<!--
 - Activity Editor  
 -
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
-->
<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">Activity Editor</div>
    <div class="panel-body">	
		<table id="example" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
		</table>
	</div>
</div>
<script>

  var columnDefs = [
		{   data: "name",
			title: "ชื่อ"},
		{ data: "time_start",title: "เวลาเรื่มต้น",datetimepicker: {datepicker:false, lang:"th",
		allowTimes:[ '0:00',  '0:15',  '0:30',  '0:45',  '1:00',  '1:15',  '1:30',  '1:45',  '2:00',  '2:15',  '2:30',  '2:45',  '3:00',  '3:15',  '3:30',  '3:45',  '4:00',  '4:15',  '4:30',  '4:45',  '5:00',  '5:15',  '5:30',  '5:45',  '6:00',  '6:15',  '6:30',  '6:45',  '7:00',  '7:15',  '7:30',  '7:45',  '8:00',  '8:15',  '8:30',  '8:45',  '9:00',  '9:15',  '9:30',  '9:45',  '10:00',  '10:15',  '10:30',  '10:45',  '11:00',  '11:15',  '11:30',  '11:45',  '12:00',  '12:15',  '12:30',  '12:45',  '13:00',  '13:15',  '13:30',  '13:45',  '14:00',  '14:15',  '14:30',  '14:45',  '15:00',  '15:15',  '15:30',  '15:45',  '16:00',  '16:15',  '16:30',  '16:45',  '17:00',  '17:15',  '17:30',  '17:45',  '18:00',  '18:15',  '18:30',  '18:45',  '19:00',  '19:15',  '19:30',  '19:45',  '20:00',  '20:15',  '20:30',  '20:45',  '21:00',  '21:15',  '21:30',  '21:45',  '22:00',  '22:15',  '22:30',  '22:45',  '23:00',  '23:15',  '23:30',  '23:45' ]
		,timepicker: true, format : "H:i"}},
		{ data: "time_end",title: "เวลาสื้นสุด",datetimepicker: {datepicker:false, lang:"th",
		allowTimes:[ '0:00',  '0:15',  '0:30',  '0:45',  '1:00',  '1:15',  '1:30',  '1:45',  '2:00',  '2:15',  '2:30',  '2:45',  '3:00',  '3:15',  '3:30',  '3:45',  '4:00',  '4:15',  '4:30',  '4:45',  '5:00',  '5:15',  '5:30',  '5:45',  '6:00',  '6:15',  '6:30',  '6:45',  '7:00',  '7:15',  '7:30',  '7:45',  '8:00',  '8:15',  '8:30',  '8:45',  '9:00',  '9:15',  '9:30',  '9:45',  '10:00',  '10:15',  '10:30',  '10:45',  '11:00',  '11:15',  '11:30',  '11:45',  '12:00',  '12:15',  '12:30',  '12:45',  '13:00',  '13:15',  '13:30',  '13:45',  '14:00',  '14:15',  '14:30',  '14:45',  '15:00',  '15:15',  '15:30',  '15:45',  '16:00',  '16:15',  '16:30',  '16:45',  '17:00',  '17:15',  '17:30',  '17:45',  '18:00',  '18:15',  '18:30',  '18:45',  '19:00',  '19:15',  '19:30',  '19:45',  '20:00',  '20:15',  '20:30',  '20:45',  '21:00',  '21:15',  '21:30',  '21:45',  '22:00',  '22:15',  '22:30',  '22:45',  '23:00',  '23:15',  '23:30',  '23:45' ]
		,timepicker: true, format : "H:i"} },
		{ data: "date_start",title: "วันเริ่มต้น",datetimepicker: { timepicker: false, lang:"th", format : "Y/m/d"} },
		{ data: "date_end",title: "วันสื้นสุด",datetimepicker: { timepicker: false,  lang:"th",format : "Y/m/d"} }
	];
	$.datetimepicker.setLocale('th');
  var myTable;
  var topic_name = "activity";
  // local URL's are not allowed
  var url_get = "<?php echo site_url("Source_manager/get_data/");?>"+topic_name;
  var url_add = "<?php echo site_url("Source_manager/add_data/");?>"+topic_name;
  var url_edit = "<?php echo site_url("Source_manager/edit_data/");?>"+topic_name;
  var url_delete = "<?php echo site_url("Source_manager/delete_data/");?>"+topic_name;
  
	
/**
 * Setup User Interface.
 *
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 */
  myTable = $('#example').DataTable({
    "sPaginationType": "full_numbers",
        ajax: 
		 {
            "url": url_get,
            "dataSrc": ""
        },
    columns: columnDefs,  // columns from above
	initComplete: function (settings, json) {
        $(".btn").removeClass("dt-button");
    },
    rowId: 'id',
	order:[],
    dom: 'Bfrtip',        // element order: NEEDS BUTTON CONTAINER (B) ****
    select: 'single',     // enable single row selection
    responsive: true,     // enable responsiveness
    altEditor: true,      // Enable altEditor ****
    buttons: [{
      text: '<i class="fa fa-plus-square"></i> เพิ่มชุดข้อมูล',
      name: 'add',     // DO NOT change name
	  "className": 'btn btn-info btn-lg' 
    },
    {
      extend: 'selected', // Bind to Selected row
      text: '<i class="fa fa-edit"></i> แก้ไขชุดข้อมูล',
      name: 'edit',        // DO NOT change name
	  "className": 'btn btn-warning btn-lg' 
    },
    {
      extend: 'selected', // Bind to Selected row
      text: '<i class="fa fa-trash"></i> ลบชุดข้อมูล',
      name: 'delete',     // DO NOT change name
	  "className": 'btn btn-danger btn-lg' 
   }],
        onAddRow: function(datatable, rowdata, success, error) {
			console.log(datatable, rowdata, success, error)
            $.ajax({
                // a tipycal url would be / with type='PUT'
                url: url_add,
                type: 'POST',
				async :false,
                data: rowdata,
                success:success,
                error: error
            });
			datatable.s.dt.ajax.reload();
        },
        onEditRow: function(datatable, rowdata, success, error) {
			rowdata['id'] = datatable.s.dt.rows( { selected: true } ).data()[0]['id']
            $.ajax({
                // a tipycal url would be /{id} with type='POST'
                url: url_edit,
                type: 'POST',
				async :false,
                data: rowdata,
                success: success,
                error: error
            });
			datatable.s.dt.ajax.reload();
        },
        onDeleteRow: function(datatable, rowdata, success, error) {
			rowdata['id'] = datatable.s.dt.rows( { selected: true } ).data()[0]['id']
            $.ajax({
                // a tipycal url would be /{id} with type='DELETE'
                url: url_delete,
                type: 'POST',
				async :false,
                data: rowdata,
                success: success,
                error: error
            });
			datatable.s.dt.ajax.reload();
        }
  });
</script>

<style>

	div,h3,span{
		font-family: prompt !important
	}
	.btn-info {
		background-color: #245dc1 !important;
		border-color: #245dc1 !important;
	}
	.dt-buttons{
		margin-bottom : 10px
	}
	.number_formatter{
		text-align: right;
	}
table , td ,tr ,th {
	border: 0.5px solid #979595 !important;
	border-collapse: collapse; 
}
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	text-align: left; 
	font-size: 18px;
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}
#alteditor-row-type { margin-bottom: 35px; }
</style>