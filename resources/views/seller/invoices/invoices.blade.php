@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered table-hover tableTheme1">
                <div class="" style="font-size: larger; padding:1%;padding-left:0">{{ __('All Invoices') }}</div>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Invoice No</th>
                        <th scope="col">Buyer's Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Tax Amount</th>
                        <th scope="col">Total Amount (with VAT)</th>
                        <th scope="col">View Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>
                            <button class="btn btn-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Thornton</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>
                            <button class="btn btn-primary">View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection