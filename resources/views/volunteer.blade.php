<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Volunteer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="row justify-content-center">
    <form method="post" action="{{url('volunteer_daftar')}}">
        @csrf
        <h3>Volunteer Dashboard</h3>
        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Session::get('user_id')}}">
        <table class="table container">
            <thead>
            <tr>
                <th>Nama Event</th>
                <th>Jumlah Volunteer</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ $event->participant }}</td>
                    @if(in_array($event->id, collect($applied_event_ids)->all()))
                        <td>
                            <button disabled>sudah mendaftar</button>
                        </td>
                    @else
                        <td>
                            <button type="submit" name="ajuan_id" value="{{$event->id}}">daftar</button>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
