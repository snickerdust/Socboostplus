<div class="bg-white rounded-xl shadow p-6 text-center">
    <h3 class="text-xl font-bold mb-2">
        {{ $title ?? 'Package' }}
    </h3>

    <p class="text-4xl font-extrabold mb-4">
        ${{ number_format((float)$price, 2) }}
    </p>

    <p class="mb-4 text-gray-600">
        {{ $likes ?? 0 }} Likes
    </p>

    <a href="{{ route('checkout', $title) }}"
    class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg">
    Buy Now
    </a>
</div>
