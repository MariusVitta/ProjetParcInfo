<x-app-layout>
    <x-slot name="header_content">
        <h1>Accueil</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Accueil</a></div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <x-jet-welcome />
    </div>
</x-app-layout>
