@extends('layouts.admin')

@section('title', 'Halaman Admin')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0 skill-title">Daftar Skill</h1>

        <div class="d-flex gap-2 align-items-center">
            <input type="text" id="search" class="form-control" placeholder="Cari skill..." style="width: 220px">

            <button id="resetBtn" class="btn btn-secondary" title="Reset">
                <i class="fa fa-refresh"></i>
            </button>
        </div>
    </div>

    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">Tambah Skill Baru</a>

    <div id="skill-wrapper">
        @include('admin.skills.partials.skill-cards', ['skills' => $skills])
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //Konfirmasi hapus pakai SweetAlert
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus skill ini?',
                    text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search');
            const skillWrapper = document.getElementById('skill-wrapper');
            const resetBtn = document.getElementById('resetBtn');

            if (!searchInput) return;

            searchInput.addEventListener('keyup', function() {
                fetchSkills(this.value);
            });

            resetBtn.addEventListener('click', function() {
                searchInput.value = '';
                fetchSkills('');
            });

            function fetchSkills(query) {
                fetch(`/admin/skills?search=${query}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => skillWrapper.innerHTML = html);
            }
        });
    </script>
@endsection
