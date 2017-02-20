<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>افزودن خبر</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <section class="topline"></section>
    <nav>
        <ul>
            <li><a href="index.php">صفحه اصلی</a></li>
            <li class="active"><a href="add_news.php">افزودن خبر</a></li>
            <li><a href="manage_news.php">مدیریت خبر</a></li>
            <li><a href="add_slider.php">افزودن اسلایدر</a></li>
            <li><a href="manage_slider.php">مدیریت اسلایدر</a></li>
            <li><a href="manage_gallery.php">مدیریت گالری</a></li>
            <li><a href="add_menu_and_item.php">افزودن منو و آیتم</a></li>
            <li><a href="manage_menu_and_item.php">مدیریت منو و آیتم</a></li>
            <li><a href="settings.php">تنظیمات</a></li>
            <li><a href="logout.php">خروج</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <h1 class="h1">افزودن خبر</h1>
        <div class="content">
            <label>موضوع خبر :</label>
            <input type="text" name="Title" placeholder="موضوع خبر" />
            <label>ویرایشگر  :</label>
            <textarea></textarea>
            <label>
                افزودن خبر به عنوان :
            <select>
                <option>1</option>
                <option>2</option>
            </select>
            </label>
            <input type="submit" name="add_news" value="ثبت" />
        </div>
    </section>
</body>
</html>
