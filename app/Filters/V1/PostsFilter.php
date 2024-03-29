<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class PostsFilter extends ApiFilter {
    protected $allowedParms = [
        'id' => ['eq'],
        'title' => ['eq', 'like'],
        'body' => ['eq', 'like'],
        'userId' => ['eq'],
        'categoryId' => ['eq'],
    ];

    protected $columnMap = [
        'id' => 'id',
        'title' => 'title',
        'body' => 'body',
        'userId' => 'user_id',
        'categoryId' => 'category_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like',
    ];

}