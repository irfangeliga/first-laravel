<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class=" mx-auto py-5 px-12 bg-white rounded">
        <h1 class="text-2xl text-black font-bold mb-10"><u>UPDATE ARTIKEL</u></h1>
        <x-form>
            <x-slot:action>/artikel-update</x-slot>
            <div class="grid grid-cols-5 gap-4">
                <div>
                    <label for="penulis_id" class="text-gray-500">Nama Penulis</label><br>
                    <div class="inline-block relative w-full">
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <select id="penulis_id" name="penulis_id"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" selected disabled>- Pilih Penulis</option>
                            @foreach ($users as $penulis)
                                <option value="{{ $penulis->id }}"
                                    @php if ($post->penulis_id == old('penulis_id',$penulis->id)) echo 'selected' @endphp>
                                    {{ $penulis->name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="category_id" class="text-gray-500">Kategory</label><br>
                    <div class="inline-block relative w-full">
                        <select name="category_id" id="category_id"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" selected disabled>- Pilih Kategori -</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @php if (old('category_id', $post->category_id) == $category->id) echo 'selected' @endphp>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="judul" class="text-gray-500">Judul</label><br>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $post->judul) }}"
                        class="@error('judul') border border-red-500 @enderror block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div>
                    <label for="waktu" class="text-gray-500">Waktu</label><br>
                    <input type="datetime-local" name="waktu" id="waktu"
                        value="{{ date('Y-m-d H:i', strtotime(old('waktu', $post->waktu))) }}"
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div class="col-span-5">
                    <label for="sinopsis" class="text-gray-500">Sinopsis</label><br>
                    <textarea cols="30" rows="100" name="sinopsis" id="sinopsis"
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    {{ old('sinopsis', $post->sinopsis) }}
                    </textarea>
                </div>
                <div class="text-end col-span-5">
                    <button type="submit"
                        class="hover:bg-blue-600 px-5 py-1 text-white border-2   border-blue-200 rounded-md bg-blue-500  transition-all duration-200">Saved
                    </button>
                </div>
            </div>
        </x-form>
    </div>
</x-admin.layout>
