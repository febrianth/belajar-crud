<?php
class person {
	protected $name;

	function __construct() {		
		echo "<p>initialize class</p>";		
	}	

	function set_name($new_name) { 
		$this->name = $new_name;  
	}

	function get_name() {
		return $this->name;
	}
}

$agus = new person();
$evan = new person();

$agus->set_name('Agus Nurwanto');
echo $agus->get_name();

$evan->set_name('M.Evan Saputra');
echo '<hr>'.$evan->get_name();


class woman extends person{
	public $gender = 'Wanita';

	function get_name() {
		return parent::get_name().' adalah '.$this->gender;
	}

	static function umur(){
		echo "<br>Umur = 5 Tahun";
	}
}

$asiyah = new woman();
$asiyah->set_name('Asiyah Nurrahma');
echo '<hr>'.$asiyah->get_name();

woman::umur();



// prosedural
$name = false;
function set_name($new_name) {
	global $name; 
	$name = $new_name;  
}
function get_name() {
	global $name;
	return $name;
}
set_name('<hr>Agus N');
set_name('<hr>Evan S');
echo get_name();
?>