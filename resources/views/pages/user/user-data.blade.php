<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Données administrateur') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Administrateur</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Données administrateur</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user" :model="$user" />
    </div>
</x-app-layout>
