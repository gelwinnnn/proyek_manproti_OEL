@extends('layout')

@section('head')
    <style>
        .landing-section {
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("{{ asset('assets/foto_landing.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .card-title {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection

@section('content')
    <section class="w-screen landing-section h-[600px] py-24 flex items-center justify-center">
        <div class="flex flex-col items-center gap-y-12">
            <p class="text-white lg:text-7xl md:text-5xl max-md:text-4xl font-bold tracking-wide uppercase">
                Ora Et Labora</p>
        </div>
    </section>
    <section class="w-screen xl:px-28 lg:px-24 md:px-12 px-4 py-16">
        <div class="rounded-xl w-full h-fit shadow-xl shadow-[var(--shadow1)] flex overflow-hidden border-2 border-b-0 my-16"
            data-aos="fade-up" data-aos-duration="1000">
            <div class="bg-[var(--main2)] flex items-center justify-center px-16 max-md:hidden">
                <i class="fa-solid fa-scroll text-[var(--neutral1)] text-7xl"></i>
            </div>
            <div class="px-8 py-6">
                <h2 class="font-bold text-4xl mb-2">VISI</h2>
                <p class="text-2xl mb-6 ">{{ $homepage->vision }}</p>
                <h2 class="font-bold text-4xl mb-2">MISI</h2>
                <p class="text-lg max-sm:text-base">{{ $homepage->mission }}
                </p>
            </div>
        </div>
        <div class="rounded-s-full max-md:rounded rounded-r-xl w-full shadow-xl h-fit min-h-[202px] shadow-[var(--shadow3)] border-[var(--shadow3)] border-2 flex overflow-hidden"
            data-aos="zoom-in-down" data-aos-duration="900">
            <div class="bg-[var(--side1)] max-md:hidden flex items-center justify-center w-fit px-[3.5rem] rounded-full">
                <i class="fa-solid fa-people-roof text-[var(--neutral1)] text-7xl"></i>
            </div>
            <div class="px-8 py-6 max-lg:flex-wrap max-lg:gap-x-10 max-lg:gap-y-8 flex justify-around items-center w-full">
                @foreach ($peoples as $people)
                    @if ($people->category == 'Pengasuh')
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="font-bold text-4xl max-xl:text-3xl mb-2">{{ $people->count }}</h2>
                            <p class="text-lg max-xl:text-base font-semibold text-center">Pengasuh</p>
                        </div>
                    @else
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="font-bold text-4xl max-xl:text-3xl mb-2">{{ $people->count }}</h2>
                            <p class="text-lg max-xl:text-base font-semibold text-center">Anak {{ $people->category }}
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="w-screeen py-16 xl:px-44 lg:px-24 md:px-12 px-8 flex justify-center">
        <div class="flex w-full gap-x-16 max-xl:gap-x-12">
            <img src="{{ asset('assets/foto1.jpg') }}" class="w-1/4 max-xl:w-2/5 shadow-xl max-lg:hidden">
            <div class="w-3/4 max-lg:w-full">
                <h1 class="text-3xl font-bold ">Sejarah Panti Asuhan Ora Et Labora</h1>
                <p class="mt-4 tracking-wide leading-relaxed text-justify">
                    {!! $homepage->history !!}
                </p>
            </div>
        </div>
    </section>
    <section class="w-screeen py-16 flex items-center max-md:items-start flex-col xl:px-44 lg:px-24 md:px-12 px-8">
        <h1 class="font-bold text-5xl self-start mb-8 drop-shadow-xl max-lg:text-4xl">Acara Terbaru</h1>
        <div
            class="w-full grid grid-cols-3 max-lg:grid-cols-2 max-md:max-w-[430px]
             max-md:grid-cols-1 gap-x-16 lg:gap-x-8 xl:gap-x-16 gap-y-16">
            @foreach ($events as $event)
                <div
                    class="block rounded-lg bg-white shadow-secondary-1 hover:translate-y-[-11px] w-full h-full
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
@endsection
