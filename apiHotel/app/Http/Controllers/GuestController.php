<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Http\Resources\GuestResource;
use App\Guest;

class GuestController extends Controller
{
    /**
     * Exibe todos os hospedes cadastrados
     *
     * @return void
     */
    public function index()
    {
        return GuestResource::collection(Guest::all());
    }

    /**
     * Exibe um hospede com base no parametro recebido, sendo ele nome, documento ou telefone
     *
     * @param [type] $keyword
     * @return void
     */
    public function show($keyword)
    {
        return GuestResource::collection(Guest::where(function ($query) use ($keyword) {
            $query->where('name', 'ilike', '%' . $keyword . '%')
                ->orWhere('document', 'like', '%' . $keyword . '%')
                ->orWhere('telephone', 'like', '%' . $keyword . '%');
        })->get());
    }

    /**
     * Cria um novo hospede
     *
     * @param GuestRequest $request
     * @return void
     */
    public function store(GuestRequest $request)
    {
        $validation = $request->validated();
        Guest::create($validation);

        return $validation;
    }

    /**
     * Atualiza um hospede
     *
     * @param GuestRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(GuestRequest $request, $id)
    {
        $validation = $request->validated();
        Guest::find($id)->update($validation);

        return $validation;
    }

    /**
     * Deleta um hospede
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        Guest::find($id)->delete();

        return response()->json("Hóspede id: $id deletado com sucesso.");
    }
}
