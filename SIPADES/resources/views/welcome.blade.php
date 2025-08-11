<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPADES</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        .bg-image {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: lighten;
        }
    </style>
</head>
<body class="font-[Poppins] min-h-screen flex flex-col bg-image bg-blue-50 bg-opacity-50">

    <!-- Header -->
    <header class="bg-transparent text-white py-4">
        <div class="max-w-6xl mx-4 flex items-center justify-between">
            <div class="flex items-start space-x-3">
                <h1 class="text-5xl font-bold">SIPADES</h1>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-1 flex flex-col items-center justify-center text-center px-6">
        <div class="max-w-3xl bg-white bg-opacity-80 rounded-xl p-8 backdrop-blur-sm shadow-lg">
            <h2 class="text-4xl md:text-5xl font-extrabold text-amber-700 mb-4 mt-4">
                Selamat Datang di 
                <P>SIPADES</P>
            </h2>
            <p class="text-lg text-gray-600 mb-6">
                Kelola dokumen dan arsip desa Anda dengan mudah, cepat, dan aman.
                Sistem ini membantu memastikan setiap informasi tersimpan rapi dan mudah diakses.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ url('/login') }}" class="px-6 py-3 bg-amber-700 text-white font-semibold rounded-lg shadow hover:bg-amber-800 transition">
                    Login
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-transparent text-white text-center py-4 mt-auto">
        <p class="text-sm">&copy; {{ date('Y') }} Arsip Digital Desa. Semua Hak Dilindungi.</p>
    </footer>

</body>
</html>