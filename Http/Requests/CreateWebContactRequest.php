<?php
/**
 * User: David
 * Date: 30/03/2016
 * Time: 1:56 PM
 */
namespace Modules\Webcontact\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWebContactRequest extends FormRequest
{
    public function rules()
    {
        return [
            'contact_name'      => 'required',
            'contact_email'     => 'required',
            'contact_subject'   => 'required',
            'contact_message'   => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }
}