@extends('admin.layout')

<style>
    .ck-content {
        padding: 0 30px !important;
    }
</style>
@section('content')
    <section class="w-screen flex justify-center">
        <div class="w-1/2">
            <div id="editor">
                {!! $needs->needs !!}
            </div>
            <button id="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
        </div>
    </section>
@endsection

@section('script')
    <script>
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            ListProperties
        } = CKEDITOR;

        var editorInstance;

        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [ListProperties, Essentials, Bold, Italic, Font, Paragraph],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
                    'bulletedList', 'numberedList'
                ],
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                }
            })
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });


        document.getElementById('submit').addEventListener('click', () => {
            const editorData = editorInstance.getData();
            Swal.fire({
                title: "Edit List Kebutuhan Panti Asuhan OEL",
                text: "Apakah anda yakin ingin mengubah list kebutuhan panti asuhan?",
                icon: "warning",
                showDenyButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`{{ route('admin.needs.update') }}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            },
                            body: JSON.stringify({
                                needs: editorData
                            })
                        })
                        .then(response => response.json())
                        .then((data) => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "List kebutuhan berhasil diubah",
                                    icon: "success",
                                }).then(() => {
                                    window.location.reload();
                                })
                            } else {
                                Swal.fire({
                                    title: "Gagal",
                                    text: "List kebutuhan gagal diubah",
                                    icon: "error",
                                })
                            }
                        })
                }
            })
        });
    </script>
@endsection
