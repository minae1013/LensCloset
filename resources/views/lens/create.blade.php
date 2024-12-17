<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <form method="post" action="{{ route('store') }}" enctype="multipart/form-data" class="space-y-5 mt-5">
            @csrf

            {{-- ブランド --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="brand">
                    ブランド
                </label>
                <input type="text" name="brand" id="brand" value="{{ old('brand', $lens->brand ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('brand')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- 色 --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="color">
                    色
                </label>
                <input type="text" name="color" id="color" value="{{ old('color', $lens->color ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('color')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- 画像 --}}
            <div class="mb-4 writeImgBox flex items-center space-x-3">
                <input type="file" name="image_path" class="block text-sm text-gray-500 
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100
                    cursor-pointer">
                </div>
                @error('image_path')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror

            {{-- レンズ直径 --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="lens_diameter">
                    レンズ直径
                </label>
                <input type="text" name="lens_diameter" id="lens_diameter" value="{{ old('lens_diameter', $lens->lens_diameter ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('lens_diameter')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- 着色直径 --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="colored_diameter">
                    着色直径
                </label>
                <input type="text" name="colored_diameter" id="colored_diameter" value="{{ old('colored_diameter', $lens->colored_diameter ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('colored_diameter')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- 使用期間 --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="lifespan">
                    使用期間
                </label>
                <input type="text" name="lifespan" id="lifespan" value="{{ old('lifespan', $lens->lifespan ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('lifespan')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- 価格 --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="price">
                    価格
                </label>
                <input type="text" name="price" id="price" value="{{ old('price', $lens->price ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('price')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- 評価 --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="rating">
                    評価
                </label>
                <input type="text" name="rating" id="rating" value="{{ old('rating', $lens->rating ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('rating')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- リピート --}}
            <div class="mb-4">
                <label class="text-2xl font-semibold mt-5" for="repeat">
                    リピート
                </label>
                <input type="text" name="repeat" id="repeat" value="{{ old('repeat', $lens->repeat ?? '') }}" class="rounded-md w-full h-12 p-3 resize-none writeTitTxtArea border border-gray-300"></input>
                @error('repeat')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- カテゴリー --}}
            <div class="mb-4">
                <label for="inputstatus" class="text-2xl font-semibold block mb-3">カテゴリー</label>
                <select id="inputstatus" name="category_id" class="w-full border-gray-300 rounded">
                    
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- コメント --}}
            <div class="writeTxtBox">
                <textarea name="comment" value="{{ old('comment', $post->comment ?? '') }}" class="writeContentHi w-full p-3 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Please enter the blog text."></textarea>
                @error('comment')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror

                {{-- 登録ボタン --}}
                <button type="submit" class="mt-3 createBtn">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-app-layout>