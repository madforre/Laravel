<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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

     // 우리가 만든 Form Request는 원래있던 Request 객체를 상속하고 있고, 
     // 거기다 유효성 검사 기능을 추가한 것이다. 
     // Form Request 는 미들웨어와 유사한 기능을 하고 있는데, 
     // 우리가 만든 Form Request를 통과하지 못하면, 
     // 예를들어 store() 메소드는 전혀 실행되지 않는다. 
    public function rules()
    {
        return [
            'title'   => 'required',
            'content' => 'required',
            // Other Validation Rules...
            'tags'    => 'required|array'
        ];
    }
}
