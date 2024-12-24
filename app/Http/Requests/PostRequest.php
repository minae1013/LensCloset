<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|numeric', 
            'brand' => 'required|string|max:255',
            'color' => 'required|string|max:100',
            'lens_diameter' =>'required|numeric',
            'colored_diameter' =>'required|numeric',
            'lifespan' =>'required|numeric',
            'price' =>'required|numeric',
            'image_path' => 'file|image|nullable|mimes:jpg,jpeg,png|max:1024',
            'rating' =>'required|numeric',
            'comment' =>'required|string|max:500',
            'repeat' =>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリーは必須です。',
            'category_id.numeric' => 'カテゴリーIDは数値で入力してください。',
            'brand.required' => 'ブランドは必須です。',
            'brand.max' => '色は255文字以内で入力してください。',
            'color.required' => '色は必須です。',
            'color.max' => '色は100文字以内で入力してください。',
            'lens_diameter.required' => 'レンズ直径は必須です。',
            'lens_diameter.numeric' => 'レンズ直径は数値で入力してください。',
            'colored_diameter.required' => '着色直径は必須です。',
            'colored_diameter.numeric' => '着色直径は数値で入力してください。',
            'lifespan.required' => '使用期間は必須です。',
            'lifespan.numeric' => '使用期間は数値で入力してください。',
            'price.required' => '価格は必須です。',
            'price.numeric' => '価格は数値で入力してください。',
            'image_path.image' => '指定されたファイルが画像形式ではありません。',
            'image_path.mimes' => '画像の拡張子が違います。拡張子はjpg、jpeg、pngのいずれかに設定してください。',
            'image_path.max' => '画像のサイズは1MB以下にしてください。',
            'rating.required' => '評価は必須です。',
            'rating.numeric' => '評価は数値で入力してください。',
            'comment.required' => 'コメントは必須です。',
            'comment.max' => 'コメントは500文字以内で入力してください。',
            'repeat.required' => 'リピートは必須です。',
            'repeat.numeric' => 'リピートは数値で入力してください。',
        ];
    }
}
