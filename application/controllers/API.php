<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class API extends REST_Controller
{

    
     function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_header('Access-Control-Allow-Methods: *');
        $this->output->set_header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        $this->load->model('API_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
       // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    function product_get()
    {
        $jsonString = '[
  {
    "id": 1,
    "name": "Sony Xperia Z3",
    "price": 899,
    "specs": {
      "manufacturer": "Sony",
      "storage": 16,
      "os": "Android",
      "camera": 15
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "https://i.ytimg.com/vi/5bmLUzdHyNs/maxresdefault.jpg",
      "large": "https://i.ytimg.com/vi/5bmLUzdHyNs/maxresdefault.jpg"
    }
  },
  {
    "id": 2,
    "name": "Iphone 6",
    "price": 899,
    "specs": {
      "manufacturer": "Apple",
      "storage": 16,
      "os": "iOS",
      "camera": 8
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "assets/images/iphone6.jpg",
      "large": "assets/images/iphone6-large.jpg"
    }
  },
  {
    "id": 3,
    "name": "HTC One M8",
    "price": 899,
    "specs": {
      "manufacturer": "HTC",
      "storage": 32,
      "os": "Android",
      "camera": 5
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "assets/images/htc-one.jpg",
      "large": "assets/images/htc-one-large.jpg"
    }
  },
  {
    "id": 4,
    "name": "Galaxy Alpha",
    "price": 899,
    "specs": {
      "manufacturer": "Samsung",
      "storage": 32,
      "os": "Android",
      "camera": 12
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "assets/images/galaxy-alpha.jpg",
      "large": "assets/images/galaxy-alpha-large.jpg"
    }
  },
  {
    "id": 5,
    "name": "Nokia Lumia",
    "price": 450,
    "specs": {
      "manufacturer": "Nokia",
      "storage": 16,
      "os": "Windows",
      "camera": 5
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "assets/images/nokia-lumia.jpg",
      "large": "assets/images/nokia-lumia-large.jpg"
    }
  },
  {
    "id": 6,
    "name": "Zte Nubia",
    "price": 399,
    "specs": {
      "manufacturer": "ZTE",
      "storage": 32,
      "os": "Android",
      "camera": 12
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "assets/images/zte-nubia.jpg",
      "large": "assets/images/zte-nubia-large.jpg"
    }
  },
  {
    "id": 7,
    "name": "Samsung Galaxy S5",
    "price": 399,
    "specs": {
      "manufacturer": "Samsung",
      "storage": 16,
      "os": "Android",
      "camera": 15
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "assets/images/galaxy-s5.jpg",
      "large": "assets/images/galaxy-s5-large.jpg"
    }
  },
  {
    "id": 8,
    "name": "Iphone 5S",
    "price": 399,
    "specs": {
      "manufacturer": "Apple",
      "storage": 16,
      "os": "iOS",
      "camera": 8
    },
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique ipsum in efficitur pharetra. Maecenas luctus ante in neque maximus, sed viverra sem posuere. Vestibulum lectus nisi, laoreet vel suscipit nec, feugiat at odio. Etiam eget tellus arcu.",
    "rating": 4,
    "image": {
      "small": "assets/images/iphone5s.jpg",
      "large": "assets/images/iphone5s-large.jpg"
    }
  }
]';
        //$data=[,,,];
        $data = json_decode($jsonString );
        //$data =$data->1->id;
       
                $this->response($data, 200);
      
    
    }

    function user_get()
    {

       
        
        $id = 0;
        $users = $this->API_model->get_user($id);
        

        //讀取Header的測試
        $id=$this->get('id');
        
        

        if($id === NULL)
        {
        	$this->response($users, 200);
          
        } 
        else
        {
        	$id = (int) $id;
        	//$users = $this->user_model->get_all();
        	if($users)
        	{
        		
                $user = $this->API_model->get_user($id);
		        /*if (!empty($users))
		        {
		            foreach ($users as $key => $value)
		            {
		                if (isset($value['id']) && $value['id'] === $id)
		                {
		                    $user = $value;
		                }
		            }
		        }*/
                if(empty($user))
                    $user = "got nothing";

		        $this->response($user, 200);
            	
        	}
 
        	else
        	{
                $nothing = "nothing";
            	$this->response($nothing, 200);
        	}
        }
 
    
    }

    function user_options()
    {

       
        $this->response("hello", 200);
    }
     
    function user_post()
    {
        ///Json抓法
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        //$ready = $request->id;
        //$this->response($id);
        if(!array_key_exists('id',$request))  //新增
        {
            $result = $this->API_model->post_user($request->name,$request->email,$request->fact);
            /*
            $result = $this->API_model->update( $this->post('id'), array(
                'name' => $this->post('name'),
                'email' => $this->post('email')
            ));*/
             
            if($result === FALSE)
            {
                $this->response(array('status' => 'error'));
            }
             
            else
            {
                $this->response(array('status' => 'success'));
            }
        }
        else //修改
        {
            $result = $this->API_model->update_user($request->id,$request->name,$request->email,$request->fact);

            if($result === FALSE)
            {
                $this->response(array('status' => 'error'));
            }
             
            else
            {
                $this->response(array('status' => 'success'));
            }

        }
         
    }

    public function user_delete()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        $ready = $request->id;
        $result = $this->API_model->delete_user($ready);

        if($result === FALSE)
        {
            $this->response(array('status' => 'error'));
        }
                 
        else
        {
            $this->response(array('status' => 'success'));
        }
        
    }

    function talkmessage_get()
    {

       
        
        $id = 0;
        $users = $this->API_model->get_talkmessage($id);
        

        //讀取Header的測試
        $id=$this->get('id');
        
        

        if($id === NULL)
        {
          $this->response($users, 200);
          
        } 
        else
        {
          $id = (int) $id;
          //$users = $this->user_model->get_all();
          if($users)
          {
            
                $user = $this->API_model->get_talkmessage($id);
            /*if (!empty($users))
            {
                foreach ($users as $key => $value)
                {
                    if (isset($value['id']) && $value['id'] === $id)
                    {
                        $user = $value;
                    }
                }
            }*/
                if(empty($user))
                    $user = "got nothing";

            $this->response($user, 200);
              
          }
 
          else
          {
                $nothing = "nothing";
              $this->response($nothing, 200);
          }
        }
 
    
    }

    function talkmessage_post()
    {
        ///Json抓法
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        //$ready = $request->id;
        //$this->response($id);
        if(1==1)//!array_key_exists('id',$request))  //新增
        {
            $result = $this->API_model->post_talkmessage($request->id,$request->Message,$request->Amount);
            /*
            $result = $this->API_model->update( $this->post('id'), array(
                'name' => $this->post('name'),
                'email' => $this->post('email')
            ));*/
             
            if($result === FALSE)
            {
                $this->response(array('status' => 'error'));
            }
             
            else
            {
                $this->response(array('status' => 'success'));
            }
        }
        else //修改
        {
            $result = $this->API_model->update_user($request->id,$request->name,$request->email,$request->fact);

            if($result === FALSE)
            {
                $this->response(array('status' => 'error'));
            }
             
            else
            {
                $this->response(array('status' => 'success'));
            }

        }
         
    }


    function takeoutlist_get()
    {

       
        
        $id = 0;
        $users = $this->API_model->get_takeoutlist($id);
        

        //讀取Header的測試
        $id=$this->get('id');
        
        

        if($id === NULL)
        {
          $this->response($users, 200);
          
        } 
        else
        {
          $id = (int) $id;
          //$users = $this->user_model->get_all();
          if($users)
          {
            
                $user = $this->API_model->get_takeoutlist($id);
            /*if (!empty($users))
            {
                foreach ($users as $key => $value)
                {
                    if (isset($value['id']) && $value['id'] === $id)
                    {
                        $user = $value;
                    }
                }
            }*/
                if(empty($user))
                    $user = "got nothing";

            $this->response($user, 200);
              
          }
 
          else
          {
                $nothing = "nothing";
              $this->response($nothing, 200);
          }
        }
 
    
    }
    function takeoutlist_post()
    {
        ///Json抓法
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        //$ready = $request->id;
        //$this->response($id);
        if(!array_key_exists('id',$request))  //新增
        {
            $result = $this->API_model->post_takeoutlist($request->Money,$request->Who,0 ,$request->Reason);
            /*
            $result = $this->API_model->update( $this->post('id'), array(
                'name' => $this->post('name'),
                'email' => $this->post('email')
            ));*/
             
            if($result === FALSE)
            {
                $this->response(array('status' => 'error'));
            }
             
            else
            {
                $this->response(array('status' => 'success'));
            }
        }
        else //修改
        {
            $result = $this->API_model->update_takeoutlist($request->id,$request->Finish,$request->OTPcode,$request->YesOrNo ,$request->BackMessage);

            if($result === FALSE)
            {
                $this->response(array('status' => 'error'));
            }
             
            else
            {
                $this->response(array('status' => 'success'));
            }

        }
         
    }

    function wifilist_get()
    {
      
      $jsonString = '{"max_SearchTime": 0}';
      $users = $this->API_model->get_wifilist("0");
      //讀取Header的測試
      if($users['max_SearchTime'] == NULL)
        $this->response(json_decode($jsonString), 200);  
      else
        $this->response($users,200);
    }

    function wifilist_post()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        $limit = $request->limit;
        //$ready = $request->id;
        //$this->response($id);
        for( $counter = 0 ;$counter < $limit ;$counter++)
        {
          $cun = "i".$counter ; 
          $text = $request->$cun;
          $text = mb_split(",|: ",$text);
          $result = $this->API_model->post_wifilist($text['1'],$text['3'],$text['9'] ,$text['7'],$request->SearchTime,$request->location);

        }
        

        //$text = $text->$_GET['uid'];
        if($result === FALSE)//$result === FALSE
        {
          $this->response(array('status' => 'error','contain' => $request));
        }
        else
        {
          //$this->response($result);
          $this->response(array('status' => 'success','contain' => $request));
        } 
    }
     
     function wifiCSV_get()
    {
      $result = $this->API_model->WifiCSV("0"); 
      $this->response($result);
      //回傳值為array->array->string
      $this->response(array('status' => 'success','contain' => $result));

    }
    function pythoncall_get()
    {
      //$data = array("as", "df", "gh");
      
      //$this->response(array('status' => 'success','contain' => $data));
      $data = [1,2,3,4,5,6];

      // Execute the python script with the JSON data
      $result = shell_exec('python "C:\Users\Toshiba\Documents\AI_learning\wifilocation\test3.py" ' . escapeshellarg(json_encode($data)));
      
      // Decode the result
      $resultData = json_decode($result, true);
      $this->response(array('status' => 'success','contain' => $result));

    }

    function pythoncall_post()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        $limit = $request->limit;
        //$ready = $request->id;
        //$this->response($id);  以下開始按照字串長度生成陣列

        $MaxBSSID = $this->API_model->MaxBSSID("0");
        for( $counter = 0 ;$counter < $MaxBSSID ;$counter++)
        {
          $finalArray[$counter*3] = -100;
          $finalArray[$counter*3+1] = 0;
          $finalArray[$counter*3+2] = 99999;
        }//陣列產生完成
        
        for( $counter = 0 ;$counter < $limit ;$counter++)
        {
          $cun = "i".$counter ; 
          $text = $request->$cun;
          $text = mb_split(",|: ",$text); //1為SSID 3為BSSID
          $result = $this->API_model->getBSSIDNumber($text['3']);
          $finalArray[($result-1)*3] = $text['7'];
          $finalArray[($result-1)*3+1] = $text['9'];
          $finalArray[($result-1)*3+2] = pow(10.0, (27.55 - (20 * log10($text['9'])) + abs($text['7'])) / 20.0);

        }

        $result = shell_exec('python "C:\Users\Toshiba\Documents\AI_learning\wifilocation\test3.py" ' . escapeshellarg(json_encode($finalArray)));
      
      // Decode the result
       $this->response(array('status' => 'success','contain' => json_decode($result)));
    }
    
}
?>