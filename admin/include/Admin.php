<?php 
	include '../application/config.php';
	/**
	 * 
	 */
	class Admin extends mysqli
	{
		
		function __construct()
		{
			parent::__construct(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	        if (mysqli_connect_error()) {
	            exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
	        }
	        parent::set_charset('utf-8');
		}
		
		//Login page
		function setSession($data){
			$_SESSION['admin'] = $data;
			return true;
		}
		function getSession($param){
			if ($param == "") {
				return $_SESSION['admin'];
			}else{
				return $_SESSION[$param];
			}
		}
		function cekLogin(){
			if (isset($_SESSION['admin'])) {
				return 1;
			}else{
				return 0;
			}
		}
		function getLogin($email, $password){
			$msg = array(
				'success' => '',
				'msg' => ''
			);
			$email = $this->real_escape_string($email);
			$password = $this->real_escape_string(md5($password));
			//
			$sql = "SELECT * FROM admin WHERE email = '$email'";
			$exec = $this->query($sql);
			$row = $exec->num_rows;
			if ($row == 1) {
				$data = $exec->fetch_assoc();
				if ($data['password'] == $password) {
					$msg['success'] = 'yes';
					$msg['msg'] = 'Berhasil login!';
					$this->setSession($data);
				}else{
					$msg['success'] = 'no';
					$msg['msg'] = 'Kata sandi salah!';
				}
			}else{
				$msg['success'] = 'no';
				$msg['msg'] = 'Email tidak tersedia!';
			}
			return $msg;

		}
		function logout(){
			session_destroy();
			return 1;
		}

		//Admin page 
		function countLoker($status='all'){
			$sql = "SELECT count(*) as jumlah FROM td_lowongan";
			//
			if ($status == "active") {
				$sql.= " WHERE status = 'active'";
			}elseif($status == "expired"){
				$sql.= " WHERE status = 'expired'";
			}elseif($status == 'terbaru'){
				// $sql.= "WHERE date_tutup BEETWEN'";
			}
			$exec = $this->query($sql);
			$data = $exec->fetch_assoc();
			$jumlah = $data['jumlah'];
			return $jumlah;
		}

		function orderBy($order){
        $sql = "select distinct($order) as data from td_lowongan where 1=1 ";
        $sql .= "  order by $order asc  ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = [$order => $row['data']];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }

        
    }
    function jumlahData($field, $param){
			$sql = "SELECT count(*) as jumlah FROM td_lowongan WHERE $field = '$param'";
			$exec = $this->query($sql);
			$data = $exec->fetch_assoc();
			$jumlah = $data['jumlah'];
			return $jumlah;
        }


	}


	$su = new admin();
  	$loged = $su->cekLogin();

 ?>