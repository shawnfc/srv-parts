<?php include "authenticate.php"; ?>
<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(function(){
	$("#tables").load("query_ajax",{mode:"load_tables",tbl:"dealers"});
	
	$("#tables").on("click","div",function(){
		$("#results").load("query_ajax",{mode:"load_results",tbl:$(this).html()});
	});
	
	$("button").click(function(){
		$.post("query_ajax",{mode:"execute",sql:$("#sql").val()},function(data){$("#results").html(data);});
	});
	
	$("#results").on("click","th",function(){
		$("#results").load("query_ajax",{mode:"load_results",tbl:$("#table_name").val(),order:$(this).html()});
	});
});

function edit(x)
{
	var tbl = $(x).data("table");
	var fld = $(x).data("field");
	var id = $(x).data("id");
	var val = $(x).html();
	var data = prompt(fld,val);
	if (data)
	{
		$("#loading").show();
		$.post("query_ajax",{mode:"update",tbl:tbl,fld:fld,id:id,val:data},function(return_data){$("#loading").hide();$(x).html(data);console.log(return_data);});
	}
}
</script>
<style>
#tables div
{
	font-size:1.2em;
	margin-bottom:5px;
	padding:5px;
	cursor:pointer;
	border:1px solid #333;
}
</style>
</head>
<body style="font-family: monospace;">
<div id="loading" style="display: none;position: absolute;top: 0;left: 0;background-color: rgba(50, 50, 50, 0.50);width: 100%;height: 100%;padding: 100px 0 0 400px;"><img src="images/loader.gif" /></div>
<div style="margin-bottom:10px;">
	<div id="tables" style="float:left;margin-left:20px;"></div>
	
	<div style="float:left;margin-left:40px;">
		<textarea id="sql" style="vertical-align:middle;"></textarea> <button>execute</button>
	</div>
	<div style="clear:both;"></div>
</div>
<div id="results"></div>
</body>
</html>