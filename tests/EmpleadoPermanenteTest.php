<?php
require_once "EmpleadoTest.php";

class EmpleadoPermanenteTest extends \PHPUnit\Framework\TestCase
{
	public function crear($nombre="Renzo",$apellido="Ferronato",$dni="44231749",$salario="90000",\DateTime $fechaIngreso=null)

	{
		$r = new \App\EmpleadoPermanente($nombre,$apellido,$dni,$salario,new DateTime('1995-10-18'));
		return $r;
	}

	 public function testFechaIngreso()
    {
        $r = $this->crear();
        $this->assertEquals('95-10-18', date_format($r->getFechaIngreso(), 'y-m-d'));
    }

    public function testCalcularComision()
    {
        $r = $this->crear();
        $this->assertEquals('26%', $r->calcularComision());
    }

    public function testIngresoTotal()
    {
        $r = $this->crear();
        $this->assertEquals('113400', $r->calcularIngresoTotal());
    }

    public function testCalcularAntiguedad()
    {
        $r = $this->crear();
        $this->assertEquals('26', $r->calcularAntiguedad());
    }

    public function testFechaSinProporcionar()
    {
        $r = new App\EmpleadoPermanente("Renzo", "Ferronato", 44231749, 2000);
        $f = new \DateTime();
        $this->assertEquals(date_format($f, 'y-m-d'), date_format($r->getFechaIngreso(), 'y-m-d'));
        $this->assertEquals('0', $r->calcularAntiguedad());
    }

    public function testFechaPosterior()
    {
        $this->expectException(\Exception::class);
        $r = new App\EmpleadoPermanente("Renzo", "Ferronato", 444231749, 2000, new DateTime('2023-7-11'));
    }
} 