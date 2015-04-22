<?php namespace App\Http\Requests\Admin;


class FolderSearchRequest extends BaseRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'id' => '',
            'name' => '',
            'order' => '',
            'owner' =>'',
            'parent' =>'',
            'description' =>''
		];
	}

}
