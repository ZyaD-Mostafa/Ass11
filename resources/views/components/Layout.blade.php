<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>{{$title ?? ""}}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? "active" : "" }}" aria-current="page" href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('products') ? "active" : "" }}" href="{{url('/products')}}">products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('add') ? "active" : "" }}" href="{{url('/add')}}">Add product</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>

    {{$slot}}


<footer class="bg-dark text-light fixed-bottom text-center p-1">&copy; <?php echo date("Y")  ?> All Rights reserved</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
