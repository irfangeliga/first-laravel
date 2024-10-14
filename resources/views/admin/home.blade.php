<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="text-start my-5 h-[2rem]">
                    <div x-data="{ isOpen: false }">
                        <button @click="isOpen = true"
                            class=" hover:bg-blue-600 px-3 py-1 text-white border-2   border-blue-200 rounded-md bg-blue-500  transition-all duration-200">Posting
                            <i class="bi bi-clipboard-plus"></i>
                        </button>
                        @php
                            $data = [];
                        @endphp
                        <x-form>
                            <x-slot:action>blog-store</x-slot>
                            <x-admin.modal :data="$data" :categories="$category" :user="$user"></x-admin.modal>
                        </x-form>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-black rounded-lg mb-5">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="border border-slate-200 bg-slate-500 rounded-tl-lg px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    No
                                </th>
                                <th scope="col"
                                    class="border border-slate-200 bg-slate-500 px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Name
                                </th>
                                <th scope="col"
                                    class="border border-slate-200 bg-slate-500 px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Category</th>
                                <th scope="col"
                                    class="border border-slate-200 bg-slate-500 px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Title
                                </th>
                                <th scope="col"
                                    class="border border-slate-200 bg-slate-500 rounded-tr-lg px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-black">
                            @foreach ($posts as $key => $post)
                                @php
                                    $border_start = '';
                                    $border_end = '';
                                    if ($loop->iteration == 10) {
                                        $border_start = 'rounded-bl-lg';
                                        $border_end = 'rounded-br-lg';
                                    }

                                @endphp

                                <tr>
                                    <td
                                        class="border border-slate-200 bg-white {{ $border_start }} px-6 py-4 whitespace-nowrap text-sm font-medium  text-black">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td
                                        class="border border-slate-200 bg-white px-6 py-4 whitespace-nowrap text-sm font-medium  text-black">
                                        {{ $post->penulis->name }}
                                    </td>
                                    <td
                                        class="border border-slate-200 bg-white px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ $post->category->name }}
                                    </td>
                                    <td
                                        class="border border-slate-200 bg-white px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ Str::limit($post->judul, 20) }}
                                    </td>
                                    <td
                                        class="border border-slate-200 bg-white {{ $border_end }} px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <div x-data="{ isOpen: false }">
                                            <a href="/blog-artikel/{{ $post->id }}">
                                                <button type="button"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg px-4 p-1 bg-sky-500 text-white hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </a>
                                            <a href="/artikel-update/{{ $post->id }}">
                                                <button @click="isOpen = true" type="button"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold  rounded-lg px-4 p-1 bg-yellow-500 text-white hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                                    <i class="bi bi-vector-pen"></i>
                                                </button>
                                            </a>
                                            <a href="/artikel-delete/{{ $post->id }}">
                                                <button type="button"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold  rounded-lg px-4 p-1 bg-red-500 text-white hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    @session('notification')
        {{-- @dump(session()->all()) --}}
    @endsession

</x-admin.layout>
