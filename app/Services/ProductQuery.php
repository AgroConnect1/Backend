<?php

namespace App\Services;
use Illuminate\Http\Request;

class ProductQuery
{
    protected $colParams = [
        'title' => ['eq'],
        'price' => ['lt', 'eq', 'gt'],
        'type' => ['eq'],
    ];
    protected $operatorsMap = [
        'eq' => "=",
        'lt' => "<",
        'lte' => "<=",
        'gt' => ">",
        'gte' => ">=",
    ];

    public function transform(Request $request){
        $eloQuery = [];
        foreach($this->colParams as $parm=>$operators){
            $query = $request->query($parm);
            if(!isset($query)){
                continue;
            }
            $column = $parm;
            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorsMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}