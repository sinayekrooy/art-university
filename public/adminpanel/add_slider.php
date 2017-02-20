<?php
	require_once("../../includes/initialize.php");
?>

<?php
$massage="";
if (!$session->is_logged_in()) { redirect_to("login.php"); }
elseif($session->is_logged_in())
{
	$college = College::find_by_id($session->user_id);
	if(isset($_POST['submit']))
	{
		$massage = "sakj";
		$upload->$type = "image";
		$upload->$location = "../public/".College::$college_slider;
		if($upload->load($_FILE['uploadFile']))
		{
			echo $upload->name;
			echo $upload->file_name;
			echo $_POST['image_title'];
			if($college->add_slider-image($upload->name, $upload->file_name, $_POST['image_title']))
			{
				$massage="//error for upload.";
			}
			else
			{
				$massage="//error for upload.";
			}
		}
		else
		{
			$massage="//error for upload.";
		}
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>افزودن اسلایدر</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
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
            <li><a href="manage_menu_and_item.php">مدیریت منو و آیتم</a></li>
            <li><a href="settings.php">تنظیمات</a></li>
            <li><a href="logout.php">خروج</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <h1 class="h1">افزودن اسلایدر</h1>
        <?php echo output_message($massage); ?>
        <div class="add_slider">
            <div class="content">
                <form action="add_slider.php" method="post">
                    <label>
                        <span>عنوان عکس :</span>
                        <input type="text" name="image_title" /></label>
                    <label>
                    <span>آدرس عکس :</span>
                    <input id="uploadFile" disabled="disabled" />
                    <input id="uploadBtn" type="file" class="upload" />
                    <input type="submit" name="submit" value="آپلود عکس" /> 
                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script>
</body>
</html>
<?php } ?>