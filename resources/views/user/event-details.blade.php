@extends('layout')

@section('content')
    <section class="w-screen p-16">

        <div class="shadow-xl w-full flex">
            <img src="{{ asset('storage/' . $event->image) }}" class="h-[300px]">
            <div class="p-8">
                <h2 class="text-4xl font-bold">{{ $event->name }}</h2>
                <p class="text-base text-gray-500 mt-1">{{ $event->description }}</p>
                <div class="flex items-center gap-x-4 mt-4">
                    <i class="fa-solid fa-calendar-alt"></i>
                    <p>{{ \Carbon\Carbon::parse($event->date)->format('l, d M Y') }}</p>
                </div>

    </section>
@endsection
