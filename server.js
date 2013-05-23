
var WebSocketServer = require('ws').Server;
var wss = new WebSocketServer({port: 8080});

var clients = [];

wss.on('connection', function(ws) {
	clients.push(ws);

	console.log('connected client');

	ws.on('message', function(message) {
		console.log('received: %s', message);
		clients.forEach(function(client) {
			if (ws == client) {
				return;
			}
			client.send(message, function(error) {});
		});
	});

	ws.on('close', function() {
		console.log('client closing');
		clients.splice(clients.indexOf(ws), 1);
	});
});
