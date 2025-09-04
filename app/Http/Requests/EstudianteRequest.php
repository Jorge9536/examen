<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Para crear (store) y actualizar (update) usamos diferentes reglas
        if ($this->isMethod('post')) {
            // Reglas para crear nuevo estudiante
            return [
                'nombres' => 'required|string|max:16',
                'apellidos' => 'required|string|max:16',
                'carnet_identidad' => 'required|string|max:10|unique:estudiantes,carnet_identidad',
                'edad' => 'required|integer|min:16|max:70',
                'fecha_nacimiento' => 'required|date|before:today',
                'email' => 'required|email|max:30|unique:estudiantes,email',
                'estado' => 'sometimes|boolean'
            ];
        } else {
            // Reglas para actualizar estudiante existente
            $estudianteId = $this->route('estudiante')->id;

            return [
                'nombres' => 'required|string|max:16',
                'apellidos' => 'required|string|max:16',
                'carnet_identidad' => 'required|string|max:10|unique:estudiantes,carnet_identidad,' . $estudianteId,
                'edad' => 'required|integer|min:16|max:70',
                'fecha_nacimiento' => 'required|date|before:today',
                'email' => 'required|email|max:30|unique:estudiantes,email,' . $estudianteId,
                'estado' => 'sometimes|boolean'
            ];
        }
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nombres.required' => 'El campo nombres es obligatorio.',
            'nombres.max' => 'Los nombres no pueden tener más de 16 caracteres.',
            
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.max' => 'Los apellidos no pueden tener más de 16 caracteres.',
            
            'carnet_identidad.required' => 'El carnet de identidad es obligatorio.',
            'carnet_identidad.unique' => 'Este carnet de identidad ya está registrado.',
            'carnet_identidad.max' => 'El carnet no puede tener más de 8 caracteres.',
            
            'edad.required' => 'La edad es obligatoria.',
            'edad.integer' => 'La edad debe ser un número entero.',
            'edad.min' => 'La edad mínima es 16 año.',
            'edad.max' => 'La edad máxima es 70 años.',
            
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Debe ingresar un email válido.',
            'email.unique' => 'Este email ya está registrado.',
            
            'estado.boolean' => 'El estado debe ser activo o inactivo.'
        ];
    }
}