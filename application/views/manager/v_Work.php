<!--
 - Roles Editor  
 -
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
-->
<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; "> <i class="fa fa-tag"></i> Work management</div>
    <div class="panel-body">	
		<table id="example" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>ชื่องาน</th>
				</tr>
			</thead>
		</table>
	</div>
</div> 
<!-- End editor -->

</div>

<script>

	$(document).ready(function () {
		Set_Roles()
	});

	var myTable;
	var topic_name = "work";
	// local URL's are not allowed
	var url_get = "<?php echo site_url("Source_manager/get_data/");?>"+topic_name;
	var url_add = "<?php echo site_url("Source_manager/add_no1_data/");?>"+topic_name;
	var url_edit = "<?php echo site_url("Source_manager/edit_no1_data/");?>"+topic_name;
	var url_delete = "<?php echo site_url("Source_manager/delete_data/");?>"+topic_name;


	/**
     * Setup User Interface.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
	function Set_Roles() {

		var columnDefs = [
			{
				title: "ลำดับ",
				type:"hidden",
                disabled:"true",
                data: 1,
                render: function (data, type, row, meta) {
					if (data == null) return null;
					return 2;
				},
				width: "10%",
				className: "text-center"
			},
			{ data: "name" }
		]; // End set columndefs

		myTable = $('#example').DataTable({
            ajax: 
				{
					"url": url_get,
					"dataSrc": ""
				},
            "sPaginationType": "full_numbers",
			columns: columnDefs,  // columns from above
			initComplete: function (settings, json) {
				$(".btn").removeClass("dt-button");
			},
			rowId: 'id',
			"columnDefs": [ {
					"searchable": false,
					"orderable": false,
					"targets": 0
				} ],
			"order": [[ 1, 'asc' ]],
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
				$.ajax({
					// a tipycal url would be / with type='PUT'
					url: url_add,
					type: 'POST',
					async :false,
					data: rowdata,
					success: success,
					error: (e)=>{console.log(e)}
				})
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
		}); // End create table

		// Set index of column
		myTable.on( 'order.dt search.dt', function () {
			myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				cell.innerHTML = `${i+1}.`;
			});
		}).draw(); 
	} // End Set_Roles
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