<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' لوحة التحكم بالرد') }}
        </h2>
    </x-slot>
    <br>
    <main>
        <div class="features">
            <div class="container">
        <div class="box" style="width: 100%;">
            <div class="field">

    @livewire('table-words')
            </div>
        </div></div></div>
    </main>
</x-app-layout>
