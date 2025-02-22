<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Bootstrap Dropdown</h2>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Select Option
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('companies.index') }}">Companies</a></li> 	<!--DODATI ACTUAL PATH DO OVOGA, POPRAVITI companies.index-->
                <li><a class="dropdown-item" href="{{ route('users.index') }}">Users</a></li>			<!--DODATI ACTUAL PATH DO OVOGA, POPRAVITI users.index-->
            </ul>
        </div>
        <ol class="list-group list-group-numbered mt-5">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge text-bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge text-bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge text-bg-primary rounded-pill">14</span>
            </li>
          </ol>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
