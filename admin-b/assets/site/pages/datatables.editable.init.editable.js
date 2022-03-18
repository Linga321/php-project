(function ($) {

	'use strict';

	$("input[type='checkbox']").change(function () {
		var line_id = $(this).closest('#authority tbody tr').find('td:first').text();
		var access = $(this).closest('#authority tbody tr').find('td:eq(1)').text();
		var column = $(this).attr('name');

		if ($(this).is(":checked")) {
			var val = 1;
			var xhttp = new XMLHttpRequest();
			var params = 'update' + '&line_id=' + line_id + '&access=' + access + '&column=' + column + '&val=' + val;
			var url = "functions/function_common_access.php";

			xhttp.onreadystatechange = function () {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					//alert(xhttp.responseText);
				}
			}
			xhttp.open("POST", url, true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(params);

		}
		if (!$(this).is(":checked")) {

			var val = 0;
			var xhttp = new XMLHttpRequest();
			var params = 'update' + '&line_id=' + line_id + '&access=' + access + '&column=' + column + '&val=' + val;
			var url = "functions/function_common_access.php";

			xhttp.onreadystatechange = function () {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					//alert(xhttp.responseText);
				}
			}
			xhttp.open("POST", url, true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(params);

		}
	});
}).apply(this, [jQuery]);

function del_user_level(uid, uacc) {

	var u_l_id = uid;
	var u_lvl = uacc;
	var xhttp = new XMLHttpRequest();
	var params = '' + 'u_lvl_id=' + u_l_id + '&lvl=' + u_lvl;
	var url = "functions/function_common_access.php";
	xhttp.onreadystatechange = function () {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//alert(xhttp.responseText);
		}
	}
	xhttp.open("POST", url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
}

function ticket_view() {
	var somevalue = document.getElementById('myOutput').innerHTML;
	var url = "functions/function_ticket.php";

	data = JSON.stringify(somevalue);
	console.log(data);
	$.ajax({
		type: 'POST',
		url: url,
		data: {
			contents: somevalue
		},
		dataType: 'text',
		success: function (result) {
			alert(result);
		}
	});
}
function load(response) {
	var len = response.length;
	var r = 1;

	for (var i = 0; i < len; i++) {
		var br_name = response[i]['br_name'];
		var br_tel = response[i]['br_tel'];
		var br_hot = response[i]['br_hot'];
		var br_add1 = response[i]['br_add1'];

		var br_add2 = response[i]['br_add2'];
		var br_city = response[i]['br_city'];
		var br_status = response[i]['br_status'];
		var br_pcode = response[i]['br_pcode'];

		var br_province = response[i]['br_province'];
		var br_autoid = response[i]['br_autoid'];

		if (br_status == "Active") {
			$("#demo-foo-filtering tbody").append(
				'<tr>' +
				'	<td>' + br_autoid + '</td>' +
				'	<td>' + br_name + '</td>' +
				'	<td>' + br_add1 + ' ' + br_add2 + ' ' + br_city + '</td>' +
				'	<td>' + br_hot + '</td>' +
				'	<td>' + br_tel + '</td>' +
				'	<td><span class="label label-table label-success">' + br_status + '</span></td>' +
				'	<td>' +
				'			<button class="demo-edit-row btn btn-success btn-xs btn-icon fa fa-edit m-r-5">' +
				'			<button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-trash-o">' +
				'	</td>' +
				'</tr>');
		} else {
			$("#demo-foo-filtering tbody").append(
				'<tr>' +
				'	<td>' + br_autoid + '</td>' +
				'	<td>' + br_name + '</td>' +
				'	<td>' + br_add1 + ' ' + br_add2 + ' ' + br_city + '</td>' +
				'	<td>' + br_hot + '</td>' +
				'	<td>' + br_tel + '</td>' +
				'	<td><span class="label label-table label-warning">' + br_status + '</span></td>' +
				'	<td>' +
				'			<button class="demo-edit-row btn btn-success btn-xs btn-icon fa fa-edit m-r-5">' +
				'			<button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-trash-o">' +
				'	</td>' +
				'</tr>');
		}
	}
}
$(document).ready(function () {
	//$("#dialog").hide();
	$("#demo-foo-filtering body").empty();
	var btn_call = "load";
	$.ajax({
		url: 'functions/function_common_access.php',
		type: 'POST',
		data: {
			paracall: btn_call,
		},
		dataType: 'json',
		success: function (response) {
			load(response);
		}
	});
});

// $("#br_delete").on("click",function() {

// var type = "buy";
// var size = $(this).closest( ".frx-cf-cur-view-pos" ).find('input').val();
// var simple = $(this).closest( ".frx-cf-cur-view-pos" ).find('h3').text();
// var mark_name = $(this).closest( ".frx-cf-cur-view-pos" ).find('#fmpg-quote').attr('name');
// var open_po = $(this).text();
//alert(mark_name);
//$(this).closest( ".frx-cf-cur-view-pos-heading" ).text();
//updateTable(type,size,simple,open_po,mark_name);

// alert("br_delete");
// });

// $("#br_update").on("click",function() {

