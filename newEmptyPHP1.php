<?php

global $row;
define("SITEROOT","http://profitsportsbetting.com/");


  global $menu_array;

//selected='".$value['active']."'

function list_groups($parent)
{
    $has_childs = false;
    $style="padding-left:8px ";
    global $menu_array;
    
    foreach($menu_array as $key => $value)
    {
        if ($value['parent'] == $parent) 
        {               
            /*if ($has_childs === false)
            {
                echo "<ul>";
                $has_childs = true;
            }*/
            echo "<option value='".$value['id']."' style='".$style.";'  >".$menu_array[$value['parent']]['title']." »»» ".$value['title'];
            list_groups($key);
            echo '</option>';
        }
    }
    // if ($has_childs === true) echo "</ul>";
}



function list_groups3($parent)
{
    $has_childs = false;
    $style="padding-left:8px ";
    global $menu_array2;
  
    foreach($menu_array2 as $key => $value)
    {
        if ($value['parent'] == $parent) 
        {               
            /*if ($has_childs === false)
            {                        
                echo "<ul>";
                $has_childs = true;
            }*/
            echo "<option value='".$value['id']."' style='".$style.";' ".$value['active']." >".$menu_array2[$value['parent']]['title']." »»» ".$value['title'];
            list_groups3($key);
            echo '</option>';
        }
    }
   // if ($has_childs === true) echo "</ul>";
}

function list_groups2($parent)
{
    $has_childs = false;
    global $menu_array;
    
    foreach($menu_array as $key => $value)
    {
        if ($value['parent'] == $parent) 
        {           
            if ($has_childs === false)
            {
                $has_childs = true;
                echo '<ul>';  
            }
            echo "<li><a href='".SITEROOT."category/".$value['id']."/".strcng($value['title'])."' >".$value['title']."</a>";
            list_groups2($key);
            echo '</li>';
        }
    }
    if ($has_childs === true) echo '</ul>';
}





$msg['ok']="<br> Operation was successful.<br>";

		$msg['faild']="<br>Operation was unsuccessful.<br>";

		$msg['title']="<br>Title is required.<br>";

		$msg['type']="<br>Image type is invalid.<br>";

		$msg['uploadfaild']="<br>Upload faild.<br>";







function right(){

	global $row;



	?>

            <div id="right">

            <div class="box">

               <h2><?php 

			   echo $row[0][1]

			   ?></h2>

               <?php 

			   echo $row[0][2]

			   ?>

                <div class="boxShadow"></div>

            </div>



            <div class="box">

                <h2><?php echo $row[1][1]; ?></h2>

                <p><?php echo $row[1][2]; ?></p>

              

              <div class="boxShadow"></div>

            </div>

 <div class="box">

                <h2>Pages</h2>
<ul>
<?php 
$sqlpage="select * from `post` where `ps_id` > 14 order by `ps_id` DESC LIMIT 7 ";
$querypage=mysql_query($sqlpage) or die(mysql_error()) ;
while($page=mysql_fetch_array($querypage))
{

             echo "<li><a href='".SITEROOT."pages/".$page['ps_id']."/".strcng($page['ps_title'])."' >".$page['ps_title']."</a></li>";
 }  ?>
    </ul>          
<p><a href="<?php echo SITEROOT?>pages/">All pages</a></p>
              <div class="boxShadow"></div>

            </div>

         



            <div class="box contactBox">

               



                <span class="name">Michael & Steve Davidson</span>

                

                <span class="address">

                    PO Box 356

                    Mandurah

                    WA 6210

                    Australia

                </span>

 

                <a href="mailto:Michael_racing@yahoo.com" class="learnMore centerizeText email">Michael_racing@yahoo.com</a>

                <div class="boxShadow"></div>

            </div>



        </div>



        <div class="clear"></div>



        <div class="box">

            <div class="bottomBox">

                <h2 class="centerizeText"><?php echo $row[2][1]; ?></h2>

                <p><?php echo $row[2][2]; ?></p>

            </div>

            <div class="bottomBox">

                <h2 class="centerizeText"><?php echo $row[3][1]; ?></h2>

                <p><?php echo $row[3][2]; ?></p>

            </div>

            <div class="bottomBox">

                <h2 class="centerizeText"><?php echo $row[6][1]; ?></h2>

               <?php echo $row[6][2]; ?>

            </div>

            <div class="bottomBox">

                <h2 class="centerizeText"><?php echo $row[7][1]; ?></h2>

                <?php echo $row[7][2]; ?>

            

            </div>

            <div class="clear"></div>

            <div class="boxShadow"></div>

        </div>









        <div id="footer">

            <a href="#" class="logo"></a>



            <ul>

                <li><a href="<?php echo SITEROOT; ?>index.php">Home</a></li>

                <li><span>|</span></li>

                <li><a href="<?php echo SITEROOT; ?>products.php">Products</a></li>

                <li><span>|</span></li>

                <li><a href="<?php echo SITEROOT; ?>aboutus.php">About Us</a></li>

                <li><span>|</span></li>

                <li><a href="<?php echo SITEROOT; ?>contactus.php">Contact Us</a></li>

                <li><span>|</span></li>

                

            </ul>





           

            <p class="copyright">
                Copyright @2013 <a href="http://profitsportsbetting.com"> <b> profitsportsbetting.com  </b></a> by <a href="#"> <b>Michael</b></a>

                <br/>

                Horse Racing Software, Horse Racing Systems

            </p>



            

        </div>



    </div>





</body>

</html>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47291496-1', 'profitsportsbetting.com');
  ga('send', 'pageview');
</script>
    <?php 
$currentpage=curPageURL();
	$user_ip = getUserIP();
	$time=date("Y-m-d H:i:s"); 
	$referer=$_SERVER["HTTP_REFERER"];
$sql = "INSERT INTO `page_ip` ( `ip`, `page`,`referer`, `time`) VALUES ( '$user_ip', '$currentpage','$referer', '$time')";
			$query=mysql_query($sql) ;
	
	}

	/////////////////////////////////////////////////////////


function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
	
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
/////////////////////////////////////////////////////////////////////

	function left (){

		?>

		 <div id="left">

<?php

global $row;

$post="select * from `post` ";

$post=mysql_query($post);

while($row1=mysql_fetch_array($post))

{

	$row[]=$row1;

	}

  global $menu_array;

 

$groups_res = mysql_query("SELECT * FROM cat ORDER BY c_w");

        

while($groups = mysql_fetch_array($groups_res))

{

$menu_array[$groups['c_id']] = array('id' => $groups['c_id'], 'title' => $groups['c_title'],'parent' => $groups['c_parent']);

}



$catroot= mysql_query("SELECT * FROM cat where `c_parent` = 1 ORDER BY c_w");



while($cat = mysql_fetch_array($catroot))

{

?>

        

        

          <div class="box">

                <h2><?php echo $cat['c_title']?></h2>

               <?php list_groups2($cat['c_id']); ?>

                <img src="<?php echo SITEROOT; ?>images/horse.png" alt="" class="logo"/>

                <div class="boxShadow"></div>

            </div>

            

            <?php

            

}?>

            

               <div class="box">

                <h2><?php echo $row[8][1]; ?></h2>

                <?php echo $row[8][2]; ?>

                <div class="boxShadow"></div>

            </div>

        

        

   

        </div>

		<?php }


function strcng($str)
{
	
	
	$arr = array(" ", "$" , "*" , "@" , "#" , "%" , "^" , "-");
	
	$result = str_replace($arr, "-", $str);
	return $result;
	
	
	
	}



?>