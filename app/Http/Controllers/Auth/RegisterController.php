<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($this->create($request->all())));
        return redirect('thank-you')->with('msg','Thankyou for registration! Your registration will be shortly approved by our team');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/thank-you";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'first_name' => ['required', 'string', 'max:255'],
                'first_name_ar' => ['required', 'string', 'max:255'],
                'middle_name' => ['nullable', 'string', 'max:255'],
                'middle_name_ar' => ['nullable', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'last_name_ar' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
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
                'pincode' => ['required', 'numeric'],
                'city' => ['required', 'string', 'max:255'],
                'city_ar' => ['required', 'string', 'max:255'],
                'vat_number' => ['required', 'string', 'max:255'],
                'vat_number_ar' => ['required', 'string', 'max:255'],
                'cr_number' => ['required', 'string', 'max:255'],
                'cr_number_ar' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'country_ar' => ['required', 'string', 'max:255'],
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
                'district_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط.',
                'district_ar.max' => 'الحد الأقصى المسموح به هو 255 حرفًا.',

                'city_ar.required' => 'هذه الخانة مطلوبه',
                'city_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط.',
                'city_ar.max' => 'يجب ألا تتجاوز المدينة 255 حرفًا.',

                'vat_number_ar.required' => 'هذه الخانة مطلوبه.',
                'vat_number_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط.',
                'vat_number_ar.max' => 'يجب ألا يتجاوز الرقم الضريبي 255 حرفًا.',

                'cr_number_ar.required' => 'هذه الخانة مطلوبه.',
                'cr_number_ar.string' => 'الرجاء إدخال الحروف الهجائية فقط.',
                'cr_number_ar.max' => 'يجب ألا يتجاوز الرقم التجاري 255 حرفًا.',

                'country_ar.required' => 'حقل البلد مطلوب.',
                'country_ar.string' => 'يجب أن يكون البلد نصًا.',
                'country_ar.max' => 'يجب ألا يتجاوز البلد 255 حرفًا.',                
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);

        DB::table('role_users')->insert([
            'role_id'=>0,
            'user_id'=>$user->id,
        ]);

        DB::table('seller_details')->insert([

            'user_id' => $user->id,

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
            'country' => $data['country'],


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
            'country_ar' => $data['country_ar'],

        ]);
        return $user;
    }
}
