<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;

class EstudianteController extends Controller
{
    //
    public function create(Request $request)
    {
        $estudiantes = new Estudiante();

        $estudiantes->nombre    = $request->input('nombre');
        $estudiantes->apellido  = $request->input('apellido');
        $estudiantes->email     = $request->input('email');
        $estudiantes->password  = $request->input('password');

        $estudiantes->save();

        return response()->json([$estudiantes, 'message' => 'Ingresado con exito'], 201);
    }

    public function lista()
    {
        $estudiantes = Estudiante::all();

        return response()->json([$estudiantes, 'message' => 'Listado de estudiantes'], 202);
    }

    public function ver($id)
    {
        $estudiante = Estudiante::find($id);

        if ($estudiante == null) {

            return response()->json(['message' => "Estudiante no encontrado"], 204);

        } else {
            
            return response()->json([$estudiante, 'message' => "Información del estudiante"], 200);
            
        }
        

        
    }

    public function updatebyid(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        if ($estudiante == null) {

            return response()->json(['message' => "Estudiante no encontrado"], 204);

        } else {
            # code...

            $estudiante->nombre = $request->input('nombre');
            $estudiante->apellido = $request->input('apellido');
            $estudiante->email = $request->input('email');
            $estudiante->password = $request->input('password');
    
            $estudiante->update();
            return response()->json([$estudiante,'message' => "Estudiante Editado"], 200);
        }
     
    }

    public function delete(Request $request, $id)
    {

        $estudiante = Estudiante::find($id);

        if ($estudiante == null) {

            return response()->json(['message' => "Estudiante no encontrado, no se elimino"], 204);

        } else {

            $estudiante->delete();
            return response()->json([$estudiante, 'message' => "Estudiante Eliminado"], 200);
            
        }
     

    }
}
