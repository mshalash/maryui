<div>
    <x-nav sticky full-width>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="mr-3">

                <x-icon name="o-bars-3" @click="$wire.drawer = true" class="cursor-pointer" />
            </label>

            {{-- Brand --}}

            <img src="{{ asset('img/logo.png')}}" alt="Mary UI image" class="h-12 w-auto">
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>

            <x-button label="Personal" class="hover:bg-gray-200 hover:text-gray-900" link="###" class="btn-ghost btn-sm"
                responsive />
            <x-button label="CV" class="hover:bg-gray-200 hover:text-gray-900" link="###" class="btn-ghost btn-sm"
                responsive />
            <x-button label="Appraisal" class="hover:bg-gray-200 hover:text-gray-900" link="###"
                class="btn-ghost btn-sm" responsive />
            <x-button label="Insurance" class="hover:bg-gray-200 hover:text-gray-900" link="###"
                class="btn-ghost btn-sm" responsive />
            <x-button label="Declare" class="hover:bg-gray-200 hover:text-gray-900" link="###" class="btn-ghost btn-sm"
                responsive />
            <x-button label="References" class="hover:bg-gray-200 hover:text-gray-900" link="###"
                class="btn-ghost btn-sm" responsive />
            <x-button label="Consent" class="hover:bg-gray-200 hover:text-gray-900" link="###" class="btn-ghost btn-sm"
                responsive />
            <x-button label="Check List" class="hover:bg-gray-200 hover:text-gray-900" link="###"
                class="btn-ghost btn-sm" responsive />
            <x-button label="DP98A" class="hover:bg-gray-200 hover:text-gray-900" link="###" class="btn-ghost btn-sm"
                responsive />
            <x-button label="Out_Hours" class="hover:bg-gray-200 hover:text-gray-900" link="###"
                class="btn-ghost btn-sm" responsive />
            <x-dropdown>
                <x-menu-item title="Notes" icon="o-archive-box" />
                <x-menu-item title="DBS Tracker" icon="o-trash" />
                <x-menu-item title="ICO Tracker" icon="o-arrow-path" />
            </x-dropdown>

        </x-slot:actions>
    </x-nav>

    <!-- Options DRAWER -->
    <x-drawer wire:model="drawer" class="lg:w-22/100 pl-1 bg-gray-900">
        {{-- User --}}
        @if($user = auth()->user())

        <x-list-item :item="$user" class="text-white" value="name" no-separator no-hover avatar="">
            <x-slot:actions>
                <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logout" no-wire-navigate
                    link="/logout" />
                <x-button icon="o-chevron-double-left" class="btn-xs" tooltip-left="close" no-wire-navigate
                    @click="$wire.drawer = false" />
            </x-slot:actions>
        </x-list-item>

        <x-menu-separator />
        @endif

        {{-- Activates the menu item when a route matches the `link` property --}}
        <x-menu activate-by-route>
            <x-menu-item title="Dashboard" icon="o-home" class="text-white hover:bg-gray-200 hover:text-gray-900"
                link="dashboard" />
            <x-menu-item title="Posts" icon="o-document-plus" class="text-white hover:bg-gray-200 hover:text-gray-900"
                link="posts" />
            <x-menu-item title="Employees" class="text-white hover:bg-gray-200 hover:text-gray-900" link="users" />
            <x-menu-item title="Doctors" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Holidays" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Employee Handbook" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Staff Appraisal" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Training Records" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Doctors GMC Tracker" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Doctors Insurance Tracker" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Doctors DBS Tracker" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Doctors IOC Tracker" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Nurses NMC Tracker" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Users" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />
            <x-menu-item title="Hospital" class="text-white hover:bg-gray-200 hover:text-gray-900" link="####" />

        </x-menu>
    </x-drawer>

</div>