<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
class IndexController extends Controller
{
    public function dash(){
        $CountMsgNotDone=Message::where("done","=", false)->count();
             return view('Admin.dashAdmin')->with(['CountMsgNotDone'=>$CountMsgNotDone]);
    }
    public function GetApp(){
        return view('User.Appartements');
    }
    public function getViewArticle($id){
        return view('User.viewArticle', ['id' => $id]);
        // return view("User.viewArticle");
    }
}
