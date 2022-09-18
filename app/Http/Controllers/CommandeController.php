<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Commande;
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
        $commande ->status =$request -> status;
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

   function calculateTotal($quantity, $price){
    $total =$quantity*$price;
    return response()-> json(['status' => true, 'message' => 'Total successfully calculed.', 'commandes' =>$total]);
      


   }
}
