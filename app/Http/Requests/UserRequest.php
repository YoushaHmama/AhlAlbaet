<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'unique:users|unique:register_wait',
            // 'password'=>'min:8',
        ];
    }
    public function messages(){
        return[
            "email.unique"=>'البريد الإلكتروني مستخدم من قبل',
            "password.min"=>'كلمة المرور يجبأن تتكون على الأقل من 8 محارف',
        ];
    }
}
