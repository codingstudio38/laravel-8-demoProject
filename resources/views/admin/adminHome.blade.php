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
    @if (session()->has('massage'))
        <b>{{ session()->get('massage') }}</b>
        <br>
    @endif
    @if (session()->has('wrongsms'))
        <b>{{ session()->get('wrongsms') }}</b>
        <br>
    @endif

    <h2>Admin Home</h2>
    <table width="100%">
        <tr>
            <td>
                Admin Id: {{ session()->get('admin_id') }}
                {{ $data->id }}
            </td>
        </tr>
        <tr>
            <td>
                Admin Name: {{ session()->get('admin_name') }}
                {{ $data->name }}
            </td>
        </tr>
        <tr>
            <td>
                Admin Email Id: {{ session()->get('admin_email') }}
                {{ $data->email }}
            </td>
        </tr>
        <tr>
            <td>
                <a class="btn btn-outline-info" href="{{ url('admin/adminHome') }}" style="margin-right: 5px;">Admin
                    Home</a>
                <a class="btn btn-outline-info" href="{{ url('admin/adminAbout') }}" style="margin-right: 5px;">Admin
                    About</a>
                <a class="btn btn-outline-info" href="{{ url('data/multiDatabase') }}"
                    style="margin-right: 5px;">Multiple Database</a>
                <a class="btn btn-outline-info" href="{{ url('admin/event-listener') }}"
                    style="margin-right: 5px;">Event
                    Listener</a>
                <a class="btn btn-outline-info" href="{{ url('admin/adminlogout') }}"
                    style="margin-right: 5px;">LOGPUT</a>
            </td>
        </tr>
    </table>
    <br>
    <div class="col-md-6">
        <form action="{{ url('/') }}/admin/sendemail" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" name="name" placeholder="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="example@gmail.com" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="subject" placeholder="subject" class="form-control">

            </div>
            <div class="form-group">
                <input type="text" name="message" placeholder="message" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" id="submit-it" class="btn btn-success btn-block" value="Send">
            </div>
        </form>
    </div>









    <div class="col-md-6">
        <form action="" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="example@gmail.com" id="email" class="form-control">

            </div>
            <div class="form-group">
                <input type="button" id="check-it" class="btn btn-success btn-block" value="Check">
            </div>
        </form>
        <div id="response">

        </div>
    </div>

    <script>
        $(document).ready(function() {

            $("#check-it").click(() => {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ url('admin/viewdata') }}',
                    type: "POST",
                    data: {
                        '_token': CSRF_TOKEN,
                        'email': $("#email").val(),
                    },
                    success: function(data, textStatus, jQxhr) {
                        console.clear();
                        // console.log(data);
                        if (data.status === 400) {
                            $("#response").html("").html(data.massage);
                        } else {
                            let setdata = data.Alldata;
                            $("#response").html("")
                            for (let i = 0; i < setdata.length; i++) {
                                $("#response").append(setdata[i].id);
                            }
                        }
                    }
                })
            });


        });
    </script>

</body>

</html>
