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
        $image = $request->file('image_path');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('img'),  $imageName);
        $imageUrl = 'img/' . $imageName;

        $lens = new lens;
        $lens->user_id = auth()->id();
        $lens->brand = $request->brand;
        $lens->color = $request->color;
        $lens->lens_diameter = $request->lens_diameter;
        $lens->colored_diameter = $request->colored_diameter;
        $lens->lifespan = $request->lifespan;
        $lens->price = $request->price;
        $lens->rating = $request->rating;
        $lens->repeat = $request->repeat;
        $lens->category_id = $request->category_id;
        $lens->comment = $request->comment;
        $lens->image_path = $imageUrl;
        $lens->save();
        return redirect()->route('mylens');
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
