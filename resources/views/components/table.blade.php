@if (session('success'))
    <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
        role="alert">
        <strong class="font-bold">Sukses!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<table class="min-w-full bg-white display" id="myTable">
    {{ $slot }}
</table>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        // Cek jika ada pesan sukses
        var successMessage = $('#success-message');
        if (successMessage.length) {
            // Setelah 3 detik, sembunyikan pesan
            setTimeout(function() {
                successMessage.fadeOut('slow');
            }, 3000); // 3000ms = 3 detik
        }
    });
</script>
