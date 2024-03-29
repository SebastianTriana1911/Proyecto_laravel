<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\CandidatoExperiencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCandidatoExperiencia;
use App\Http\Requests\UpdateCandidatoExperiencia;

class CandidatoExperienciaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $candidato = $user->candidato;
        $titulo = '';

        if ($user->genero == 'Masculino') {
            $titulo = 'Señor';
        } else {
            $titulo = 'Señora';
        }

        $experiencias = $candidato->candidatoExperiencia;


        return view('candidatoExperiencia.index', [
            'titulo' => $titulo,
            'candidato' => $candidato, 'experiencias' => $experiencias
        ]);
    }


    public function store(StoreCandidatoExperiencia $request, $id)
    {
        $candidatoExperiencia = new CandidatoExperiencia();
        $candidatoExperiencia->nombre_empresa = $request->nombre_empresa;
        $candidatoExperiencia->meses = $request->meses;
        $candidatoExperiencia->descripcion = $request->descripcion;
        $candidatoExperiencia->año_inicio = $request->año_inicio;
        $candidatoExperiencia->año_finalizacion = $request->año_finalizacion;
        $candidatoExperiencia->candidato_id = $id;


        // Crear objetos DateTime a partir de las cadenas de fecha
        $fechaInicio = new DateTime($request->año_inicio);
        $fechaFin = new DateTime($request->año_finalizacion);

        // Calcular la diferencia entre las fechas
        $diferencia = $fechaInicio->diff($fechaFin);

        // Obtener los valores individuales
        $meses = $diferencia->y * 12 + $diferencia->m;
        if ($request->hasFile('certificacion_laboral')) {
            $documento = $request->file('certificacion_laboral');
            $documentoNombre = $documento->getClientOriginalName();
            $documento->storeAs('public', $documentoNombre);
            $ruta = $documentoNombre;
            $candidatoExperiencia->certificacion_laboral = $ruta;
            if ($request->meses == $meses) {
                $candidatoExperiencia->save();
                return redirect()->back();
            } else {
                return redirect()->back();
            }

            // Si la condicional da que no se a subido ningun archivo entonces ese
            // campo quedara como nulo
        } else {
            $candidatoExperiencia->certificacion_laboral = null;
            $candidatoExperiencia->save();
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $candidatoExperiencia = CandidatoExperiencia::find($id);
        $user = Auth::user();
        $candidato = $user->candidato;

        return view('candidatoExperiencia.edit', [
            'candidatoExperiencia' => $candidatoExperiencia,
            'candidato' => $candidato
        ]);
    }


    public function update(UpdateCandidatoExperiencia $request, $id)
    {
        $candidatoExperiencia = CandidatoExperiencia::find($id);
        $candidatoExperiencia->nombre_empresa = $request->nombre_empresa;
        $candidatoExperiencia->meses = $request->meses;
        $candidatoExperiencia->año_inicio = $request->año_inicio;
        $candidatoExperiencia->año_finalizacion = $request->año_finalizacion;
        $candidatoExperiencia->descripcion = $request->descripcion;

        // Crear objetos DateTime a partir de las cadenas de fecha
        $fechaInicio = new DateTime($request->año_inicio);
        $fechaFin = new DateTime($request->año_finalizacion);

        // Calcular la diferencia entre las fechas
        $diferencia = $fechaInicio->diff($fechaFin);

        // Obtener los valores individuales
        $meses = $diferencia->y * 12 + $diferencia->m;



        if ($request->certificacion_laboral != null) {
            if ($request->certificacion_laboral != $candidatoExperiencia->certificacion_laboral) {
                $urlOriginal = $candidatoExperiencia->certificacion_laboral;
                $rutaArchivo = 'public/' . $urlOriginal;
                $rutaArchivoCodificada = rawurldecode($rutaArchivo);
                Storage::delete($rutaArchivoCodificada);
                $candidatoExperiencia->delete();
            }
            if ($request->hasFile('certificacion_laboral')) {
                $documento = $request->file('certificacion_laboral');
                $documentoNombre = $documento->getClientOriginalName();
                $documento->storeAs('public', $documentoNombre);
                $ruta = $documentoNombre;
                $candidatoExperiencia->certificacion_laboral = $ruta;
                if ($request->meses == $meses) {
                    $candidatoExperiencia->save();
                    return redirect()->back();
                } else {
                    return redirect()->back();
                }
            }
        }else{
            $candidatoExperiencia->save();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $candidatoExperiencia = CandidatoExperiencia::find($id);
        // Se elimina la imagen que haya en la carpeta storage con la ruta que haya en el campo
        $urlOriginal = $candidatoExperiencia->certificacion_laboral;
        $rutaArchivo = 'public/' . $urlOriginal;
        $rutaArchivoCodificada = rawurldecode($rutaArchivo);
        Storage::delete($rutaArchivoCodificada);
        $candidatoExperiencia->delete();

        return redirect()->back();
    }
}
