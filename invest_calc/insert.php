<?php

function insertInvest($request)
{
    require "db_connection.php";



    $params=[
    "id"=>null,
    "created_at"=>null,
    "companyName"=>$request["companyName"],
    "asset"=>$request["asset"],
    "equity"=>$request["equity"],
    "currentProfit"=>$request["currentProfit"],
    "outstandingStock"=>$request["outstandingStock"],
    "stockPrice"=>$request["stockPrice"],
    "expectedDividend"=>$request["expectedDividend"],
    "roe"=>$request["roe"],
    "roa"=>$request["roa"],
    "bps"=>$request["bps"],
    "eps"=>$request["eps"],
    "per"=>$request["per"],
    "memo"=>$request["memo"]
];

    // 念のため
    // $params=[
//     "id"=>null,
//     "created_at"=>null,
//     "companyName"=>"aaa",
//     "asset"=>1,
//     "equity"=>1,
//     "currentProfit"=>1,
//     "outstandingStock"=>1,
//     "stockPrice"=>1,
//     "expectedDividend"=>1,
//     "roe"=>1,
//     "roa"=>1,
//     "bps"=>1,
//     "eps"=>1,
//     "per"=>1,
//     "memo"=>"aaaa"
    // ];

    $count=0;
    $columns="";
    $values="";

    foreach (array_keys($params) as $key) {
        if ($count++>0) {
            $columns .= ",";
            $values .= ",";
        }
        $columns .= $key;
        $values .= ":".$key;
    }

    $sql= "insert into infomations (". $columns .")values(".$values .")";

    $stmt= $pdo->prepare($sql);
    $stmt->execute($params);
};
