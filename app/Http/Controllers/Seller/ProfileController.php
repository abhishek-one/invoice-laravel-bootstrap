<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function create_or_update_bank_details(Request $request)
    {
        $validator = Validator::make(
            $request->toarray(),
            [
                'account_name' => ['required', 'string', 'max:255'],
                'bank_name' => ['required', 'string', 'max:255'],
                'account_number' => ['required', 'max:255','numeric'],
                'iban_number' => ['required', 'max:255']
            ],
            [
                'account_name.string' => 'Please input letters only',
                'bank_name.string' => 'Please input letters only'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            SellerDetail::where('user_id', Auth::user()->id)->update([
                'account_name' => $request['account_name'],
                'bank_name' => $request['bank_name'],
                'account_number' => $request['account_number'],
                'iban_number' => $request['iban_number'],
            ]);
            return redirect('/');
            // redirect()->back()->with('message', 'Details updated');
        }
    }

    public function view_bank_details()
    {
        $data = SellerDetail::where('user_id', Auth::user()->id)
            ->select('account_name', 'bank_name', 'account_number', 'iban_number')
            ->first()->toArray();

        if (!is_null($data)) {
            return view('seller.profile.bank_details', compact('data'));
        }
        return view('seller.profile.bank_details');
    }

    public function view_profile()
    {
        $data = SellerDetail::where('user_id', Auth::user()->id)
            ->first()->toArray();

        if (!is_null($data)) {
            return view('seller.profile.profile_details', compact('data'));
        }
        return view('seller.profile.profile_details');
    }
    public function update_profile(Request $request)
    {
        $data = $request->toarray();
        $validator = Validator::make(
            $data,
            [
                'first_name' => ['required', 'string', 'max:255'],
                'first_name_ar' => ['required', 'string', 'max:255'],
                'middle_name' => ['nullable', 'string', 'max:255'],
                'middle_name_ar' => ['nullable', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'last_name_ar' => ['required', 'string', 'max:255'],
                'company_name' => ['required', 'string', 'max:255'],
                'company_name_ar' => ['required', 'string', 'max:255'],
                'building_number' => ['required', 'string', 'max:255'],
                'building_number_ar' => ['required', 'string', 'max:255'],
                'additional_number' => ['nullable', 'string', 'max:255'],
                'additional_number_ar' => ['nullable', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'street_ar' => ['required', 'string', 'max:255'],
                'district' => ['string', 'max:255'],
                'district_ar' => ['string', 'max:255'],
                'pincode' => ['required', 'numeric','min:6','max:6'],
                'city' => ['required', 'string', 'max:255'],
                'city_ar' => ['required', 'string', 'max:255'],
                'vat_number' => ['required', 'string', 'max:15','min:15'],
                'vat_number_ar' => ['required', 'string', 'max:255'],
                'cr_number' => ['required', 'string','max:10','min:10'],
                'cr_number_ar' => ['required', 'string', 'max:255'],
            ],
            [
                'first_name_ar.required' => 'حقل الاسم الأول مطلوب.',
                'first_name_ar.string' => 'يجب أن يكون الاسم الأول نصًا.',
                'first_name_ar.max' => 'يجب ألا يتجاوز الاسم الأول 255 حرفًا.',

                'middle_name_ar.string' => 'يجب أن يكون الاسم الأوسط نصًا.',
                'middle_name_ar.max' => 'يجب ألا يتجاوز الاسم الأوسط 255 حرفًا.',

                'last_name_ar.required' => 'حقل الاسم الأخير مطلوب.',
                'last_name_ar.string' => 'يجب أن يكون الاسم الأخير نصًا.',
                'last_name_ar.max' => 'يجب ألا يتجاوز الاسم الأخير 255 حرفًا.',

                'company_name_ar.required' => 'حقل اسم الشركة مطلوب.',
                'company_name_ar.string' => 'يجب أن يكون اسم الشركة نصًا.',
                'company_name_ar.max' => 'يجب ألا يتجاوز اسم الشركة 255 حرفًا.',

                'building_number_ar.required' => 'حقل رقم المبنى مطلوب.',
                'building_number_ar.string' => 'يجب أن يكون رقم المبنى نصًا.',
                'building_number_ar.max' => 'يجب ألا يتجاوز رقم المبنى 255 حرفًا.',

                'additional_number_ar.string' => 'يجب أن يكون الرقم الإضافي نصًا.',
                'additional_number_ar.max' => 'يجب ألا يتجاوز الرقم الإضافي 255 حرفًا.',

                'street_ar.required' => 'حقل الشارع مطلوب.',
                'street_ar.string' => 'يجب أن يكون الشارع نصًا.',
                'street_ar.max' => 'يجب ألا يتجاوز الشارع 255 حرفًا.',

                // 'district_ar.required' => 'حقل الحي مطلوب.',
                'district_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط',
                'district_ar.max' => 'الحد الأقصى المسموح به هو 255 حرفًا.',

                'city_ar.required' => 'هذه الخانة مطلوبه',
                'city_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط',
                'city_ar.max' => 'يجب ألا تتجاوز المدينة 255 حرفًا.',

                'vat_number_ar.required' => 'هذه الخانة مطلوبه.',
                'vat_number_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط.',
                'vat_number_ar.max' => 'يجب ألا يتجاوز الرقم الضريبي 15 حرفًا.',

                'cr_number_ar.required' => 'هذه الخانة مطلوبه.',
                'cr_number_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط.',
                'cr_number_ar.max' => 'يجب ألا يتجاوز الرقم التجاري 10 حرفًا.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            SellerDetail::updateOrInsert(
                ['user_id' => Auth::user()->id],
                [
                    'first_name' => $data['first_name'],
                    'middle_name' => $data['middle_name'],
                    'last_name' => $data['last_name'],
                    'company_name' => $data['company_name'],
                    'building_number' => $data['building_number'],
                    'additional_number' => $data['additional_number'],
                    'street' => $data['street'],
                    'district' => $data['district'],
                    'pincode' => $data['pincode'],
                    'city' => $data['city'],
                    'vat_number' => $data['vat_number'],
                    'cr_number' => $data['cr_number'],


                    'first_name_ar' => $data['first_name_ar'],
                    'middle_name_ar' => $data['middle_name_ar'],
                    'last_name_ar' => $data['last_name_ar'],
                    'company_name_ar' => $data['company_name_ar'],
                    'building_number_ar' => $data['building_number_ar'],
                    'additional_number_ar' => $data['additional_number_ar'],
                    'street_ar' => $data['street_ar'],
                    'district_ar' => $data['district_ar'],
                    'city_ar' => $data['city_ar'],
                    'vat_number_ar' => $data['vat_number_ar'],
                    'cr_number_ar' => $data['cr_number_ar'],

                ]
            );
            return redirect()->back()->with('message', 'Details updated');
        }
    }
}
