<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

Trait DeleteModelTrait{
    public function deleteModelTrait($id, $model){
        try{
            $model->find($id)->delete();
            return response()->json([
               'code' => 200,
                'messages' => 'success'
            ],200);
        }catch (\Exception $exception){
            Log::error('Messages: '.$exception->getMessage().'--- Line:'.$exception->getLine());
            return response()->json([
                'code' => 500,
                'messages' =>'fail'
            ],500);
        }
    }
}

