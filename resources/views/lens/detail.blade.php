<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="space-y-6">
            
            {{-- ブランド --}}
            <div class="mb-4">
                <label class="text-sm font-medium text-gray-700">ブランド</label>
                <p class="mt-1 text-sm text-gray-800">{{ $lens->brand ?? '登録なし' }}</p>
            </div>

            {{-- 色 --}}
            <div class="mb-4">
                <label class="text-sm font-medium text-gray-700">色</label>
                <p class="mt-1 text-sm text-gray-800">{{ $lens->color ?? '登録なし' }}</p>
            </div>

            {{-- 画像 --}}
            <div class="mb-4">
                <label class="text-sm font-medium text-gray-700">画像</label>
                <div class="mt-1 h-72">
                    @if($lens->image_path)
                        <img src="{{ asset($lens->image_path) }}" alt="Lens Image" class="w-full h-full rounded-md">
                    @else
                        <p class="text-gray-500">画像はありません。</p>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                {{-- レンズ直径 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">レンズ直径</label>
                    <p class="mt-1 text-sm text-gray-800">{{ $lens->lens_diameter ?? '登録なし' }} cm</p>
                </div>

                {{-- 着色直径 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">着色直径</label>
                    <p class="mt-1 text-sm text-gray-800">{{ $lens->colored_diameter ?? '登録なし' }} cm</p>
                </div>

                {{-- 使用期間 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">使用期間</label>
                    <p class="mt-1 text-sm text-gray-800">
                        {{ $lens->lifespan->label() ?? '登録なし' }}
                    </p>
                </div>

                {{-- 価格 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">価格</label>
                    <p class="mt-1 text-sm text-gray-800">{{ $lens->price ?? '登録なし' }} 円</p>
                </div>

                {{-- 評価 --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">評価</label>
                    <p class="mt-1 text-sm text-gray-800">{{ $lens->rating ?? '登録なし' }}</p>
                </div>

                {{-- リピート --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">リピート</label>
                    <p class="mt-1 text-sm text-gray-800">
                        {{ $lens->repeat->label() ?? '登録なし' }}
                    </p>
                </div>
            </div>

            {{-- カテゴリー --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">カテゴリー</label>
                <p class="mt-1 text-sm text-gray-800">
                    {{ $lens->category ? $lens->category->name : '登録なし' }}
                </p>
            </div>

            {{-- コメント --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">コメント</label>
                <p class="mt-1 text-sm text-gray-800">{{ $lens->comment ?? '登録なし' }}</p>
            </div>

            <div class="flex justify-end">
                {{-- 編集ボタン --}}
                <a href="{{ route('edit', $lens->id) }}" class="mr-4 px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    編集
                </a>
                {{-- 削除ボタン --}}
                <form action="{{ route('destroy', $lens->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        削除
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
