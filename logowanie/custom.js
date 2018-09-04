$(document).ready(function() {
	$('input.sub').live('click',function(){
	var id_art = $(this).parent().find('input[type=hidden]').val();
	var name = $(this).parent().parent().parent().find('td:eq(1)').text();
	var description = $(this).parent().parent().parent().find('td:eq(2)').text();
	var email = $(this).parent().parent().parent().find('td:eq(3)').text();
	var a = $('<div/>', {
			class: 'box',
		html: '<form action="" method="post"><input type="hidden" name="id" value="'+id_art+'" /><label>Nazwa:</label><input type="text" name="name" value="'+name+'" /><br /><label>Opis:</label><input type="text" name="description" value="'+description+'" /><br /><label>Email:</label><input type="text" name="email" value="'+email+'" /><br /><input class="sub2" type="submit" value="" /></form>'
	});
	var thi = $(this).parent();
	var next_thi = thi.next();
	$(this).parent().parent().append(a);
	$(this).parent().remove();
	a.find('form').submit(function(){
	$.post('edit.php', $(this).serialize(), function(dane) {
		dane = eval('('+dane+')');
		tr = a.parent().parent();
tr.find('td:eq(1)').text(dane['name']).css('background-color', 'yellow').animate({
					opacity: 1
					}, 3000, function() {
$(this).css({'background-color' : '#DFF7FF', 'opacity' : '1'});
						});
tr.find('td:eq(2)').text(dane['description']).css('background-color', 'yellow').animate({
				opacity: 1
				}, 3000, function() {
$(this).css({'background-color' : '#DFF7FF', 'opacity' : '1'});
					});
tr.find('td:eq(3)').text(dane['email']).css('background-color', 'yellow').animate({
					opacity: 1
					}, 3000, function() {
$(this).css({'background-color' : '#DFF7FF', 'opacity' : '1'});
						});
				a.remove();
				next_thi.before(thi);
			 });
			return false;
		});
		return false;
	});
});

$('input.del').live('click',function(){
	var form_del = $(this).parent();
	form_del.submit(function(){
		$.post('delete.php', form_del.serialize(), function(dane) {
			tr = form_del.parent().parent();
			tr.remove();
		});
		return false;
	});
});