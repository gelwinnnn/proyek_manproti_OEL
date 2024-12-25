<!-- Main navigation container -->
<nav class="relative flex w-full flex-nowrap items-center justify-between bg-[var(--main1)] xl:px-44 lg:px-24 md:px-12 px-4 py-2 text-white shadow-dark-mild hover:text-neutral-700 focus:text-neutral-700 lg:flex-wrap lg:justify-start lg:py-4"
    data-twe-navbar-ref>
    <div class="flex w-full flex-wrap items-center justify-between">
        <div class="ms-2">
            <div class="text-xl text-white font-bold">Ora Et Labora</div>
        </div>
        <!-- Hamburger button for mobile view -->
        <button
            class="block border-0 bg-transparent px-2 text-white hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 lg:hidden"
            type="button" data-twe-collapse-init data-twe-target="#navbarSupportedContent2"
            aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <span class="[&>svg]:w-7 [&>svg]:stroke-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!-- Collapsible navbar container -->
        <div class="!visible mt-2 hidden basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
            id="navbarSupportedContent2" data-twe-collapse-item>
            <!-- Left links -->
            <ul class="!list-style-none me-auto flex flex-col ps-0 lg:mt-1 lg:flex-row" data-twe-navbar-nav-ref>
                <!-- Home link -->
                <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                    <a class="text-white lg:px-2" aria-current="page" href="{{ route('home') }}"
                        data-twe-nav-link-ref>Home</a>
                </li>
                <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                    <a class="text-white lg:px-2" aria-current="page" href="{{ route('donation') }}"
                        data-twe-nav-link-ref>Donasi</a>
                </li>
                <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                    <a class="text-white lg:px-2" aria-current="page" href="{{ route('events') }}"
                        data-twe-nav-link-ref>Events</a>
                </li>
                {{-- <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                    <a class="text-white lg:px-2" aria-current="page" href="#" data-twe-nav-link-ref>About Us</a>
                </li> --}}
                <!-- Dropdown -->
                {{-- <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                    <div class="relative" data-twe-dropdown-ref>
                        <a class="flex items-center text-white transition duration-200 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none lg:px-2"
                            href="#" type="button" id="dropdownMenuButton2" data-twe-dropdown-toggle-ref
                            aria-expanded="false">
                            Dropdown link
                            <span class="ms-2 [&>svg]:w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                        <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg data-[twe-dropdown-show]:block"
                            aria-labelledby="dropdownMenuButton1" data-twe-dropdown-menu-ref>
                            <li>
                                <a class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline"
                                    href="#" data-twe-dropdown-item-ref>Action</a>
                            </li>
                            <li>
                                <a class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline"
                                    href="#" data-twe-dropdown-item-ref>Another action</a>
                            </li>
                            <li>
                                <a class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline"
                                    href="#" data-twe-dropdown-item-ref>Something else here</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
