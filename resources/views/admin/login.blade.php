<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <style>
        .navbar {
            background: #DA0C81;           
            
            & span {
                color: #FFFFFF;
            }
        }
        .container {
            height: 100vh;
            display: flex;            
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 400px;
            height: 400px;
            background-color: #FECEDA;
            
            justify-content: center;
            align-items: center;
        }
        a {
            width: 200px;
            background-color: #DA0C81 !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="flex-grow-1 " id="navbar">
        <nav class="navbar px-3">
            <div class='navbar-brand mb-0 h1'>
                <span>Zerlinda - Admin</span>                
            </div>            
        </nav>
    </div>

    <div class="container">
        <div class="card p-5">
            <h1>Login</h1>
            <form action="post" class="">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="email" id="email">
                </div>
                <div clas="">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" placeholder="Password" name="password" id="email">
                </div>
            </form>            
            <a class='btn btn-primary my-3' type="submit" href="{{ route('admin.dashboard') }}">Login</a>            
        </div>
    </div>
            
</body>
</html>