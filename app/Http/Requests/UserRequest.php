<?php

namespace CodeShopping\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return !$this->isMethod('put') ? $this->rulesCreate() : $this->rulesUpdate();
    }

    private function rulesCreate(){
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:4|max:15',
        ];
    }

    private function rulesUpdate(){
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|min:4|max:15',
        ];
    }
}
