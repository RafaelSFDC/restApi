<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;

class PostsFilter {
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

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->allowedParms as $parm => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }

}