@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Simplified Tax Invoice') }}</div>
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;border-radius: initial;">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <div class="p-2 pb-1 p-md-2">{{ __('Please fill details') }}</div>

                    <form method="POST" action="{{ route('seller.generate_invoice') }}" id="simplified-invoice-form">
                        <input type="hidden" name="type_of_invoice" value="1">
                        @csrf
                        <div class="table-responsive p-2">
                            <table class="table table-success table-bordered table-hover tableTheme1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Unit price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Taxable amount</th>
                                        <th scope="col">Tax rate</th>
                                        <th scope="col">Tax amount</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="items">
                                    <tr class="item1">
                                        <td class="iteration">1</td>
                                        <td> <input type="text" class="form-control" name="description[]" value="" autocomplete="description" autofocus>

                                        </td>
                                        <td> <input type="text" class="form-control unit_price" name="unit_price[]" value="" autocomplete="unit_price" autofocus>

                                        </td>
                                        <td> <input type="text" class="form-control quantity" name="quantity[]" value="" autocomplete="quantity" autofocus>

                                        </td>
                                        <td> <input type="text" class="form-control taxable_amount" name="taxable_amount[]" value="" autocomplete="taxable_amount" autofocus>

                                        </td>
                                        <td> <input type="text" class="form-control tax_rate" name="tax_rate[]" value="" autocomplete="tax_rate" autofocus>

                                        </td>
                                        <td> <input type="text" class="form-control tax_amount" name="tax_amount[]" value="" autocomplete="tax_amount" autofocus>

                                        </td>
                                        <td> <input type="text" class="form-control subtotal" name="subtotal[]" value="" autocomplete="subtotal" autofocus>

                                        </td>
                                        <td class="text-center align-middle delete-item">
                                            <i class="fa-solid fa-trash"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mb-0">
                            <div class="text-end w-25">
                            </div>
                            <div class="text-center w-50">
                                <button type="button" class="btn btn-primary add-items">
                                    {{ __('+ Add Items') }}
                                </button>
                                <button type="submit" class="btn btn-success generate-invoice">
                                    {{ __('Generate Invoice') }}
                                </button>
                            </div>
                            <div class="text-end w-25">
                                <button class="btn btn-primary me-2">
                                    {{ __('Total amount: ') }} <span class="total-amount"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<script>
    $().ready(function() {

        function calculateTotal() {
            var totalSum = 0;
            $('.subtotal').each(function() {
                totalSum += parseFloat($(this).val()) || 0;
            });
            $('.total-amount').text(totalSum+' SAR')
        }
        $('.subtotal').on('input', function() {
            calculateTotal()
        })

        let i;

        $('.add-items').on('click', function() {

            var find_last_tr = $('tbody tr:last').find('.iteration').text();
            i = find_last_tr;
            i++;

            $(`<tr class="item${i}">
                    <td class="iteration">${i}</td>
                    <td> <input type="text" class="form-control description" name="description[]" value="" autocomplete="description" autofocus>
                       
                    </td>
                    <td> <input type="text" class="form-control unit_price" name="unit_price[]" value="" autocomplete="unit_price" autofocus>
                        
                    </td>
                    <td> <input type="text" class="form-control quantity" name="quantity[]" value="" autocomplete="quantity" autofocus>
                        
                        </td>
                        <td> <input type="text" class="form-control taxable_amount" name="taxable_amount[]" value="" autocomplete="taxable_amount" autofocus>
                            
                        </td>
                        <td> <input type="text" class="form-control tax_rate" name="tax_rate[]" value="" autocomplete="tax_rate" autofocus>
                           
                        </td>
                        <td> <input type="text" class="form-control tax_amount" name="tax_amount[]" value="" autocomplete="tax_amount" autofocus>
                            
                        </td>
                        <td> <input type="text" class="form-control subtotal" name="subtotal[]" value="" autocomplete="subtotal" autofocus>
                           
                        </td>
                        <td class="text-center align-middle delete-item">
                            <i class="fa-solid fa-trash"></i>
                        </td>
                 </tr>`).appendTo($('.items'))


            $('.subtotal').on('input', function() {
                calculateTotal()
            })


            $('.delete-item').on('click', function() {
                var tr_length = $('tbody tr').length;
                if (tr_length != 1) {
                    var next = $(this).closest('tr').nextAll();
                    next.each(function(key, item) {
                        var value = $(item).find('.iteration').text();
                        var new_value = value - 1;
                        $(item).find('.iteration').text(new_value)
                    })
                    $(this).closest('tr').remove();
                }
            })
        })


        $('.generate-invoice').on('click', function(e) {
            e.preventDefault()

            var formData = $("#simplified-invoice-form").serialize();

            $.ajax({
                url: 'generate-invoice',
                method: 'post',
                data: formData,
                success: function(response) {
                    $('.error').hide()

                },
                error: function(messages) {
                    var messages = $.parseJSON(messages.responseText);
                    $('.error').hide()
                    $.each(messages, function(key, item) {
                        // console.log(key, item);
                        var item_number = key + 1;
                        $.each(item, function(ke, it) {
                            // console.log(ke, it);
                            console.log($('.item' + item_number).find('#' + ke));
                            var element = $('.item' + item_number).find('#' + ke).closest('td');
                            $(element).append('<span class="error" style="color:red;font-size:12px;text-align:center;display:block">' + it + '</span>')
                        })
                    })

                }

            })
        })



    })
</script>















@endsection