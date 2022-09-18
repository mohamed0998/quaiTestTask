<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\Service;
use App\Models\ServiceCommande;
use App\Models\Commande;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    function list()
    {
        return response()->json(['status' => true, 'message' => 'service successfully fetched.', 'services' => service::get(['id','reference', 'name','price'])]);
    }

    function add(Request $request)
    {
        try {

            $service = new Service();
            $service->name = $request->name;
            $service->reference= str_replace('-', '', Str::uuid());
            $service->price = $request->price;


            if ($service->save()) {
                return response()->json(['status' => true, 'message' => 'service successfully added.', 'id' => $service->id], 200);
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
    public function update(Request $request, $id)
    {
  
      try {
        $service = Service::where('id', '=', $id)->first();
  
        if (!($service)) {
          return response()->json(['error' => "Can't find service with id " . $id,], 404);
        }
  
         $service->update([
          $service->name = $request->name,
         $service->price = $request->price,
        ]);

        return response()->json(['msg' => "Update successful",], 204);
      } catch (Exception $ex) {
        return response()->json(['error' => "Can't update service with id " . $id,], 500);
      }
    }


    function delete($id)
    {
        try {
            $service = Service::find($id);

            if ($service) {
                if ($service->delete()) {
                    return response()->json(['status' => true, 'message' => 'service successfully deleted.'], 200);
                } else {
                    return response()->json(['status' => false, 'message' => 'Something wrong.'], 401);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'service does not exist.'], 401);
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

    function assignCommande(Request $request){
        try {
            $CommandesService = new ServiceCommande();
            $CommandesService->service_id = $request->input('service_id');
            $CommandesService->Commande_id= $request->input('Commande_id');
            $CommandesService->save();
          } catch (Exception $ex) {
            return response()->json(['error' => "Can't create this serviceCommande",], 500);
          }
    }


    public function showserviceCommandes()
    {
       
        try {
            $commandes =Service::with('commandes')->get();
             
            if (!($commandes)) {

                return response()->json(['error' => "Commandes  not found",], 404);
            }
            return response()->json(['CommandesServices' => $commandes,], 200);
            
        } catch (Exception $ex) {
            return response()->json(['error' => "Can't find commandes ",], 500);
        }
    }

    public function getCommandesIds($id_service)
    {
       
        try {
            $Ids = Commande::select("id")
                ->whereNOTIn('id', ServiceCommande::select('Commande_id')->where("service_id",$id_service))
                ->get();

            if (!($Ids)) {
                return response()->json(['error' => "Can't find Commandes",], 404);
            }
            return response()->json(['ids' => $Ids,], 200);
            
        } catch (Exception $ex) {
            return response()->json(['error' => "Can't find Commandes "], 500);
        }
    }
}
