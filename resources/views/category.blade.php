<x-layout>
    <x-slot:nekat>{{ $title . ' Category' }}</x-slot:nekat>
    <section class="py-24 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between gap-8">
                <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-8 w-full">
                    @foreach ($category->Post as $post)
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
                            <div class="p-3 mt-auto text-[14px]">
                                <a href="/blog-writer/{{ $post->Penulis->username }}"
                                    class="hover:text-blue-500 font-semibold">
                                    <div class="flex gap-2">
                                        <div class="mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                            </svg>
                                        </div>
                                        <div>
                                            By {{ $post->Penulis->name }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
