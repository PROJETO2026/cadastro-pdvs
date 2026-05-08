<?php

namespace App\Http\Controllers;

use App\Models\Pdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdvController extends Controller
{
    public function index()
    {
        $pdvs = Pdv::with('menuItems')->latest()->get();

        return view('pdvs.index', compact('pdvs'));
    }

    public function create()
    {
        return view('pdvs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'testeira' => ['required', 'string', 'max:255'],
            'responsavel_nome' => ['required', 'string', 'max:255'],
            'responsavel_email' => ['required', 'email', 'max:255'],

            'cardapio' => ['required', 'array', 'min:1'],
            'cardapio.*.categoria' => ['required', 'string', 'max:255'],
            'cardapio.*.produto' => ['required', 'string', 'max:255'],
            'cardapio.*.preco' => ['required', 'numeric', 'min:0'],
        ]);

        DB::transaction(function () use ($validated) {
            $pdv = Pdv::create([
                'nome' => $validated['nome'],
                'testeira' => $validated['testeira'],
                'responsavel_nome' => $validated['responsavel_nome'],
                'responsavel_email' => $validated['responsavel_email'],
            ]);

            foreach ($validated['cardapio'] as $item) {
                $pdv->menuItems()->create($item);
            }
        });

        return redirect()
            ->route('pdvs.index')
            ->with('success', 'PDV cadastrado com sucesso!');
    }
}