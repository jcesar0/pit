<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Maintenance;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function create()
    {
        return view('vehicle.vehicle', [
            'vehicles' => Auth::user()->vehicles->all()
        ]);
    }

    /*
     * Pega o usuário e cria um veiculo vinculado a conta dele
     */
    public function store(VehicleRequest $request)
    {
        Auth::user()->vehicles()->create([
            'name' => $request->name,
            'brand' => $request->brand,
            'version' => $request->version
        ]);

        return redirect()->route('vehicle')->with('success_alert', 'Veículo criado com sucesso');
    }

    public function edit(int $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) return redirect()->route('vehicle');

        return view('vehicle.edit', [
            'vehicle' => $vehicle
        ]);
    }

    /*
     * Será verificado se existe um veiculo com esse id nna conta do usuário, caso sim será requisitado e alterado somente os campos
     * name, brand, version
     */
    public function update(int $id, VehicleRequest $request)
    {
        $vehicle = Auth::user()->vehicles();
        if (!$vehicle->find($id))
            return redirect()->route('vehicle')->withErrors('Veículo não encontrado');

        $vehicle->update($request->only(['name', 'brand', '']));
        return redirect()->route('vehicle')->with('success_alert', "Veículo alterado com sucesso");
    }

    /*
     * Verifica se existe um veiculo com id informado, se não tiver irá retornar para rota vehicle com uma msg de erro
     * caso exista irá verificar se veiculo pertece ao usuário, se sim irá tentar destruir todas as manutenções vinculadas ao veículo e depois irá destruir o mesmo,
     * se não for irá retornar para rota vehicle com uma msg de erro
     */
    public function destroy(int $id)
    {
        if (!Vehicle::find($id)) return redirect()->route('vehicle')->withErrors('Veículo não encontrado');

        /** @var Vehicle $vehicle */
        $vehicle = Auth::user()->vehicles()->find($id);
        if ($vehicle)
        {
            DB::beginTransaction();
                foreach ($vehicle->maintenances as $maintenance) {
                    Maintenance::destroy($maintenance->id);
                }
            $vehicle->destroy($id);
            DB::commit();

            return redirect()->route('vehicle')->with('success_alert', "Veículo {$vehicle->name} excluído com sucesso!");
        }

        return redirect()->route('vehicle')->withErrors('Veículo não encontrado');
    }

    /*
     * Retorna os veículos, com ele possui o atributo "week_maintenances" que informa as manutenções de 7 dias
     */
    public function weekMaintenances()
    {
        return Auth::user()->vehicles()->whereHas('maintenances')->get();
    }

}
