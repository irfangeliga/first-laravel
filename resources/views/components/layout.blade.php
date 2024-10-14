<x-template>
    <x-slot:title>{{ Str::apa($nekat) }}</x-slot:title>
    <x-navbar></x-navbar>
    <x-header>{{ Str::apa($nekat) }}</x-header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</x-template>
