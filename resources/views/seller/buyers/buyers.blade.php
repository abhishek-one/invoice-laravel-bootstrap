@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="p-2 px-0">
                <div class="">
                    @include('seller.buyers.add_buyer')
                </div>
            </div>
            <div class="modal" id="delete-buyer" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Do you wan to delete this buyer ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alert" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary confirm-delete">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;border-radius: initial;">{{ Session::get('message') }}</p>
            @endif

            <table class="table table-bordered table-hover tableTheme1">
                <thead>
                    <tr>
                        <th scope="col">Company Code</th>
                        <th scope="col">Company Full name</th>
                        <th scope="col">Company VAT </th>
                        <th scope="col">View Details</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data) == 0)
                    <tr>
                        <td colspan="4" class="text-center">
                            No buyers found. Please add new Buyer.
                        </td>
                    </tr>
                    @else
                    @foreach($data as $buyer_data)
                    <tr>
                        <td scope="row">BUYER-0{{$buyer_data->id}}</td>
                        <td>{{$buyer_data->first_name.' '.$buyer_data->middle_name.' '.$buyer_data->last_name}}</td>
                        <td>{{$buyer_data->vat_number}}</td>
                        <td>
                            <button class="btn btn-primary edit" data-id="{{$buyer_data->id}}">Edit</button>
                            <button class="btn btn-primary delete" data-id="{{$buyer_data->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    @endsection