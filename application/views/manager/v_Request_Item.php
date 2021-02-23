<!--
 - Request items 
 -
 - @Author	Namchok Singhachai
 - @Create Date 27-01-2564
-->
<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; "><i class="fa fa-bell"></i> Request Lists</div>
    <div class="panel-body">	
		<table id="example" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<script>

	  var myTable;
	  var topic_name = "roles_point";
	  var url_get = "<?php echo site_url("Source_manager/get_log_shop");?>";
	  var url_get_option_roles = "<?php echo site_url("Source_manager/get_data/");?>roles";
	/**
     * Setup User Interface.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	function set_Data(){
		var Options_roles = {};
		var Options_roles_data = {};
		$.ajax({
			// a tipycal url would be /{id} with type='POST'
			url: url_get_option_roles,
			dataType: "json",
			async:false,
			success: function(a){
				for(var i=0 ;i<a.length;i++){
					Options_roles[a[i].id] = a[i].name;			
					Options_roles_data[a[i].id] = a[i];			
				}
			},
			error: function(err){
				console.log(err)
			}
		})
		
		// Define column 
		var columnDefs = [
			{
				title: "ลำดับ",
				data: 1,
				type:"hidden",
				disabled:"true",
				render: function (data, type, row, meta) {
					return 1;
				},
				width: "10%",
				className: "text-center"
			},
			{
				title: "ชื่อไอเทมพิเศษ",
				data: "item_name"
			},
			{
				title: "บทบาทที่ร้องขอ",
				data: "roles_name"
			},
			{
				title: "การดำเนินการ",
				data: 2,
				render: function (data, type, row, meta) {
					return `<button class="btn btn-info">อนุมัติ</button>`
				},
				className: "text-center"
			}
		];
			  
		myTable = $('#example').DataTable({
			"sPaginationType": "full_numbers",
			ajax: 
				{
				"url": url_get,
				"dataSrc": ""
			},
			columns: columnDefs,  // columns from above
			rowId: 'id',
			"columnDefs": [ {
						"searchable": false,
						"orderable": false,
						"targets": 0
					} ],
			"order": [[ 1, 'asc' ]],
			select: 'single',     // enable single row selection
			responsive: true     // enable responsiveness
		});
		myTable.on( 'order.dt search.dt', function () {
			myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				cell.innerHTML = `${i+1}.`;
			});
		}).draw();
	}
	set_Data()
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
	text-align: center; 
	}

td, th { 
	padding: 10px; 
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