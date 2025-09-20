<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
        
        .drop-shadow-transparent {
            filter: drop-shadow(15px 15px 20px rgba(190, 184, 184, 0.3));
        }
        
        .header-gradient {
            background: linear-gradient(90deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.8) 100%);
        }
        
        .card-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        @media (max-width: 767px) {
            .drop-shadow-transparent {
                filter: drop-shadow(5px 5px 8px rgba(0, 0, 0, 0.2));
            }
            
            .header-gradient {
                border-radius: 0 0 1rem 1rem;
            }
        }
        
        @media (max-width: 640px) {
            .logo-container {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>

<body class="font-[Poppins] min-h-screen flex flex-col bg-image">

    <!-- Header -->
    <header class="sticky top-0 z-10 bg-transparent text-white py-2 sm:py-3 shadow-sm">
        <div class="w-full md:max-w-2xl xl:max-w-4xl mx-auto flex items-center justify-between header-gradient rounded-r-full md:rounded-full px-2 sm:px-4 transition-all duration-300">
            <!-- Left Logo -->
            <div class="flex items-center">
                <img src="/images/logo-kkn.png" alt="Logo Desa" 
                     class="h-8 xs:h-10 sm:h-12 md:h-14 w-auto transition-all duration-300">
            </div>
            
            <!-- Center Title -->
            <div class="flex flex-col text-center px-1 sm:px-2 md:px-4">
                <h1 class="text-xl xs:text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 leading-tight">SIPADES</h1>
                <p class="text-xs xs:text-sm sm:text-base md:text-lg text-gray-600">Sistem Pengelolaan Aset Desa</p>
            </div>
            
            <!-- Right Logo -->
            <div class="flex items-center">
                <img src="/images/logo-kabupaten.png" alt="Logo Kabupaten" 
                     class="h-8 xs:h-10 sm:h-12 md:h-14 w-auto transition-all duration-300">
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-1 flex flex-col md:flex-row items-center justify-center  px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8 gap-4 sm:gap-6 md:gap-8 ">
        <!-- Image with transparent shadow - Now on the left -->
        {{-- <div class="w-full md:w-1/2 xl:w-2/5 flex justify-start md:pl-7 order-1 md:order-1">
            <img src="/images/mumin.png" alt="Desa Illustration" 
                 class="drop-shadow-transparent h-auto max-h-48 xs:max-h-56 sm:max-h-64 md:max-h-72 lg:max-h-80 xl:max-h-96 rounded-lg transition-all duration-300 hover:scale-[1.02] ml-0 md:-ml-4 lg:-ml-8">
        </div> --}}
        
        <!-- Welcome Card - Now on the right -->
        <div class="w-full md:w-1/2 xl:w-2/5 card-glass rounded-xl p-4 sm:p-6 md:p-8 shadow-xl transform transition-all duration-300 hover:scale-[1.01] ">
            <h2 class="text-2xl sm:text-3xl md:text-4xl xl:text-5xl font-extrabold text-amber-700 mb-3 sm:mb-4 leading-snug">
                Selamat Datang di<br>
                <span class="text-amber-800">SIPADES</span>
            </h2>
            <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-4 sm:mb-6 leading-relaxed">
                Kelola dokumen dan arsip desa Anda dengan mudah, cepat, dan aman.
                Sistem ini membantu memastikan setiap informasi tersimpan rapi dan mudah diakses.
            </p>

            <div class="flex flex-wrap justify-center sm:justify-start gap-3 sm:gap-4">
                <a href="{{ url('/login') }}"
                    class="px-5 py-2 sm:px-6 sm:py-3 bg-amber-700 hover:bg-amber-800 text-white text-sm sm:text-base font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:ring-opacity-50">
                    Login
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-black text-center">
        <div class="container mx-auto px-4">
            <p class="text-xs sm:text-sm mb-3 text-white">&copy; Mahasiswa KKN Politeknik LP3I Tahun 2025 - SIPADES (Sistem Pengelolaan Aset Desa). All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>