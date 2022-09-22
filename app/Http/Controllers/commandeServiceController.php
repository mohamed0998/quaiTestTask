<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommandeService;
class commandeServiceController extends Controller
{
       function delete($id){
        try {
          $CommandeService = CommandeService::find($id);
            if($CommandeService){
                if($CommandeService->delete()) {
                    return response() -> json(['status' => true, 'message' =>'CommandeService succefully deleted.'], 200);
                } else {
                    return response() -> json(['status' => false,'message' =>'Something wrong '], 401);
    
                }
            } else {
                return response() -> json(['status' => false,'message'=> 'CommandeService does not existe'],401);
            }
    
        } catch (Exception $ex) {
            return response()->json (
                [
                    'result' => [
                        'status' => false , 
                        'message' => $ex -> getMessage(),
                    ]
                    ],
                    500
                );
        }

        
       }

       function assignService(Request $request){
        try {
            $CommandeService =new CommandeService();
            $CommandeService->service_id = $request->service_id;
            $CommandeService->commande_id = $request->commande_id;
            $CommandeService->save();
          } catch (Exception $ex) {
            return response()->json(['error' => "Can't create this CommandeService",], 500);
          }
    }
}
