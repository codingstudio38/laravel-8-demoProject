<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/assets/admin_js') }}/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/assets/admin_css') }}/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
     <div id="mytext">
     </div>
{{-- Echo.channel,private('message-channel'). --}}
{{-- php artisan config:cache --}}
{{-- php artisan config:clear --}}
{{-- php artisan optimize --}}
{{-- Echo.join('track-message-channel')// from PresenceChannel('track-message-channel')
.here((user)=>{
console.log("user",user);
})
.joining((user)=>{
console.log("joining",user);
})
.leaving((user)=>{
console.log("leaving",user);
})
.listen('MessageEvents', (event) => {
console.log("data",event);
$('#mytext').html('').html(event.data.message);
}) --}}

    {{-- <script>
        Echo.channel('message-channel')
        .listen('MessageEvents', (event) => {
            console.log("data",event);
            $('#mytext').html('').html(event.data.message);
        })
    </script> --}}
<script>
    Echo.join('track-message-channel')
    .here((user)=>{
    console.log("user",user);
    })
    .joining((user)=>{
    console.log("joining",user);
    })
    .leaving((user)=>{
    console.log("leaving",user);
    })
    .listen('MessageEvents', (event) => {
    console.log("data",event);
    $('#mytext').html('').html(event.data.message);
    })

</script>

</body>

</html>

