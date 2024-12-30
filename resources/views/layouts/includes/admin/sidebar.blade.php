@php
$links = [
[
'name' => 'Dashboard',
'icon' => 'fa-solid fa-gauge',
'route' => route('admin.dashboard'),
'active' => request()->routeIs('admin.dashboard')
],
[
'header' => 'Administrar página',
],
[
'name' => 'Usuarios',
'icon' => 'fa-solid fa-users',
'route' => '',
'active' => false
],
[
'name' => 'Empresas',
'icon' => 'fa-solid fa-building',
'active' => false,
    'submenu' => [
            [
            'name' => 'Información',
            'icon' => 'fa-solid fa-info-circle',
            'route' => '',
            'active' => ''
            ],
            [
            'name' => 'Información',
            'icon' => 'fa-solid fa-info-circle',
            'route' => '',
            'active' => ''
            ]
    ]
],

];

@endphp
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{ 
    'transform-none': open,
    '-translate-x-full': !open
 }" aria-hidden="true" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach($links as $link)
            <li>
             @isset($link['header']))

                <h3 class="px-3 mb-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
                    {{$link['header']}}</h3>
                @else

                    @isset($link['submenu'])
                            <div x-data="{ open: {{$link['active'] ? true : false }} }">
                                <button  class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{$link['active'] ? 'bg-gray-100 dark:bg-gray-700' : ''}}" x-on:click="open = !open">
                                    <span class="inline-flex w-6 h-6 justify-center items-center">
                                        <i class="fas {{$link['icon']}} text-gray-500"></i>
                                    </span>
                                    <span class="ms-3">{{$link['name']}}</span>
                                    <i class="fas fa-angle-down ml-auto text-gray-500"
                                       :class="{
                                           'fa-angle-down': !open,
                                           'fa-angle-up': open,
                                       }"                                   
                                    ></i>
                                </button>
                                <ul x-show="open" x-cloak>
                                    @foreach($link['submenu'] as $sublink)
                                        <li class="pl-4">
                                            <a href=""
                                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{$sublink['active'] ? 'bg-gray-100 dark:bg-gray-700' : ''}}">
                                                <span class="inline-flex w-6 h-6 justify-center items-center">
                                                    <i class="fas {{$sublink['icon']}} text-gray-500"></i>
                                                </span>
                                                <span class="ms-3">{{$sublink['name']}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                    @else

                        <a href="{{$link['route']}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{$link['active'] ? 'bg-gray-100 dark:bg-gray-700' : ''}}">
                            <span class="inline-flex w-6 h-6 justify-center items-center">
                                <i class="fas {{$link['icon']}} text-gray-500"></i>
                            </span>
                            <span class="ms-3">{{$link['name']}}</span>
                        </a>
                    @endisset
             @endisset
            </li>
            @endforeach

        </ul>
    </div>
</aside>