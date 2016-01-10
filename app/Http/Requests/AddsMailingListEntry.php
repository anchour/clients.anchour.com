<?php

namespace App\Http\Requests;

class AddsMailingListEntry extends Request {

    /**
     * Redirect back to the 'new' page.
     * @var string
     */
    protected $redirect = '/admin/mailing-list/new';

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
        return [
            'name'  => 'required',
            'email' => 'required|email|unique:mailing_list,email'
        ];
    }
}
