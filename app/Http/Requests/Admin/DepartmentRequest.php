<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Auth;

class DepartmentRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        if (Auth::check()) {
            return Auth::user()->is_admin;
        }
        return false;
    }

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|min:2',
            'acronym' => 'required|min:2',
            'display_name' => 'required|min:2',
            'description' => '',
		];
	}

}
