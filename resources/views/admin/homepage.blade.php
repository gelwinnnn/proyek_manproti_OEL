@extends('admin.layout')

@section('content')
    <section class="w-screen min-h-screen px-16 max-sm:px-8 flex flex-col shadow-xl">
        <div class="w-full flex gap-8 max-sm:flex-col">
            <div class="w-1/2 max-sm:w-full">
                <p class=" w-full font-semibold">Sejarah</p>
                <textarea name="history" id="history" style="height: 500px;"rows="6" class="w-full">{{ $homepage->history }}</textarea>
            </div>
            <div class="w-1/2 max-sm:w-full">
                <div class="w-full">
                    <p class=" w-full font-semibold">Visi</p>
                    <textarea name="vision" id="vision" rows="2" style="height: 200px;" class="w-full">{{ $homepage->vision }}</textarea>
                </div>
                <div class="w-full">
                    <p class=" w-full font-semibold">Misi</p>
                    <textarea name="mission" id="mission" rows="3" style="height: 200px;" class="w-full">{{ $homepage->mission }}</textarea>
                </div>
            </div>

        </div>
        <button data-te-ripple-init data-te-ripple-color="light" id="update"
            class="btn-detail block rounded bg-primary px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
            Save
        </button>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#update').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Update Homepage',
                    text: 'Apakah anda yakin ingin memperbarui homepage?',
                    showDenyButton: true,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`{{ route('admin.homepage.update') }}`, {
                                method: 'PUT',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    history: $('#history').val(),
                                    mission: $('#mission').val(),
                                    vision: $('#vision').val(),
                                }),
                            })
                            .then(response => response.json())
                            .then(response => {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message,
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: response.message ||
                                            'Terjadi kesalahan pada data yang dikirim.'
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan pada sistem. Silahkan coba lagi.'
                                });
                            });
                    }
                });
            });
        });
    </script>
@endsection
