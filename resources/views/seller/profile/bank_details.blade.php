@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Bank Details') }}</div>
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;border-radius: initial;">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('seller.create-or-update.bank-details') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="account_name" class="col-md-4 col-form-label text-md-end">{{ __('Account name*') }}</label>

                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name', isset($data['account_name'])? $data['account_name']:null) }}" autocomplete="account_name" autofocus>

                                @error('account_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bank_name" class="col-md-4 col-form-label text-md-end">{{ __('Bank name') }}</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name', isset($data['bank_name'])?  $data['bank_name']:null) }}" autocomplete="bank_name" autofocus>

                                @error('bank_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="account_number" class="col-md-4 col-form-label text-md-end">{{ __('Account name*') }}</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number',isset($data['account_number']) ? $data['account_number'] :null) }}" autocomplete="account_number" autofocus>

                                @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="iban_number" class="col-md-4 col-form-label text-md-end">{{ __('IBAN number*') }}</label>

                            <div class="col-md-6">
                                <input id="iban_number" type="iban_number" class="form-control @error('iban_number') is-invalid @enderror" name="iban_number" value="{{ old('iban_number',isset($data['iban_number']) ? $data['iban_number']:null) }}" autocomplete="iban_number">

                                @error('iban_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection