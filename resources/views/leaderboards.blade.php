<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
		<h2 class="mb-5 text-center">LEADERBOARDS</h2>
		<div class="row">
			<div class="col md-6">
				 <h3>Users</h3>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-center gold-bg">
                        <span>Item 1</span>
                        <img src="{{ asset('images/medal-gold.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center silver-bg">
                        <span>Item 2</span>
                        <img src="{{ asset('images/medal-silver.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                    </li>
					<li class="list-group-item d-flex justify-content-between align-items-center bronze-bg">
                        <span>Item 2</span>
                        <img src="{{ asset('images/medal-bronze.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                    </li>
                </ol>
			</div>

			<div class="col md-6">
				 <h3>Companies</h3>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Item 1</span>
                        <img src="{{ asset('images/medal-gold.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Item 2</span>
                        <img src="{{ asset('images/medal-silver.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                    </li>
                </ol>
			</div>
		</div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
