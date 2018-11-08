var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(6999);

io.on('connection',function(socket){
    console.log('Starting' + socket.remoteAddress + ":" + socket.port);
    console.log(socket.id);

    var redisClient = redis.createClient();
    redisClient.subscribe('message');

    redisClient.on("message",function(channel, message){
        socket.emit(channel,message);
        socket.emit("test", "ahmed");
        console.log(message);

    });

    socket.on('disconnect',function(){
        redisClient.quit();
    });
});