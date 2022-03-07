@inject('menuItemHelper', 'JeroenNoten\LaravelAdminLte\Helpers\MenuItemHelper')

@if ($menuItemHelper->isHeader($item))

    @if(auth()->user()->userable->can($item['ability']))
        {{-- Header --}}
        @include('adminlte::partials.sidebar.menu-item-header')
    @endif
{{--@elseif ($menuItemHelper->isSearchBar($item))--}}

{{--    @if(auth()->user()->userable->can($item['ability']))--}}
{{--    --}}{{-- Search form --}}
{{--        @include('adminlte::partials.sidebar.menu-item-search-form')--}}
{{--    @endif--}}
@elseif ($menuItemHelper->isSubmenu($item))

    @if(auth()->user()->userable->can($item['ability']))
    {{-- Treeview menu --}}
        @include('adminlte::partials.sidebar.menu-item-treeview-menu')
    @endif
@elseif ($menuItemHelper->isLink($item))

    @if(array_key_exists('ability',$item))
        @if(auth()->user()->userable->can($item['ability']))
            {{-- Link --}}
            @include('adminlte::partials.sidebar.menu-item-link')
        @endif
    @else
        @include('adminlte::partials.sidebar.menu-item-link')
    @endif
@endif
