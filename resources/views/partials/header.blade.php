 <!-- start: header -->
 <header class="header">
    <div class="logo-container">
        <a href="" class="logo" style="text-decoration: none; font-weight:700; color:black; font-size:16px;">
            <img src="{{asset('logo.png')}}" width="75" height="35"/> Elect Data
        </a>
        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">    
        <span class="separator"></span>
 
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    <span class="name">{{auth()->user()->name}}</span>
                    <span class="role">administrator</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fas fa-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fas fa-lock"></i> Lock Screen</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fas fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->