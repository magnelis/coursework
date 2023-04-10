<header class="header__custom">
    <nav class="nav__link__header__custom">

        <div class="links__header__custom">
            <img src="{{ asset('image/icons/menu.png') }}" id="menu-icon" class="img__menu__user__header__custom" alt="Меню">

            <a href="{{route('index')}}" class="logo__links__header__custom link__custom__for__header">Bezlunoc</a>

            <div class="responsive_links__header__custom">
                <div class="align__responsive_links__header__custom">
                    <a href="{{route('page.gallery')}}"
                       class="link__custom__for__header responsive__link__custom__for__header">Галерея работ</a>
                    <a href="{{route('page.about')}}"
                       class="link__custom__for__header responsive__link__custom__for__header">О студии</a>
                    <a href="{{route('page.contacts')}}" class="link__custom__for__header">Контакты</a>
                </div>
            </div>

        </div>

        <div class="works__user__header__custom">
            @guest()
                <div class="btn__works__user__header__custom">
                    <a href="{{route('user.auth')}}" class="link__btn__works__user__header__custom">
                        <img src="{{ asset('image/icons/user.png') }}" class="img__user__header__custom"
                             alt="Авторизация">
                    </a>
                </div>
            @endguest
            @auth()
                <div class="btn__works__user__header__custom btn__for__auth__works__user__header__custom">
                    <a href="{{ route('user.profile') }}" class="link__btn__works__user__header__custom">
                        <img src="{{ asset('image/icons/user.png') }}" class="img__user__header__custom" alt="Личный кабинет">
                    </a>
                </div>
                <div class="btn__works__user__header__custom">
                    <a href="{{ route('logout') }}" class="link__btn__works__user__header__custom">
                        <img src="{{ asset('image/icons/logout.png') }}" class="img__logout__user__header__custom" alt="Выйти">
                    </a>
                </div>
            @endauth
        </div>

    </nav>
</header>
