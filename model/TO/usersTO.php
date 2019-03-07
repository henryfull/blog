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

		
		public function setIdUSer($idUSer){			
			$this->idUSer = $idUSer;			
		}
		public function getIdUSer(){		
			return $this-> idUSer;	
		}
		
		public function setUsername($userName){			
			$this->userName = $userName;			
		}
		
		public function getUsername(){		
			return $this-> userName;	
		}
		
		public function setFirstName($firstName){			
			$this->firstName = $firstName;			
		}
		public function getFirstName(){		
			return $this-> firstName;	
		}
		
		public function setLastName($lastName){			
			$this->lastName = $lastName;			
		}
		
		public function getLastName(){		
			return $this-> lastName;	
		}
		
		public function setAge($age){			
			$this->age = $age;			
		}
		
		public function getAge(){		
			return $this-> age;	
		}
		
		public function setLocation($location){			
			$this->location = $location;			
		}
		public function getLocation(){		
			return $this-> location;	
		}
		
		public function setPassUser($passUser){			
			$this->passUser = $passUser;			
		}
		
		public function getPassUser(){		
			return $this-> passUser;	
		}	
		
		public function setGenero($gender){			
			$this->gender = $gender;			
		}
		
		public function getGender(){		
			return $this-> gender;	
		}	
		
		public function setComplexion($complexion){			
			$this->complexion = $complexion;			
		}
		
		public function getComplexion(){		
			return $this-> complexion;	
		}			

		public function setEmail($email){			
			$this->email = $email;			
		}
		
		public function getEmail(){		
			return $this-> email;	
		}	
		
		public function setBirthday($birthday){			
			$this->birthday = $birthday;			
		}
		
		public function getBirthday(){		
			return $this-> birthday;	
		}			
		
		public function setDateAdded($dateAdded){			
			$this->dateAdded = $dateAdded;			
		}
		
		public function getDateAdded(){		
			return $this-> dateAdded;	
		}		
		
		
		

		

		

		
		
	}


?>