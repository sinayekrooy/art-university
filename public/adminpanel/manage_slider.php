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
    <title>مدیریت اسلایدر</title>
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
            <li class="active"><a href="manage_slider.php">مدیریت اسلایدر</a></li>
            <li><a href="manage_gallery.php">مدیریت گالری</a></li>
            <li><a href="add_menu_and_item.php">افزودن منو و آیتم</a></li>
            <li><a href="manage_menu_and_item.php">مدیریت منو و آیتم</a></li>
            <li><a href="settings.php">تنظیمات</a></li>
            <li><a href="logout.php">خروج</a></li>
    </nav>
    <section class="wrapper">
        <h1 class="h1">مدیریت اسلایدر</h1>
        <div class="manage_slider">
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
            <div class="slider_items"><img src="images/gallery1.jpg" alt /><button class="edit">ویرایش</button><button class="delete">حذف</button></div>
        </div>
    </section>
</body>
</html>
<?php } ?>