<?php
	class Usuarios {
		private $pdo;
		private $idUSer;
		private $userName;
		private $firstName;
		private $lastName;
		private $age;
		private $location;
		private $passUser;
		private $gender;
		private $complexion;
		private $email;
		private $birthday;
		private $dateAdded;

		public function __GET($k) { return $this->$k; }
		public function __SET($k,$v) { return $this->$k = $v; }

	}


?>