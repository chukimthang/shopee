<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" 
                    data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! route('home') !!}">
                    <span>I</span>Shopee
                </a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('home') !!}">
                        @lang('user.home')</a>
                    </li>
                    <li><a href="{!! route('shop.index') !!}">
                        @lang('user.list_shop')</a>
                    </li>
                    @if (Auth::guest())
                        <li><a href="{!! route('login') !!}">
                            @lang('user.login')</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="javasript:void(0)" 
                                class="dropdown-toggle" 
                                data-toggle="dropdown">
                                {!! Auth::user()->name !!}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" 
                                role="menu">
                                <li>
                                    <a href="{!! route('user.user.show', 
                                        Auth::user()->id) !!}">
                                    @lang('user.profile')</a>
                                </li>
                                @if (Auth::user()->shop)
                                    <li>
                                        <a href="{!! route('seller.home.index')
                                            !!}">
                                        @lang('user.manage_shop')</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{!! route('user.shop.create')
                                        !!}">
                                        @lang('user.create_shop')</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    @lang('text.auth.logout')</a>
                                </li>

                                <form id="logout-form" 
                                    action="{{ url('/logout') }}" 
                                    method="POST" 
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </li>
                        <li>
                            <a href="{!! route('user.cart.index') !!}">
                                <span class="glyphicon glyphicon-shopping-cart" 
                                    aria-hidden="true"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
