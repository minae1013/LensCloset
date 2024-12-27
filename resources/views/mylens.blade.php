<x-app-layout>
    @if (session('success'))
        <div class="bg-red-100 text-red-500 text-center px-4 py-2 w-full mx-auto text-lg">
            {{ session('success') }}
        </div>
    @endif
    <section class="container mx-auto">
        @include('layouts.search')
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-center">
                My Contact lens List
            </h2>
        </div>
        @include('layouts.postbox')
    </section>
</x-app-layout>
