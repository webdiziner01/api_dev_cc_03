<?php
/**
 * Created by PhpStorm.
 * User: Kashif-01
 * Date: 21-Sep-18
 * Time: 1:23 PM
 */

namespace App\Transformers;


use App\Post;

class PostTransformer extends \League\Fractal\TransformerAbstract
{

    protected $availableIncludes = ['user'];

    public function transform(Post $post){

        return [
            'id' => $post->id,
            'body' => $post->body,
            'created_at' => $post->created_at->toDateTimeString(),
            'created_at_human' => $post->created_at->diffForhumans()
        ];
    }


    public function includeUser(Post $post){
        return $this->item($post->user , new UserTransformer());
    }


}