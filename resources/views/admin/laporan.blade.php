<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - PPDB Pondok Pesantren</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <header class="bg-white shadow-sm">
                <div class="px-8 py-6">
                    <h2 class="text-2xl font-bold text-gray-900">Laporan</h2>
                    <p class="text-gray-600">Export dan cetak laporan pendaftaran</p>
                </div>
            </header>

            <div class="p-8">
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fitur Laporan</h3>
                    <p class="text-gray-600">Fitur ini akan segera hadir. Anda akan dapat mengekspor dan mencetak laporan pendaftaran.</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
