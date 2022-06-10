<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="row justify-content-center">
    <div class="card">
        <div class="card-body shadow">
            <form method="post" action="{{url('create_event')}}">
                @csrf
                <h4>Buat Event</h4>
                <div class="form-group">
                    <label for="name">Nama Event</label>
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Session::get('user_id')}}">
                    <input name="nama_event" type="text" class="form-control" id="name" aria-describedby="name"
                           placeholder="nama event">
                </div>
                <div class="form-group">
                    <label for="name">Min Volunteer</label>
                    <input name="minimal_volunteer" type="number" class="form-control" id="name" aria-describedby="name"
                           placeholder="minimal volunteer">
                </div>
                <div class="form-group">
                    <label for="name">Min Pohon</label>
                    <input name="minimal_pohon" type="text" class="form-control" id="name" aria-describedby="name"
                           placeholder="minimal pohon">
                </div>
                <div class="form-group">
                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker"
                         inline="true">
                        <label for="example">Tanggal Limit</label>
                        <input name="date_limit" placeholder="Select date" type="date" id="example"
                               class="form-control">
                        <i class="fas fa-calendar input-prefix"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Region</label>
                    <select name="region" class="form-select" aria-label="Default select example">
                        @foreach($regions as $region)
                            <option value="{{$region->id}}">{{$region->provinsi}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buat Event</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
