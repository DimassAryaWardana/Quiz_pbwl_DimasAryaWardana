<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration - Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Register</h1>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_nama" class="form-label">Name</label>
                            <input type="text" name="user_nama" class="form-control" id="user_nama" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email address</label>
                            <input type="email" name="user_email" class="form-control" id="user_email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" name="user_password" class="form-control" id="user_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_alamat" class="form-label">Address</label>
                            <textarea name="user_alamat" class="form-control" id="user_alamat" placeholder="Your Address" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="user_hp" class="form-label">Phone Number</label>
                            <input type="text" name="user_hp" class="form-control" id="user_hp" placeholder="08123456789" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_pos" class="form-label">Postal Code</label>
                            <input type="text" name="user_pos" class="form-control" id="user_pos" placeholder="12345" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
