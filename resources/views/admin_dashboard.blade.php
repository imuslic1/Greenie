@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>


        <div class="row">
            <h2 class="mb-3">Offers</h2>
            <div class="col-9">
                <div style="max-height: 40vh; overflow-y: auto;">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Partner</th>
                            <th>Tokens needed</th>
                            <th>Discount</th>
                            <th>Is active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>50</td>
                            <td>50% off on all items</td>
                            <td>Yes</td>
                            <td>
                                <form action="#" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-success">Activate</button>
                                </form>
                                <form action="#" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary">Deactivate</button>
                                </form>
                                <form action="#" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>17</td>
                            <td>13% off on all items</td>
                            <td>Yes</td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>71</td>
                            <td>5% off on select items</td>
                            <td>Yes</td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>71</td>
                            <td>5% off on select items</td>
                            <td>Yes</td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>71</td>
                            <td>5% off on select items</td>
                            <td>Yes</td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>71</td>
                            <td>5% off on select items</td>
                            <td>Yes</td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>71</td>
                            <td>5% off on select items</td>
                            <td>Yes</td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>

            <div class="col-3">
                <h3>Add Offer</h3>
                <form action="#" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="partner_id" class="form-label">Partner:</label>
                        <select id="partner_id" name="partner_id" class="form-control" required>
                            <option value="1">Partner 1</option>
                            <option value="2">Partner 2</option>
                            <option value="3">Partner 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount:</label>
                        <input type="text" id="discount" name="discount" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Offer</button>
                </form>
            </div>
        </div>

        <h2 class="mb-3">Add Partners</h2>
        <form action="#" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="partner_name" class="form-label">Partner Name:</label>
                <input type="text" id="partner_name" name="partner_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Partner</button>
        </form>

        <h2 class="mb-3">Remove Referral Codes</h2>
        <form action="#" class="mb-4">
            @csrf
            @method('DELETE')
            <div class="mb-3">
                <label for="referral_code" class="form-label">Referral Code:</label>
                <input type="text" id="referral_code" name="referral_code" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger">Remove Referral Code</button>
        </form>

    </div>
@endsection
