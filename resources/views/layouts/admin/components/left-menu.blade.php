<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <x-admin.menu.multiple
                        title="{{__('admin.menu.mainPage')}}"
                        menuIcon="bx bx-home"
                        :items="[
                        [
                            'title' => __('admin.menu.content'),
                            'href' => 'admin.main.index',
                            'params' => []
                        ], [
                            'title' => __('admin.menu.stories'),
                            'href' => 'admin.stories.index',
                            'params' => []
                        ]
                    ]"
                ></x-admin.menu.multiple>
                <x-admin.menu.single
                        title="{{__('admin.menu.about')}}"
                        route="admin.about.index"
                        menuIcon="dripicons-jewel"
                >
                </x-admin.menu.single>
                <x-admin.menu.single
                        title="{{__('admin.menu.donate')}}"
                        route="admin.donate.index"
                        menuIcon="dripicons-card"
                >
                </x-admin.menu.single>
                <x-admin.menu.single
                        title="{{__('admin.menu.events')}}"
                        route="admin.events.index"
                        menuIcon="dripicons-blog"
                >
                </x-admin.menu.single>

                @if(auth()->user()->hasAnyDirectPermission(\App\Enumerators\Admin\RolesEnumerator::getPermissionForRootAdmin()))
                    <x-admin.menu.title>{{__('admin.menu.rootTitle')}}</x-admin.menu.title>

                @endif


                @if(auth()->user()->hasAnyDirectPermission([
                    \App\Enumerators\Admin\RolesEnumerator::PERMISSION_SHOW_USER_LIST,
                ]))
                    <x-admin.menu.single
                            title="{{__('admin.users.users')}}"
                            route="admin.users.index"
                            menuIcon="dripicons-user-group"
                    >
                    </x-admin.menu.single>

                @endif


                @if(auth()->user()->hasAnyDirectPermission([
                       \App\Enumerators\Admin\RolesEnumerator::   PERMISSION_SHOW_ROLES_LIST,
                    ]))
                    <x-admin.menu.single
                            title="{{__('admin.roles.roles')}}"
                            route="admin.roles.index"
                            menuIcon="bx bx-id-card"
                    >
                    </x-admin.menu.single>

                @endif


                {{--                MULTI LEVEL MENU--}}
                {{--                @include('layouts.admin.components.menu.multi_level', [--}}
                {{--                    'title' => 'Список посилань',--}}
                {{--                    'menuIcon' => 'bx bx-list-ul',--}}
                {{--                    'items' => [--}}
                {{--                        [--}}
                {{--                            'href' => 'admin.main.index2',--}}
                {{--                            'title' => __('content/menu.mainPage')--}}
                {{--                        ],[--}}
                {{--                            'title' => __('content/menu.mainPage'),--}}
                {{--                            'href' => [--}}
                {{--                                [--}}
                {{--                                    'href' => 'admin.main.index3',--}}
                {{--                                    'title' => __('content/menu.mainPage'),--}}
                {{--                                ],[--}}
                {{--                                    'href' => 'admin.main.index4',--}}
                {{--                                    'title' => __('content/menu.mainPage')--}}
                {{--                                ],--}}
                {{--                            ],--}}
                {{--                        ],--}}
                {{--                    ]--}}
                {{--                ])--}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
