<?php

namespace App\Services;
use Illuminate\Http\Request;

class OrderQuery
{
    protected $colParams = [
        'quantity' => ['lt', 'eq', 'gt'],
        'totalPrice' => ['lt', 'eq', 'gt'],
        'status' => ['eq'],
    ];
    protected $colMap = [
        'totalPrice' => 'total_price'
    ];

    protected $operatorsMap = [
        'eq' => "=",
        'lt' => "<",
        'lte' => "<=",
        'gt' => ">",
        'gte' => ">=",
    ];



    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->colParams as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }
            $column = $this->colMap[$parm] ?? $parm;
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorsMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}