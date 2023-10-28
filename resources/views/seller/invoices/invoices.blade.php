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
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Buyer's Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Tax Amount</th>
                        <th scope="col">Total Amount (with VAT)</th>
                        <th scope="col">View Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($invoices) == 0)
                    <tr>
                        <td colspan="8" class="text-center">
                            No Invoices found.
                        </td>
                    </tr>
                    @else
                    @foreach($invoices as $invoice)
                    <tr>
                        <td>1</td>
                        <td>{{$invoice->invoice_number}}</td>
                        <td>{{date('d-m-Y', strtotime($invoice->created_at))}}</td>
                        <td>{{$invoice->buyer_name}}</td>
                        <td>{{$invoice->items_total}}</td>
                        <td>{{$invoice->total_vat}}</td>
                        <td>{{$invoice->total_amount}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{asset('invoices_pdfs/'.$invoice->invoice_number.'.pdf')}}" target="_blank">View</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection