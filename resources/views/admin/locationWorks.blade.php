<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('/assets/admin_js') }}/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/assets/admin_css') }}/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="/logout">Logout</a>
        <h2>Meeting Management</h2>
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <label>Location</label><br>
                    <input type="text" name="location" id="location" required>
                </div>
                <div class="col-sm-3">
                    <label>Client Name</label><br>
                    <input type="text" name="name" placeholder="Client Name" required>
                </div>
                <div class="col-sm-3">
                    <label>Meeting Time duration</label><br>
                    <input type="number" name="time" placeholder="Meeting Time (in Minutes)" requ
                        <br><span>Available (09:00 am to 06:00 pm)</span>
                </div>
                <div class="col-sm-3">
                    <label>Date Add/View</label><br>
                    <input type="date" name="date" required>
                </div>
            </div>
            <input type="text" id="latitude" name="latitude">
            <input type="text" id="longitude" name="longitude">
            <input type="text" id="ip" name="ip">
            <div class="row">
                <div class="col-sm">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>

            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGOU0gbej7dDZk3fY-J-PMDIgoFGXJrP0&libraries=places">

            </script>

            <script>
                $(document).ready(function() {
                    var autocomplete;
                    var to = 'location';
                    autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)), {
                        types: ['geocode'],
                    });
                });
            </script>


</body>

</html>
