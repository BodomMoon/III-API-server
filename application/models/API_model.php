	<?php
	class API_model extends CI_Model 
	{

		//private ;

        public function __construct()
        {
                $this->load->database();
        }
        public function get_user($id)
		{
			if ($id != 0)
	        {
	                $query = $this->db->get_where('user', array('id' => $id));
	                return  $query->row_array() ;
	        }
	        $query = $this->db->get('user');
	        return $query->result_array();
	        
		}
		public function post_user($name , $email ,$fact) //此處post只用於新增
		{
			/*$query = $this->db->get_where('user', array('name' => $name));
			if()  此處插入不驗證*/
			//$this->db->set('id', $id);
		    $this->db->set('name', $name);
			$this->db->set('email', $email);
			$this->db->set('fact', $fact);
			return $this->db->insert('user');
		}
		public function update_user($id ,$name , $email ,$fact) //此處用於修改
		{
			$data = array
			(
	            'name' => $name,
	            'email' => $email,
	            'fact' => $fact
	        );

			$this->db->where('id', $id);
			return $this->db->update('user', $data); 

		}
		public function delete_user($id) //此處用於修改
		{
			$this->db->where('id', $id);
			return $this->db->delete('user');  

		}

		public function get_takeoutlist($id)
		{
			if ($id != 0)
	        {
	                $query = $this->db->get_where('takeoutlist', array('id' => $id));
	                return  $query->row_array() ;
	        }

	        $this->db->select_max('id', 'max_id');
			$query = $this->db->get('takeoutlist');
			// 產生： SELECT MAX(age) as member_age FROM members
	        return $query->row_array();
	        
		}
		public function post_takeoutlist($Money , $Who, $Finish  ,$Reason) //此處post只用於新增
		{
			/*$query = $this->db->get_where('user', array('name' => $name));
			if()  此處插入不驗證*/
			//$this->db->set('id', $id);
		    $this->db->set('Money', $Money);
			$this->db->set('Who', $Who);
			//$this->db->set('Date', time());
			$this->db->set('Finish', $Finish);
			$this->db->set('Reason', $Reason);
			return $this->db->insert('takeoutlist');
		}
		public function update_takeoutlist($id , $Finish ,$OTPcode,$YesOrNo ,$backMessage ) //此處用於修改
		{
			$data = array
			(
	            'Finish' => $Finish,
	            'OTPcode' => $OTPcode,
	            'backMessage' => $backMessage,
	            'YesOrNo' => $YesOrNo,
	        );

			$this->db->where('id', $id);
			return $this->db->update('takeoutlist', $data); 

		}
		public function get_talkmessage($id)
		{
			if ($id != 0)
	        {
	                $query = $this->db->get_where('talkmessage', array('id' => $id));
	                return  $query->row_array() ;
	        }
	        $query = $this->db->get('talkmessage');
	        return $query->result_array();
	        
		}
		public function post_talkmessage($id, $Message , $Amount) //此處post只用於新增
		{
			/*$query = $this->db->get_where('user', array('name' => $name));
			if()  此處插入不驗證*/
			//$this->db->set('id', $id);
		    $this->db->set('id', $id);
			$this->db->set('Message', $Message);
			$this->db->set('Amount', $Amount);
			return $this->db->insert('talkmessage');
		}
		public function get_wifilist($id)
		{
			$this->db->select_max('SearchTime', 'max_SearchTime');
			$query = $this->db->get('wifilist');
			// 產生： SELECT MAX(age) as member_age FROM members
	        return $query->row_array();
		}

		public function post_wifilist($SSID, $BSSID , $frequency , $level , $SearchTime , $location) //此處post只用於新增
		{
			/*$query = $this->db->get_where('user', array('name' => $name));
			if()  此處插入不驗證*/
			//$this->db->set('id', $id);
			$numLevels = 5;
		    $this->db->set('SSID', $SSID);
			$this->db->set('BSSID', $BSSID);
			$this->db->set('frequency', $frequency);
			$this->db->set('level', $level);
			$this->db->set('location', $location);	
			$this->db->set('distance', pow(10.0, (27.55 - (20 * log10($frequency)) + abs($level)) / 20.0));
			$date = getDate();
            $date = $date["year"].'-'.$date["mon"].'-'.$date["mday"] ;
            $this->db->set('TimeStamp', $date);


			$this->db->set('RSSI', (($level - -100) * ($numLevels - 1) / (-55 - -100)));
			$this->db->set('SearchTime', $SearchTime);
			$query = $this->db->query("SELECT BSSID_Number FROM wifilist WHERE BSSID = '$BSSID'");
			$query->row_array();

			//$BSSID_Number = mb_split("\"",$query->result_array['0']);
			if(empty($query->result_array))
			{
				$this->db->select_max('BSSID_Number', 'BSSID_Number');
				$query = $this->db->get('wifilist');
				$query->row_array();
				$number = $query->result_array['0'];
				$number = $number['BSSID_Number'];
				$number++;
				$this->db->set('BSSID_Number', $number);
			}
			else
			{
				$test = $query->result_array['0'];
				$this->db->set('BSSID_Number', $test['BSSID_Number']); // $query->BSSID_Number
			}


			return $this->db->insert('wifilist');

		}
		public function WifiCSV($id)
		{
			$answer;
			$this->db->select_max('BSSID_Number', 'BSSID_Number');
			$query = $this->db->get('wifilist');
			$query->row_array();
			$max_BSSID_number = $query->result_array['0'];
			$max_BSSID_number = $max_BSSID_number['BSSID_Number'];
			//先取得最大的BSSID才知道有多少WIFI_AP
			$this->db->select_max('SearchTime', 'SearchTime');
			$query = $this->db->get('wifilist');
			$query->row_array();
			$max_SearchTime = $query->result_array['0'];
			$max_SearchTime = $max_SearchTime['SearchTime'];
			//再取得最大的SearchTime才知道自己要取多少列
			for($bottom = 1 ;$bottom <= $max_SearchTime; $bottom++)//總共要多少個陣列
			{
				//先取出所有值再來重排陣列
				//$query = $this->db->query("SELECT level,frequency,distance,SearchTime,location FROM wifilist WHERE SearchTime = '$bottom' ORDER BY SearchTime ASC");
				/*
				出來長這樣
				[
				    {
				        "level": "-36",
				        "frequency": "2412",
				        "distance": "0.62391107744714",
				        "SearchTime": "1",
				        "location": "100"
				    },
				    {
				        "level": "-35",
				        "frequency": "5745",
				        "distance": "0.23345864846046",
				        "SearchTime": "1",
				        "location": "100"
				    }
				]
				*/
				//return $query->result_array();
				for($counter = 1 ;$counter <= $max_BSSID_number; $counter++)
				{//開始建立上方項目
					$query = $this->db->query("SELECT level,frequency,distance,location,SearchTime FROM wifilist WHERE SearchTime = '$bottom' AND BSSID_number = '$counter' ORDER BY SearchTime ASC");
					$query->row_array();//轉成物件
					$tempS1 = $bottom -1;
					$location ;
					$SearchTime ;
					if(empty($query->result_array))//如果沒搜尋到東西
					{
						$answer["$tempS1"]["AP$counter level"] = -100;
						$answer["$tempS1"]["AP$counter frequency"] = 0;
						$answer["$tempS1"]["AP$counter distance"] = 99999;

						
					}
					else
					{
						$answer["$tempS1"]["AP$counter level"] = $query->result_array['0']['level'];
						$answer["$tempS1"]["AP$counter frequency"] = $query->result_array['0']['frequency'];
						$answer["$tempS1"]["AP$counter distance"] = $query->result_array['0']['distance'];
						$location = $query->result_array['0']['location'];
						$SearchTime = $query->result_array['0']['SearchTime'];
					}
				}
				$answer["$tempS1"]["location"] = $location;
				$answer["$tempS1"]["SearchTime"] = $SearchTime;
				 

			}
			return $answer;

			

			/*for($inside = 0 ; $inside < 3 ; $inside++)//之後可能要拿掉  因為我直接拆表格了
				{//子項目分 level frequency distance
				 //接下來的寫法並不優 會跟資料庫作極大量的溝通　正在尋找解決方法
					for($bottom = 0 ;$bottom < $max_SearchTime; $bottom++)
					{
						$query = $this->db->query("SELECT level,frequency,distance,SearchTime FROM wifilist WHERE BSSID_Number = '$counter' ORDER BY SearchTime ASC");
						return $query->result_array();
						//試著自己開始拆表格  因為CI好像綁死不給用全域

						
					}
					
				}*/


			$this->db->select_max('SearchTime', 'max_SearchTime');
			$query = $this->db->get('wifilist');
			// 產生： SELECT MAX(age) as member_age FROM members
	        return $query->row_array();
		}
		

		public function MaxBSSID($id)
		{
			$this->db->select_max('BSSID_Number', 'BSSID_Number');
			$query = $this->db->get('wifilist');
			$query->row_array();
			return $query->result_array['0']['BSSID_Number']; 
		}
		public function getBSSIDNumber($BSSID)
		{
			$query = $this->db->query("SELECT BSSID_Number FROM wifilist WHERE BSSID = '$BSSID'");
			$query->row_array();//轉成物件Array

			return $query->result_array['0']['BSSID_Number']; 
		}
		
	}