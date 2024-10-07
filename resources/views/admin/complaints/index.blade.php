@extends('layouts.main')

@section('title', 'Manajemen Keluhan')

@push('header-styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css">
    <style>
        .ckeditor {
            width: 100%;
        }

        .ck-editor__editable {
            height: 300px !important;
        }
    </style>
@endpush

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Manajemen Keluhan</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createComplaintModal">Tambah
                        Keluhan</button>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-xl" style="padding-top: 25px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Keluhan</th>
                                    <th>Status Balasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($complaints as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @if (is_null($item->reply))
                                                <span class="badge bg-danger">Pending</span>
                                            @else
                                                <span class="badge bg-success">Sudah Dibalas</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="dropdown dropup">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton-{{ $item->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton-{{ $item->id }}">

                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editComplaintModal{{ $item->id }}">
                                                            Ubah
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#detailComplaintModal{{ $item->id }}">
                                                            Detail
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('complaints.destroy', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus keluhan ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('admin.complaints.edit')

                                    @include('admin.complaints.show')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.complaints.create')

@endsection

@push('scripts')
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
            Heading,
            Alignment,
            List,
            BlockQuote,
            Link,
            Table,
            TableToolbar
        } from 'ckeditor5';

        // Event listener untuk modal yang ditampilkan
        document.addEventListener('shown.bs.modal', (event) => {
            const modal = event.target;
            const textareaId = modal.querySelector('.ckeditor').id;

            // Inisialisasi CKEditor untuk textarea yang sesuai
            ClassicEditor
                .create(document.querySelector(`#${textareaId}`), {
                    plugins: [
                        Essentials, Paragraph, Bold, Italic, Font, Heading, Alignment, List, BlockQuote,
                        Link,
                        Table, TableToolbar
                    ],
                    toolbar: [
                        'undo', 'redo', '|', 'heading', '|', 'bold', 'italic', '|', 'alignment', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                        'bulletedList', 'numberedList', '|', 'blockQuote', 'link', '|',
                        'insertTable', '|', 'imageUpload', '|', 'undo', 'redo'
                    ],
                    image: {
                        toolbar: [
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side',
                            '|',
                            'toggleImageCaption',
                            'imageTextAlternative'
                        ]
                    },
                    table: {
                        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                    }
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
