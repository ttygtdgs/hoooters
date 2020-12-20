<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Like;
use App\User;
use App\Text;
use Auth;
use Log;

class TextContoroller extends Controller
{
    public function text(Request $request){
        $texts = new Text;
        $texts->id = Auth::user()->id;
        $texts->aid = $request->aid;
        $texts->txt = $request->txt;
        $texts->save();

        return  $texts;

    }
}
