<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" id="add-buyer-button" data-bs-target="#add-update-buyer-modal">
    Add New Buyer
</button>

<!-- Modal -->
<div class="modal fade" id="add-update-buyer-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog dialog-width">
        <div class="modal-content">
            <div class="modal-header">
                <div id="add-update-buyer-title">{{ __('Please fill buyer details') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="">
                            <form method="POST" id="add-update-buyer-form" action="{{ route('seller.create-or-update.buyer-profile-details') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">{{__('First name*') }}</label>
                                                <input class="form-control" id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name">
                                            </div>

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="middle_name" class="form-label">{{__('Middle name') }}</label>
                                                <input class="form-control" id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name">
                                            </div>

                                            @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">{{ __('Last name*') }}</label>
                                                <input class="form-control" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name">
                                            </div>

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="email" class="form-label">{{ __('Email Address*') }}</label>
                                                <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                            </div>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="company_name" class="form-label">{{ __('Company name*') }}</label>
                                                <input class="form-control" id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name">
                                            </div>

                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="building_number" class="form-label">{{ __('Building number*') }}</label>
                                                <input class="form-control" id="building_number" type="text" class="form-control @error('building_number') is-invalid @enderror" name="building_number" value="{{ old('building_number') }}" autocomplete="building_number">
                                            </div>

                                            @error('building_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="additional_number" class="form-label">{{ __('Additional number') }}</label>
                                                <input class="form-control" id="additional_number" type="text" class="form-control @error('additional_number') is-invalid @enderror" name="additional_number" value="{{ old('additional_number') }}" autocomplete="additional_number">
                                            </div>

                                            @error('additional_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="street" class="form-label">{{ __('Street*') }}</label>
                                                <input class="form-control" id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street">
                                            </div>

                                            @error('street')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="district" class="form-label">{{ __('District*') }}</label>
                                                <input class="form-control" id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district">
                                            </div>

                                            @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="pincode" class="form-label">{{ __('Postal code*') }}</label>
                                                <input class="form-control" id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode') }}" autocomplete="pincode">
                                            </div>

                                            @error('pincode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="city" class="form-label">{{ __('City*') }}</label>
                                                <input class="form-control" id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city">
                                            </div>

                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="vat_number" class="form-label">{{ __('VAT number*') }}</label>
                                                <input class="form-control" id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" autocomplete="vat_number">
                                            </div>

                                            @error('vat_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="cr_number" class="form-label">{{ __('CR. number*') }}</label>
                                                <input class="form-control" id="cr_number" type="text" class="form-control @error('cr_number') is-invalid @enderror" name="cr_number" value="{{ old('cr_number') }}" autocomplete="cr_number">
                                            </div>

                                            @error('cr_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6 arabic">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="first_name_ar" class="form-label float-end">{{__('الاسم الأول*') }}</label>
                                                <input class="form-control" id="first_name_ar" type="text" class="form-control @error('first_name_ar') is-invalid @enderror" name="first_name_ar" value="{{ old('first_name_ar') }}" autocomplete="first_name_ar">
                                            </div>

                                            @error('first_name_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="middle_name_ar" class="form-label">{{__('الاسم الأوسط') }}</label>
                                                <input class="form-control" id="middle_name_ar" type="text" class="form-control @error('middle_name_ar') is-invalid @enderror" name="middle_name_ar" value="{{ old('middle_name_ar') }}" autocomplete="middle_name_ar">
                                            </div>

                                            @error('middle_name_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="last_name_ar" class="form-label">{{ __('اسم العائلة*') }}</label>
                                                <input class="form-control" id="last_name_ar" type="text" class="form-control @error('last_name_ar') is-invalid @enderror" name="last_name_ar" value="{{ old('last_name_ar') }}" autocomplete="last_name_ar">
                                            </div>

                                            @error('last_name_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="company_name_ar" class="form-label">{{ __('اسم الشركة*') }}</label>
                                                <input class="form-control" id="company_name_ar" type="text" class="form-control @error('company_name_ar') is-invalid @enderror" name="company_name_ar" value="{{ old('company_name_ar') }}" autocomplete="company_name_ar">
                                            </div>

                                            @error('company_name_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="building_number_ar" class="form-label">{{ __('رقم المبنى') }}</label>
                                                <input class="form-control" id="building_number_ar" type="text" class="form-control @error('building_number_ar') is-invalid @enderror" name="building_number_ar" value="{{ old('building_number_ar') }}" autocomplete="building_number_ar">
                                            </div>

                                            @error('building_number_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="additional_number_ar" class="form-label">{{ __('رقم إضافي') }}</label>
                                                <input class="form-control" id="additional_number_ar" type="text" class="form-control @error('additional_number_ar') is-invalid @enderror" name="additional_number_ar" value="{{ old('additional_number_ar') }}" autocomplete="additional_number_ar">
                                            </div>

                                            @error('additional_number_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="street_ar" class="form-label">{{ __('شارع*') }}</label>
                                                <input class="form-control" id="street_ar" type="text" class="form-control @error('street_ar') is-invalid @enderror" name="street_ar" value="{{ old('street_ar') }}" autocomplete="street_ar">
                                            </div>

                                            @error('street_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="district_ar" class="form-label">{{ __('يصرف*') }}</label>
                                                <input class="form-control" id="district_ar" type="text" class="form-control @error('district_ar') is-invalid @enderror" name="district_ar" value="{{ old('district_ar') }}" autocomplete="district_ar">
                                            </div>

                                            @error('district_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="pincode_ar" class="form-label">{{ __('رمز بريدي*') }}</label>
                                                <input class="form-control" id="pincode_ar" type="text" class="form-control @error('pincode_ar') is-invalid @enderror" name="pincode_ar" value="{{ old('pincode_ar') }}" autocomplete="pincode_ar">
                                            </div>

                                            @error('pincode_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="city_ar" class="form-label">{{ __('مدينة*') }}</label>
                                                <input class="form-control" id="city_ar" type="text" class="form-control @error('city_ar') is-invalid @enderror" name="city_ar" value="{{ old('city_ar') }}" autocomplete="city_ar">
                                            </div>

                                            @error('city_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="vat_number_ar" class="form-label">{{ __('ضريبة القيمة المضافة*') }}</label>
                                                <input class="form-control" id="vat_number_ar" type="text" class="form-control @error('vat_number_ar') is-invalid @enderror" name="vat_number_ar" value="{{ old('vat_number_ar') }}" autocomplete="vat_number_ar">
                                            </div>

                                            @error('vat_number_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="cr_number_ar" class="form-label">{{ __('سجل تجاري. رقم*') }}</label>
                                                <input class="form-control" id="cr_number_ar" type="text" class="form-control @error('cr_number_ar') is-invalid @enderror" name="cr_number_ar" value="{{ old('cr_number_ar') }}" autocomplete="cr_number_ar">
                                            </div>

                                            @error('cr_number_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row backend-errors">

                                </div>
                                <div class="modal-footer align-self-center">
                                    <button type="submit" class="btn btn-primary update-or-save-buyer" data-id="">{{ __('Save Buyer') }}</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>