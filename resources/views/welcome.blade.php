<!DOCTYPE html>
<html>
<head>
    <title>Laravel Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Pusher.logToConsole = true;

            var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
                cluster: '{{ env("PUSHER_APP_CLUSTER") }}'
            });

            var channel = pusher.subscribe('test-channel');
            channel.bind('App\\Events\\TestEvent', function(data) {
                console.log("HELLO");
                console.log(data); // Log the event data to the console
                alert(JSON.stringify(data));
            });
        });
    </script>
</head>
<body>
    <h1>Laravel Pusher Test</h1>
</body>
</html>
