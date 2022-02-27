<nav
    x-data="{
        dropdownOpen: false,
    }"
    class="bg-white border-b border-gray-200"
>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center flex-shrink-0">
                    <x-tabler-sport-billard
                        class="block w-10 h-10 text-green-600"
                    />
                </div>
                <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                    <a
                        href="{{ route('/') }}"
                        class="block py-2 pl-3 pr-4 text-base font-medium text-green-700 border-l-4 border-green-500 bg-green-50 @if(request()->routeIs('/')) border-green-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('results', [
                            date('Y'),
                            App\Location::LOCATION_1,
                        ]) }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 @if(request()->is('pool/' . date('Y') . '/' . App\Location::LOCATION_1)) border-green-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif"
                    >
                        Wiener Neustadt I
                    </a>

                    <a
                        href="{{ route('results', [
                            date('Y'),
                            App\Location::LOCATION_2,
                        ]) }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 @if(request()->is('pool/' . date('Y') . '/' . App\Location::LOCATION_2)) border-green-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif"
                    >
                        Wiener Neustadt II
                    </a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div
                    @click.away="dropdownOpen = false"
                    class="relative ml-3"
                >
                    <div>
                        <button
                            type="button"
                            @click="dropdownOpen = !dropdownOpen"
                            class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                        >
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="https://www.gravatar.com/avatar/e157a71a8b1585e6a33e2c6da01d4cac" alt="">
                        </button>
                    </div>

                    <div
                        x-show="dropdownOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                    >
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0"> Your Profile </a>

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1"> Settings </a>

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2"> Sign out </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center -mr-2 sm:hidden">
                <!-- Mobile menu button -->
                <button
                    @click="dropdownOpen = !dropdownOpen"
                    type="button"
                    class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <x-heroicon-o-menu
                        x-show="!dropdownOpen"
                        class="block w-6 h-6"
                    />
                    <x-heroicon-o-x
                        x-show="dropdownOpen"
                        class="block w-6 h-6"
                    />
                </button>
            </div>
        </div>
    </div>

    <div
        x-show="dropdownOpen"
        class="sm:hidden" id="mobile-menu"
    >
        <div class="pt-2 pb-3 space-y-1">
            <!-- Current: "bg-green-50 border-green-500 text-green-700", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800" -->
            <a
                href="{{ route('/') }}"
                class="block py-2 pl-3 pr-4 text-base font-medium border-l-4 @if(request()->routeIs('/')) bg-green-50 border-green-500 text-green-700 @else border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 @endif"
            >
                Home
            </a>

            <a
                href="{{ route('results', [
                    date('Y'),
                    App\Location::LOCATION_1,
                ]) }}"
                class="block py-2 pl-3 pr-4 text-base font-medium border-l-4 @if(request()->is('pool/' . date('Y') . '/' . App\Location::LOCATION_1)) bg-green-50 border-green-500 text-green-700 @else border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 @endif"
            >
                Wiener Neustadt I
            </a>

            <a
                href="{{ route('results', [
                    date('Y'),
                    App\Location::LOCATION_2,
                ]) }}"
                class="block py-2 pl-3 pr-4 text-base font-medium border-l-4 @if(request()->is('pool/' . date('Y') . '/' . App\Location::LOCATION_2)) bg-green-50 border-green-500 text-green-700 @else border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 @endif"
            >
                Wiener Neustadt II
            </a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full" src="https://www.gravatar.com/avatar/e157a71a8b1585e6a33e2c6da01d4cac" alt="">
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"> Sign out </a>
            </div>
        </div>
    </div>
</nav>
