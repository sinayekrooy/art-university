<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>تنظیمات</title>
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
            <li class="active"><a href="settings.php">تنظیمات</a></li>
            <li><a href="logout.php">خروج</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <h1 class="h1">تنظیمات</h1>
        <div class="setting">
            <div class="right">
                <h2>تغییر رمز</h2>
                <label>رمز عبور فعلی : <input type="password" name="currentpass" /></label>
                <label>رمز عبور جدید : <input type="password" name="newpass" /></label>
                <label>تکرار رمز عبور : <input type="password" name="re-newpass" /></label>
                <input type="submit" value="ثبت" />
            </div>
            <div class="left">
                <h2>تغییر ایمیل</h2>
                <label>ایمیل فعلی : <input type="email" name="currentmail" /></label>
                <label>ایمیل جدید : <input type="email" name="newmail" /></label>
                <label>تکرار ایمیل : <input type="email" name="re-newmail" /></label>
                <input type="submit" value="ثبت" />
            </div>
        </div>
    </section>
</body>
</html>
