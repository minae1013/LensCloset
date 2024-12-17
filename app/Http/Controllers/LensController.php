<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lens;
use App\Models\Category;

class LensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('home');
    }

    // Myコンタクト一覧の表示
    public function mylens()
    {
        $userId = Auth::id();

        if(Auth::check()){
            $lenses = Lens::with('category')
                ->where('user_id', $userId)
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
            return view('mylens', compact('lenses'));
        } else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')
        ->get();
        return view('lens.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('lens.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('lens.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
