<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'comment' => 'required|string',
            'film_id' => 'required|exists:films,id'
        ];
    }

    public function response(array $errors)
    {
        return $this->setStatusCode(400)->respondWithError('INVALID_REQUEST', array_shift($errors)[0]);
    }
}
