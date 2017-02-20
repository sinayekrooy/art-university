<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>افزودن دانشکده و اداره</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <section class="topline"></section>
    <nav>
        <ul>
            <li><a href="#">صفحه اصلی</a></li>
            <li><a href="#">افزودن خبر</a></li>
            <li><a href="#">مدیریت خبر</a></li>
            <li><a href="#">افزودن اسلایدر</a></li>
            <li><a href="#">مدیریت اسلایدر</a></li>
            <li><a href="#">مدیریت گالری</a></li>
            <li class="active"><a href="#">افزودن اداره و دانشکده</a></li>
            <li><a href="#">مدیریت اداره و دانشکده</a></li>
            <li><a href="#">تنظیمات</a></li>
            <li><a href="#">خروج</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <h1 class="h1">افزودن دانشکده و اداره</h1>
        <div class="add_office">
            <div class="content">
                <span class="error">پر کردن فیلد های ستاره دار الزامیست</span>
                <label>
                    <span>نام دانشگاه یا اداره :</span>
                    <input type="text" name="name" /></label>
                <label>
                    <span>نام کاربری :</span>
                    <input type="text" name="username" /></label>
                <label>
                    <span>رمز عبور :</span>
                    <input type="password" name="username" /></label>
                <label>
                    <span>تکرار رمز عبور :</span>
                    <input type="password" name="username" /></label>
                <label>
                    <span>ایمیل :</span>
                    <input type="email" name="username" /></label>
                <label>
                    <span>شماره تلفن :</span>
                    <input type="tel" name="username" /></label>
                <label>
                    <span>دانشکده یا اداره :</span>
                    <select>
                        <option>1</option>
                        <option>2</option>
                    </select></label>
                <input type="submit" value="ثبت" />
            </div>
        </div>
    </section>
</body>
</html>
