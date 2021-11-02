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
        $ads = Ad::OrderBy('id', 'desc')->paginate(5);

        return view('ads.index', compact('ads'));
    }

    public function show($id)
    {
        $ad = Ad::find($id);

        return view('ads.show', compact('ad'));
    }

    public function create(Ad $ad = null)
    {
        return view('ads.form', compact('ad'));
    }

    public function save(Request $request, Ad $ad = null)
    {

        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $data['user_id'] = Auth::id();

        Ad::UpdateOrCreate(['id' => $ad->id ?? null], $data);

        return redirect()->route('home');
    }

    public function delete(Ad $ad)
    {
        if (isset($ad) && $ad->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        $ad->delete();

        return back();
    }
}
