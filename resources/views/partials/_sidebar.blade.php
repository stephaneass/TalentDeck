<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('admin/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admin/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light mt-2">
            <span class="logo-sm">
                <img src="{{asset('images/logo.png')}}" alt="" height="85">
            </span>
            <span class="logo-lg">
                <img src="{{asset('images/logo.png')}}" alt="" height="85">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" style="margin-top: -20px">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <x-admin.sidebar_menu title="Dashboard" :route="route('dashboard')" icon="ri-honour-line" />
                <hr>
                
                <x-admin.sidebar_menu title="Educations" :route="route('educations')" icon="ri-pantone-line" />
                {{-- <x-admin.sidebar_menu title="Utilisateurs" :route="route('admin.users')" icon="ri-team-line" />
                <x-admin.sidebar_menu title="Opérations" :route="route('admin.operations')" icon="ri-stack-line" />
                <x-admin.sidebar_menu title="Abonnement" :route="route('admin.memberships')" icon="ri-layout-masonry-line" />
                <hr>
                <div class="dropdown-divider"></div>
                <x-admin.sidebar_menu title="Administrateurs" :route="route('admin.admins')" icon="ri-advertisement-line" /> --}}
                <div class="dropdown-divider"></div>
                <hr>
                <div class="dropdown-divider"></div>
                <x-admin.sidebar_drop_menu title="Paramètres" icon="ri-settings-5-line" >
                    {{-- <x-admin.sidebar_drop_item title="Agrégateurs" :route="route('admin.aggregators')" />
                    <x-admin.sidebar_drop_item title="GSM" :route="route('admin.gsm')" /> --}}
                </x-admin.sidebar_drop_menu>
                <div class="dropdown-divider"></div>
                <hr>
                {{-- <x-admin.sidebar_menu title="Profil" :route="route('admin.profil')" icon="ri-account-circle-line" />
                <x-admin.sidebar_menu title="Déconnexion" :route="route('admin.logout')" icon="ri-logout-box-r-line" /> --}}
                {{-- profil and logout --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>