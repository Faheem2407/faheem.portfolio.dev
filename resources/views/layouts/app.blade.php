<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Faheem Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        #progress-bar {
            transition: width 0.2s ease-out;
        }
    </style>

</head>
<body class="bg-[#0f172a] text-gray-100 antialiased flex flex-col min-h-screen">

    <!-- Floating Header -->
    <header class="fixed top-0 left-0 w-full bg-gray-900/70 backdrop-blur-md z-50">
        <nav class="flex justify-center gap-8 py-4 text-lg font-medium">
            <a href="#home" class="hover:text-pink-500 transition-colors">Home</a>
            <a href="#about" class="hover:text-pink-500 transition-colors">About</a>
            <a href="#skills" class="hover:text-pink-500 transition-colors">Skills</a>
            <a href="#projects" class="hover:text-pink-500 transition-colors">Projects</a>
            <a href="#resume" class="hover:text-pink-500 transition-colors">Resume</a>
            <a href="#contact" class="hover:text-pink-500 transition-colors">Contact</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-1 pt-24">
        @yield('content')
    </main>

    <!-- Floating Footer -->
    <footer class="w-full py-6 text-center border-t border-gray-700 mt-12 text-gray-400">
        Developed by 
        <a href="https://github.com/Faheem2407" target="_blank" class="hover:text-pink-500 transition-colors">Faheem</a>
    </footer>

    <!-- Scripts for animations and typing effect -->
    <script>
        // Fade-in on scroll
        const faders = document.querySelectorAll('.fade-in');
        const appearOptions = {
            threshold: 0.1
        };
        const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
            entries.forEach(entry => {
                if(!entry.isIntersecting) return;
                entry.target.classList.add('visible');
                appearOnScroll.unobserve(entry.target);
            });
        }, appearOptions);
        faders.forEach(fader => appearOnScroll.observe(fader));

        // Typing effect
        const typedText = "Laravel Developer | Backend Specialist | Problem Solver";
        const typingElement = document.querySelector('#typing-role');
        let i = 0;
        function typeEffect() {
            if (i < typedText.length) {
                typingElement.innerHTML += typedText.charAt(i);
                i++;
                setTimeout(typeEffect, 60);
            }
        }
        if (typingElement) typeEffect();
    </script>
    
    <!-- Scroll Progress -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-pink-500 z-50 w-0"></div>

    <script>
        const progressBar = document.getElementById('progress-bar');
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.body.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            progressBar.style.width = scrollPercent + "%";
        });
    </script>
</body>
</html>
