<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaintenanceRequest;
use App\Models\Maintenance;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function create(int $vehicleId)
    {
        $vehicle = Vehicle::find($vehicleId);

        if (!$vehicle)
            return redirect()->route('home');

        return view('maintenance.create', [
            'vehicle' => $vehicle
        ]);
    }

    /*
     * Verifica se o veículo existe, caso sim irá criar uma nova manutenção
     */
    public function store(int $vehicleId, MaintenanceRequest $request)
    {
        $vehicle = Vehicle::find($vehicleId);

        if (!$vehicle)
            return redirect()->route('home');

        $vehicle->maintenances()->create([
            'name' => $request->name,
            'days_remaining' => $request->days_remaining
        ]);

        return redirect()->route('vehicle')->with('success_alert', 'A manutenção foi agendada com sucesso!');
    }

    /*
     * Irá procurar a manutenção a partir dos veículos do usuário, caso encontre irá dar destroy
     */
    public function destroy(int $vehicleId, int $maintenanceId)
    {
        $vehicle = Auth::user()->vehicles()->find($vehicleId)->maintenances()->find($maintenanceId);
        if (!$vehicle)
            return redirect()->route('vehicle')->withErrors('Manutenção não encontrada');

        Maintenance::destroy($maintenanceId);
        return redirect()->route('vehicle')->with('success_alert', "Manutenção removida com sucesso!");
    }

    public function edit(int $vehicleId, int $maintenanceId)
    {
        $vehicle = Auth::user()->vehicles()->find($vehicleId);
        $maintenance = $vehicle->maintenances()->find($maintenanceId);

        if (!$vehicle || !$maintenance)
            return redirect()->route('home');

        return view('maintenance.edit', [
            'vehicle' => $vehicle,
            'maintenance' => $maintenance
        ]);
    }

    /*
     * Tentará encotnrar a manutenção a partir dos veiculos do usuário, caso enconte irá requisitar somente
     * name e days_remaining e atualizar os dados
     */
    public function update(int $vehicleId, int $maintenanceId, MaintenanceRequest $request)
    {
        $vehicle = Auth::user()->vehicles()->find($vehicleId);
        $maintenance = $vehicle->maintenances()->find($maintenanceId);

        if (!$vehicle || !$maintenance)
            return redirect()->route('home');

        $maintenance->update($request->only(['name', 'days_remaining']));
        return redirect()->route('vehicle')->with('success_alert', "Manutenção alterada com sucesso");
    }

}
