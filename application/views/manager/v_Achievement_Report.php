<!--
 - Achievement Report 
 -
 - @Author	Thutsaneeya Chanrong 
 - @Create Date 10-02-2564
-->
<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">Achievement Report of Cluster  <?php if ($group-2 == -2){ echo 0;} else{ echo $group-2;}?> </div>
    <div class="panel-body">	
    <div style="font-size: x-large;font-weight: 600; text-align: right;">
		<select id="select-opt">
		  <option value="">Select Cluster</option>
		  <?php for($i=2;$i<12;$i++){?>
		  <option value="<?php echo site_url('Source_manager/test/'.$i); ?>">Cluster <?php echo $i-2; ?></option>
		  <?php } ?>
		</select>
	</div><br>
		<table id="example" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>กิจกรรม</th>
					<th>วันที่</th>
				</tr>
			</thead>
		</table>
	</div>
</div>


<script>


	$(document).ready(function () {
		$("#select-opt").change(function() {
			var $option = $(this).find(':selected');
			var url = $option.val();
			if (url != "") {
			window.location.href = url;
			}
		});
	});
	
    // var myTable;
    
    var url_get;

	let id = <?php echo $group;?>;
	if(id == null || id == 0) {
		url_get = "<?php echo site_url("Source_manager/get_achievement_by_group/0");?>";
	} else {
		url_get = '<?php echo site_url("Source_manager/get_achievement_by_group/");?>'+ `${id.toString()}`;
	}

	var columnDefs = [
		{  title: "ลำดับ",
                data: 1,
                type:"hidden",
                disabled:"true",
                render: function (data, type, row, meta) {
                    if (data == null) return null;
                    return 2;
                },
                width: "10%",
				className: "text-center"
		},
		{ data: "achievement_name" },
        { 
			data: "created_at",
			render: function(data, type, row, meta) {
				if (data == null) return "ไม่มีข้อมูล";
				else return data;
			}
		}
	];

	/**
	 * Setup User Interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	10-02-2564
	 */
    myTable = $('#example').DataTable({
		"sPaginationType": "full_numbers",
		ajax: {
			"url": url_get,
			"dataSrc": ""
		},
		columns: columnDefs, // columns from above
		initComplete: function(settings, json) {
			$(".btn").removeClass("dt-button");
		},
		rowId: 'id',
		"columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
            "order": [[ 1, 'asc' ]],
		select: 'single', // enable single row selection
		responsive: true, // enable responsiveness
		altEditor: false, // Enable altEditor ****
		lengthChange: false 
	});

    myTable.on( 'order.dt search.dt', function () {
        myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = `${i+1}.`;
        });
    }).draw();
</script>

<style>
#edit_dialog{
	width: 800px;
}
#color {
	width: 50px;
	height: 40px;
}

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
	text-align: center; 
	font-weight: bold; 
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