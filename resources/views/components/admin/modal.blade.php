@php

@endphp
<div x-show="isOpen" class="relative z-10 hidden"
    x-effect="isOpen ? document.getElementById('modalInput').classList.remove('hidden') : document.getElementById('modalInput').classList.add('hidden')"
    aria-labelledby="modal-title" id="modalInput" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-700 bg-opacity-75 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class=" w-[60rem] bg-white relative transform overflow-hidden rounded-lg border border-red-500 text-left shadow-xl transition-all sm:my-8 ">
                <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <x-form>
                        <x-slot:action>/blog/store</x-slot>
                        <div class="grid grid-cols-3 mb-3 gap-3">
                            <div>
                                <label for="penulis_id" class="text-gray-500">Nama Penulis</label><br>
                                <div class="inline-block relative w-full">
                                    <select id="penulis_id" name="penulis_id"
                                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="" selected disabled>- Pilih Penulis</option>
                                        @foreach ($user as $penulis)
                                            <option value="{{ $penulis->id }}">{{ $penulis->name }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="category_id" class="text-gray-500">Kategory</label><br>
                                <div class="inline-block relative w-full">
                                    <select name="category_id" id="category_id"
                                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="" selected disabled>- Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="waktu" class="text-gray-500">Waktu</label><br>
                                <input type="datetime-local" name="waktu" id="waktu"
                                    value="{{ $data->waktu ?? '' }}"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">

                            <div>
                                <label for="judul" class="text-gray-500">Judul</label><br>
                                <input type="text" name="judul" id="judul" value="{{ $data->judul ?? '' }}"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" />
                            </div>
                            <div>

                                <label for="file-input" class="text-gray-500">Choose file</label>
                                <input type="file" name="file_input" id="file-input"
                                    class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                    file:bg-gray-50 file:border-0
                                    file:me-4
                                    file:py-2 file:px-4
                                    dark:file:bg-neutral-700 dark:file:text-neutral-400">
                            </div>
                            <div class="col-span-3">
                                <label for="sinopsis" class="text-gray-500">Sinopsis</label><br>
                                <textarea cols="30" rows="30" name="sinopsis" id="sinopsis"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    {{ $data->sinopsis ?? '' }}
                                </textarea>
                            </div>
                        </div>
                    </x-form>
                </div>
                <div class="bg-gray-300 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="submit"
                        class="inline-flex w-full justify-center rounded-md bg-sky-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Submit</button>
                    <button @click="isOpen = false" type="button"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
