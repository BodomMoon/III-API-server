<h2><?php echo $title ?></h2>
<!--validation_errors()當表單驗證錯誤時，用來顯示錯誤訊息-->
<?php echo validation_errors(); ?>
<!--form_open是由 Form 輔助函式 所提供的，它將會顯示表單元素並增加一些額外功能-->
<?php echo form_open('news/create') ?>

    <label for="title">標題</label>
    <input type="input" name="title" /><br /><br />

    <label for="text">內文</label>
    <textarea name="text"></textarea><br /><br />

    <input type="submit" name="submit" value="新增新聞" />

</form><br />