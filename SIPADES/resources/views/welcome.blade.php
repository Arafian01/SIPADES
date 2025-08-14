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

<body class="font-[Poppins] min-h-screen flex flex-col bg-image bg-opacity-50">

    <!-- Header -->
    <header class="bg-transparent text-white py-4">
        <div class="max-w-xl flex items-center justify-between bg-white bg-opacity-80 rounded-r-full">
            <div class="flex items-center">
            <!-- Logos with capsule background -->
            <div class="ml-5 mt-3 mb-3 flex items-center space-x-4 px-6 py-2">
                <!-- First Logo -->
                <div class="flex items-center">
                    <img src="/images/logo-kkn.png" alt="Logo Desa" class="h-16 w-aut700">
                </div>
                
                <!-- Second Logo -->
                <div class="flex items-center">
                    <img src="/images/logo-kabupaten.png" alt="Logo Kabupaten" class="h-16 w-auto">
                </div>
            </div>

            <!-- Text Title -->
            <div class="flex flex-col text-black">
                <h1 class="text-5xl font-bold">SIPADES</h1>
                <p class="text-xl">Sistem Pengelolaan Aset Desa</p>
            </div>
        </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-1 flex flex-col items-end justify-center mr-4 text-center px-6">
        <div class="max-w-3xl bg-white bg-opacity-80 rounded-xl p-8 backdrop-blur-sm shadow-lg">
            <h2 class="text-5xl md:text-6xl font-extrabold text-amber-700 mb-4 mt-4">
                Selamat Datang di
                <P>SIPADES</P>
            </h2>
            <p class="text-lg text-black mb-6">
                Kelola dokumen dan arsip desa Anda dengan mudah, cepat, dan aman.
                Sistem ini membantu memastikan setiap informasi tersimpan rapi dan mudah diakses.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ url('/login') }}"
                    class="px-6 py-3 bg-amber-700 text-white text-lg font-semibold rounded-lg shadow hover:bg-amber-800 transition">
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
