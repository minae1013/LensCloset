<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lens;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
        if (Auth::check()) {
            return redirect()->route('mylens');
        }
        return view('home');
    }

    // Myコンタクト一覧の表示
    public function mylens(Request $request)
    {
        $userId = Auth::id();
        $search = $request->input('search', '');

        if ($userId) {
            // 検索ワードがあった場合
            if ($search) {
                $lenses = $this->lens->where('user_id', $userId)
                                    ->where(function ($query) use ($search) {
                                        $query->where('brand', 'like', "%{$search}%")
                                                ->orWhere('color', 'like', "%{$search}%")
                                                ->orWhere('comment', 'like', "%{$search}%");
                                    })
                                    ->paginate(6)
                                    ->withQueryString();
            } else {
                // 検索ワードがなかった場合
                $lenses = Lens::with('category')
                    ->where('user_id', $userId)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(6);
            }

            foreach ($lenses as $lens) {
                if ($lens->image_path) {
                    // S3のURLを生成
                    $lens->image_url = Storage::disk('s3')->url($lens->image_path);
                }
            }

            return view('mylens', compact('lenses'));
        } else {
            return redirect()->route('home');
        }
        
    }

    public function repeat()
    {
        $userId = Auth::id();

        if ($userId) {
            $lenses = Lens::with('category')
                ->where('user_id', $userId)
                ->where('repeat', 1)
                ->orderBy('updated_at', 'desc')
                ->paginate(6);

            foreach ($lenses as $lens) {
                if ($lens->image_path) {
                    // S3のURLを生成
                    $lens->image_url = Storage::disk('s3')->url($lens->image_path);
                }
            }

            return view('lens.repeat', compact('lenses'));
        } else {
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
        // 画像がアップロードされていた場合
        if ($request->hasFile('image_path')) {
            // S3に保存
            $path = $request->file('image_path')->store('images', 's3');
        // 画像がアップロードされていない場合
        } else {
            // 空で登録
            $path = null;
        }

        $lens = new Lens;
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
        $lens->image_path = $path;
        $lens->save();
        return redirect()->route('mylens');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lens = Lens::find($id);

        if (is_null($lens)) {
            return view('lens.detail', ['error' => 'データがありません']);
        }

        if ($lens->image_path) {
            // S3のURLを生成
            $lens->image_url = Storage::disk('s3')->url($lens->image_path);
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

        // 画像がアップロードされている場合
        if ($request->hasFile('image_path')) {
            // 古い画像をS3から削除
            if ($lens->image_path) {
                Storage::disk('s3')->delete($lens->image_path);
            }
            // 新しい画像をS3に保存
            $path = $request->file('image_path')->store('images', 's3');
            $lens->image_path = $path;
        } else {
            // 画像がアップロードされていない場合、既存画像をそのまま使用
            $path = $lens->image_path;
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
        $lens->image_path = $path;
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
