<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'shop_name' => ['required', 'string', 'max:12'],
            'shop_img' => ['required'],
            'shop_area' => ['required'],
            'shop_genre' => ['required'],
            'shop_text' => ['required', 'string', 'max:180'],
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => '! 飲食店名を入力してください。',
            'shop_name.string' => '! 飲食店名を文字列で入力してください。',
            'shop_name.max' => '! 飲食店名を12文字以内で入力してください。',
            'shop_img.required' => '! 画像をアップロードしてください。',
            'shop_area.required' => '! エリアを入力してください。',
            'shop_genre.required' => '! ジャンルを入力してください。',
            'shop_text.required' => '! 紹介文を入力してください。',
            'shop_text.string' => '! 紹介文を文字列で入力してください。',
            'shop_text.max' => '! 紹介文を180文字以内で入力してください。',

        ];
    }
}
