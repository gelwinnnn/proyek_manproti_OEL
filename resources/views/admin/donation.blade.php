@extends('admin.layout')

@section('content')
    <section class="w-screen flex justify-center">
        <div class="flex flex-col w-11/12 py-8 rounded-lg shadow-xl items-center justify-center mb-10">
            <div class="px-8 w-full mb-3">
                <div class="relative mb-4 flex w-full flex-wrap items-stretch">
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
            </div>
            <div id="datatable" class="w-full px-5 py-5" data-te-fixed-header="true"></div>


            <!-- Modal -->
            <div data-twe-modal-init
                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="membersModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                <div data-twe-modal-dialog-ref
                    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                    <div
                        class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                        <div
                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                            <!-- Modal title -->
                            <h5 class="text-xl font-medium leading-normal text-surface dark:text-white"
                                id="exampleModalCenterTitle">
                                Modal title
                            </h5>
                            <!-- Close button -->
                            <button type="button"
                                class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
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
                            <p>This is a vertically centered modal.</p>
                        </div>

                        <!-- Modal footer -->
                        <div
                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                            <button type="button"
                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400"
                                data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light">
                                Close
                            </button>
                            <button type="button"
                                class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                data-twe-ripple-init data-twe-ripple-color="light">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        const customDatatable = document.getElementById("datatable");
        const data = @json($donations);

        const instance = new te.Datatable(
            customDatatable, {
                columns: [{
                        label: "Nama Donatur",
                        field: "name",
                        sort: true
                    },
                    {
                        label: "Deskripsi",
                        field: "description",
                        sort: true
                    },
                    {
                        label: "Tanggal Transfer",
                        field: "transfer_date",
                        sort: true
                    },
                    {
                        label: "Bukti Transfer",
                        field: "action",
                        sort: true
                    },
                ],
                rows: data.map((donation, i) => {

                    return {
                        ...donation,
                        description: `<p class="text-wrap">${donation.description}</p>`,
                        action: `
        <div class="flex">
            <button data-te-ripple-init data-te-ripple-color="light" onclick="getTransfer('${donation.id}')"
                class="mr-3 btn-detail block rounded bg-primary px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                Detail
            </button>
                `
                    };

                }),
            }, {
                hover: true,
                stripped: true
            },
        );

        function getTransfer(donation_id) {
            const url = `{{ route('admin.donation.getTransfer', '') }}/${donation_id}`;
            $.ajax({
                url: url,
                method: 'GET',
                success: async function(res) {
                    if (res.success) {
                        var htmlContent = "";
                        htmlContent += `
                                    <div class="flex justify-center">
                                        <img src="{{ asset('storage/${res.transfer_proof}') }}" class="w-[420px] my-3">
                                    </div>
                                `;
                        await Swal.fire({
                            title: 'Bukti Transfer',
                            html: htmlContent,
                            showConfirmButton: false,
                            showDenyButton: true,
                            denyButtonText: 'Close',
                        });
                    } else {
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'There is an error while receiving data, please try again'
                        });
                    }
                }
            });
        }


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
    </script>
@endSection
