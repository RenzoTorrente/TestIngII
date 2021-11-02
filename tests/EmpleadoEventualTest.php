<?php
require_once "EmpleadoTest.php";

class EmpleadoEventualTest extends EmpleadoTest
{
	public function crear($nombre="Renzo",$apellido="Torrente",$dni="40843382",$salario="90000",$array = array(20, 10, 40,20))
	{
		$r = new \App\EmpleadoEventual($nombre,$apellido,$dni,$salario,$array);
		return $r;
	}

	public function testMetodoCalcularComision()
    {
        $r = $this->crear();
        $this->assertEquals(1.125, $r->calcularComision());
    }

    public function testMetodoCalcularIngresoTotal()
    {
        $r = $this->crear();
        $this->assertEquals( 90001.125, $r->calcularIngresoTotal());
    }

    public function testMontoDeVentaNegativoOCero()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Iara", "Policani", 42137865, 2000, $array = array(20, 10, 40,-20));
    }

}