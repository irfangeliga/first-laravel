<x-template>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign Up to your
                account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/register" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                        Name</label>
                    @error('name')
                        <div class="p-2 bg-red-200 text-red-600 rounded text-[12px]">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-2">
                        <input id="name" value="{{ old('name') }}" name="name" type="text"
                            autocomplete="name" required
                            class="@error('name') border-red-500 @enderror block w-full rounded-md  p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                        Username</label>
                    @error('username')
                        <div class="p-2 bg-red-200 text-red-600 rounded text-[11px]">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-2">
                        <input id="username" value="{{ old('username') }}" name="username" type="text"
                            autocomplete="username" required
                            class="@error('username') border-red-500 @enderror block w-full rounded-md border p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900 ">Email
                        address</label>
                    @error('email')
                        <div class="p-2 bg-red-200 text-red-600 rounded text-[12px]">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-2">
                        <input id="email" value="{{ old('email') }}" name="email" type="email"
                            autocomplete="email" required
                            class="@error('email') border-red-500 @enderror block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                password?</a>
                        </div>
                    </div>
                    @error('password')
                        <div class="p-2 bg-red-200 text-red-600 rounded text-[11px]">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-2">
                        <input id="password" value="{{ old('password') }}" name="password" type="password" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day
                    free
                    trial</a>
            </p>
        </div>
    </div>

</x-template>
