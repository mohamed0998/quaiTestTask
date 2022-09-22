<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandeService;
use App\Models\Service;
class CommandeController extends Controller
{
   function list()
   {
    return response()-> json(['status' => true, 'message' => 'commande successfully fetched.', 'commandes' =>Commande::with('services')->get()]);
   }
   
   function add(Request $request){
    try {
        $commande = new Commande();
        $commande -> name = $request -> name;
        $commande ->date =$request -> date;
        $commande->reference= str_replace('-', '', Str::uuid());

        if($commande->save()){
            return response()->json(['status' => true, 'message' => 'commande succesfully added.', 'id'=> $commande->id], 200);
        }else {
            return response()->json(['status'=>false, 'message' =>'Something wrong.'], 401);
        }

    } catch (Exception $ex) {
        return response()->json(
            [

                'result' => [
                    'status' => false,
                    'message' => $ex ->getMessage(),
                ]
                ],
                500
            );
    }
   }

   public function update(Request $request, $id)
   {
 
     try {
       $commande = Commande::where('id', '=', $id)->first();
 
       if (!($commande)) {
         return response()->json(['error' => "Can't find commande with id " . $id,], 404);
       }
 
        $commande->update([
            $commande -> name = $request -> name,
            $commande ->date =$request -> date,
            $commande ->status =$request -> status,
       ]);

       return response()->json(['msg' => "Update successful",], 204);
     } catch (Exception $ex) {
       return response()->json(['error' => "Can't update commande with id " . $id,], 500);
     }
   }


   function delete($id){
    try {
        $commande = Commande::find($id);
        if($commande){
            if($commande->delete()) {
                return response() -> json(['status' => true, 'message' =>'commande succefully deleted.'], 200);
            } else {
                return response() -> json(['status' => false,'message' =>'Something wrong '], 401);

            }
        } else {
            return response() -> json(['status' => false,'message'=> 'commande does not existe'],401);
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

   function calculateTotal(Request $request,$quantity, $price,$service_id,$commande_id){
        try {
            $CommandeService= new CommandeService();
            
            $CommandeService-> service_id =$service_id ;
            $CommandeService-> commande_id =$commande_id ;

            $CommandeService->quantity=$quantity;
            $CommandeService->total=$quantity*$price;

            if($CommandeService->save()){
                return response()->json(['status' => true, 'message' => 'CommandeService succesfully added.', 'id'=> $CommandeService->id], 200);
            }else {
                return response()->json(['status'=>false, 'message' =>'Something wrong.'], 401);
            }
    
        } catch (Exception $ex) {
            return response()->json(
                [
    
                    'result' => [
                        'status' => false,
                        'message' => $ex ->getMessage(),
                    ]
                    ],
                    500
                );
        }
       }

       function updateTotal($id,$quantity, $price){
        try {
            $CommandeService= CommandeService::where('id', '=', $id)->first();
            
            if (!($CommandeService)) {
                return response()->json(['error' => "Can't find CommandeService with id " . $id,], 404);
              }
              $CommandeService->update([
                $CommandeService->quantity=$quantity,
                $CommandeService->total=$quantity*$price,
                ]);
            return response()->json(['msg' => "Update successful",], 204);
            } catch (Exception $ex) {
            return response()->json(['error' => "Can't update  CommandeService with id " . $id,], 500);
            }
    }

    
   
}