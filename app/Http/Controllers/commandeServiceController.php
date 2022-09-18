<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommandeService;
class commandeServiceController extends Controller
{
    function add($quantity, $price){
        
            try {
    
                $CommandeService = new CommandeService();
                $CommandeService->service_id = $request->service_id;
                $CommandeService->commande_id = $request->commande_id;
                $CommandeService->quantity =$quantity;
                $CommandeService->total =$quantity*$price;
    
    
                if ($CommandeService->save()) {
                    return response()->json(['status' => true, 'message' => 'CommandeService successfully added.', 'id' => $CommandeService->id], 200);
                } else {
                    return response()->json(['status' => false, 'message' => 'Something wrong.'], 401);
                }
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'result' => [
                            'status' => false,
                            'message' => $ex->getMessage(),
                        ],
                    ],
                    500
                );
            }
        }

       public function update($quantity, $price, $id)
       {
     
         try {
           $CommandeService = CommandeService::where('id', '=', $id)->first();
     
           if (!($CommandeService)) {
             return response()->json(['error' => "Can't find CommandeService with id " . $id,], 404);
           }
     
            $CommandeService->update([
                $CommandeService->quantity =$quantity,
                $CommandeService->total =$quantity*$price,
           ]);
   
           return response()->json(['msg' => "Update successful",], 204);
         } catch (Exception $ex) {
           return response()->json(['error' => "Can't update CommandeService with id " . $id,], 500);
         }
       }
}
