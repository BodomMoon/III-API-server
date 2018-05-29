<!--
	application/views/news/index.php  
	直接取得controller裡面傳來的資料陣列，直接使用陣列中index當變數
	例如 $data['title']則使用$title即可
-->
<h2><?php echo "本次練習主題：".$title ?></h2>
<!-- 
	因為傳來的資料是 $data[$news['title' ='' ','text' = '']]所以$news還是要拆陣列
-->
<?php foreach ($news as $news_item): ?>
    <!-- 抓$news陣列裡面的質出來用，呼叫他的index來取得資料 -->
    <h3><?php echo $news_item['title'] ?></h3>
    <div class="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="news/<?php echo $news_item['slug'] ?>">查看這則新聞</a></p>

<?php endforeach ?>