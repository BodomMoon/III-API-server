<?php
class News extends CI_Controller {

    public function __construct()
    {
        //呼叫父類別（CI_Controller）的建構子
        parent::__construct();
        //載入model， 讓它可以在這個控制器的其它方法中被使用。
        $this->load->model('news_model');
    }

    public function index()
    {
        /*
		從news_model使用get_news()取得資料，存成陣列data
		data['news']也是陣列，故此為二維陣列
		*/
        
        $data['news'] = $this->news_model->get_news();
        $data['title'] = '新聞模組';
        //載入view並且把$data傳入，新聞總覽頁面現在已經完成了
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }
    //顯示個別的新聞的頁面，只需要在控制器增加一些程式並新增一個檢視
    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);
        $data['play'][0] = "風景優美、氣候宜人、充滿文化氣息感覺可以一秒變文青。";
        $data['play'][1] = "東西非常好吃，吃起來有種很自由很民主很臺的feel，感覺就是不一樣。";
        $data['play'][2] = "很好逛的地方，路上還遇到乃哥!但是我不敢問他是不是輸不起。";
        $data['play'][3] = "是個很棒的隱藏景點，感謝不帶腦出遊帶我來到這裡。";
        $data['play'][4] = "我放空使用不帶腦出遊就到了這裡，感覺真的可以不帶腦玩臺灣。";
        $data['play'][5] = "在都市中幾乎是難得的綠地規劃，甚至還能自己動手栽種。一踏入園區媽媽很是驚訝，本市原來還有這麼寬廣的地方啊。";
        $data['play'][6] = "百花爭鳴，人比花多，賞花賞月賞人潮";
        $data['play'][7] = "因為晚上營業，沒有交通工具，所以除了攤商與在地人，知道的人還不多，但是少數讓我驚豔的景點。";
        $data['play'][8] = "剛剛的燈火輝煌，彷彿浦島太郎到了龍宮一遊，也像是劉姥姥進了大觀園，更讓我體會「台灣越夜越美麗」";
        $data['play'][9] = "This place really Fuxking amazing.Now I know why here call Formosa";
        $data['play'][10] = "回程時，因為等不到客運，又多走了幾公里的路程。累了就只好叫計程車回火車站($450)，不這也是一種體驗生活噜。";
        $data['play'][11] = "美景盡收眼底，樂得不知南北東西。";
    
        

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $number = $_GET["id"];
        $data["id"] = $number;

        for($counter = 0;$counter<$number;$counter++)
        {
            $temp = "pic"."$counter";
            $data['pic']["$counter"] = $_GET[$temp];
            $data['testuse'] = $this->news_model->get_pic($_GET[$temp]);
            $data['pic']["$counter"] = $data['testuse']['placeimage'];
            $data['name']["$counter"] = $data['testuse']['placename'];
        }
 

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    //將使用 Form 驗證程式庫檢查是否有表單被送出，以及送出的資料是否通過驗證規則。
    public function create()
    {
        //載入 Form 輔助函式以及 Form Validation 程式庫
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';
        //set_rules() 方法需要三個參數，輸入欄位的名稱，用來顯示在錯誤訊息中的名稱，以及規則。
        //在這個例子中使用的規則，用來表示標題及內文都是必要的欄位。
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }    
}