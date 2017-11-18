<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFilmRequest extends FormRequest
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
        return [
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'released_on'   => 'required|date',
            'rating'        => 'required|numeric|min:1|max:5',
            'ticket_price'  => 'required|numeric',
            'country'       => 'required|string',
        ];
    }

    public function response(array $errors)
    {
        return $this->setStatusCode(400)->respondWithError('INVALID_REQUEST', array_shift($errors)[0]);
    }
}
