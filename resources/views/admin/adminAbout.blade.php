@if (session()->has('massage'))
    <b>{{ session()->get('massage') }}</b>
    <br>
@endif
@if (session()->has('wrongsms'))
    <b>{{ session()->get('wrongsms') }}</b>
    <br>
@endif
<h2>Admin About</h2>
<table width="100%">
    <tr>
        <td>
            Admin Id: {{ session()->get('admin_id') }}
        </td>
    </tr>
    <tr>
        <td>
            Admin Name: {{ session()->get('admin_name') }}
        </td>
    </tr>
    <tr>
        <td>
            Admin Email Id: {{ session()->get('admin_email') }}
        </td>
    </tr>
    <tr>
        <td>
            <a class="btn btn-outline-info" href="{{ url('admin/adminHome') }}" style="margin-right: 5px;">Admin
                Home</a>
            <a class="btn btn-outline-info" href="{{ url('admin/adminAbout') }}" style="margin-right: 5px;">Admin
                About</a>
            <a class="btn btn-outline-info" href="{{ url('data/multiDatabase') }}" style="margin-right: 5px;">Multiple
                Database</a>
            <a class="btn btn-outline-info" href="{{ url('admin/event-listener') }}" style="margin-right: 5px;">Event
                Listener</a>
            <a class="btn btn-outline-info" href="{{ url('admin/adminlogout') }}" style="margin-right: 5px;">LOGPUT</a>
        </td>
    </tr>
</table>
