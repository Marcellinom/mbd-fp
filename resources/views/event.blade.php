<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Organizer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="row justify-content-center">
    <a href="{{url('create_event')}}">
        <button type="submit" class="btn btn-primary">Buat Event</button>
    </a>
    <h3>Event Organizer Dashboard</h3>
    <table class="table container">
        <thead>
        <tr>
            <th>Nama Event</th>
            <th>Jumlah Volunteer</th>
            <th>Jumlah Pohon</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <td>{{ $row->nama_event }}</td>
                <td>{{ $row->volunteer }}</td>
                <td>{{ $row->pohon }}</td>
                <td>{{ $row->is_eligible }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
