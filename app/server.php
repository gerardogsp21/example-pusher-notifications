<?php

$server = new Hoa\Websocket\Server(
    new Hoa\Socket\Server('tcp://192.168.10.10:8889')
);

//Manages the message event to get send data for each client using the broadcast method
$server->on('message', function ( Hoa\Core\Event\Bucket $bucket ) {
    $data = $bucket->getData();
    echo 'message: ', $data['message'], "\n";
    $bucket->getSource()->broadcast($data['message']);
    return;
});
//Execute the server
$server->run();