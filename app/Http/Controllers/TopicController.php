<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Post;
use App\Topic;
use App\Transformers\TopicTransformer;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class TopicController extends Controller
{

    public function index(){
        $topics = Topic::latestFirst()->paginate(10);
        $topicsCollection = $topics->getCollection();

        return fractal()
            ->collection($topicsCollection)
            ->parseIncludes(['user'])
            ->transformWith(new TopicTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($topics))
            ->toArray();
    }



    public function store(StoreTopicRequest $request){

        $topic = new Topic();
        $topic->title = $request->title;
        $topic->user()->associate($request->user());


        $post = new Post();
        $post->body = $request->body;
        $post->user()->associate($request->user());


        $topic->save();
        $topic->posts()->save($post);

        return fractal()
            ->item($topic)
            //->parseIncludes(['user','posts','posts.user'])
            ->parseIncludes(['user'])
            ->transformWith(new TopicTransformer())
            ->toArray();

    }
}
