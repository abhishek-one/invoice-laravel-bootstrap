<style>
    .column {
        float: left;
    }

    .clearfix::after {
        content: "";
        display: table;
        clear: both;
    }

    table {
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    /* Style the table header text */
    th {
        background-color: #f2f2f2;
        text-align: left;
        border: 1px solid black !important;
        padding: 5px;
    }

    /* Style the table rows */
    tr {
        border: 1px solid #ddd;
    }

    /* Style the table row text */
    td {
        border: 1px solid grey;
        padding: 5px;
    }

    * {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
    }
</style>


<div class="invoice-qr-div">
    <div class="invoice-div column" style="width:70%">
        <table>
            <tr>
                <th>Invoice Number رقم الفاتورة</th>
                <td>{{$data[0]['invoice_number']}}</td>
            </tr>

            <tr>
                <th>Invoice Date تاريخ الفاتورة</th>
                <td>{{date('d-m-Y', strtotime($data[0]['created_at']))}}</td>
            </tr>

        </table>
    </div>
    <div class="qr-div column" style="width:30%">
        <img src="{{$qr}}" alt="QR Code" />
    </div>
    <div class="clearfix"></div>
</div>

<div class="seller-buyer-div">
    <div class="seller-div column" style="width: 50%">
        <table>
            <tr>
                <th>Seller details</th>
                <th></th>
                <th></th>
                <th>تفاصيل البائع</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$data[0]['seller_name']}}</td>
                <td>{{$data[0]['seller_name_ar']}}</td>
                <td>اسم</td>
            </tr>
            <tr>
                <td>Building No.</td>
                <td>{{$data[0]['seller_building_number']}}</td>
                <td>{{$data[0]['seller_building_number_ar']}}</td>
                <td>رقم المبنى</td>
            </tr>
            <tr>
                <td>Street Name</td>
                <td>{{$data[0]['seller_street']}}</td>
                <td>{{$data[0]['seller_street_ar']}}</td>
                <td>اسم الشارع</td>
            </tr>
            <tr>
                <td>District</td>
                <td>{{$data[0]['seller_district']}}</td>
                <td>{{$data[0]['seller_district_ar']}}</td>
                <td>يصرف</td>
            </tr>
            <tr>
                <td>City</td>
                <td>{{$data[0]['seller_city']}}</td>
                <td>{{$data[0]['seller_city_ar']}}</td>
                <td>مدينة</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>{{--$data[0]['seller_country']--}}</td>
                <td>{{--$data[0]['seller_country_ar']--}}</td>
                <td>دولة</td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td>{{$data[0]['seller_pincode']}}</td>
                <td>{{$data[0]['seller_pincode']}}</td>
                <td>رمز بريدي</td>
            </tr>
            <tr>
                <td>Additional Number</td>
                <td>{{$data[0]['seller_additional_number']}}</td>
                <td>{{$data[0]['seller_additional_number_ar']}}</td>
                <td>رقم إضافي</td>
            </tr>
            <tr>
                <td>VAT Number</td>
                <td>{{$data[0]['seller_vat_number']}}</td>
                <td>{{$data[0]['seller_vat_number_ar']}}</td>
                <td>ظريبه الشراء</td>
            </tr>
            <tr>
                <td>CR Number</td>
                <td>{{$data[0]['seller_cr_number']}}</td>
                <td>{{$data[0]['seller_cr_number_ar']}}</td>
                <td>رقم السجل التجاري</td>
            </tr>
        </table>
    </div>

    <div class="buyer-div column" style="width: 50%">
        @if($data[0]['type_of_invoice'] == 2)
        <table>
            <tr>
                <th>Buyer details</th>
                <th></th>
                <th></th>
                <th>تفاصيل المشتري</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$data[0]['buyer_name']}}</td>
                <td>{{$data[0]['buyer_name_ar']}}</td>
                <td>اسم</td>
            </tr>
            <tr>
                <td>Building No.</td>
                <td>{{$data[0]['buyer_building_number']}}</td>
                <td>{{$data[0]['buyer_building_number_ar']}}</td>
                <td>رقم المبنى</td>
            </tr>
            <tr>
                <td>Street Name</td>
                <td>{{$data[0]['buyer_street']}}</td>
                <td>{{$data[0]['buyer_street_ar']}}</td>
                <td>اسم الشارع</td>
            </tr>
            <tr>
                <td>District</td>
                <td>{{$data[0]['buyer_district']}}</td>
                <td>{{$data[0]['buyer_district_ar']}}</td>
                <td>يصرف</td>
            </tr>
            <tr>
                <td>City</td>
                <td>{{$data[0]['buyer_city']}}</td>
                <td>{{$data[0]['buyer_city_ar']}}</td>
                <td>مدينة</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>{{$data[0]['buyer_country']}}</td>
                <td>{{$data[0]['buyer_country_ar']}}</td>
                <td>دولة</td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td>{{$data[0]['buyer_pincode']}}</td>
                <td>{{$data[0]['buyer_pincode_ar']}}</td>
                <td>رمز بريدي</td>
            </tr>
            <tr>
                <td>Additional Number</td>
                <td>{{$data[0]['buyer_additional_number']}}</td>
                <td>{{$data[0]['buyer_additional_number_ar']}}</td>
                <td>رقم إضافي</td>
            </tr>
            <tr>
                <td>VAT Number</td>
                <td>{{$data[0]['buyer_vat_number']}}</td>
                <td>{{$data[0]['buyer_vat_number_ar']}}</td>
                <td>ظريبه الشراء</td>
            </tr>
            <tr>
                <td>CR Number</td>
                <td>{{$data[0]['buyer_cr_number']}}</td>
                <td>{{$data[0]['buyer_cr_number_ar']}}</td>
                <td>رقم السجل التجاري</td>
            </tr>
        </table>
        @endif
    </div>
    <div class="clearfix"></div>
