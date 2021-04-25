<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ApiRequest extends FormRequest
{
    use ApiResponse;

    /**
     * Get The validation Rules That Apply To The Request.
     * 
     * @return array
     */
    abstract public function rules();

    protected function faledVaildation(Validator $validator)
    {
        throw new HtpResponseException($this->apiError(
            $validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY,
        ));
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseExption($this->apiError(
            null,
            Response::HTTP_UNAUTHORIZED
        ));

    }

    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return false;
    // }

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array
    //  */
    // public function rules()
    // {
    //     return [
    //         //
    //     ];
    // }
}
