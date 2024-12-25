@extends('layout')

@section('content')
    <section class="w-screen pt-8 min-h-screen px-32 max-xl:px-12 max-lg:px-10">
        <div class="flex justify-between max-sm:flex-wrap">
            <h1 class="text-5xl font-bold text-center w-fit max-lg:text-4xl">Galeri Event</h1>
            <div class="w-fit max-sm:mt-4" data-twe-nav-item-ref>
                <div
                    class="flex lg:w-[570px] max-lg:max-w-[400px] max-md:w-[330px] h-full items-center justify-between border-black border rounded-lg px-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" name="search" id="search"
                        class="relative m-0 block flex-auto bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-surface transition duration-300 ease-in-out focus:!border-none focus:text-gray-700 focus:outline-none motion-reduce:transition-none"
                        placeholder="Cari Event" aria-label="Search" aria-describedby="button-addon2" />
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 max-lg:grid-cols-2 max-sm:grid-cols-1 max-lg:gap-x-8 py-8 gap-16" id="event-container">
            @foreach ($events as $event)
                <div
                    class="block rounded-lg bg-white shadow-secondary-1 hover:translate-y-[-11px]
                     transition-all duration-500 hover:shadow-2xl hover:shadow-[rgba(0,0,0,0.6)] shadow-[rgba(0,0,0,0.2)]">
                    <div class="relative overflow-hidden bg-cover bg-no-repeat" data-twe-ripple-init
                        data-twe-ripple-color="light">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $event->image) }}" alt="" />
                        <a href="#!">
                            <div
                                class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                            </div>
                        </a>
                    </div>
                    <div class="p-6 text-surface">
                        <h5 class="mb-2 text-xl font-semibold leading-tight">{{ $event->name }}</h5>
                        <p class="mb-4 text-base truncate-text">
                            {{ $event->description }}
                        </p>
                        <button
                            class="rounded-2xl text-sm text-blue-800 border-2 border-blue-800 px-8 py-2 h-fit tracking-wide font-medium"
                            data-twe-ripple-init data-twe-ripple-color="light"
                            onclick="window.location.href='{{ route('event.show', $event->id) }}'">READ MORE</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        $('#search').on('input', function() {
            var value = $(this).val().toLowerCase();
            $('#event-container > div').each(function() {
                var matches = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(matches);
            });
        });
    </script>
@endsection
