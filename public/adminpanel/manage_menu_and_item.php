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
    <title>مدیریت منو و آیتم</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
</head>
<body>
    <section class="topline"></section>
    <nav>
        <ul>
            <li><a href="index.php">صفحه اصلی</a></li>
            <li><a href="add_news.php">افزودن خبر</a></li>
            <li><a href="manage_news.php">مدیریت خبر</a></li>
            <li class="active"><a href="add_slider.php">افزودن اسلایدر</a></li>
            <li><a href="manage_slider.php">مدیریت اسلایدر</a></li>
            <li><a href="manage_gallery.php">مدیریت گالری</a></li>
            <li><a href="add_menu_and_item.php">افزودن منو و آیتم</a></li>
            <li class="active"><a href="manage_manu_and_item.php">مدیریت منو و آیتم</a></li>
            <li><a href="settings.php">تنظیمات</a></li>
            <li><a href="logout.php">خروج</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <h1 class="h1">مدیریت منو و آیتم</h1>
        <div class="add_menu_item">
            <label>ویرایش عنوان : <input type="text" name="Title" /></label>
            <label class="selects">مادر:
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </label>
            <div class="content">
                <div class="content_tab activetab">ویرایش محتوا</div>
                <div class="link_tab">ویرایش لینک</div>
                <div class="content_content">
                    <textarea></textarea>
                    <input type="file" /><input type="text" class="fileurl" />
                </div>
                <div class="link_content">
                    <input type="url" placeholder="http://" />
                </div>
            <input type="submit" value="ثبت و بازسازی" />

            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".content_tab").click(function () {
                $(this).addClass("activetab");
                $(".link_tab").removeClass("activetab");
                $(".link_content").fadeOut(300);
                $(".content_content").delay(300).fadeIn(300);
            });
            $(".link_tab").click(function () {
                $(this).addClass("activetab");
                $(".content_tab").removeClass("activetab");
                $(".content_content").fadeOut(300);
                $(".link_content").delay(300).fadeIn(300);
            });
        });
    </script>
</body>
</html>
<?php

}

?>