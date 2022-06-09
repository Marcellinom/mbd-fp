<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Volunteer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="row justify-content-center">
        <h3>Volunteer Dashboard</h3>

        <table class="table container">
            <thead>
                <tr>
                    <th>Nama Event</th>
                    <th>Jumlah Volunteer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
            
                    {{-- @foreach($drivers as $driver) --}}
                    {{-- <td>{{ $driver->name }}</td> --}}
                    {{-- @endforeach --}}
                </tr>
                <tr>
                
                    {{-- @foreach($drivers as $driver) --}}
                    {{-- <td>{{ $driver->origin }}</td> --}}
                    {{-- @endforeach --}}
                </tr>
            </tbody>
        </table>        
    </div>
</body>
</html>