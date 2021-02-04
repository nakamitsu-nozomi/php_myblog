<div class="header"> 
  @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      @auth    // ログイン中の場合
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">ダッシュボード</a>
     <!-- ログアウトボタン -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                      onclick="event.preventDefault();
      this.closest('form').submit();">
                            {{ __('Logout') }}
        </x-jet-responsive-nav-link>
      </form>
      @else    // 未ログインの場合
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">アカウント作成</a>
        @endif
      @endif
    </div>
  @endif
</div>
