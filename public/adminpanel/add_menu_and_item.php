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
    <title>افزودن منو و آیتم</title>
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
            <li><a href="add_slider.php">افزودن اسلایدر</a></li>
            <li><a href="manage_slider.php">مدیریت اسلایدر</a></li>
            <li><a href="manage_gallery.php">مدیریت گالری</a></li>
            <li class="active"><a href="add_menu_and_item.php">افزودن منو و آیتم</a></li>
            <li><a href="manage_menu_and_item.php">مدیریت منو و آیتم</a></li>
            <li><a href="settings.php">تنظیمات</a></li>
            <li><a href="logout.php">خروج</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <h1 class="h1">افزودن منو و آیتم</h1>
        <div class="add_menu_item">
            <label>عنوان : <input type="text" name="Title" /></label>
            <label class="selects">لیست منو ها:
                <select>
					<?php $college->menu_list(); ?>
                </select>
            </label>
            <label class="selects">آیتم ها:
                <select>
					<?php College::item_list($menu_id=1); ?>
                </select>
            </label>
            <div class="content">
                <div class="content_tab activetab">افزودن محتوا</div>
                <div class="link_tab">افزودن لینک</div>
                <div class="content_content">
                    <textarea></textarea>
                    <input type="submit" name="contenct_submit" value="ثبت" />
                </div>
                <div class="link_content">
                    <input type="url" placeholder="http://" />
                    <input type="submit" name="link_submit" value="ثبت" />
                </div>
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