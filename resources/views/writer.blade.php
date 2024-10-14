<x-layout>
    <x-slot:nekat>{{ 'Article By ' . $penulis->name }}</x-slot:nekat>
    <section class="py-24 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between gap-8">
                <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-8 w-full">
                    @foreach ($penulis->Post as $post)
                        <div class="shadow-md border p-5 rounded-xl w-full  group flex flex-col bg-white">
                            <div class="flex flex-row gap-4">
                                <div class="basis-1/4 grow h-10 text-start text-[13px]">
                                    <small class="p-2">{{ Str::apa($post->created_at->diffForHumans()) }}</small>
                                </div>
                                <div class="basis-1/2 grow h-10 text-end  text-[13px]">
                                    <a href="/blog-category/{{ $post->Category->id }}" class="hover:text-white ">
                                        <small
                                            class="p-2 bg-blue-200 transition-all duration-300 hover:bg-blue-900 rounded ">
                                            {{ Str::apa($post->Category->name) }}
                                        </small>
                                    </a>
                                </div>
                            </div>
                            <div class="p-3">
                                <a href="/blog-artikel/{{ $post->id }}" class="hover:text-blue-500">
                                    <div class="text-lg  font-medium leading-7 transition-all duration-300">
                                        {{ Str::apa($post->judul) }}</div><br>
                                    <div class=" leading-6 transition-all duration-300 mb-8 text-[14px]">
                                        {{ Str::limit(strip_tags($post->sinopsis), 150) }}
                                    </div>
                                </a>
                            </div>
                            <div class="p-4 mt-auto">
                                <a href="/blog-artikel/{{ $post->id }}"
                                    class="cursor-pointer flex items-center gap-2 text-sm text-indigo-700 ">
                                    Read more<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.25 6L13.25 6M9.5 10.5L13.4697 6.53033C13.7197 6.28033 13.8447 6.15533 13.8447 6C13.8447 5.84467 13.7197 5.71967 13.4697 5.46967L9.5 1.5"
                                            stroke="#4338CA" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
