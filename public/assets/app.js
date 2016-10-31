$(function(){
	$('#todo-input').keypress(function(e){
		if(e.which == 13){
			$.ajax({
				method: "POST",
				url: "index.php/todo/add",
				data: { task: $('#todo-input').val() }
			}).done(function(d){
				var data = JSON.parse(d);
				$('#todo-input').val('');
				$('.table-todo').children('tbody').append("<tr><td><span class='task-todo' id='task-"+  data[0].id +"'>" + data[0].task + "</span><span class='edit-todo' id='" + data[0].id +"' onClick='edit(this.id)'>edit</span><span class='delete-todo' id='delete-" + data[0].id +"' data-delete='" + data[0].id + "' onClick='hapus(this)'>delete</span></td><td>" + data[0].date + "</td><td id='col-date-"+ data[0].id + "'>" + data[0].time +"</td></tr>");
			});
		}
	});
});

function edit(e){
	$('#task-' + e).hide();
	$('#task-' + e).after("<input type='text' class='input-edit-todo' id='todo-edit-"+ e +"'><button id='edit"+ e +"' data-task='"+ e +"' onClick='update(this)'>Update</button>");
	$('#' + e).hide();
}

function update(data)
{
	var id = $(data).data('task');
	$.ajax({
		method: "POST",
		url: "index.php/todo/edit",
		data: { id: id, task: $('#todo-edit-' + id).val() }
	}).done(function(msg){
		var datas = JSON.parse(msg);
		$('#todo-edit-' + id).hide();
		$('#task-' + id).show();
		$('#' + id).show();
		$('#task-' + id).text(datas[0].task);
		$('#col-date-' +id).text(datas[0].time);
		$('#edit'+ id).hide();
		console.log(msg);
	});
}

function hapus(data)
{
	var id = $(data).data('delete');
	$.ajax({
		method: "POST",
		url: "index.php/todo/delete",
		data: { id: id}
	}).done(function(msg){
		var data = JSON.parse(msg);
		$('#delete-' + id).closest('tr').remove();
	});
}