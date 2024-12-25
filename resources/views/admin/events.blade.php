@extends('admin.layout')

@section('content')
    <section class="w-screen flex justify-center">
        <div class="flex flex-col w-11/12 py-8 rounded-lg shadow-xl items-center justify-center mb-10">
            <div class="px-8 w-full mb-3">
                <div class="flex gap-x-4">
                    <div class="relative mb-4 flex w-9/12 flex-wrap items-stretch">
                        <input id="advanced-search-input" type="search"
                            class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                            placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                        <!--Search button-->
                        <button
                            class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                            type="button" id="advanced-search-button" data-te-ripple-init data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <button data-te-ripple-init data-te-ripple-color="light" data-twe-toggle="modal"
                        data-twe-target="#createModal"
                        class="mr-3 mb-4 w-3/12 btn-detail block rounded bg-primary px-6 pb-2 pt-2.5 text-sm text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                        Buat Event
                    </button>
                </div>
            </div>
            <div id="datatable" class="w-full px-5 py-5" data-te-fixed-header="true"></div>

        </div>
    </section>

    <!-- Create Modal -->
    <div data-twe-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="createModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-twe-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4">
                    <!-- Modal title -->
                    <h5 class="text-xl font-bold leading-normal text-surface" id="exampleModalCenterTitle">
                        Buat Event
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
                    <form class="contents" id="create-form" enctype="multipart/form-data">
                        <div class="w-full">
                            <p class="font-medium">Nama Acara</p>
                            <input type="text" class="rounded w-full" id="name" name="name">
                        </div>
                        <div class="w-full">
                            <p class="font-medium">Deskripsi</p>
                            <textarea type="text" class="rounded w-full" id="description" name="description"></textarea>
                        </div>
                        <div class="w-full">
                            <p class="font-medium">Tanggal Acara</p>
                            <input type="date" class="rounded w-full" id="date" name="date">
                        </div>
                        <div class="w-full">
                            <p class="font-medium">Input Foto</p>
                            <input type="file" class="rounded w-full border border-black p-1" id="image"
                                name="image">
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out"
                        data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="teal">
                        Batal
                    </button>
                    <button type="button" id="store"
                        class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out"
                        data-twe-ripple-init data-twe-ripple-color="teal">
                        Buat Event
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div data-twe-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-twe-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4">
                    <!-- Modal title -->
                    <h5 class="text-xl font-bold leading-normal text-surface" id="exampleModalCenterTitle">
                        Edit Event
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
                    <form class="contents" id="edit-form" enctype="multipart/form-data" method="PUT">
                        <input type="hidden" id="edit-id">
                        <div class="w-full">
                            <p class="font-medium">Nama Acara</p>
                            <input type="text" class="rounded w-full" id="edit-name" name="name">
                        </div>
                        <div class="w-full">
                            <p class="font-medium">Deskripsi</p>
                            <textarea type="text" class="rounded w-full" id="edit-description" name="description"></textarea>
                        </div>
                        <div class="w-full">
                            <p class="font-medium">Tanggal Acara</p>
                            <input type="date" class="rounded w-full" id="edit-date" name="date">
                        </div>
                        <div class="w-full">
                            <p class="font-medium">Input Foto</p>
                            <input type="file" class="rounded w-full border border-black p-1" id="edit-image"
                                name="image">
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out"
                        data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="teal">
                        Close
                    </button>
                    <button type="button" id="update"
                        class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out"
                        data-twe-ripple-init data-twe-ripple-color="light">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const customDatatable = document.getElementById("datatable");
        const data = @json($events);

        const instance = new te.Datatable(
            customDatatable, {
                columns: [{
                        label: "Events",
                        field: "name",
                        sort: true
                    }, {
                        label: "Tanggal",
                        field: "date",
                        sort: true
                    },
                    {
                        label: "Deskripsi",
                        field: "description",
                        sort: true
                    },
                    {
                        label: "Actions",
                        field: "actions",
                        sort: true
                    },
                ],
                rows: data.map((event, i) => {

                    return {
                        ...event,
                        description: `<p class="text-wrap">${event.description}</p>`,
                        actions: `
            <div class="flex">
                <button data-te-ripple-init data-te-ripple-color="light" data-twe-toggle="modal" data-twe-target="#editModal"
                data-name="${event.name}" data-date="${event.date}" data-description="${event.description}" id="${event.id}"
                    class="edit-button mr-3 btn-detail block rounded bg-warning px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                    Edit
                </button>
                <button data-te-ripple-init data-te-ripple-color="light" onclick="deleteEvent('${event.id}')"
                    class="mr-3 btn-detail block rounded bg-danger px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                    Delete
                </button>
                    `
                    };

                }),
            }, {
                hover: true,
                stripped: true
            },
        );




        const advancedSearchInput = document.getElementById('advanced-search-input');

        const search = (value) => {
            let [phrase, columns] = value.split(" in:").map((str) => str.trim());

            if (columns) {
                columns = columns.split(",").map((str) => str.toLowerCase().trim());
            }

            instance.search(phrase, columns);
        };

        document.getElementById("advanced-search-button").addEventListener("click", () => {
            search(advancedSearchInput.value);
        });

        advancedSearchInput.addEventListener("keydown", (e) => {
            search(e.target.value);
        });

        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.id;
                const name = this.getAttribute('data-name');
                const date = this.getAttribute('data-date');
                const description = this.getAttribute('data-description');

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = name;
                document.getElementById('edit-date').value = date;
                document.getElementById('edit-description').value = description;

            });
        });

        function deleteEvent(id) {
            Swal.fire({
                title: "Hapus Event",
                text: "Apakah anda yakin untuk menghapus event ini?",
                icon: 'question',
                showDenyButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`{{ route('admin.event.destroy', '') }}/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: data.message,
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.error,
                                });
                            }
                        });
                }
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            $('#store').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Buat Event',
                    text: 'Apakah anda yakin ingin membuat event ini?',
                    showDenyButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = new FormData($('#create-form')[0]);
                        fetch(`{{ route('admin.event.store') }}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: data
                            }).then(response => response.json())
                            .then(response => {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Event berhasil dibuat'
                                    }).then(() => {
                                        window.location.reload();
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: response.message
                                    });
                                }
                            }).catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan pada sistem. Silahkan coba lagi'
                                });
                            });
                    }
                });
            });

            $('#update').on('click', function(f) {
                f.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Perbarui Event',
                    text: 'Apakah anda yakin ingin memperbarui data event ini?',
                    showDenyButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        const id = document.getElementById('edit-id').value;
                        console.log(id);
                        const data = new FormData($('#edit-form')[0]);
                        fetch(`{{ route('admin.event.update', '') }}/${id}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: data
                            }).then(response => response.json())
                            .then(response => {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message,
                                    }).then(() => {
                                        window.location.reload();
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: response.message
                                    });
                                }
                            }).catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan pada sistem. Silahkan coba lagi'
                                });
                            });
                    }
                });
            });
        });
    </script>
@endSection
