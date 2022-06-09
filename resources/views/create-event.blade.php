<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body shadow">
                <form>
                    <h4>Buat Event</h4>
                    <div class="form-group">
                      <label for="name">Nama Event</label>
                      <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="name">Min Volunteer</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="name">Min Pohon</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="masukkan nama">
                    </div>
                    <div class="form-group">
                        <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                            <label for="example">Tanggal Mulai</label>
                            <input placeholder="Select date" type="text" id="example" class="form-control">
                            <i class="fas fa-calendar input-prefix"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                            <label for="example">Tanggal Selesai</label>
                            <input placeholder="Select date" type="text" id="example" class="form-control">
                            <i class="fas fa-calendar input-prefix"></i>
                        </div>
                    </div>
                    <a href="/event">
                        Buat Event
                        {{-- <button type="submit" class="btn btn-primary">Buat Event</button> --}}
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>