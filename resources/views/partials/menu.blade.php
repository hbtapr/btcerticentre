<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('client_access')
                            <li class="{{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                                <a href="{{ route("admin.clients.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.client.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('partner_access')
                            <li class="{{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "active" : "" }}">
                                <a href="{{ route("admin.partners.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.partner.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('certificate_access')
                            <li class="{{ request()->is("admin/certificates") || request()->is("admin/certificates/*") ? "active" : "" }}">
                                <a href="{{ route("admin.certificates.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.certificate.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('exam_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.exam.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('question_access')
                            <li class="{{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.questions.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.question.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('theme_access')
                            <li class="{{ request()->is("admin/themes") || request()->is("admin/themes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.themes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.theme.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('attempt_access')
                            <li class="{{ request()->is("admin/attempts") || request()->is("admin/attempts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.attempts.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.attempt.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('demo_access')
                            <li class="{{ request()->is("admin/demos") || request()->is("admin/demos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.demos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.demo.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('alternative_access')
                            <li class="{{ request()->is("admin/alternatives") || request()->is("admin/alternatives/*") ? "active" : "" }}">
                                <a href="{{ route("admin.alternatives.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.alternative.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
            <li>
                <a href="#" onclick="/public/demo">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.demotest') }}
                </a>
            </li>
        </ul>
    </section>
</aside>