<div class="grid grid-cols-2 lg:grid-cols-3 gap-6 mt-8 px-7">
    @if($lenses->isEmpty())
        <p class="mt-5">データがありません。</p>
    @else
        @foreach($lenses as $lens)
            <a href="{{ route('show', $lens->id) }}" class="postBox bg-gray-100 h-36 rounded-lg shadow-lg border flex overflow-hidden">
                <div class="postImgItem h-36 w-1/3 pr-2">
                    <img src="{{ asset($lens->image_path) }}" alt="{{ $lens->brand }}" class="w-full h-full object-cover">
                </div>
                <div class="postTxtItem p-4 flex-grow">
                    <h4 class="text-md font-bold">{{ $lens->brand }}</h4>
                    <p class="text-md font-bold">{{ $lens->color }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $lens->lifespan->label() }}</p>
                    <p class="text-sm text-gray-500 mt-1">DIA  {{ $lens->lens_diameter }}cm</p>
                    <p class="text-sm text-gray-500">(着色  {{ $lens->colored_diameter }}cm)</p>
                </div>
            </a>
        @endforeach
    @endif
</div>
<div class="text-center px-36 mt-2 pagenation">
    {{ $lenses->Links() }}
</div>