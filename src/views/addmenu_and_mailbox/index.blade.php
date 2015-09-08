<section class="content-with-menu mailbox">
    <div class="content-with-menu-container" data-mailbox data-mailbox-view="folder">
        <div class="inner-menu-toggle">
            <a href="#" class="inner-menu-expand" data-open="inner-menu">
                Show Menu <i class="fa fa-chevron-right"></i>
            </a>
        </div>
        {{--Отдельно левое меню (по желанию, можно будет заменить)--}}
        @include('/addmenu_and_mailbox/addition-menu')
        {{--Отдельно тело страницы--}}
        @include('/addmenu_and_mailbox/page-body')

    </div>
</section>