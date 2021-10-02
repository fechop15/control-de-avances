<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserStoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $projet=Project::findOrFail(session('idProjet'));
        return \auth()->user()->company_id==$projet->company_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_story_name'=>'required',
            'user_story_comment'=>'required',
            'ticket_name'=>'required',
            'ticket_comment'=>'required',
        ];
    }
}
