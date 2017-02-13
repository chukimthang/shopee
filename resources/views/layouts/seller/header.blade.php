<nav class="navbar navbar-inverse border-radius-none">
    <div class="container">
        <ul class="nav navbar-nav">
           <li><a class="navbar-brand" href="{!! route('seller.home.index') !!}">
                <span>I</span>Shopee</a>
            </li>
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"></span>@lang('user.profile')</a></li>
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                @lang('text.auth.logout')
            </a></li>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </div>
</nav>
