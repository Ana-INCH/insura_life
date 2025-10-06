<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class GlobalDataService
{
    public function getFuneralUserDetails()
    {
        $userId = Auth::id();

        if (!$userId) {
            return $this->defaultFuneralDetails();
        }

        return Cache::remember("funeral_details_{$userId}", 3600, function () {
            $user = Auth::user()->load('funeralHomes'); // Cargar la relación

            $funeralHome = $user->funeralHomes->first();

            return [
                'id' => $funeralHome->id ?? 0,
                'name' => $funeralHome->name ?? 'N/A',
                'address' => $funeralHome->address ?? '',
                'phone' => $funeralHome->phone ?? '',
            ];
        });
    }

    private function extractFuneralDetails($user): array
    {
        return [
            'id' => $user->funeralHome->id ?? 0,
            'name' => $user->funeralHome->name ?? 'N/A',
            'address' => $user->funeralHome->address ?? '',
            'phone' => $user->funeralHome->phone ?? '',
        ];
    }

    private function defaultFuneralDetails(): array
    {
        return [
            'id' => 0,
            'name' => 'N/A',
            'address' => '',
            'phone' => '',
        ];
    }
}
