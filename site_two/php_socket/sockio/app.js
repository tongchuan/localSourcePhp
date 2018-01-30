var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    res.send('<h1>Welcome Realtime Server</h1>');
});

io.on('connection', function(socket){
    console.log('a user connected');

    socket.on("disconnect", function() {
        console.log("a user go out");
    });

    socket.on("message", function(obj) {
    	obj['wwww'] = 'ddddddddddddddddddddddddddddddd'+Math.random()
        io.emit("message", obj);
    });
    // socket.broadcast.emit('users',{number:count});
    setInterval(function(){
    	socket.emit("message",{name:'张彤川', id: Math.random()})
    },3000)
});

http.listen(3000, function(){
    console.log('listening on *:3000');
});