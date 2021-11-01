<?php
class EmpleadoTest extends \PHPUnit\Framework\TestCase{

	public function crear($nombre = "Renzo", $apellido = "Torrente", $dni = "40843382", $salario = "90000", $sector = "No especificado"){
		$r = new \App\Empleado($nombre, $apellido, $dni, $salario, $sector);
		return $r;
	}

	public function testingNameandLastName()
	{
		$r = $this-> crear("Renzo","Torrente");
		$this->assertEquals("Renzo Torrente", $r->getNombreApellido());
	}

	public function testingDNI()
	{
		$r = $this-> crear("40843382");
		$this->assertEquals("40843382", $r->getDni());
	}

	public function testingSalary()
	{
		$r = $this-> crear("90000");
		$this->assertEquals("90000", $r->getSalario());
	} 

	public function testingSector()
	{
		$r = $this->crear();
		$r->setSector("sector de ventas");
		$this->assertEquals("sector de ventas", $r->getSector());
	}

	public function testingAll()
	{
		$r = $this->crear("Renzo","Torrente","40843382","90000");
		$this->assertEquals("Renzo Torrente 40843382 90000",$r);
	}

	public function testEmptyName()
	{
		$this->expectException(\Exception::class);
		$this->crear("");
	}

	public function testingLastNameEmpty()
	{
		$this->expectException(\Exception::class);
		$this->crear("Renzo","");
	}

	public function testingemptyDNI()
	{
		$this->expectException(\Exception::class);
		$this->crear("Renzo","Torrente","");
	}

	public function testingEmptySalary()
	{
		$this->expectException(\Exception::class);
		$this->crear("Renzo","Torrente", "40843382","");
	}

	public function testingDNIWithOutNumbers()
	{
		$this->expectException(\Exception::class);
		$this->crear("Renzo","Torrente","cuarentaochocuarentitres");
	}

	public function testingEmployeeWithoutSector()
	{
		$r = $this->crear("No especificado");
		$this->assertEquals("No especificado", $r->getSector());
	}
}