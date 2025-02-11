<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
       
       
       
        @can('categories')
        <li class=" nav-item"><a href="index.html"><i class="la la-folder"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.categories') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ $categories_count }}</span></a>
            <ul class="menu-content">
                <li class="active"><a class="menu-item" href="{{ route('dashpoard.countries.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.categories') }}</a>
                </li>
                <li><a class="menu-item" href="{{ route('dashpoard.countries.create') }}" data-i18n="nav.dash.crypto">{{ __('dashboard.category_create') }}</a>
                </li>

            </ul>
        </li>
        @endcan

        @can('brands')
        <li class=" nav-item"><a href="index.html"><i class="la la-check-square"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.brands') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ $brands_count }}</span></a>
            <ul class="menu-content">
                <li class="active"><a class="menu-item" href="{{ route('dashpoard.Brande.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.brands') }}</a>
                </li>
                <li><a class="menu-item" href="{{ route('dashpoard.Brande.create') }}" data-i18n="nav.dash.crypto">{{ __('dashboard.brand_create') }}</a>
                </li>

            </ul>
        </li>
        @endcan

        @can('roles')
        <li class=" nav-item"><a href="#"><i class="la la-unlock-alt"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.roles') }}</span></a>
            <ul class="menu-content">
                <li>
                    <a class="menu-item" href="{{ route('dashpoard.Role.create') }}" data-i18n="">
                        {{ __('dashboard.create_role') }} </a>
                </li>
                <li>
                    <a class="menu-item" href="{{ route('dashpoard.Role.index') }}" data-i18n="">{{ __('dashboard.roles') }} </a>
                </li>
            </ul>
        </li>
        @endcan

        @can('admins')
        <li class=" nav-item"><a href="#"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.admins') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ $admins_count }}</span></a>
            <ul class="menu-content">
                <li>
                    <a class="menu-item" href="{{ route('dashpoard.Admin.create') }}" data-i18n="">{{ __('dashboard.create_admin') }} </a>
                </li>
                <li>
                    <a class="menu-item" href="{{ route('dashpoard.Admin.index') }}" data-i18n="">{{ __('dashboard.admins') }}</a>
                </li>
            </ul>
        </li>
        @endcan
        @can('global_shipping')
        <li class=" nav-item"><a href="#"><i class="la la-ambulance"></i><span class="menu-title" data-i18n="nav.templates.main"> {{ __('dashboard.shipping') }} </span></a>
            <ul class="menu-content">
                <li>
                    <a class="menu-item" href="{{ route('dashpoard.countries.index') }}" data-i18n="">{{ __('dashboard.shippping') }}</a>
                </li>

            </ul>
        </li>
        @endcan

      
      
        
        <li class=" navigation-header">
          <span data-i18n="nav.category.support">Support</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Support"></i>
        </li>
        <li class=" nav-item"><a href="http://support.pixinvent.com/"><i class="la la-support"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Raise Support</span></a>
        </li>
        <li class=" nav-item">
          <a href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/documentation"><i class="la la-text-height"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </div>