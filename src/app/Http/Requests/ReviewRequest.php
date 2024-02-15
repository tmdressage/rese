<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'review' => ['required'],    
            'comment' => ['max:500'], //コメントは任意入力
          ];
    }

    public function messages()
    {
        return [
            'review.required' => '! レビューが設定されていません。',
            'comment.max' => '! コメントは500字以内で入力してください。',
        ];
    }
}
