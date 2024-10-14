<x-layout>
    <x-slot:nekat>{{ $title }}</x-slot:nekat>

    <section class="py-5 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="shadow-md border p-5 rounded-xl w-full  bg-white">
                <h2 class="text-2xl font-semibold">{{ Str::apa($post->judul) }}</h2>
                <div class="text-base text-gray-400">
                    <a href="/blog-writer/{{ $post->Penulis->username }}"
                        class="underline hover:text-sky-500 ">{{ Str::apa($post->Penulis->name) }}</a> |
                    {{ date('d F Y H:i:s', strtotime($post->waktu)) }}
                </div>
                <p class="my-5 font-light">
                    {{ strip_tags($post->sinopsis) }}
                </p>
                <a href="#" onclick="history.back()" class=" hover:text-sky-500 text-sm font-normal">&laquo;
                    Back</a>
            </div>
        </div>
    </section>
</x-layout>
