<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lens;
use App\Models\Category;

class LensController extends Controller
{
    private $lens;

    public function __construct(
        Lens $lens,
    )
    {
        $this->lens = $lens;
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        if(Auth::check()){
            return redirect()->route('mylens');
        }
        return view('home');
    }

    // Myコンタクト一覧の表示
    public function mylens(Request $request)
    {
        $userId = Auth::id();
        $search = $request->input('search', '');

        if($userId){
            if($search){
                $lenses = $this->lens->where('user_id', $userId)
                                    ->where(function ($query) use ($search) {
                                        $query->where('brand', 'like', "%{$search}%")
                                                ->orWhere('color', 'like', "%{$search}%")
                                                ->orWhere('comment', 'like', "%{$search}%");
                                    })
                                    ->paginate(6)
                                    ->withQueryString();
            } else{
                $lenses = Lens::with('category')
                    ->where('user_id', $userId)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(6);
            }
            return view('mylens', compact('lenses'));
        } else{
            return redirect()->route('home');
        }
        
    }

    public function repeat()
    {
        $userId = Auth::id();

        if(Auth::check()){
            $lenses = Lens::with('category')
                ->where('user_id', $userId)
                ->where('repeat', 1)
                ->orderBy('updated_at', 'desc')
                ->paginate(6);
            return view('lens.repeat', compact('lenses'));
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
    public function store(PostRequest $request)
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
        $lens = Lens::find($id);

        if(is_null($lens)){
            return view('lens.detail', ['error' => 'データがありません']);
        }

        return view('lens.detail', compact('lens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lens = Lens::findOrFail($id);

        $categories = Category::orderBy('created_at', 'desc')
        ->get();

        return view('lens.edit', compact('lens', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $lens = Lens::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('img'),  $imageName);
            $imageUrl = 'img/' . $imageName;
            $lens->image_path = $imageUrl;
        }

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
        $lens->save();
        return redirect()->route('mylens')->with('success', '投稿が更新されました!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lens = Lens::findOrFail($id);
        $lens->delete();
        return redirect()->route('mylens')->with('success', '投稿が削除されました!');
    }

}
