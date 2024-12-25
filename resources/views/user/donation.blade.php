@extends('layout')

<style>
    nav ul {
        list-style-type: none !important;
    }

    ol {
        list-style-type: decimal !important;
    }

    ul {
        list-style-type: disc !important;
    }
</style>
@section('content')
    <section class="w-screeen py-16 xl:px-44 lg:px-24 md:px-12 px-4 flex flex-col items-center">
        <div class=" w-full flex gap-x-8 max-lg:flex-col justify-center items-start max-lg:items-center">
            <div class="mt-8 max-w-[600px] w-full p-8 rounded-md shadow-xl border-4 border-[var(--main2)] gap-y-4">
                <h1 class="font-bold text-4xl w-full text-center pb-8 max-sm:text-3xl">List Kebutuhan Panti</h1>
                <div class="max-h-[380px] overflow-scroll pl-8">
                    {!! $needs->needs !!}
                </div>
            </div>
            <form class="contents" id="donation-form">
                <div class="grid mt-8 max-w-[600px] w-full p-8 rounded-md shadow-xl border-4 border-[var(--main2)] gap-y-4">
                    <h1 class="font-bold text-4xl w-full text-center max-sm:text-3xl">Form Donasi</h1>
                    <div class="w-full">
                        <p class="font-semibold focus:outline-none">Nama Donatur</p>
                        <input class="h-[35px] w-full p-2 rounded-sm border border-blue-500 bg-[var(--shadow1a)]"
                            type="text" name="name">
                    </div>
                    <div class="w-full">
                        <p class="font-semibold focus:outline-none">Tanggal Transfer</p>
                        <input class="h-[35px] w-full p-2 rounded-sm border border-blue-500 bg-[var(--shadow1a)]"
                            type="date" name="transfer_date">
                    </div>
                    <div class="w-full">
                        <p class="font-semibold focus:outline-none">Berita Acara</p>
                        <textarea class="w-full p-2 rounded-sm border border-blue-500 bg-[var(--shadow1a)]" rows="2" name="description"></textarea>
                    </div>
                    <div class="w-full">
                        <label for="formFile" class="inline-block font-semibold">Bukti Transfer</label>
                        <input
                            class="relative m-0 bg-[var(--shadow1a)] block w-full min-w-0 flex-auto cursor-pointer rounded-sm border border-solid border-blue-500 bg-clip-padding px-3 py-[0.32rem] font-normal duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3  file:py-[0.32rem] focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none file:text-[var(--dark1)]"
                            type="file" id="formFile" name="transfer_proof" />
                    </div>
                    <button id="submit"
                        class="w-full bg-[var(--main2)] font-semibold rounded-md h-[40px] mt-4 shadow-md hover:shadow-white transition-all">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('donation-form');
            const submit = document.getElementById('submit');

            submit.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin mengirimkan donasi?',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: 'Ya, Kirim',
                    denyButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = new FormData(form);
                        fetch(`{{ route('donation.store') }}`, {
                                method: 'POST',
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: data
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: 'Donasi berhasil dikirimkan',
                                        icon: 'success',
                                        confirmButtonText: 'OK',
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Gagal',
                                        text: data.message ||
                                            'Donasi gagal dikirimkan.',
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan pada sistem saat mengirimkan donasi.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                });
                            });
                    }
                });
            });
        });
    </script>
@endsection
