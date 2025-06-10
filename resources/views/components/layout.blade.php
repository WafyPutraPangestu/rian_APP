<!DOCTYPE html>
<html lang="id" class="no-scrollbar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Gamana Krida Bhakti</title>
    <style>
        /* Scrollbar Hidden */
        .no-scrollbar {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }

        /* Header Styling */
        .main-header {
            height: 5rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 50;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Main Content Adjustment */
        .main-content {
            padding-top: 6rem;
            min-height: calc(100vh - 5rem);
        }

        /* Smooth Animations */
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(-10px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes slideRight {
            from { 
                opacity: 0; 
                transform: translateX(-20px); 
            }
            to { 
                opacity: 1; 
                transform: translateX(0); 
            }
        }
        
        @keyframes slideLeft {
            from { 
                opacity: 0; 
                transform: translateX(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateX(0); 
            }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .animate-slideRight {
            animation: slideRight 0.6s ease-out forwards;
        }
        
        .animate-slideLeft {
            animation: slideLeft 0.6s ease-out forwards;
        }

        /* Responsive Navigation */
        @media (max-width: 768px) {
            .main-header {
                height: auto;
                min-height: 4rem;
            }
            .main-content {
                padding-top: 5rem;
            }
        }
    </style>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="no-scrollbar bg-gray-50">
    @unless (request()->routeIs('auth.login') || request()->routeIs('auth.register'))
        <x-navigation/>
    @endunless
    
    <main class="main-content container mx-auto px-4">
        {{ $slot }}
    </main>
</body>
</html>