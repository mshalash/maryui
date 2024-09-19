<!DOCTYPE html>

<html data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaryUI Tutorial</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

    {{-- The navbar with `sticky` and `full-width` --}}
    <x-nav sticky full-width>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer"  @click="toggle" />
            </label>

            {{-- Brand --}}

            <img src="{{ asset('img/logo.png')}}" alt="Mary UI image" class="h-12 w-auto">
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>

            <x-button label="Messages" icon="o-envelope" class="hover:bg-gray-200 hover:text-gray-900" link="###"
                class="btn-ghost btn-sm" responsive />
            <x-button label="Notifications" icon="o-bell" class="hover:bg-gray-200 hover:text-gray-900" link="###"
                class="btn-ghost btn-sm" responsive />
        </x-slot:actions>
    </x-nav>


    {{-- The main content with `full-width` --}}
    <x-main with-nav full-width>

        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}
        <x-slot:sidebar drawer="main-drawer" class="text-white bg-gray-900" collapsible>
       
        {{-- Collapse icon --}}
        <div class="pt-5">
            
        <a class="m-5 hover:text-inherit rounded-md whitespace-nowrap" @click="toggle">
        <x-icon name="o-bars-3" class="cursor-pointer" />
            </a>
        </div>  
       
        {{-- User --}}
            @if($user = auth()->user())
            <x-list-item :item="$user" value="name" no-separator no-hover class="pt-4 pl-4" avatar="">
                <x-slot:actions>
                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logout" no-wire-navigate
                        class="hover:bg-gray-200 hover:text-gray-900" link="/logout" />
                </x-slot:actions>
            </x-list-item>

            <x-menu-separator />
            @endif

            {{-- Activates the menu item when a route matches the `link` property --}}
            <x-menu activate-by-route>

                <x-menu-item title="Dashboard" icon="o-home" class="hover:bg-gray-200 hover:text-gray-900"
                    link="dashboard" />
                <x-menu-item title="Posts" icon="o-document-plus" class="hover:bg-gray-200 hover:text-gray-900"
                    link="posts" />
                <x-menu-item title="Employees" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Doctors" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Holidays" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Employee Handbook" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Staff Appraisal" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Training Records" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Doctors GMC Tracker" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Doctors Insurance Tracker" class="hover:bg-gray-200 hover:text-gray-900"
                    link="####" />
                <x-menu-item title="Doctors DBS Tracker" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Doctors IOC Tracker" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Nurses NMC Tracker" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Users" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
                <x-menu-item title="Hospital" class="hover:bg-gray-200 hover:text-gray-900" link="####" />
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
</body>


</html>