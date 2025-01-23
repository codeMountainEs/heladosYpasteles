<div>
    <!-- Hero Section -->
    <div class="relative h-[600px]">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1486427944299-d1955d23e34d" 
                 alt="Bakery Background" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Las Mejores Pastelerías</h1>
            <p class="text-xl md:text-2xl">Descubre sabores únicos en tu ciudad</p>
        </div>
    </div>

    <!-- Bakeries Grid -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($bakeries as $bakery)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                

                         @foreach($bakery['images'] as $image)
    <img src="{{ asset('storage/' . $image['image_path']) }}" alt="{{ $image['title'] }}">

@endforeach
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $bakery['name'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $bakery['description'] }}</p>
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-2">{{ 4.8 }}/5.0</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $bakery['address'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
