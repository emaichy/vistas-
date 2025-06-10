<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaEvolucion extends Model
{
    use HasFactory; // Se recomienda usar HasFactory para facilitar pruebas y 'seeders'

    protected $table = 'notas_evolucion'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'ID_Nota';    // Clave primaria de la tabla

    // Habilitar timestamps (created_at, updated_at) ya que están en la migración
    public $timestamps = true;

    // Campos que pueden ser asignados masivamente (usando create o fill)
    protected $fillable = [
        'ID_Alumno',
        'ID_Paciente',
        'ID_Expediente',
        'ID_Semestre',
        'ID_Grupo',
        'fecha',
        'presion_arterial',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'temperatura',
        'oximetria',
        'tratamiento_realizado',
        'descripcion_tratamiento',
        'firma_catedratico',
        'firma_alumno',
        'firma_paciente',
        'pdf_document',
    ];

    /**
     * Define la relación con el modelo Alumnos.
     * Una nota de evolución pertenece a un alumno.
     * La clave foránea en 'notas_evolucion' es 'ID_Alumno',
     * y la clave local en 'alumnos' es 'Matricula'.
     */
    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'ID_Alumno', 'Matricula');
    }

    /**
     * Define la relación con el modelo Pacientes.
     * Una nota de evolución pertenece a un paciente.
     */
    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'ID_Paciente', 'ID_Paciente');
    }

    /**
     * Define la relación con el modelo Expediente.
     * Una nota de evolución pertenece a un expediente.
     */
    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'ID_Expediente', 'ID_Expediente');
    }

    /**
     * Define la relación con el modelo Semestre.
     * Una nota de evolución pertenece a un semestre.
     */
    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'ID_Semestre', 'ID_Semestre');
    }

    /**
     * Define la relación con el modelo Grupos.
     * Una nota de evolución pertenece a un grupo.
     */
    public function grupo()
    {
        return $this->belongsTo(Grupos::class, 'ID_Grupo', 'ID_Grupo');
    }
}