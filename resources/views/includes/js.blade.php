<script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('js/vendor.bundle.addons.js') }}"></script>
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/file-upload.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script>
    @if (\Session::has('success'))
    Swal.fire({
        title: 'Sucesso!',
        text: "{{ \Session::get('success') }}",
        icon: 'success',
        confirmButtonColor: '#3085D6',
        confirmButtonText: 'Ok!'
    });
    @endif
    @if (\Session::has('error'))
    Swal.fire({
        title: 'Erro!',
        text: "{{ \Session::get('error') }}",
        icon: 'error',
        confirmButtonColor: '#3085D6',
        confirmButtonText: 'Ok!'
    });
    @endif

    $('.delete').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Tem certeza que quer deletar esse item?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#DD3333',
            confirmButtonText: 'Sim, quero deletar!',
            cancelButtonText: 'Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(e.target).closest('form').submit()
            }
        })
    });
</script>
