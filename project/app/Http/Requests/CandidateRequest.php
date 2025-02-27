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
                'address' => 'required|string|max:255',
               'phone' => 'required|string|min:10',
                'identity_card' => 'required|image|mimes:jpeg,png,pdf',
                'birth_date' =>[
                    'required',
                    'date',
                    'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')
                ],
        ];
    }
}
