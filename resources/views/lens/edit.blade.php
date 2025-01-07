<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <form method="post" action="{{ route('update', $lens->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

                {{-- ブランド --}}
                <div class="mb-4">
                    <label class=" text-sm font-medium text-gray-700" for="brand">ブランド</label>
                    <input type="text" name="brand" id="brand" value="{{ old('brand', $lens->brand ?? '') }}" class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                    @error('brand')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 色 --}}
                <div class="mb-4">
                    <label class="text-sm font-medium text-gray-700" for="color">色</label>
                    <input type="text" name="color" id="color" value="{{ old('color', $lens->color ?? '') }}" class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                    @error('color')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 画像 --}}
                <div class="mb-4">
                    <label class="text-sm font-medium text-gray-700" for="image_path">画像</label>
                    <div class="flex items-center justify-center border-4 border-gray-300 border-dashed rounded-md p-12">
                        <input type="file" name="image_path" class="block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                    </div>
                    @error('image_path')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

            <div class="grid grid-cols-2 gap-6">
                {{-- レンズ直径 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="lens_diameter">レンズ直径</label>
                    <div class="flex items-center">
                        <input type="text" name="lens_diameter" id="lens_diameter" value="{{ old('lens_diameter', $lens->lens_diameter ?? '') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                        <span class="text-sm text-gray-700 ml-2">cm</span>
                    </div>
                    @error('lens_diameter')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 着色直径 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="colored_diameter">着色直径</label>
                    <div class="flex items-center">
                        <input type="text" name="colored_diameter" id="colored_diameter" value="{{ old('colored_diameter', $lens->colored_diameter ?? '') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                        <span class="text-sm text-gray-700 ml-2">cm</span>
                    </div>
                    @error('colored_diameter')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 使用期間 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="lifespan">使用期間</label>
                    <select name="lifespan" id="lifespan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                        <option value="1" {{ old('lifespan') == '1' ? 'selected' : '' }}>1day</option>
                        <option value="2" {{ old('lifespan') == '2' ? 'selected' : '' }}>2week</option>
                        <option value="3" {{ old('lifespan') == '3' ? 'selected' : '' }}>1month</option>
                    </select>
                    @error('lifespan')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 価格 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="price">価格</label>
                    <div class="flex items-center">
                        <input type="text" name="price" id="price" value="{{ old('price', $lens->price ?? '') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                        <span class="text-sm text-gray-700 ml-2">円</span>
                    </div>
                    @error('price')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 評価 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="rating">評価</label>
                    <select name="rating" id="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                        <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>非常に良い</option>
                        <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>良い</option>
                        <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>どちらでもない</option>
                        <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>悪い</option>
                        <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>非常に悪い</option>
                    </select>
                    @error('rating')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- リピート --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="repeat">リピート</label>
                    <select name="repeat" id="repeat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                        <option value="1" {{ old('repeat') == '1' ? 'selected' : '' }}>あり</option>
                        <option value="2" {{ old('repeat') == '2' ? 'selected' : '' }}>なし</option>
                    </select>
                    @error('repeat')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- カテゴリー --}}
            <div class="mb-4">
                <label for="inputstatus" class="block text-sm font-medium text-gray-700">カテゴリー</label>
                <select id="inputstatus" name="category_id" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $lens->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- コメント --}}
            <div class="mb-4">
                <label for="comment" class="block text-sm font-medium text-gray-700">コメント</label>
                <textarea name="comment" id="comment" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 resize-none">{{ old('comment', $lens->comment ?? '') }}</textarea>
                @error('comment')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- 登録ボタン --}}
            <div class="flex justify-end">
                <button type="submit" class="mt-2 px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    更新
                </button>
            </div>
        </form>
    </div>
</x-app-layout>