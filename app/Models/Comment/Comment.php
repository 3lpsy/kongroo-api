<?php

namespace App\Models\Comment;

use App\Models\Model\Model;
use App\Models\Comment\Traits\Relationship\CommentRelationship;

class Comment extends Model
{
    use CommentRelationship;
    /**
     * Table Name
     * @var string
     */
    protected $model = "comments";

}
