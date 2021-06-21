<?php
namespace app\Http\Controllers\Api\Traits;

Trait ProcessResponseTrait{
    public function processResponse($key="data",$data=null,$status,$message=null){
        
        if($status=='success'){
            return response()->json([
                'Status'=>$status,
                 $key=>$data,
                'Message'=>$message,
                'Code'=>202,
            ]);
                
        }
        else{
            return response()->json([
                'Status'=>$status,
                'Message'=>$message,
                'Code'=>404,
            ]);
        }
    }

}

?>