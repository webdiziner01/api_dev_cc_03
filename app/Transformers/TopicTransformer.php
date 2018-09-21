<?php
/**
 * Created by PhpStorm.
 * User: Kashif-01
 * Date: 21-Sep-18
 * Time: 1:23 PM
 */

namespace App\Transformers;


use App\Topic;

class TopicTransformer extends \League\Fractal\TransformerAbstract
{

    protected $availableIncludes = ['user','posts'];

    public function transform(Topic $topic){
        return [
            'id' => $topic->id,
            'title' => $topic->title,
            'created_at' => $topic->created_at->toDateTimeString(),
            'created_at_human' => $topic->created_at->diffForhumans()
        ];
    }


    public function includeUser(Topic $topic){
        return $this->item($topic->user , new UserTransformer());
    }

    public function includePosts(Topic $topic){
            //dd($topic->posts()->get()); //this will return collection othewise query toSql
            //dd($topic->posts);
        return $this->collection($topic->posts ,new PostTransformer());
    }


}