</div>
<br>
<div class="items" style="width: 100%">
    <table>
        <tr>
            <th>Nature of goods or services طبيعة السلع أو الخدمات</th>
            <th>Unit Price سعر الوحدة</th>
            <th>Quantity كمية</th>
            <th>Taxable Amount المبلغ الخاضع للضريبة</th>
            <th>Tax Rate معدل الضريبة</th>
            <th>Tax Amount قيمة الضريبة</th>
            <th>Item Subtotal(Including VAT) المجموع الفرعي للصنف (شامل ضريبة القيمة المضافة)</th>
        </tr>
        @foreach($data as $items)
        <tr>
            <td>{{$items['description']}}</td>
            <td>{{$items['unit_price']}}</td>
            <td>{{$items['quantity']}}</td>
            <td>{{$items['taxable_amount']}}</td>
            <td>{{$items['tax_rate']}}</td>
            <td>{{$items['tax_amount']}}</td>
            <td>{{$items['subtotal']}}</td>
        </tr>
        @endforeach
    </table>
</div>
<br>
<div class="amount" style="width: 100%">
    <table>
        <tr>
            <th>Total (Excluding VAT)</th>
            <th>الإجمالي (باستثناء ضريبة القيمة المضافة)</th>
            <td></td>
        </tr>
        <tr>
            <th>Total VAT</th>
            <th>إجمالي ضريبة القيمة المضافة</th>
            <td></td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <th>المبلغ الإجمالي</th>
            <td></td>
        </tr>
    </table>
</div>
<br>
<div class="bank" style="width: 100%">
    <table>
        <tr>
            <th>Account Name</th>
            <td>{{$data[0]['account_name']}}</td>
            <th>Bank Name</th>
            <td>{{$data[0]['bank_name']}}</td>
        </tr>
        <tr>
            <th>Account Number</th>
            <td>{{$data[0]['account_number']}}</td>
            <th>IBAN Number</th>
            <td>{{$data[0]['iban_number']}}</td>
        </tr>
    </table>
</div>