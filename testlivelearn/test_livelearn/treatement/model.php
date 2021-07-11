<?php 

	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "test_livelearn";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insertcard(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['title_card']) && isset($_POST['contain_card']) && isset($_POST['id_line'])) {
					if (!empty($_POST['title_card']) && !empty($_POST['contain_card']) && !empty($_POST['id_line']) ) {
						   
						$title_card = $_POST['title_card'];
						$contain_card = $_POST['contain_card'];
						$id_line = $_POST['id_line'];

						$query = "INSERT INTO card (title_card,contain_card,id_line) VALUES ('$title_card','$contain_card','$id_line')";
						echo $query;
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = '../index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = '../index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = '../index.php';</script>";
					}
				}
			}
		}

		public function insertline(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['title_line']) ) {
					if (!empty($_POST['title_line'])  ) {
						   
						$title_line = $_POST['title_line'];
						echo $title_line;
						$query = "INSERT INTO line (title_line) VALUES ('$title_line')";
						echo $query;
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = '../index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = '../index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = '../index.php';</script>";
					}
				}
			}
		}

		public function fetchcard($line){
			$data = null;

			$query = "SELECT * FROM card where id_line = $line ";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		} 

		public function fetchline(){
			$data = null;

			$query = "SELECT * FROM line ";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){
			echo $id;
			$query = "DELETE FROM card where id_card = '$id'";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function fetch_single_card($id){

			$data = null;

			$query = "SELECT * FROM card WHERE id_card = '$id'";

			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function fetch_single_line($id){

			$data = null;

			$query = "SELECT * FROM line WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function editcard($id){

			$data = null;

			$query = "SELECT * FROM card WHERE id_card = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function editline($id){

			$data = null;

			$query = "SELECT * FROM line WHERE id_line = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE card SET title_card='$data[title_card]', contain_card='$data[contain_card]', id_line='$data[id_line]' WHERE id_card='$data[id_card] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>