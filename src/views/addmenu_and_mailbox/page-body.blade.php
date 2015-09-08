<div class="inner-body mailbox-folder">
    <!-- START: .mailbox-header -->
        @include('/addmenu_and_mailbox/common_elements/header')
    <!-- END: .mailbox-header -->

    <!-- START: .mailbox-actions -->
    @if(isset($page_settings['page_action_bar']))
        {{--@include('/addmenu_and_mailbox/common_elements/actions')--}}
    @endif
    <!-- END: .mailbox-actions -->

    {{--а вот сюда ялдим контент--}}
    @yield('content')


</div>