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
                <div class="card-header d-flex justify-content-between">
                    <div>{{ __('Register') }}</div>
                </div>
                <form action="{{ route('register') }}" id="register_form" method="post">
                    @csrf

                    <div class="row card-body">
                        <div>
                            <div class="col-11 col-md-8 my-md-4 my-2 m-auto">
                                <div class="my-3">
                                    <label for="email" class="form-label">{{ __('Email Address*') }}</label>
                                    <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                </div>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-11 col-md-8 my-md-4 my-2 m-auto">
                                <div class="my-3">
                                    <label for="password" class="form-label">{{ __('Password*') }}</label>
                                    <input class="form-control" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password">
                                </div>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-11 col-md-8 my-md-4 my-2 m-auto">
                                <div class="my-3">
                                    <label for="password_confirmation" class="form-label">{{ __('Confirm password*') }}</label>
                                    <input class="form-control" id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation">
                                </div>

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-header d-flex justify-content-between w-100">
                        <div>{{ __('Additional details') }}</div>
                        <div>تفاصيل اضافية</div>
                    </div>
                    <div class="row card-body pb-0">
                        <div class="col-md-6">
                            <div class="col">
                                <div class="my-3">
                                    <label for="first_name" class="form-label">{{__('First name*') }}</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name">
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
                                    <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name">
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
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name">
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
                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name">
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
                                    <input id="building_number" type="text" class="form-control @error('building_number') is-invalid @enderror" name="building_number" value="{{ old('building_number') }}" autocomplete="building_number">
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
                                    <input id="additional_number" type="text" class="form-control @error('additional_number') is-invalid @enderror" name="additional_number" value="{{ old('additional_number') }}" autocomplete="additional_number">
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
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street">
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
                                    <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district">
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
                                    <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode') }}" autocomplete="pincode">
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
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city">
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
                                    <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" autocomplete="vat_number">
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
                                    <input id="cr_number" type="text" class="form-control @error('cr_number') is-invalid @enderror" name="cr_number" value="{{ old('cr_number') }}" autocomplete="cr_number">
                                </div>

                                @error('cr_number')
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
                                    <input id="first_name_ar" type="text" class="form-control @error('first_name_ar') is-invalid @enderror" name="first_name_ar" value="{{ old('first_name_ar') }}" autocomplete="first_name_ar">
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
                                    <input id="middle_name_ar" type="text" class="form-control @error('middle_name_ar') is-invalid @enderror" name="middle_name_ar" value="{{ old('middle_name_ar') }}" autocomplete="middle_name_ar">
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
                                    <input id="last_name_ar" type="text" class="form-control @error('last_name_ar') is-invalid @enderror" name="last_name_ar" value="{{ old('last_name_ar') }}" autocomplete="last_name_ar">
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
                                    <input id="company_name_ar" type="text" class="form-control @error('company_name_ar') is-invalid @enderror" name="company_name_ar" value="{{ old('company_name_ar') }}" autocomplete="company_name_ar">
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
                                    <input id="building_number_ar" type="text" class="form-control @error('building_number_ar') is-invalid @enderror" name="building_number_ar" value="{{ old('building_number_ar') }}" autocomplete="building_number_ar">
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
                                    <input id="additional_number_ar" type="text" class="form-control @error('additional_number_ar') is-invalid @enderror" name="additional_number_ar" value="{{ old('additional_number_ar') }}" autocomplete="additional_number_ar">
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
                                    <input id="street_ar" type="text" class="form-control @error('street_ar') is-invalid @enderror" name="street_ar" value="{{ old('street_ar') }}" autocomplete="street_ar">
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
                                    <input id="district_ar" type="text" class="form-control @error('district_ar') is-invalid @enderror" name="district_ar" value="{{ old('district_ar') }}" autocomplete="district_ar">
                                </div>

                                @error('district_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col">
                                <div class="my-3">
                                    <label for="pincode_ar" class="form-label">{{ __('رمز بريدي*') }}</label>
                                    <input id="pincode_ar" type="text" class="form-control @error('pincode_ar') is-invalid @enderror" name="pincode_ar" value="{{ old('pincode_ar') }}" autocomplete="pincode_ar">
                                </div>

                                @error('pincode_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col">
                                <div class="my-3">
                                    <label for="city_ar" class="form-label">{{ __('مدينة*') }}</label>
                                    <input id="city_ar" type="text" class="form-control @error('city_ar') is-invalid @enderror" name="city_ar" value="{{ old('city_ar') }}" autocomplete="city_ar">
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
                                    <input id="vat_number_ar" type="text" class="form-control @error('vat_number_ar') is-invalid @enderror" name="vat_number_ar" value="{{ old('vat_number_ar') }}" autocomplete="vat_number_ar">
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
                                    <input id="cr_number_ar" type="text" class="form-control @error('cr_number_ar') is-invalid @enderror" name="cr_number_ar" value="{{ old('cr_number_ar') }}" autocomplete="cr_number_ar">
                                </div>

                                @error('cr_number_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0 card-body">
                        <button type="submit" class="btn btn-primary col-md-3 col-11 m-auto">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $.validator.addMethod("lettersOnlyArabicWithSpaces", function(value, element) {
        return this.optional(element) || /^[\u0600-\u06FF\s]+$/.test(value);
    }, "يُسمح فقط بالحروف العربية والمسافات.");

    $.validator.addMethod("lettersAndSpacesOnly", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Please enter letters only");


    $.validator.addMethod("minTwoArabicChars", function(value, element) {
        var arabicCharsCount = value.replace(/[^ء-ي]/g, '').length;
        return arabicCharsCount >= 2;
    }, "يجب أن تحتوي الحقل على ما لا يقل عن حرفين عربيين");


    $("#register_form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
            first_name: {
                required: true,
                lettersAndSpacesOnly: true,
                minlength: 2,
            },
            middle_name: {
                lettersAndSpacesOnly: true,
                minlength: 2,
            },
            last_name: {
                required: true,
                lettersAndSpacesOnly: true,
                minlength: 2,
            },
            company_name: {
                required: true,
                lettersAndSpacesOnly: true,
                minlength: 2,
            },
            building_number: {
                required: true,
            },
            street: {
                required: true,
            },
            district: {
                required: true,
            },
            pincode: {
                required: true,
                digits: true,
            },
            city: {
                required: true,
            },
            vat_number: {
                required: true,
            },
            cr_number: {
                required: true,
            },
            first_name_ar: {
                required: true,
                lettersOnlyArabicWithSpaces: true,
                minTwoArabicChars: true,
            },
            middle_name_ar: {
                minTwoArabicChars: true,
                lettersOnlyArabicWithSpaces: true,
            },
            last_name_ar: {
                required: true,
                lettersOnlyArabicWithSpaces: true,
                minTwoArabicChars: true,
            },
            company_name_ar: {
                required: true,
                lettersOnlyArabicWithSpaces: true,
                minTwoArabicChars: true,
            },
            building_number_ar: {
                required: true,
            },
            street_ar: {
                required: true,
            },
            district_ar: {
                required: true,
            },
            pincode_ar: {
                required: true,
                digits: true
            },
            city_ar: {
                required: true,
            },
            vat_number_ar: {
                required: true,
            },
            cr_number_ar: {
                required: true,
            },


        },
        messages: {
            email: "Please enter a valid Email address",
            password: {
                required: "Please provide a Password",
                minlength: "Your Password must be at least 5 characters long"
            },
            password_confirmation: {
                required: "Please confirm above Password",
                minlength: "Your Password must be at least 5 characters long",
                equalTo: "Please enter the same Password as above"
            },
            first_name: {
                required: "Please enter your First name",
                lettersonly: "Please enter alphabets only",
                minlength: "First name must consist atleast 2 characters"
            },
            middle_name: {
                lettersonly: "Please enter alphabets only",
                minlength: "Middle name must consist atleast 2 characters",
            },
            last_name: {
                required: "Please enter your Last name",
                lettersonly: "Please enter alphabets only",
                minlength: "Last name must consist atleast 2 characters"
            },
            company_name: {
                required: "Please enter your Company name",
                lettersonly: "Please enter alphabets only",
                minlength: "Company name must consist atleast 2 characters"
            },
            building_number: {
                required: "Please enter your Building number",
            },
            street: {
                required: "Please enter your Street number",
            },
            district: {
                required: "Please enter your District name",
            },
            pincode: {
                required: "Please enter your Postal code",
                digits: "Please enter numbers only"
            },
            city: {
                required: "Please enter your city",
            },
            vat_number: {
                required: "Please enter VAT number",
            },
            cr_number: {
                required: "Please enter CR number",
            },

            first_name_ar: {
                required: "الإسم الأول مطلوب",
            },
            last_name_ar: {
                required: "إسم العائلة مطلوب",
            },
            company_name_ar: {
                required: "اسم الشركة مطلوب",
            },
            building_number_ar: {
                required: "رقم المبنى مطلوب",
            },
            street_ar: {
                required: "رقم المبنى مطلوب",
            },
            district_ar: {
                required: "المنطقة مطلوبة",
            },
            pincode_ar: {
                required: "الرمز البريدي مطلوب",
            },
            city_ar: {
                required: "حقل المدينة مطلوب",
            },
            vat_number_ar: {
                required: "مطلوب ضريبة القيمة المضافة",
            },
            cr_number_ar: {
                required: "مطلوب رقم السجل التجاري",
            },
        },
        highlight: function(element, errorClass) {
            $('.invalid-feedback').remove();
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>

@endsection