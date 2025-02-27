<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'campus' => 'required|in:youssoufia,safi,nador',
                'adress' => 'required|string|max:255',
                // 'tele' => 'required|string|regex:/^(?:\+212|0)[5-7][0-9]{8}$/',
                'cart_Identite' => 'required|image|mimes:jpeg,png,pdf',
                'datenaissance' =>[
                    'required',
                    'date',
                    'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')
                ],
        ];
    }
}
