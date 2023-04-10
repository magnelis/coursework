<footer class="footer__custom">
    <section class="section__footer__custom">
        <div class="content__section__footer__custom">
            <div class="from__content__section__footer__custom">
                <div class="header__footer__custom" style="margin-bottom: 32px">Bezlunoc | Tattoo studio</div>
                @guest()
                    <a href="{{ route('user.auth') }}" class="btn__content__section__footer__custom">Записаться на консультацию</a>
                @endguest
                @auth()
                    <a href="{{ route('user.profile') }}" class="btn__content__section__footer__custom">Записаться на консультацию</a>
                @endauth
            </div>
            <div class="from__content__section__footer__custom">
                <div class="header__footer__custom header__contacts__footer__custom">Контакты</div>
                <div class="contact__header__footer__custom">Адрес: г. Челябинск, улица Петра Томилова, 11Ак1</div>
                <div>Режим работы: ПН-СБ с 11:00 до 19:00</div>
            </div>
        </div>
        <div class="nav__section__footer__custom">
            <nav class = "block__for__links__nav__section__footer__custom">
                <a href="{{route('index')}}" class="link__custom__for__footer">Главная</a>
                <a href="{{route('page.gallery')}}" class="link__custom__for__footer">Галерея работ</a>
                <a href="{{route('page.about')}}" class="link__custom__for__footer">О студии</a>
                <a href="{{route('page.contacts')}}" class="link__custom__for__footer">Контакты</a>
            </nav>
            <nav>
                <a href="https://vk.com/tattoohype" target="_blank">
                    <img src="{{ asset('image/icons/vk.png') }}" class="img__link__custom__for__footer" alt="vk">
                </a>
            </nav>
        </div>
    </section>
    <section class="section__footer__two__custom">
        <div class="content__section__footer__two__custom">
            © Bezlunoc {{date('Y')}}
        </div>
    </section>
</footer>
