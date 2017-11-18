<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiResponse;

class GetFilmBySlugRequest extends FormRequest
{
    use ApiResponse;
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
            'slug' => 'required|string|max:255',
        ];
    }

    public function response(array $errors)
    {
        return $this->setStatusCode(400)->respondWithError('INVALID_REQUEST', array_shift($errors)[0]);
    }
}
