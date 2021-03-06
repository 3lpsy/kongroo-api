<?php
namespace App\Transformers\Eloquent\Admin\User;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
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
