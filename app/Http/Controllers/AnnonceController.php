<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Region;
use App\Models\Ville;
use App\Models\Image;
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnnonceController extends Controller
{
    public function CreateAnnonce(Request $request){
             $request->validate([
                 'pics' =>'required',
                'adresse'     =>'required',
                'ville'       =>'required',
                'quartier'      =>'required',
                'region'     =>'required',
                'Transaction'       =>'required',
                'Type_bien'      =>'required',
                'Etat'     =>'required',
                'surface'       =>'required',
                'prix'      =>'required',
                'etage'     =>'required',
                'pieces'       =>'required',
                'chambres'      =>'required',
                'salles'     =>'required',
                'titre'       =>'required',
                'tele'      =>'required',
                'description'     =>'required',
            ]);
          $annonce=new Annonce();
          $annonce->adresse=$request->adresse;
          $annonce->ville=$request->ville;
          $annonce->quartier=$request->quartier;
          $annonce->region=$request->region;
          $annonce->Transaction=$request->Transaction;
          $annonce->Type_bien=$request->Type_bien;
          $annonce->Etat=$request->Etat;
          $annonce->surface=$request->surface;
          $annonce->prix=$request->prix;
          $annonce->etage=$request->etage;
          $annonce->pieces=$request->pieces;
          $annonce->chambres=$request->chambres;
          $annonce->salles=$request->salles;
          $annonce->Caracteristiques=$request->Caracteristiques;
          $annonce->Interieur=$request->Interieur;
          $annonce->Options=$request->Options;
          $annonce->titre=$request->titre;
          $annonce->tele=$request->tele;
          $annonce->description=$request->description;
          $annonce->typeannonce=$request->type;
          $annonce->save();
          
           $uploadedFiles=$request->pics;
            $cpt=0;
            
            foreach ($uploadedFiles as $file){
                $images=new Image();
                $path=$file->store('images');
                $images->path=$path;
                $cpt=$cpt+1;
                $images->index=$cpt;
                $images->id_annonce=$annonce->id;
                $images->save();    
            }

         if ($annonce->save() && $images->save()) {
           return response()->json(['status'=>'success']);
         }
         else
         {
            $annonce=Annonce::find($annonce->id);
            $annonce->delete();
            return response()->json(['status'=>'error']);
         }
    

    }
    public function GetRegion()
    {
        $regions=Region::all();
        if ($regions) {
             return response()->json(["status"=>"succsess","regions"=>$regions]);
        }return response()->json(["status"=>"error"]);  
    }
    public function GetVille($id){
       $region=Region::where('region',$id)->get();
       if ($region) {
          $villes=Ville::where("id_region",$region[0]->id)->get();
          return response()->json(["status"=>"succsus","villes"=>$villes]);
       }return tresponse()->json(["status"=>error]);
      
    }
    public function GetAnnonce(Request $request){
    //    return $request->all();
    $AlertVille=false;
    $alert2=false;
        $annonces=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where([
                                ['annonces.Type_bien','=',$request->type],
                                ['annonces.Transaction','=',$request->tran],
                                ['annonces.region','=',$request->region],
                                ['annonces.ville','=',$request->ville],
                            ])
                            ->paginate(10);
        $annoncesCount=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where([
                                ['annonces.Type_bien','=',$request->type],
                                ['annonces.Transaction','=',$request->tran],
                                ['annonces.region','=',$request->region],
                                ['annonces.ville','=',$request->ville],
                            ])
                            ->count();
         if ($annoncesCount==0) {
             $AlertVille=true;
        }                   
        if ($annoncesCount==0) {
            
            $annonces=DB::table('images')
                                ->join('annonces','annonces.id','=','images.id_annonce')
                                ->where([
                                    ['annonces.Type_bien','=',$request->type],
                                    ['annonces.Transaction','=',$request->tran],
                                ])
                                ->paginate(10);
            $annoncescount2=DB::table('images')
                                ->join('annonces','annonces.id','=','images.id_annonce')
                                ->where([
                                    ['annonces.Type_bien','=',$request->type],
                                    ['annonces.Transaction','=',$request->tran],
                                ])
                                ->count();
            if ($annoncescount2==0) {
               $alert2=true;
           }
                                
                                
        }
        return response()->json(["status"=>"suscuss","annones"=>$annonces,"alert2"=>$alert2,"alertville"=>$AlertVille]);      
    }
    public function GetAnnonceA(){
        
        $annonces=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where([
                                ['annonces.Type_bien','=',"Appartements"],
                                ['annonces.Transaction','=',"Location"],
                                ['annonces.typeannonce','=',"Normal"],
                            ])
                            ->paginate(10);

        $countannonce=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where([
                                ['annonces.Type_bien','=',"Appartements"],
                                ['annonces.Transaction','=',"Location"],
                                ['annonces.typeannonce','=',"Normal"],
                            ])
                            ->count();

        $annoncesPremium=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where([
                                 ['annonces.typeannonce','=',"Premium"],
                            ])
                            ->get();
        $countPremium=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where([
                                 ['annonces.typeannonce','=',"Premium"],
                                 ['annonces.switchpremium','=',1],
                            ])
                            ->count();                    
                                       
        return response()->json(["status"=>"suscuss","annones"=>$annonces,"annoncespremium"=>$annoncesPremium,"countpremium"=>$countPremium,"countannonce"=>$countannonce]);                   
    }
    public function gettest(Request $request){
        return $request->all();
    }
    public function GetArticleView($id){
        // dd($id);
          $annoncesImages=DB::table('images')
                            ->where('images.id_annonce',$id)
                            ->get();
        $annonces=Annonce::find($id);                            
        return response()->json(["status"=>"suscuss","annones"=>$annonces,"images"=>$annoncesImages]);                   
    
    }
    public function SendMsg($id,Request $request){
        
        $request->validate([
                'name'  =>'required',
                'tele'  =>'required',
                'msg'   =>'required',
        ]);
        $message=new Message();
        $message->name=$request->name;
        $message->tele=$request->tele;
        $message->msg=$request->msg;
        $message->id_annonce=$id;
        if ( $message->save()) {
            return response()->json(["status"=>"succsus"]);
        }return response()->json(["status"=>"error"]);
    }
    public function GetMsg(){
        $messages=DB::table("messages")
                         ->orderBy('messages.created_at', 'DESC')
                        ->get();   
        if ($messages) {
           return response()->json(["status"=>"sucssus","messages"=>$messages]);
        }return response()->json(["status"=>"error"]);
    }
    public function GetSuggestion(Request $request){

       $infoAnnonce=Annonce::find($request["id"]);
                            
       $annonceSuggestion=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where([
                                ['annonces.Type_bien','=',$infoAnnonce->Type_bien],
                                ['annonces.ville','=',$infoAnnonce->ville],
                            ])
                            ->take(10)->get();

       return response()->json(["status"=>"succsus","suggestion"=>$annonceSuggestion]);

    }
    public function GetCountType(){
  
        $countApp=Annonce::where("Type_bien","Appartements")->count();
        $countMais=Annonce::where("Type_bien","Maisons")->count();
        $countVillas=Annonce::where("Type_bien","Villas & maisons de luxe")->count();
        $countRiad=Annonce::where("Type_bien","Riad")->count();
        $countlocaux=Annonce::where("Type_bien","Locaux commerciaux")->count();
        $countbreua=Annonce::where("Type_bien","Bureaux")->count();
        $countTerrains=Annonce::where("Type_bien","Terrains")->count();
        $countFermes=Annonce::where("Type_bien","Fermes")->count();
        return response()->json(["countApp"=>$countApp,"countMais"=>$countMais,"countVillas"=>$countVillas,"countRiad"=>$countRiad,"countlocaux"=>$countlocaux,"countbreua"=>$countbreua,"countTerrains"=>$countTerrains,"countFermes"=>$countFermes]);

    }
    public function GetAnnoncePremium(){
        $annoncepremium=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where("annonces.typeannonce","Premium")
                            ->orderBy('annonces.created_at', 'DESC')
                            ->paginate(10);
  
        return response()->json(["status"=>"succsus","annoncepremium"=>$annoncepremium]);

    }
    public function activeannonce(Request $request){
        $updateSwitch=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                            ->where("annonces.id",$request["id"])
                            ->UPDATE(["annonces.switchpremium"=>$request["switch"]]);
                            
        return response()->json(["status"=>"succsus","annoncepremium"=>$updateSwitch]);

    }
    public function GetAnnonceByID($id){
        $annonceById=Annonce::find($id);
        return response()->json(["status"=>"succsus","annonceById"=>$annonceById]);
    }
    public function PutDone($id){
        $updateDone=DB::table("messages")
                        ->where("messages.id",$id)
                        ->UPDATE(["messages.done"=>1]);
        $msgUpdate=DB::table("messages")
                        ->orderBy('messages.created_at','DESC')
                        ->get();                
                        if ($updateDone) {
                             return response()->json(["status"=>"succsus","msgUpdate"=>$msgUpdate]);
                        }
                        else return response()->json(["status"=>"error"]);
                      
    }
    public function getCountInfo(){
        $datenow =\Carbon\Carbon::today()->subDays(0)->format('Y-m-d-h');
        // dd($datenow);
        $countAnnonce=Annonce::where("typeannonce","Normal")->count();
        $countPremium=Annonce::where("typeannonce","Premium")->count();
        $CountMsgNotDone=Message::where("done","=", false)->count();
        $CountMsgDone=Message::where("done","=", true)->count();
        $CoountInfo = array(
            'countAnnonce'      =>  $countAnnonce,
            'countPremium'   =>   $countPremium,
            'CountMsgNotDone'  =>   $CountMsgNotDone,
            'CountMsgDone'     =>  $CountMsgDone
        );
        return response()->json(["CountInfo"=>$CoountInfo]);
    }
    public function GetAllFunction(){
        $allannonce=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                             ->where("annonces.typeannonce","Normal")
                             ->orderBy('annonces.created_at', 'DESC')
                            ->paginate(10);                
          if ($allannonce) {
            return response()->json(["status"=>"sucssus","allannonce"=>$allannonce]);

           }
           else return response()->json(["status"=>"error"]);
    }
    public function getannoncebyidInput($id){
        if ($id=="") {
          $allannonce=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                             ->where("annonces.typeannonce","=","Normal")
                             ->orderBy('annonces.created_at', 'DESC')
                            ->paginate(10);
                             return response()->json(["status"=>"sucssus","allannonce"=>$allannonce]);
        }
        else{
            $AnnonceById=DB::table('images')
                            ->join('annonces','annonces.id','=','images.id_annonce')
                             ->where([
                                 ["annonces.id","=",$id],
                                 ["annonces.typeannonce","=","Normal"]
                                 ])
                                 ->orderBy('annonces.created_at', 'DESC')
                            ->paginate(10);
            return response()->json(["sttaus"=>"succsus","annoncebyid"=>$AnnonceById]);
        }
        
        
    }
    public function DeleteAnnonceNormal($id){
            $AnnonceById=DB::table('images')->where("id_annonce",$id)->delete();
            if ($AnnonceById) {
                $AnnonceById2=DB::table('annonces')->where("id",$id)->delete();
            }
           
                             
                             if ($AnnonceById && $AnnonceById2) {
                                return response()->json(["status"=>"succsus"]);
                             }
                             else return response()->json(["status"=>"error"]);
     }
     public function AddAdmin(Request $request){
        $request->validate([
                'name' =>'required',
                'email'     =>'required|email',
                'password'       =>'required',
                'fonction'      =>'required',
                
            ]);
        
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $user->fonctiontype=$request->fonction; 
        if($user->save())  return response()->json(["stats"=>"succsus"]);
            return response()->json(["status"=>"error"]);
        
     }
     public function GetAdmins(){
         
         $users=DB::table("users")
                    ->orderBy('created_at', 'DESC')
                    ->paginate(8);
         return response()->json(["status"=>"succsus","admins"=>$users]);
     }
     public function DeleteAdmin($id){
      
         if(Db::table("users")->where('id',$id)->delete())return response()->json(["status"=>"success"]);
         return response()->json(["status"=>"error"]);

     }
     public function UpdateAdmin($id,Request $request){
        

        //  return $request;
            $request->validate([
                'name' =>'required',
                'email'     =>'required|email',
                'password'       =>'required',
                'oldpassword'       =>'required',
                'fonction'      =>'required',
                
            ]);
            $userPass=User::find($id);
        //  return \Hash::make($request->password);
        if (\Hash::check($request->oldpassword, $userPass->password)) {
           $updateAdmin=Db::table("users")
                        ->where("id",$id)
                        ->update([
                            "name"=>$request->name,
                            "email"=>$request->email,
                            "password"=>\Hash::make($request->password),
                            "fonctiontype"=>$request->fonction
                        ]);
                        return response()->json(["status"=>"success",]);

        }
        else return response()->json(["status"=>"error","msg"=>"Ancien mot de passe incorrect "]);
         
     }








}
