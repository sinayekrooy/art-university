<?php
    require_once("../includes/Database.php");
    require_once("../includes/functions.php");
?>
<?php
    require_once("../includes/jdatetime.class.php");
    $date = new jDateTime(true, true, 'Asia/Tehran');
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>دانشکده ادبیات </title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <link href="js/flexslider.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <div class="top_bg"></div>
    <header>
        <div class="logo"></div>
        <div class="left_header">
            <a href="#" class="fa">FA </a>
            <a href="#" class="en">EN </a>
            <p><?php echo $date->date("l j F Y"); ?></p>
            <input type="text" name="Search" placeholder="جستجو" />
            <input type="submit" value="" />
            <button>ورود کاربران</button>
        </div>
        <nav>
            <?php top_menu(1); ?>
        </nav>
    </header>
    <div class="wrapper">
        <section class="sidebar">
            <?php side_menu(1); ?>
        </section>
        <section class="content">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="img/slider.jpg" alt />
                        </li>
                        <li>
                            <img src="img/slider.jpg" alt />
                        </li>
                        <li>
                            <img src="img/slider.jpg" alt />
                        </li>
                        <li>
                            <img src="img/slider.jpg" alt />
                        </li>
                    </ul>
                </div>
            </section>
            <div class="right">
			<?php
			if(isset($_GET['news']))
			{
				$id=$_GET['news'];
				$sql="select *from `news` WHERE `id`='$id'";
				$res=mysql_query($sql) or die (mysql_error());
				$row=mysql_fetch_array($res);
				//var_dump($row);
			?>
				<div class="content">
					<div class="news">
                        <h1><?php echo $row['title']; ?></h1>
                        <p><?php echo $row['description']; ?></p>
                    </div>
				</div>
			<?php
			}
			else
			{
			?>
                <div class="content">
                    <div class="right active" id="news1">
                        <h1>اخبار سایت </h1>
                    </div>
                    <div class="left" id="news2">
                        <h1>رویداد ها </h1>
                    </div>
                    <div class="news1">
					<?php
						$sql="select *from `news` ORDER BY `id` DESC LIMIT 3";
						$res=mysql_query($sql) or die (mysql_error());
						while($row=mysql_fetch_array($res))
						{
					?>
                        <div class="news">
                            <h1><?php echo $row['title']; ?></h1>
                            <p><?php echo $row['abstract']; ?></p>
                            <a href="?news=<?php echo $row['id']; ?>">بیشتر </a>
                        </div>
					<?php
						}
					?>
                    </div>
                    <div class="news2">
                        <div class="news">
                            <h1>تیتر رویداد </h1>
                            <p>متن رویداد </p>
                            <a href="#">بیشتر </a>
                        </div>
                        <div class="news">
                            <h1>تیتر رویداد </h1>
                            <p>متن رویداد </p>
                            <a href="#">بیشتر </a>
                        </div>
                        <div class="news">
                            <h1>تیتر رویداد </h1>
                            <p>متن رویداد </p>
                            <a href="#">بیشتر </a>
                        </div>
                    </div>
                </div>
			<?php
			}
			?>
            </div>
            <div class="left">
                <div class="title">
                    <h1>نظرسنجی</h1>
                </div>
                <div class="content">
                    <p>به نظر شما کدام یک در بهبود دانشگاه موثر است؟</p>
                    <input type="radio" name="nazarsanji" /><span>محیط دانشگاه</span>
                    <input type="radio" name="nazarsanji" /><span>سطح استادان</span>
                    <input type="radio" name="nazarsanji" /><span>بیخیال</span>
                    <input type="radio" name="nazarsanji" /><span>هیچکدام</span>
                    <input type="submit" value="ثبت" />
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
</body>
</html>