// var id = $(this).closest('gradeA').find('td:first').text();
// var id = $(this).closest("tr"),row.find("td:eq(0)").text();
// var mark_name = $(this).closest( ".frx-cf-cur-view-pos" ).find('#fmpg-quote').attr('name');
// var open_po = $(this).text();
// alert(id);
// $(this).closest( ".frx-cf-cur-view-pos-heading" ).text();
// get_update_data(id);
// });
/*$('table').on('click', '.demo-edit-row', function()
{
//replace table selector with an id selector, if you are targetting a specific table
// var row = $(this).closest('tr'),
// cells = row.find('td:first'),
// btnCell = $(this).parent();
var rid = $(this).closest('tr').find('td:first').text();
var id = $.trim(rid);
get_update_data(rid);

//alert(id);

// set to work, you have the cells, the entire row, and the cell containing the button.
});*/

$(document).on('click', '#save_branch', function () {
	$("#demo-foo-filtering body").empty();
	var btn_call = "save_branch";
	$.ajax({
		url: 'functions/function_common_access.php',
		type: 'POST',
		data: {
			parabr_name: $("#br_name").val(),
			parabr_tel: $("#br_tel").val(),
			parabr_hot: $("#br_hot").val(),
			parabr_add1: $("#br_add1").val(),
			parabr_add2: $("#br_add2").val(),
			parabr_loc: $("#br_loc").val(),
			parabr_pcode: $("#br_pcode").val(),
			parabr_status: $("#br_status").val(),
			parabr_province: $("#br_province").val(),
			paracall: btn_call,
		},
		dataType: 'json',
		success: function (response) {
			load(response);
		}
	});
});

$(document).on('click', '#update_branch', function () {
	$("#demo-foo-filtering body").empty();
	var btn_call = "update_branch";
	var br_id = null;
	br_id = $("#br_id").val();
	if (br_id != null) {
		$.ajax({
			url: 'functions/function_common_access.php',
			type: 'POST',
			data: {
				parabr_id: br_id,
				parabr_name: $("#br_name").val(),
				parabr_tel: $("#br_tel").val(),
				parabr_hot: $("#br_hot").val(),
				parabr_add1: $("#br_add1").val(),
				parabr_add2: $("#br_add2").val(),
				parabr_loc: $("#br_loc").val(),
				parabr_pcode: $("#br_pcode").val(),
				parabr_status: $("#br_status").val(),
				parabr_province: $("#br_province").val(),
				paracall: btn_call,
			},
			dataType: 'json',
			success: function (response) {
				load(response);
			}
		});
	} else {
		alert("Detailo Not successfully Updated");
	}
});

$('table').on('click', '.demo-edit-row', function () {
	var rid = $(this).closest('tr').find('td:first').text();
	var id = $.trim(rid);
	get_update_data(rid);

	//alert(id);
});

$('table').on('click', '.demo-delete-row', function () {

	var rid = $(this).closest('tr').find('td:first').text();
	var id = $.trim(rid);
	//alert(rid);
	//$("#dialog").show();
	$('#dialog').on('click', '#dialogConfirm', function () {});
	$('#dialog').on('click', '#dialogCancel', function () {});

});

function get_update_data(id) {
	var tbl_id = 0;

	tbl_id = id;
	tbl_call = 'get_branch';
	var str = '';
	if (tbl_id != 0) {

		$.ajax({
			url: 'functions/function_common_access.php',
			type: 'POST',
			data: {
				paraid: tbl_id,
				paracall: tbl_call,
			},
			dataType: 'json',
			success: function (response) {

				var len = response.length;
				var r = 1;

				for (var i = 0; i < len; i++) {

					var br_name = response[i]['br_name'];
					var br_tel = response[i]['br_tel'];
					var br_hot = response[i]['br_hot'];
					var br_add1 = response[i]['br_add1'];

					var br_add2 = response[i]['br_add2'];
					var br_city = response[i]['br_city'];
					var br_status = response[i]['br_status'];
					var br_pcode = response[i]['br_pcode'];

					var br_province = response[i]['br_province'];
					var br_autoid = response[i]['br_autoid'];

					$("#br_name").val(br_name);
					$("#br_tel").val(br_tel);
					$("#br_hot").val(br_hot);
					$("#br_add1").val(br_add1);
					$("#br_add2").val(br_add2);
					$("#br_loc").val(br_city);
					$("#br_pcode").val(br_pcode);
					//$("#br_status").val(br_status);
					//$("#br_status").val(br_status);
					$("#br_status").append("<option value='" + br_status + "'>" + br_status + "</option>");
					$('#br_status').selectpicker('refresh');
					//$('.selectpicker').selectpicker('refresh');
					//$("#br_province").val(br_province);
					$("#br_province").append("<option value='" + br_province + "'>" + br_province + "</option>");
					$('#br_province').selectpicker('refresh');
					//$("select[name=br_province]").selectpicker("refresh");

					$("#br_id").val(br_autoid);
					window.scrollTo(0, 0);

					$("#save_branch").attr('id', 'update_branch');
					$("#update_branch").attr('name', 'update_branch');
					$("#update_branch").html('Update');

				}
			}
		});
	} else {
		alert("Branch id can not be 0");
	}
}
