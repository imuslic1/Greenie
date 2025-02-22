@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row pb-4">
            <h2 class="mb-3">Offers</h2>
            <div class="col-9">
                <div style="max-height: 40vh; overflow-y: auto;">
                    <table class="table transakcije-tabela table-hover">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)" style="cursor:pointer;">Partner</th>
                                <th onclick="sortTable(1)" style="cursor:pointer;">Tokens needed</th>
                                <th onclick="sortTable(2)" style="cursor:pointer;">Discount (%)</th>
                                <th onclick="sortTable(3)" style="cursor:pointer;">Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->partner->name }}</td>
                                <td>{{ $offer->amount }}</td>
                                <td>{{ $offer->discount_percentage }}</td>
                                <td>
                                    @if ($offer->active)
                                        <img src="{{ asset('images/activated.png') }}" alt="Active" width="20px">
                                    @else
                                        <img src="{{ asset('images/not-activated.png') }}" alt="Active" width="20px">
                                        
                                    @endif
                                </td>
                                <td>
                                    @if ($offer->active)
                                        <form action="/admin/toggle/offer/{{ $offer->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">Deactivate</button>
                                        </form>
                                    @else
                                        <form action="/admin/toggle/offer/{{ $offer->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Activate</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-3">
                <h3>Add Offer</h3>
                <form action="/admin/add/offer" class="mb-4" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="partner_id" class="form-label">Partner:</label>
                        <select id="partner_id" name="partner_id" class="form-control" required>
                            @foreach ($partners as $partner)
                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="number" id="amount" name="amount" class="form-control" required min="1"
                            step="1">
                    </div>
                    <div class="mb-3">
                        <label for="discount_percentage" class="form-label">Discount:</label>
                        <input type="number" id="discount_percentage" name="discount_percentage" class="form-control"
                            required min="1" step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Offer</button>
                </form>
            </div>

        </div>

        <div class="row pb-4">
            <h2 class="mb-3">Partners</h2>
            <div class="col-9">
                <div style="max-height: 40vh; overflow-y: auto;">
                    <table class="table transakcije-tabela table-hover">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)" style="cursor:pointer;">Partner</th>
                                <th onclick="sortTable(1)" style="cursor:pointer;">Email</th>
                                <th onclick="sortTable(2)" style="cursor:pointer;">Domain</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->email }}</td>
                                <td>{{ $partner->domain }}</td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-3">
                <h3>Add Partner</h3>
                <form action="/admin/add/partner" class="mb-4" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="domain" class="form-label">Domain:</label>
                        <input type="text" id="domain" name="domain" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Partner</button>
                </form>
                </form>
            </div>
        </div>

        <div class="row pb-4">
            <h2 class="mb-3">Referral Codes</h2>
            <div class="col-9">
                <div style="max-height: 40vh; overflow-y: auto;">
                    <table class="table transakcije-tabela table-hover">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)" style="cursor:pointer;">User</th>
                                <th onclick="sortTable(1)" style="cursor:pointer;">Code</th>
                                <th onclick="sortTable(2)" style="cursor:pointer;">Offer</th>
                                <th onclick="sortTable(3)" style="cursor:pointer;">Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($referralCodes as $referralCode)
                            <tr>
                                <td>{{ $referralCode->user->name }}</td>
                                <td>{{ $referralCode->code }}</td>
                                <td>{{ $referralCode->offer_id }}</td>
                                <td>
                                    @if ($referralCode->active)
                                        <img src="{{ asset('images/activated.png') }}" alt="Active" width="20px">
                                    @else
                                        <img src="{{ asset('images/not-activated.png') }}" alt="Active" width="20px">
                                    @endif
                                </td>
                                <td>
                                    @if ($referralCode->active)
                                        <form action="/admin/toggle/referral_code/{{ $referralCode->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">Deactivate</button>
                                        </form>
                                    @else
                                        <form action="/admin/toggle/referral_code/{{ $referralCode->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Activate</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>

    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.querySelector("table");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x && y && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x && y && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
@endsection
