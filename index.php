<html>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$(function () {
	var conn = new WebSocket('ws://localhost:8080');
	conn.onopen = function(e) {
		console.log("Connection established!");
	};

	conn.onmessage = function(e) {
		console.log(e.data);
		$('#messages').prepend('<p>'+e.data+'</p>');
	};

	$('form').submit(function() {
		var v = $('#text').val();
		conn.send(v);
		$('#messages').prepend('<p>'+v+'</p>');
		return false;
	});
});
</script>

<form>
	<input id="text" name="text" />
	<input type="submit" />
</form>

<div id="messages"></div>

</html>
