<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>



    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg"') }}" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" --}}
    {{-- integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}


    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
    @stack('header-styles')
    {{-- <style>
        .paginate_button {
            display: inline-block;
            padding: 0.5em 1em;
            text-decoration: none;
            background-color: #435ebe;
            color: #fff;
            border: 1px solid #435ebe;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .paginate_button.disabled {
            opacity: 0.5;
            cursor: default;
        }

        .paginate_button.current {
            background-color: #435ebe;
            border-color: #435ebe;
            pointer-events: none;
            cursor: default;
        }

        .paginate_button.previous,
        .paginate_button.next {
            background-color: #435ebe;
        }

        .paginate_button:hover {
            background-color: #526bc8;
            border-color: #526bc8;
        }
    </style> --}}
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="sidebar">
            @include('layouts.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">

                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center"
                        style="padding: 0.5rem 1.5rem!important;">
                        <div class="">
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi fs-3"></i>
                                <h5 class="card-title m-0"></h5>
                            </a>
                            <h5 class="card-title d-none d-xl-block m-0"></h5>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            @if (auth()->user()->role->name == 'user')
                                <div class="dropdown" style="margin-right: 10px; position: relative;">
                                    <i class="bi bi-bell" id="notifDropdown" data-bs-toggle="dropdown"
                                        aria-expanded="false" style="font-size: 20px; position: relative;">
                                        @php
                                            $unreadCount = $announcements->where('is_read', false)->count();
                                        @endphp
                                        @if ($unreadCount > 0)
                                            <span class="badge bg-danger"
                                                style="position: absolute; top: -5px; right: -5px; border-radius: 50%; padding: 3px 8px 3px 5px; font-size:12px;">
                                                {{ $unreadCount }}
                                            </span>
                                        @endif
                                    </i>

                                    {{-- @php
                                        dd($announcements);
                                    @endphp --}}

                                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="notifDropdown">
                                        @forelse ($announcements as $announcement)
                                            <li>
                                                <a class="dropdown-item notification-item" href="#"
                                                    data-message="{{ $announcement->message }}"
                                                    data-created-at="{{ $announcement->created_at }}"
                                                    data-name-produk="{{ $announcement->ikm->nama_produk }}">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between w-100">
                                                        <strong>{{ Str::limit($announcement->message, 50) }}</strong>
                                                        @if (!$announcement->is_read)
                                                            <span
                                                                style="color:red; font-size:10px; margin-right:5px;">●</span>
                                                        @endif
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            <li><a class="dropdown-item" href="#">Tidak ada notifikasi</a></li>
                                        @endforelse
                                        <li class="">
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="">
                                            <form action="{{ route('notifications.markAsRead') }}" method="POST"
                                                class="dropdown-item">
                                                @csrf
                                                <button type="submit"
                                                    style="border: none; background: none; padding: 0;"
                                                    class="dropdown-item">
                                                    <i class="bi bi-check-circle"></i>
                                                    <span>Tandai Semua sebagai Telah Dibaca</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                            @endif

                            <div class="dropdown">
                                <i class="bi bi-person-circle" id="profileDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="font-size: 1.9rem"></i>

                                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="profileDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#profileModal">
                                            Profile
                                        </a>
                                    </li>
                                    <li class="d-none"><a class="dropdown-item" href="#">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" class='dropdown-item'
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- Profile Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>No. Telp:</strong> {{ Auth::user()->no_telp }}</p>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editProfileModal">
                                Edit Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Modal Edit -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if (auth()->user()->role->name == 'user')
                                <form action="{{ route('profile.update') }}" method="POST">
                            @endif
                            @if (auth()->user()->role->name == 'admin')
                                <form action="{{ route('admin-profile.update') }}" method="POST">
                            @endif
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="editName" class="form-label">Nama</label>
                                <input type="text" name="name" id="editName" class="form-control"
                                    value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" name="email" id="editEmail" class="form-control"
                                    value="{{ Auth::user()->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="editNoTelp" class="form-label">No Telepon</label>
                                <input type="text" name="no_telp" id="editNoTelp" class="form-control"
                                    value="{{ Auth::user()->no_telp }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="editPassword" class="form-label">Password</label>
                                <input type="password" name="password" id="editPassword" class="form-control">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah
                                    password.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notificationModalLabel">Detail Notifikasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <strong id="modalMessage"></strong>
                            <p id="modalCreatedAt"></p>
                            <p><strong>Nama Produk:</strong> <a href="{{ route('ikm-registrations.index') }}"><span
                                        id="modalNameProduk"></span></a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">

                @if (session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>

            @include('layouts.footer')
        </div>
    </div>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>

    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>

    {{-- Manual Script --}}
    @stack('scripts')
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah kamu yakin mau hapus data ini?')) {
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "lengthMenu": [5, 10, 50, 100]
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notificationItems = document.querySelectorAll('.notification-item');

            notificationItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();


                    const message = this.getAttribute('data-message');
                    const createdAt = this.getAttribute('data-created-at');
                    const nameProduk = this.getAttribute('data-name-produk');


                    document.getElementById('modalMessage').textContent = message;
                    document.getElementById('modalCreatedAt').textContent =
                        `Dibuat pada: ${new Date(createdAt).toLocaleString()}`;
                    document.getElementById('modalNameProduk').textContent =
                        nameProduk;


                    const modal = new bootstrap.Modal(document.getElementById('notificationModal'));
                    modal.show();
                });
            });
        });
    </script>
    <script>
        item.addEventListener('click', function(e) {
            e.preventDefault();

            fetch('{{ route('notifications.markAsRead') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: this.dataset.id
                    })
                })
                .then(response => response.json())
                .then(data => {

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

</body>

</html>
