@extends('layouts.app')

@section('content')
<style>
    .invalid-feedback {
        font-weight: 300;
        display: block;
        margin-top: -10px
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between w-100">
                    <div>{{ __('Update Profile') }}</div>
                    <div>تفاصيل اضافية</div>
                </div>
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;border-radius: initial;">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form action="{{ route('seller.update.profile-details') }}" id="register_form" method="post">
                        @csrf
                        <div class="row card-body pb-0">
                            <div class="col-md-6">
                                <div class="col">
                                    <div class="my-3">
                                        <label for="first_name" class="form-label">{{__('First name*') }}</label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name',$data['first_name'] ?? data['first_name']) }}" autocomplete="first_name">
                                    </div>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="my-3">
                                        <label for="middle_name" class="form-label">{{__('Middle name') }}</label>
                                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name',$data['middle_name'] ?? data['middle_name']) }}" autocomplete="middle_name">
                                    </div>

                                    @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="my-3">
                                        <label for="last_name" class="form-label">{{ __('Last name*') }}</label>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',$data['last_name'] ?? data['last_name']) }}" autocomplete="last_name">
                                    </div>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="company_name" class="form-label">{{ __('Company name*') }}</label>
                                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name',$data['company_name'] ?? data['company_name']) }}" autocomplete="company_name">
                                    </div>

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="building_number" class="form-label">{{ __('Building number*') }}</label>
                                        <input id="building_number" type="text" class="form-control @error('building_number') is-invalid @enderror" name="building_number" value="{{ old('building_number',$data['building_number'] ?? data['building_number']) }}" autocomplete="building_number">
                                    </div>

                                    @error('building_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="additional_number" class="form-label">{{ __('Additional number') }}</label>
                                        <input id="additional_number" type="text" class="form-control @error('additional_number') is-invalid @enderror" name="additional_number" value="{{ old('additional_number',$data['additional_number'] ?? data['additional_number']) }}" autocomplete="additional_number">
                                    </div>

                                    @error('additional_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="street" class="form-label">{{ __('Street*') }}</label>
                                        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street',$data['street'] ?? data['street']) }}" autocomplete="street">
                                    </div>

                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="district" class="form-label">{{ __('District*') }}</label>
                                        <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district',$data['district'] ?? data['district']) }}" autocomplete="district">
                                    </div>

                                    @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="pincode" class="form-label">{{ __('Postal code*') }}</label>
                                        <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode',$data['pincode'] ?? data['pincode']) }}" autocomplete="pincode">
                                    </div>

                                    @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="city" class="form-label">{{ __('City*') }}</label>
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city',$data['city'] ?? data['city']) }}" autocomplete="city">
                                    </div>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="vat_number" class="form-label">{{ __('VAT number*') }}</label>
                                        <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number',$data['vat_number'] ?? data['vat_number']) }}" autocomplete="vat_number">
                                    </div>

                                    @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="cr_number" class="form-label">{{ __('CR. number*') }}</label>
                                        <input id="cr_number" type="text" class="form-control @error('cr_number') is-invalid @enderror" name="cr_number" value="{{ old('cr_number',$data['cr_number'] ?? data['cr_number']) }}" autocomplete="cr_number">
                                    </div>

                                    @error('cr_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="my-3">
                                        <label for="country" class="form-label">{{ __('Country*') }}</label>
                                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country',$data['country'] ?? data['country']) }}" autocomplete="country">
                                    </div>

                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 arabic">
                                <div class="col">
                                    <div class="my-3">
                                        <label for="first_name_ar" class="form-label float-end">{{__('الاسم الأول*') }}</label>
                                        <input id="first_name_ar" type="text" class="form-control @error('first_name_ar') is-invalid @enderror" name="first_name_ar" value="{{ old('first_name_ar',$data['first_name_ar'] ?? data['first_name_ar']) }}" autocomplete="first_name_ar">
                                    </div>

                                    @error('first_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="my-3">
                                        <label for="middle_name_ar" class="form-label">{{__('الاسم الأوسط') }}</label>
                                        <input id="middle_name_ar" type="text" class="form-control @error('middle_name_ar') is-invalid @enderror" name="middle_name_ar" value="{{ old('middle_name_ar',$data['middle_name_ar'] ?? data['middle_name_ar']) }}" autocomplete="middle_name_ar">
                                    </div>

                                    @error('middle_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="my-3">
                                        <label for="last_name_ar" class="form-label">{{ __('اسم العائلة*') }}</label>
                                        <input id="last_name_ar" type="text" class="form-control @error('last_name_ar') is-invalid @enderror" name="last_name_ar" value="{{ old('last_name_ar',$data['last_name_ar'] ?? data['last_name_ar']) }}" autocomplete="last_name_ar">
                                    </div>

                                    @error('last_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="company_name_ar" class="form-label">{{ __('اسم الشركة*') }}</label>
                                        <input id="company_name_ar" type="text" class="form-control @error('company_name_ar') is-invalid @enderror" name="company_name_ar" value="{{ old('company_name_ar',$data['company_name_ar'] ?? data['company_name_ar']) }}" autocomplete="company_name_ar">
                                    </div>

                                    @error('company_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="building_number_ar" class="form-label">{{ __('رقم المبنى*') }}</label>
                                        <input id="building_number_ar" type="text" class="form-control @error('building_number_ar') is-invalid @enderror" name="building_number_ar" value="{{ old('building_number_ar',$data['building_number_ar'] ?? data['building_number_ar']) }}" autocomplete="building_number_ar">
                                    </div>

                                    @error('building_number_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="additional_number_ar" class="form-label">{{ __('رقم إضافي*') }}</label>
                                        <input id="additional_number_ar" type="text" class="form-control @error('additional_number_ar') is-invalid @enderror" name="additional_number_ar" value="{{ old('additional_number_ar',$data['additional_number_ar'] ?? data['additional_number_ar']) }}" autocomplete="additional_number_ar">
                                    </div>

                                    @error('additional_number_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="street_ar" class="form-label">{{ __('شارع*') }}</label>
                                        <input id="street_ar" type="text" class="form-control @error('street_ar') is-invalid @enderror" name="street_ar" value="{{ old('street_ar',$data['street_ar'] ?? data['street_ar']) }}" autocomplete="street_ar">
                                    </div>

                                    @error('street_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="district_ar" class="form-label">{{ __('يصرف*')}}</label>
                                        <input id="district_ar" type="text" class="form-control @error('district_ar') is-invalid @enderror" name="district_ar" value="{{ old('district_ar',$data['district_ar'] ?? data['district_ar']) }}" autocomplete="district_ar">
                                    </div>

                                    @error('district_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="city_ar" class="form-label">{{ __('مدينة*') }}</label>
                                        <input id="city_ar" type="text" class="form-control @error('city_ar') is-invalid @enderror" name="city_ar" value="{{ old('city_ar',$data['city_ar'] ?? data['city_ar']) }}" autocomplete="city_ar">
                                    </div>

                                    @error('city_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="vat_number_ar" class="form-label">{{ __('ضريبة القيمة المضافة*') }}</label>
                                        <input id="vat_number_ar" type="text" class="form-control @error('vat_number_ar') is-invalid @enderror" name="vat_number_ar" value="{{ old('vat_number_ar',$data['vat_number_ar'] ?? data['vat_number_ar']) }}" autocomplete="vat_number_ar">
                                    </div>

                                    @error('vat_number_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="cr_number_ar" class="form-label">{{ __('سجل تجاري. رقم*') }}</label>
                                        <input id="cr_number_ar" type="text" class="form-control @error('cr_number_ar') is-invalid @enderror" name="cr_number_ar" value="{{ old('cr_number_ar',$data['cr_number_ar'] ?? data['cr_number_ar']) }}" autocomplete="cr_number_ar">
                                    </div>

                                    @error('cr_number_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="my-3">
                                        <label for="country_ar" class="form-label">{{ __('دولة*') }}</label>
                                        <input id="country_ar" type="text" class="form-control @error('country_ar') is-invalid @enderror" name="country_ar" value="{{ old('country_ar',$data['country_ar'] ?? data['country_ar']) }}" autocomplete="country_ar">
                                    </div>

                                    @error('country_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0 card-body">
                            <button type="submit" class="btn btn-primary col-md-3 col-11 m-auto">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection