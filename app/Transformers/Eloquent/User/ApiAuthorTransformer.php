<?php
namespace App\Transformers\Eloquent\User;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Access\User\User;

class ApiAuthorTransformer extends EloquentTransformer
{

    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'username' => $user->first_name . $user->last_name
        ];
    }
}
