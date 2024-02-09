<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CommentsFilter extends ApiFilter {
    protected $allowedParms = [
        'id' => ['eq'],
        'content' => ['eq', 'like', 'gt', 'lt'],
        'userId' => ['eq'],
        'categoryId' => ['eq'],
        'postId' => ['eq'],
    ];

    protected $columnMap = [
        'id' => 'id',
        'content' => 'content',
        'body' => 'body',
        'userId' => 'user_id',
        'categoryId' => 'category_id',
        'postId' => 'post_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like',
        'gt' => '>',
        'lt' => '<',
    ];

}