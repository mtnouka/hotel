<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckinRequest;
use App\Http\Resources\CheckinResource;
use App\Checkin;

class CheckinController extends Controller
{
    /**
     * Lista todos os hospedes
     *
     * @return void
     */
    public function index()
    {
        return CheckinResource::collection(Checkin::all());
    }

    /**
     * Exibe um hospede com base no parametro informado
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        return new CheckinResource(Checkin::find($id));
    }

    /**
     * Realiza o checkin do hospede
     *
     * @param CheckinRequest $request
     * @return void
     */
    public function store(CheckinRequest $request)
    {
        $validation = $request->validated();
        Checkin::create($validation);

        return $validation;
    }

    /**
     * Atualiza o checkin e/ou realiza o checkout
     *
     * @param CheckinRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(CheckinRequest $request, $id)
    {
        $validation = $request->validated();
        Checkin::find($id)->update($validation);

        return $validation;
    }

    /**
     * Deleta o checkin
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        Checkin::find($id)->delete();

        return response()->json("Checkin id $id deletado com sucesso.");
    }
}
