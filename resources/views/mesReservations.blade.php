@extends('layout.header')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
        <!-- En-tête de page -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Mes Réservations</h1>
                    <p class="text-gray-500 mt-1">Consultez vos réservations de terrains</p>
                </div>
            </div>
            
        </div>

        <!-- Notifications -->
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-md shadow-sm flex items-start">
            <div class="flex-shrink-0">
                <i class="fas fa-check-circle text-green-500 text-xl"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm text-green-700">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <!-- Contenu principal -->
        @if($reservations->isEmpty())
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-md shadow-sm flex items-start">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-500 text-xl"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm text-blue-700">Vous n'avez pas encore de réservations.</p>
                <p class="text-sm text-blue-600 mt-2">
                    <a href="{{ route('terrains') }}" class="font-medium hover:underline">
                        <i class="fas fa-search mr-1"></i> Découvrir les terrains disponibles
                    </a>
                </p>
            </div>
        </div>
        @else
        <!-- Tableau des réservations -->
        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Terrain
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Horaire
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Région
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ville
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prix
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($reservations as $reservation)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">{{ $reservation->terrain->nom }}</div>
                                        <div class="text-xs text-gray-500">{{ $reservation->terrain->type }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ substr($reservation->heure_debut, 0, 5) }} - {{ substr($reservation->heure_fin, 0, 5) }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ \Carbon\Carbon::parse($reservation->heure_debut)->diffInMinutes(\Carbon\Carbon::parse($reservation->heure_fin)) }} minutes
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $reservation->terrain->region->nom }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $reservation->terrain->region->ville->nom }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-green-600">{{ $reservation->montant }} DH</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('mesReservations.destroy', $reservation->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm font-medium transition-colors duration-150">
                                        <i class="fas fa-times mr-1"></i> Annuler
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $reservations->links('pagination::tailwind') }}
        </div>

        @endif
    </div>
</div>
<!-- Footer -->
@include('layout.footer')
@endsection