<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('data_umum_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/data-umums*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.data-umums.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-atlas">
                            </i>
                            {{ trans('cruds.dataUmum.title') }}
                        </a>
                    </li>
                @endcan
                @can('data_stakeholder_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/data-stakeholders*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.data-stakeholders.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-users">
                            </i>
                            {{ trans('cruds.dataStakeholder.title') }}
                        </a>
                    </li>
                @endcan
                @can('data_khusu_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/data-khusus*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.data-khusus.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-address-card">
                            </i>
                            {{ trans('cruds.dataKhusu.title') }}
                        </a>
                    </li>
                @endcan
                @can('perizinan_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/perizinans*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.perizinans.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-book">
                            </i>
                            {{ trans('cruds.perizinan.title') }}
                        </a>
                    </li>
                @endcan
                @can('master_data_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/contact-companies*")||request()->is("admin/contact-contacts*")||request()->is("admin/ketuas*")||request()->is("admin/data-daerahs*")||request()->is("admin/data-cabangs*")||request()->is("admin/data-wilayahs*")||request()->is("admin/jenis-kerjasamas*")||request()->is("admin/jenis-izins*")||request()->is("admin/user-alerts*")||request()->is("admin/system-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-database">
                            </i>
                            {{ trans('cruds.masterData.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('contact_company_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-companies*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-companies.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-building">
                                        </i>
                                        {{ trans('cruds.contactCompany.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('contact_contact_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-contacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-contacts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-plus">
                                        </i>
                                        {{ trans('cruds.contactContact.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('ketua_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/ketuas*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.ketuas.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-tie">
                                        </i>
                                        {{ trans('cruds.ketua.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('data_daerah_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/data-daerahs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.data-daerahs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-americas">
                                        </i>
                                        {{ trans('cruds.dataDaerah.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('data_cabang_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/data-cabangs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.data-cabangs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-map-pin">
                                        </i>
                                        {{ trans('cruds.dataCabang.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('data_wilayah_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/data-wilayahs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.data-wilayahs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-map-marked-alt">
                                        </i>
                                        {{ trans('cruds.dataWilayah.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('jenis_kerjasama_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/jenis-kerjasamas*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.jenis-kerjasamas.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-handshake">
                                        </i>
                                        {{ trans('cruds.jenisKerjasama.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('jenis_izin_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/jenis-izins*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.jenis-izins.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-hand-paper">
                                        </i>
                                        {{ trans('cruds.jenisIzin.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                                        </i>
                                        {{ trans('cruds.userAlert.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('system_calendar_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/system-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.system-calendars.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-calendar">
                                        </i>
                                        {{ trans('cruds.systemCalendar.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="items-center">
                    <a class="{{ request()->is("admin/messages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.messages.index") }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if($unreadConversations['all'])
                            <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>


                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>