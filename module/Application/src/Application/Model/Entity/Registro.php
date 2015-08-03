<?php 
namespace Application\Model\Entity;

class Registro
{
    private $registro_id;
    private $seudonimo;
    private $nombre;
    private $apellido;
    private $tipoid;
    private $id;
    private $fijo;
    private $celular;
    private $email;
    private $emailconf;
    private $producto;
    private $cantidad;
    private $imagen;
    private $datepicker1;
    private $modelo;
    private $detalle;
    private $metodo;
    private $receptor;
    private $emisor;
    private $transferencia;
    private $monto;
    private $tipo;
    private $encomienda;
    private $envio;
    private $direccion;
    private $estado;
    private $ciudad;
    private $observaciones;
    
//    Parte Getter
    
    function getRegistro_id() {
        return $this->registro_id;
    }
    
    function getSeudonimo() {
        return $this->seudonimo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTipoid() {
        return $this->tipoid;
    }

    function getId() {
        return $this->id;
    }

    function getFijo() {
        return $this->fijo;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
    }

    function getEmailconf() {
        return $this->emailconf;
    }

    function getProducto() {
        return $this->producto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getDatepicker1() {
        return $this->datepicker1;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function getMetodo() {
        return $this->metodo;
    }

    function getReceptor() {
        return $this->receptor;
    }

    function getEmisor() {
        return $this->emisor;
    }

    function getTransferencia() {
        return $this->transferencia;
    }

    function getMonto() {
        return $this->monto;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEncomienda() {
        return $this->encomienda;
    }

    function getEnvio() {
        return $this->envio;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

//    Parte Setter
    
    function setRegistro_id($registro_id) {
        $this->registro_id = $registro_id;
    }

    
    function setSeudonimo($seudonimo) {
        $this->seudonimo = $seudonimo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTipoid($tipoid) {
        $this->tipoid = $tipoid;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFijo($fijo) {
        $this->fijo = $fijo;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEmailconf($emailconf) {
        $this->emailconf = $emailconf;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setDatepicker1($datepicker1) {
        $this->datepicker1 = $datepicker1;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    function setMetodo($metodo) {
        $this->metodo = $metodo;
    }

    function setReceptor($receptor) {
        $this->receptor = $receptor;
    }

    function setEmisor($emisor) {
        $this->emisor = $emisor;
    }

    function setTransferencia($transferencia) {
        $this->transferencia = $transferencia;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEncomienda($encomienda) {
        $this->encomienda = $encomienda;
    }

    function setEnvio($envio) {
        $this->envio = $envio;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

        
    public function exchangeArray($data=NULL)
    {
        $this->registro_id = (isset($data['registro_id'])) ? $data['registro_id'] : null;
        $this->seudonimo     = (isset($data['seudonimo'])) ? $data['seudonimo'] : null;
        $this->nombre = (isset($data['nombre'])) ? $data['nombre'] : null;
        $this->apellido  = (isset($data['apellido'])) ? $data['apellido'] : null;
        $this->tipoid  = (isset($data['tipoid'])) ? $data['tipoid'] : null;
        $this->id  = (isset($data['id'])) ? $data['id'] : null;
        $this->fijo  = (isset($data['fijo'])) ? $data['fijo'] : null;
        $this->celular  = (isset($data['celular'])) ? $data['celular'] : null;
        $this->email  = (isset($data['email'])) ? $data['email'] : null;
        $this->emailconf  = (isset($data['emailconf'])) ? $data['emailconf'] : null;
        $this->producto  = (isset($data['producto'])) ? $data['producto'] : null;
        $this->cantidad  = (isset($data['cantidad'])) ? $data['cantidad'] : null;
        $this->imagen  = (isset($data['imagen'])) ? $data['imagen'] : null;
        $this->datepicker1  = (isset($data['datepicker1'])) ? $data['datepicker1'] : null;
        $this->modelo  = (isset($data['modelo'])) ? $data['modelo'] : null;
        $this->detalle  = (isset($data['detalle'])) ? $data['detalle'] : null;
        $this->metodo  = (isset($data['metodo'])) ? $data['metodo'] : null;
        $this->receptor  = (isset($data['receptor'])) ? $data['receptor'] : null;
        $this->emisor  = (isset($data['emisor'])) ? $data['emisor'] : null;
        $this->transferencia  = (isset($data['transferencia'])) ? $data['transferencia'] : null;
        $this->monto  = (isset($data['monto'])) ? $data['monto'] : null;
        $this->tipo  = (isset($data['tipo'])) ? $data['tipo'] : null;
        $this->encomienda  = (isset($data['encomienda'])) ? $data['encomienda'] : null;
        $this->envio  = (isset($data['envio'])) ? $data['envio'] : null;
        $this->direccion  = (isset($data['direccion'])) ? $data['direccion'] : null;
        $this->estado  = (isset($data['estado'])) ? $data['estado'] : null;
        $this->ciudad  = (isset($data['ciudad'])) ? $data['ciudad'] : null;
        $this->observaciones  = (isset($data['observaciones'])) ? $data['observaciones'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}