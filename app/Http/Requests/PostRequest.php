<?php

namespace App\Http\Requests;

use App\Post;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isUpdate()) {
            return Post::findOrFail($this->get('id'))->user_id == \Auth::id();
        }

        return \Auth::check();
    }


    /**
     * Check if the request updates an existing post
     *
     * @return bool
     */
    public function isUpdate()
    {
        return $this->has('id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'            => 'integer',
            'title'         => 'required|string',
            'content'       => 'required|string',
            'published_at'  => 'required|date',
            'tags'          => 'array'
        ];
    }
}
