<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\SellerBuyersDetail;
use App\Models\SellerDetail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
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

class InvoiceController extends Controller
{
    public function view_invoices()
    {
        $invoices = Invoice::where('seller_id', Auth::id())->get();
        return view('seller.invoices.invoices',compact('invoices'));
    }

    public function view_tax_invoice()
    {
        $buyers = SellerBuyersDetail::where('seller_id', Auth::user()->id)->get();
        return view('seller.invoices.tax_invoice', compact('buyers'));
    }

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
            $invoice->seller_id = Auth::user()->id;
            $invoice->type_of_invoice = $request->type_of_invoice;

            $seller = SellerDetail::where('id', Auth::user()->id)->first();

            $invoice->seller_name = $seller->first_name . ' ' . $seller->middle_name . ' ' . $seller->last_name;
            $invoice->seller_building_number = $seller->building_number;
            $invoice->seller_street = $seller->street;
            $invoice->seller_district = $seller->district;
            $invoice->seller_city = $seller->city;
            $invoice->seller_pincode = $seller->pincode;
            $invoice->seller_additional_number = $seller->additional_number;
            $invoice->seller_vat_number = $seller->vat_number;
            $invoice->seller_cr_number = $seller->cr_number;
            $invoice->seller_country = $seller->country;

            $invoice->account_name = $seller->account_name;
            $invoice->bank_name = $seller->bank_name;
            $invoice->account_number = $seller->account_number;
            $invoice->iban_number = $seller->iban_number;

            $invoice->seller_name_ar = $seller->first_name_ar . ' ' . $seller->middle_name_ar  . ' ' . $seller->last_name_ar;
            $invoice->seller_building_number_ar = $seller->building_number_ar;
            $invoice->seller_street_ar = $seller->street_ar;
            $invoice->seller_district_ar = $seller->district_ar;
            $invoice->seller_city_ar = $seller->city_ar;
            $invoice->seller_additional_number_ar = $seller->additional_number_ar;
            $invoice->seller_vat_number_ar = $seller->vat_number_ar;
            $invoice->seller_cr_number_ar = $seller->cr_number_ar;
            $invoice->seller_country_ar = $seller->country_ar;


            if ($request->type_of_invoice == 1) {   // Simplified

                $invoice->save();
            } else if ($request->type_of_invoice == 2) {  // Tax invoice

                $validator3 = Validator::make(request()->only('buyer'), [
                    'buyer' => 'required|exists:seller_buyers_details,id',
                ]);
                if ($validator3->fails()) {
                    return response()->json(['message' => $validator3->errors()->all()], 400);
                }

                $buyer = SellerBuyersDetail::find($request->buyer)->first();

                $invoice->buyer_name = $buyer->first_name . ' ' . $buyer->middle_name . ' ' . $buyer->last_name;
                $invoice->buyer_building_number = $buyer->building_number;
                $invoice->buyer_street = $buyer->street;
                $invoice->buyer_district = $buyer->district;
                $invoice->buyer_city = $buyer->city;
                $invoice->buyer_pincode = $buyer->pincode;
                $invoice->buyer_additional_number = $buyer->additional_number;
                $invoice->buyer_vat_number = $buyer->vat_number;
                $invoice->buyer_cr_number = $buyer->cr_number;
                $invoice->buyer_country = $buyer->country;

                $invoice->buyer_name_ar = $buyer->first_name_ar . ' ' . $buyer->middle_name_ar  . ' ' . $buyer->last_name_ar;
                $invoice->buyer_building_number_ar = $buyer->building_number_ar;
                $invoice->buyer_street_ar = $buyer->street_ar;
                $invoice->buyer_district_ar = $buyer->district_ar;
                $invoice->buyer_city_ar = $buyer->city_ar;
                $invoice->buyer_additional_number_ar = $buyer->additional_number_ar;
                $invoice->buyer_vat_number_ar = $buyer->vat_number_ar;
                $invoice->buyer_cr_number_ar = $buyer->cr_number_ar;
                $invoice->buyer_country_ar = $buyer->country_ar;

                $invoice->save();
            }

            $items_ids = [];
            $total_subtotal = 0;
            $total_tax_amount = 0;
            $total_taxable_amount = 0;


            for ($i = 0; $i < count(request()->description); $i++) {
                $invoice_items = new InvoiceItem;
                $invoice_items->invoice_id = $invoice->id;
                $invoice_items->description = ($request->description)[$i];
                $invoice_items->unit_price = ($request->unit_price)[$i];
                $invoice_items->quantity = ($request->quantity)[$i];
                $invoice_items->taxable_amount = ($request->taxable_amount)[$i];
                $invoice_items->tax_rate = ($request->tax_rate)[$i];
                $invoice_items->tax_amount = ($request->tax_amount)[$i];
                $invoice_items->subtotal = ($request->subtotal)[$i];
                $invoice_items->save();
                array_push($items_ids, $invoice_items->id);

                $total_tax_amount = ($request->tax_amount)[$i] + $total_tax_amount;
                $total_subtotal = ($request->subtotal)[$i] + $total_subtotal;
                $total_taxable_amount = ($request->taxable_amount)[$i] + $total_taxable_amount;
            }
            $items_ids = json_encode($items_ids);
            $invoice_number = 'INVO00125' . $invoice->id;
            Invoice::where('id', $invoice->id)->update([
                "items_ids" => $items_ids,
                "invoice_number" => 'INVO00125' . $invoice->id,
                "items_total" => $total_tax_amount,
                "total_vat" => $total_subtotal,
                "total_amount" => $total_taxable_amount,
            ]);

            $data = InvoiceItem::leftJoin('invoices', 'invoices.id', '=', 'invoice_items.invoice_id')
                ->where('invoices.id', $invoice->id)
                ->get()
                ->toArray();

            // dd($data);

            $qr = $this->generate_qr($data);

            $file_path =  'invoices_pdfs' . DIRECTORY_SEPARATOR;
            $file_name =  $invoice_number . ".pdf";

            Pdf::loadView('seller.invoices.print_invoice', compact('qr', 'data'))
                ->setOption('enable-local-file-access', true)
                ->setOption(['margin-top' => '15mm', 'isHtml5ParserEnabled' => true,])
                ->save($file_path . $file_name);

            $response = [];
            $response['pdf_url'] = url($file_path . $file_name);
            return $response;
        } catch (\Exception $err) {
            Log::error('save_to_print Error - Message: ' . $err->getMessage() . ' in file ' . $err->getFile() .  ' on line ' .  $err->getLine());
            return response()->json(['message' => ['Something went wrong.']], 500);
        }
    }
    public function generate_qr($data)
    {
        return GenerateQrCode::fromArray([
            new Seller($data[0]['seller_name']), // seller name        
            new TaxNumber($data[0]['seller_vat_number']), // seller tax number
            new InvoiceDate(now()), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
            new InvoiceTotalAmount($data[0]['total_amount']), // invoice total amount
            new InvoiceTaxAmount($data[0]['total_vat']) // invoice tax amount
        ])->render();
    }
}
