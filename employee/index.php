<?php 
//interfaces-> to define constants that can be used with another class
//define methods that implementing class has to have
//to enforce consistency
interface StandardFunction {
   public function getJobTitle();
}

Class Employee {
	/**
	* A public variable
	*
	* @var string $name stores data for the class
	*/
	public $name;
	public $salary;
	public $position;
	//class property with static
	public static $hours = 40;

	//Constructor
	function __construct($name, $salary, $position) {
		//little arrow (->) for accessing the properties and methods
		$this->name = $name;
		$this->salary = $salary;
		$this->position = $position;
	}

	public function showDetails() {
		return "Name: " . $this->name . "<br>Salary: " 
		. $this->salary . "<br>Position: " . $this->position . "<br>Hours per Week: " . Employee::$hours;
	}

	//final -> prevents child classes from overriding a function
	//a class defined with final cannot be extended
	final public function foo() {
	}

}

//inheritance
Class Driver extends Employee implements StandardFunction{
	public $drivingLicense;

	function __construct ($name, $salary, $position, $drivingLicense) {
		//call parent constructor
		parent::__construct($name, $salary, $position);
		$this->drivingLicense = $drivingLicense;
	}

	//method overriding
	public function showDetails() {
		//extend parent method
		return parent::showDetails() . "<br>Driving License: " . $this->drivingLicense;
	}

	//must be implemented because of contract with interface
	function getJobTitle() {
	}

	 /**
	  * Multiplies two integers
	  *
	  * Accepts a pair of integers and returns the
	  * product of the two.
	  *
	  * @param int $bat a number to be multiplied
	  * @param int $baz a number to be multiplied
	  * @return int the product of the two parameters
	  */
	 public function bar($bat, $baz)
	 {
	     return $bat * $baz;
	 }
}

$employeeOne = new Employee("Maria", 2000, "Manager");
$res = $employeeOne->showDetails();
echo $res;

$driver = new Driver("Kurt", 2000, "Driver", "C");
echo $driver->showDetails();

//abstract classes cannot be instantiated, only for inheritance
abstract class Animal {
   public $name;
   public $age;
  
   public function describe()
   {
       return $this->name . ", " . $this->age . " years old";   
   }
}

?>