@section('scripts')
    {{-- TYPING EFFECT DI HOME --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const texts = @json($headlines ?? []);
            const defaultTexts = ['Graphic Designer', 'Web Developer', 'Fresh Graduate'];
            const finalTexts = texts.length > 0 ? texts : defaultTexts;

            let index = 0;
            let charIndex = 0;
            let isDeleting = false;
            const el = document.getElementById('typing-text');

            function typeEffect() {
                const current = finalTexts[index];

                el.textContent = isDeleting ?
                    current.substring(0, charIndex--) :
                    current.substring(0, charIndex++);

                if (!isDeleting && charIndex === current.length) {
                    setTimeout(() => isDeleting = true, 1200);
                }

                if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    index = (index + 1) % finalTexts.length;
                }

                setTimeout(typeEffect, isDeleting ? 60 : 100);
            }

            typeEffect();
        });
    </script>

    {{-- FILTER PROJECT --}}
    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');
                document.querySelectorAll('.project-card').forEach(card => {
                    if (filter === 'all' || card.classList.contains(filter)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>

    {{-- SCROLL REVEAL ANIMATION --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });
    </script>

    {{-- FORM PESAN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('messageForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = this;
            const btn = form.querySelector('button');
            const originalContent = btn.innerHTML;

            const messageText = form.querySelector('textarea[name="message"]').value;
            if (messageText.length < 10) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Pesan Terlalu Singkat',
                    text: 'Tulis minimal 10 karakter ya, supaya Shofia lebih paham maksudmu.',
                    confirmButtonColor: '#4f46e5'
                });
                return;
            }

            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-circle-notch animate-spin"></i> Mengirim...';

            try {
                const response = await fetch("{{ route('message.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: new FormData(form)
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Terkirim!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        background: '#18181b',
                        color: '#fff'
                    });
                    form.reset();
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengirim',
                    text: error.message || 'Cek koneksi internet atau coba lagi nanti.',
                    confirmButtonColor: '#ef4444',
                    background: '#18181b',
                    color: '#fff'
                });
            } finally {
                btn.disabled = false;
                btn.innerHTML = originalContent;
            }
        });
    </script>
@endsection