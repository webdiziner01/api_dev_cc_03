<?php
/**
 * Created by PhpStorm.
 * User: Kashif-01
 * Date: 21-Sep-18
 * Time: 2:12 PM
 */

namespace App\Traits;


trait Orderable
{

    public function scopeLatestFirst($query){
        return $query->orderBy('created_at','desc');
    }
    public function scopeOldestFirst($query){
        return $query->orderBy('created_at','asc');
    }

}