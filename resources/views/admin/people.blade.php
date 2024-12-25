@extends('admin.layout')

@section('content')
    <section class="w-screen flex flex-col justify-center items-center">
        <button class="h-[40px] bg-warning text-white font-bold rounded-md mb-8 px-8" data-twe-toggle="modal"
            data-twe-target="#editModal">Edit Jumlah Penghuni</button>
        <div class="w-11/12 grid grid-cols-3 gap-8 max-md:gap-4 max-md:grid-cols-2 max-sm:grid-cols-1">
            @foreach ($peoples as $i => $people)
                <div class="flex items-center w-full gap-x-4 shadow-xl p-8 max-lg:p-4">
                    <i class="fa-solid fa-user-group text-7xl max-lg:text-5xl max-sm:text-3xl"></i>
                    <div class="">
                        <p class="font-semibold text-3xl max-lg:text-2xl max-sm:text-lg text-gray-800">
                            {{ $people->category }}</p>
                        <p class="text-gray-700 text-xl max-lg:text-lg max-sm:text-sm">{{ $people->count }} Orang</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Edit Modal -->
    <form action="{{ route('admin.people.update') }}" method="POST" class="contents">
        @method('PUT')
        <div data-twe-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
            <div data-twe-modal-dialog-ref
                class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                <div
                    class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4">
                        <!-- Modal title -->
                        <h5 class="text-xl font-medium leading-normal text-surface" id="exampleModalCenterTitle">
                            Edit Jumlah Penghuni
                        </h5>
                        <!-- Close button -->
                        <button type="button"
                            class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-twe-modal-dismiss aria-label="Close">
                            <span class="[&>svg]:h-6 [&>svg]:w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="relative p-4">
                        <div class="grid grid-cols-2 gap-4 max-sm:gap-2 max-sm:grid-cols-1 w-full">
                            @csrf
                            @foreach ($peoples as $people)
                                <div class="py-2 w-full">
                                    <p class="font-bold">{{ $people->category }}</p>
                                    <input class="w-full" type="number" name="{{ $people->category }}"
                                        value="{{ $people->count }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4">
                        <button type="button"
                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                            data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="teal">
                            Close
                        </button>
                        <button type="submit" id="edit-item"
                            class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2"
                            data-twe-ripple-init data-twe-ripple-color="teal">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
