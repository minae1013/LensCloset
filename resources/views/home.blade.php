<x-guest-layout>
    <a href="{{ route('login') }}" class="bg-white text-gray-700 text-2xl font-bold rounded-3xl px-20 py-2  hover:text-gray-300 mr-4">{{ __('ログイン') }}</a>
    <a href="{{ route('register') }}" class="bg-white text-gray-700 text-2xl font-bold rounded-3xl px-12 py-2  hover:text-gray-300 mr-4">{{ __('アカウント登録') }}</a>
</x-guest-layout>