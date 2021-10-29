<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Ad;

class AdController extends Controller
{
    public function index()
    {
        dd('!!!');
//        $ads = Ad::paginate(5);
//
//        return view('ads.index', compact('ads'));
    }

    public function show($id)
    {
        $ad = Ad::find($id);

        return view('ads.show', compact('ad'));
    }
//
//    public function update_or_create(Request $request)
//    {
//
//        if ($request->method() == 'POST') {
//            $request -> validate([
//                'title' => ['required'],
//                'description' => ['required'],
//            ]);
//            Ad::updateOrCreate(
//                ['id' => $request->get('id') ?? null],
//                [
//                    'title' => $request->get('title'),
//                    'description' => $request->get('description'),
//                    'user_id' => Auth::id(),
//                ]);
//
//            return redirect('/');
//        }
//
//        $data = [];
//
//        if (!empty($id = $request->route()->parameter('id'))) {
//            $data['ad'] = Ad::find($id);
//
//        }
//
//        return view('actions.form', $data);
//    }
//
//    public function delete(Request $request)
//    {
//        $ad = Ad::find($request->route()->parameter('id'));
//        if($ad->user_id !== Auth::id()){
//            return redirect()->route('warning');
//        }
//
//        $ad->delete();
//        return redirect('/');
//    }
//
//    public function warning()
//    {
//        return back()->withErrors([
//            'password' => 'Имя пользователя и пароль не совпадают',
//        ]);
//    }
}
