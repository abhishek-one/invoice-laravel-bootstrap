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
                        <th scope="col">#</th>
                        <th scope="col">Buyer's Full name</th>
                        <th scope="col">Buyer's VAT </th>
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
                        <td scope="row">{{$loop->iteration}}</td>
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

    <script>
        $(document).ready(function() {
            let id, delete_id;

            $('#add-buyer-button').on('click', function() {
                $('#add-update-buyer-title').html('Please fill buyer details')
                $('#add-update-buyer-form')[0].reset();
                id = null;
            });

            $('.edit').on('click', function() {
                id = '';
                id = $(this).data('id');
                $.ajax({
                    url: "/buyer-profile-details/",
                    method: "get",
                    data: {
                        id: id,
                    },
                    success: function(response) {

                        console.log(response);

                        $('#first_name').val(response.first_name);
                        $('#middle_name').val(response.middle_name);
                        $('#last_name').val(response.last_name);
                        $('#email').val(response.email);
                        $('#company_name').val(response.company_name);
                        $('#building_number').val(response.building_number);
                        $('#additional_number').val(response.additional_number);
                        $('#street').val(response.street);
                        $('#district').val(response.district);
                        $('#pincode').val(response.pincode);
                        $('#city').val(response.city);
                        $('#vat_number').val(response.vat_number);
                        $('#cr_number').val(response.cr_number);

                        $('#first_name_ar').val(response.first_name_ar);
                        $('#middle_name_ar').val(response.middle_name_ar);
                        $('#last_name_ar').val(response.last_name_ar);
                        $('#company_name_ar').val(response.company_name_ar);
                        $('#building_number_ar').val(response.building_number_ar);
                        $('#additional_number_ar').val(response.additional_number_ar);
                        $('#street_ar').val(response.street_ar);
                        $('#district_ar').val(response.district_ar);
                        $('#city_ar').val(response.city_ar);
                        $('#vat_number_ar').val(response.vat_number_ar);
                        $('#cr_number_ar').val(response.cr_number_ar);

                        $('#add-update-buyer-title').html('Update details')
                        $('#add-update-buyer-modal').modal('show')
                    }
                })
            })


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


            $("#add-update-buyer-form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
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
            });

            $('.update-or-save-buyer').on('click', function(e) {
                e.preventDefault();
                if ($("#add-update-buyer-form").valid()) {
                    $.ajax({
                        url: "/buyer-profile-details/",
                        method: "post",
                        data: {
                            id: id,
                            first_name: $('#first_name').val(),
                            middle_name: $('#middle_name').val(),
                            last_name: $('#last_name').val(),
                            email: $('#email').val(),
                            company_name: $('#company_name').val(),
                            building_number: $('#building_number').val(),
                            additional_number: $('#additional_number').val(),
                            street: $('#street').val(),
                            district: $('#district').val(),
                            pincode: $('#pincode').val(),
                            city: $('#city').val(),
                            vat_number: $('#vat_number').val(),
                            cr_number: $('#cr_number').val(),

                            first_name_ar: $('#first_name_ar').val(),
                            middle_name_ar: $('#middle_name_ar').val(),
                            last_name_ar: $('#last_name_ar').val(),
                            company_name_ar: $('#company_name_ar').val(),
                            building_number_ar: $('#building_number_ar').val(),
                            additional_number_ar: $('#additional_number_ar').val(),
                            street_ar: $('#street_ar').val(),
                            district_ar: $('#district_ar').val(),
                            city_ar: $('#city_ar').val(),
                            vat_number_ar: $('#vat_number_ar').val(),
                            cr_number_ar: $('#cr_number_ar').val()
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status == 'invalid') {
                                $('.backend-errors').html('');
                                $(response.errors).each(function(index, error) {
                                    $('.backend-errors').append(error + '<br>');
                                });
                            } else {
                                window.location.reload()
                            }
                        }
                    })
                }
            })

            $('.delete').on('click', function() {
                delete_id = $(this).data('id');
                $('#delete-buyer').modal('show');
            })
            $('.confirm-delete').on('click', function() {
                $.ajax({
                    url: "/delete-buyer/",
                    method: "post",
                    data: {
                        id: delete_id,
                    },
                    success: function(response) {
                        window.location.reload()
                    }
                });

            })



        })
    </script>





    @endsection