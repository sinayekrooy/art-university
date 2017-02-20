<?php
	require_once("../../includes/initialize.php");
?>

<?php
if (!$session->is_logged_in()) { redirect_to("login.php"); }
elseif($session->is_logged_in())
{
	$college = College::find_by_id($session->user_id);
	
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>مدیریت گالری</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <section class="topline"></section>
    <nav>
        <ul>
            <li><a href="index.php">صفحه اصلی</a></li>
            <li><a href="add_news.php">افزودن خبر</a></li>
            <li><a href="manage_news.php">مدیریت خبر</a></li>
            <li><a href="add_slider.php">افزودن اسلایدر</a></li>
            <li><a href="manage_slider.php">مدیریت اسلایدر</a></li>
            <li class="active"><a href="manage_gallery.php">مدیریت گالری</a></li>
            <li><a href="add_menu_and_item.php">افزودن منو و آیتم</a></li>
            <li><a href="manage_menu_and_item.php">مدیریت منو و آیتم</a></li>
            <li><a href="settings.php">تنظیمات</a></li>
            <li><a href="logout.php">خروج</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <h1 class="h1">مدیریت گالری</h1>
        <div class="add_slider">
            <div class="content">
                <label>
                    <span>نام عکس :</span>
                    <input type="text" name="image_title" /></label>
                <label>
                    <span>آدرس عکس :</span>
                    <input id="uploadFile" disabled="disabled" />
                    <input id="uploadBtn" type="file" class="upload" />
                    <input type="submit" value="آپلود عکس" />
            </div>
        </div>
        <div class="manage_gallery">
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
            <div class="items"><img src="images/gallery1.jpg" alt /><button class="delete">حذف</button></div>
        </div>
    </section>
    <script type="text/javascript">
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script>
</body>
</html>
<?php

}

?>