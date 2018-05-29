<?php
class News_model extends CI_Model {
    public function __construct()
    {
        //繼承 CI_Model ，並載入資料庫物件。
        //這使得我們可以使用 $this->db 這個物件來存取資料庫類別。
        $this->load->database();
    }

    public function get_pic($slug = FALSE)
    {
        //取得資料庫中的所有文章，取得所有的新聞資料，也可以根據新聞的 slug 來查詢。
        if ($slug === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('GPS-N' => "$slug"));
        return $query->row_array();
    }

    public function get_news($slug = FALSE)
    {
        //取得資料庫中的所有文章，取得所有的新聞資料，也可以根據新聞的 slug 來查詢。
        if ($slug === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }
    public function set_news()
    {
        $this->load->helper('url');
        /*
        url_title()函式由 URL 輔助函式提供
        會讀取你傳入的字串，使用破折號 (-) 來替換掉空白，並將所有字串轉為小寫。
        最後會產生一個很好的 slug，非常適合用來建立 URI 
        */
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        /*
        處理待會要存入的資料，將其放進 $data 陣列中，陣列中的每個元素都對應到我們建立的資料庫中的欄位
        post() ，它來自 Input 函式庫 。 這個方法用來確保資料已經被消毒
        最後，我們將 $data 存入資料庫當中。而這個程式庫預設就會被自動載入
        */
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
}