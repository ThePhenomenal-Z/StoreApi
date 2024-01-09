<?php
namespace App\Filters; 

use Illuminate\Http\Request;

class apiFilter{
    protected $safeParms =[];
    protected $operatorMap=[];
    protected $columnMap=[];

    public function transform(Request $request){
        $eleQuery=[];

        foreach($this->safeParms as $parm=>$operators){
            $query=$request->query($parm);

            if(! isset($query)){
                continue;
            }
            $column= $this->columnMap[$parm] ?? $parm;
            foreach($operators as $operater){
                if(isset($query[$operater])){
                    $eleQuery[]=[$column,$this->operatorMap[$operater],$query[$operater]];
                }
            }

        }

        return $eleQuery;
    }
}