<?php
/**
 * Created by PhpStorm.
 * User: Kashif-01
 * Date: 21-Sep-18
 * Time: 1:23 PM
 */

namespace App\Transformers;


use App\User;

class UserTransformer extends \League\Fractal\TransformerAbstract
{


    public function transform(User $user){
        return [
            'username' => $user->username,
            'avatar'    => $user->avatar()
        ];
    }


}