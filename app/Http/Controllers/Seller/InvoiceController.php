<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\SellerDetail;
use App\Models\User;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Tags\InvoiceDate;
use Salla\ZATCA\Tags\InvoiceTaxAmount;
use Salla\ZATCA\Tags\InvoiceTotalAmount;
use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PDF;

class InvoiceController extends Controller
{
    public function generate_invoice(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type_of_invoice' => 'required|in:1,2',
                'description.*' => 'required|string',
                'unit_price.*' => 'required|numeric',
                'quantity.*' => 'required|numeric',
                'taxable_amount.*' => 'required|numeric',
                'tax_rate.*' => 'required|numeric',
                'tax_amount.*' => 'required|numeric',
                'subtotal.*' => 'required|numeric',
            ], [
                'description.*.required' => "This field is required",
                'unit_price.*.required' => "This field is required",
                'quantity.*.required' => "This field is required",
                'taxable_amount.*.required' => "This field is required",
                'tax_rate.*.required' => "This field is required",
                'tax_amount.*.required' => "This field is required",
                'subtotal.*.required' => "This field is required",

                'description.*.string' => "Please input letters only",
                'unit_price.*.numeric' => "Please input numeric values",
                'quantity.*.numeric' => "Please input numeric values",
                'taxable_amount.*.numeric' => "Please input numeric values",
                'tax_rate.*.numeric' => "Please input numeric values",
                'tax_amount.*.numeric' => "Please input numeric values",
                'subtotal.*.numeric' => "Please input numeric values",
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->toArray();
                $array_keys = array_keys($errors);
                $final = [];
                for ($i = 0; $i < count($errors); $i++) {
                    $split = explode('.', $array_keys[$i]);
                    $final[$split[1]][$split[0]] = Arr::flatten(array_values($errors)[$i]);
                }
                return response()->json($final, 400);
            }
            $invoice = new Invoice();
            $invoice->user_id = Auth::user()->id;
            $invoice->type_of_invoice = $request->type_of_invoice;

            $seller = SellerDetail::where('user_id',Auth::user()->id)->first();

            $invoice->seller_name = $seller->first_name . ' ' . $seller->middle_name . ' ' . $seller->last_name;
            $invoice->seller_building_number = $seller->building_number;
            $invoice->seller_street = $seller->street;
            $invoice->seller_district = $seller->district;
            $invoice->seller_city = $seller->city;
            $invoice->seller_country = $seller->country;
            $invoice->seller_pincode = $seller->pincode;
            $invoice->seller_additional_number = $seller->additional_number;
            $invoice->seller_vat_number = $seller->vat_number;
            $invoice->seller_cr_number = $seller->cr_number;
            $invoice->account_name = $seller->account_name;
            $invoice->bank_name = $seller->bank_name;
            $invoice->account_number = $seller->account_number;
            $invoice->iban_number = $seller->iban_number;

            if ($request->type_of_invoice == 1) {   // Simplified

                $invoice->save();
                // dd('here');
            } else if ($request->type_of_invoice == 2) {  // Tax invoice

                $validator3 = Validator::make(request()->only('buyer_id'), [
                    'buyer_id' => 'required|exists:users,id',
                ]);
                if ($validator3->fails()) {
                    return response()->json(['message' => $validator3->errors()->all()], 400);
                }

                $buyer = User::find($request->buyer_id)->first();

                $invoice->buyer_name = $buyer->first_name . ' ' . $buyer->middle_name . ' ' . $buyer->last_name;
                $invoice->buyer_building_number = $buyer->building_number;
                $invoice->buyer_street = $buyer->street;
                $invoice->buyer_district = $buyer->district;
                $invoice->buyer_city = $buyer->buyer_city;
                $invoice->buyer_country = $buyer->buyer_country;
                $invoice->buyer_pincode = $buyer->buyer_pincode;
                $invoice->buyer_additional_number = $buyer->buyer_additional_number;
                $invoice->buyer_vat_number = $buyer->buyer_vat_number;
                $invoice->buyer_cr_number = $buyer->buyer_cr_number;
                $invoice->save();
            }

            $items_ids = [];


            for ($i = 0; $i < $invoice->item_count; $i++) {
                $invoice_items = new InvoiceItem();
                $invoice_items->invoice_id = $invoice->id;
                $invoice_items->description = $request->description;
                $invoice_items->unit_price = $request->unit_price;
                $invoice_items->quantity = $request->quantity;
                $invoice_items->taxable_amount = $request->taxable_amount;
                $invoice_items->tax_rate = $request->tax_rate;
                $invoice_items->tax_amount = $request->tax_amount;
                $invoice_items->subtotal = $request->subtotal;
                $invoice_items->save();
                array_push($items_ids, $invoice_items->id);
            }
            $items_ids = json_encode($items_ids);
            $invoice_number = 'INVO00' . $invoice->id;
            Invoice::where('id', $invoice->id)->update([
                'items_ids' => $items_ids,
                "invoice_number" => 'INVO00' . $invoice->id
            ]);

            $data = Invoice::join('invoice_items', 'invoice_items.id', '=', 'invoices.id')
                ->where('id', $invoice->id)->get();
            $data['qr'] = $this->generate_qr($data);

            $pdf = PDF::loadView('client.agent.insurance.pdf.invoice', compact('invoice'))
                ->setOption('enable-local-file-access', true)
                ->setOption('margin-top', '15mm');
            $file_path =  'invoice' . DIRECTORY_SEPARATOR;
            $file_name =  $invoice_number . ".pdf";
            $pdf->save($file_path . $file_name);

            return view('invoices.print_invoice', compact('data'));
        } catch (\Exception $err) {
            Log::error('save_to_print Error - Message: ' . $err->getMessage() . ' in file ' . $err->getFile() .  ' on line ' .  $err->getLine());
            return response()->json(['message' => ['Something went wrong.']], 500);
        }
    }
    public function generate_qr($data)
    {
        $displayQRCodeAsBase64 = GenerateQrCode::fromArray([
            new Seller($data->seller_name), // seller name        
            new TaxNumber($data->vat_number), // seller tax number
            new InvoiceDate('2021-07-12T14:25:09Z'), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
            new InvoiceTotalAmount($data->subtotal), // invoice total amount
            new InvoiceTaxAmount('15.00') // invoice tax amount
        ])->render();
    }
}
