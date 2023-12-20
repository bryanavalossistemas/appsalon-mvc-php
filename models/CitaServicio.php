<?php

namespace Model;

class CitaServicio extends ActiveRecord
{
    protected static $tabla = 'citas_servicios';
    protected static $columnasDB = ['id', 'idCitas', 'idServicios'];

    public $id;
    public $idCitas;
    public $idServicios;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idCitas = $args['idCitas'] ?? '';
        $this->idServicios = $args['idServicios'] ?? '';
    }
}
