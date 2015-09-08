<header class="header">
    <div class="logo-container">
        <a href="../" class="logo">
            <img src="/assets/images/logo.png" height="35" alt="Porto Admin" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">


        @include('header-notification')

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="/files/UserFiles/{{isset($currentUser['avatar_filename']) ? $currentUser['avatar_filename'] : '!sample-user.jpg'}}"
                         alt="{{$currentUser['name']}}" class="img-circle" data-lock-picture="/assets/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="{{$currentUser['name']}}" data-lock-email="{{$currentUser['email']}}">
                    <span class="name">{{$currentUser['name']}}</span>
                    <span class="role">{{$currentUser['name']}}</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="/myinfo"><i class="fa fa-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>