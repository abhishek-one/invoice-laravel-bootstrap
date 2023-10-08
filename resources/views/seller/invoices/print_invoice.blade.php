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
        padding: 10px;
    }

    /* Style the table rows */
    tr {
        border: 1px solid #ddd;
    }

    /* Style the table row text */
    td {
        border: 1px solid grey;
        padding: 10px;
    }
    * { font-family: DejaVu Sans, sans-serif; }

</style>


<div class="invoice-qr-div">
    <div class="invoice-div column" style="width:70%">
        <table>
            <tr>
                <th>Invoice Number رقم الفاتورة</th>
                <td>{{$data->invoice_number}}</td>
            </tr>

            <tr>
                <th>Invoice Date تاريخ الفاتورة</th>
                <td>{{$data->created_at}}</td>
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
        <table >
            <tr>
                <th>Seller details</th>
                <th></th>
                <th></th>
                <th>تفاصيل البائع</th>
            </tr>
            <tr>
                <td>Mark</td>
                <td>Mark</td>
                <td>Mark</td>
                <td>@mdo</td>
            </tr>
        </table>
    </div>
    <div class="buyer-div column" style="width: 50%">
        <table>
            <tr>
                <th>Buyer details</th>
                <th></th>
                <th></th>
                <th>تفاصيل البائع</th>
            </tr>
            <tr>
                <td>Mark</td>
                <td>Mark</td>
                <td>Mark</td>
                <td>@mdo</td>
            </tr>
        </table>
    </div>
    <div class="clearfix"></div>

</div>
<div class="items">

</div>
<div class="amount">

</div>
<div class="bank">

</div>