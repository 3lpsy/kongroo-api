<?php

namespace App\Models\Comment;

use App\Models\Model\Model;
use App\Models\Comment\Traits\Relationship\CommentRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use CommentRelationship, SoftDeletes;
	/**
	 * Table Name
	 * @var string
	 */
    protected $table = "comments";

}
