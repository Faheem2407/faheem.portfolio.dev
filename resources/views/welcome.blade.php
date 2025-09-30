@extends('layouts.app')

@section('content')

@if(session('t-success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-transition:enter="transform transition ease-out duration-500"
        x-transition:enter-start="translate-x-40 opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transform transition ease-in duration-500"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="translate-x-40 opacity-0"
        x-init="setTimeout(() => show = false, 4000)" 
        class="fixed top-5 left-5 bg-green-600 text-pink-500 px-6 py-4 rounded-xl shadow-lg z-50 flex items-center gap-2"
    >
        <!-- Success Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.704 5.293a1 1 0 010 1.414L8.414 15 5 11.586a1 1 0 011.414-1.414L8.414 12.172l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span>{{ session('t-success') }}</span>
    </div>
@endif



<!-- Hero Section -->
<section id="home" class="hero text-center py-32 bg-gradient-to-br from-gray-900 to-gray-800 text-gray-100 fade-in">
    <h2 class="text-5xl font-bold mb-4">{{ $intro->title }}<span class="text-pink-500"> {{ $intro->subtitle }}</span></h2>
    <p id="typing-role" class="text-xl mb-6"></p>
    <a href="#projects" class="px-6 py-3 bg-pink-500 rounded hover:bg-pink-600 transition-colors">View My Work</a>
</section>

<!-- About Section -->
<section id="about" class="about py-20 text-center max-w-4xl mx-auto px-4 text-gray-300 fade-in">
    <h2 class="text-3xl font-bold text-pink-500 mb-6">About Me</h2>
    <img src="{{ asset($about->image) }}" alt="Profile Picture" class="w-36 h-36 mx-auto rounded-full border-4 border-pink-500 mb-6">
    <p class="text-gray-300 text-lg">
        {!! $about->description !!}
    </p>
</section>
<!-- About Section -->


<section id="skills" class="py-20 max-w-5xl mx-auto px-4 fade-in">
    <h2 class="text-3xl font-bold text-pink-500 text-center mb-12">Speciality & Skills</h2>
    <div class="flex flex-wrap justify-center gap-4 max-w-4xl mx-auto px-4">
        @foreach($skills as $skill)
            <div class="bg-gray-800 px-4 py-2 rounded shadow font-medium transform transition-transform hover:scale-105 hover:bg-pink-500 hover:text-white cursor-default">
                {{ $skill->title }}
            </div>
        @endforeach
    </div>   
</section>


<!-- Projects Section -->
<section id="projects" class="py-20 max-w-5xl mx-auto px-4 fade-in">
    <h2 class="text-3xl font-bold text-pink-500 text-center mb-12">Projects</h2>
    <div class="grid md:grid-cols-2 gap-8">
        @foreach($projects as $project)
        <a href="{{ $project['link'] }}" target="_blank" class="group">
            <div class="project relative bg-gray-800 rounded shadow overflow-hidden hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-pink-500 text-xl font-semibold mb-2 group-hover:underline">{{ $project->title }}</h3>
                    <p class="text-gray-300 text-sm">
                        {!! \Illuminate\Support\Str::limit($project->description, 100) !!}
                    </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>

<!-- Resume Section -->
<section id="resume" class="py-20 fade-in bg-gray-900">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-pink-500 mb-4">{{ $resume->title }}</h2>
        <p class="text-gray-300 mb-8 text-lg">
            {{ $resume->sub_title }}
        </p>
            <div class="flex items-center justify-center gap-4">
                
                <a href="{{ asset($resume->file) }}" download class="px-6 py-3 bg-pink-500 text-white rounded-lg font-semibold hover:bg-pink-600 transition-colors">
                    Download Resume
                </a>

            </div>

        <p class="text-gray-400 mt-4 text-sm">
            PDF format | Last updated: <span class="text-pink-500">{{ $resume->updated_year }}</span>
        </p>
    </div>
</section>


<!-- Contact Section -->
<section id="contact" class="py-20 max-w-md mx-auto px-4 text-gray-100 fade-in">
    <h2 class="text-3xl font-bold text-pink-500 text-center mb-6">Contact Me</h2>
    <form action="{{ route('contact.send') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <input type="text" name="name" placeholder="Your Name" class="p-3 rounded bg-gray-800 text-gray-100" required>
        <input type="email" name="email" placeholder="Your Email" class="p-3 rounded bg-gray-800 text-gray-100" required>
        <textarea name="message" placeholder="Your Message" class="p-3 rounded bg-gray-800 text-gray-100" required></textarea>
        <button type="submit" class="px-6 py-3 bg-pink-500 rounded hover:bg-pink-600 transition-colors">Send Message</button>
    </form>
</section>
@endsection
