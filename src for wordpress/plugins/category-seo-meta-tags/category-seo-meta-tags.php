<?php
/*
Plugin Name: CSMT Aspect + Last-Modified
Description: Добавляет возможность добавлять мета-теги для категории, страницы тегов и пользовательских таксономий. Этот плагин предназначен для работы с All In One SEO плагином. + Установка HTTP заголовка Last-Modified
Author: Роман Ряховский, Bala Krishna, Sergey Yakovlev
Version: 2.9.1
*/

$csmt_domain = "category-seo-meta-tags";
$csmt_version = '2.9.1';
$csmt_is_setup = 0;

session_start();
function dis_seo(){
	$csmt_options = get_option('csmt_options');
	  if ($csmt_options['csmt_all_seo_out']==1){
			function zaglushka_all_seo() {
				$rex='';
				return $rex;
			}
			
			add_filter('aioseop_keywords','zaglushka_all_seo');
			add_filter('aioseop_description','zaglushka_all_seo');
		}
}
function theme_category_seo_title($title) {
  if ( is_category() ) {
	  dis_seo();
    return apply_filters('aioseop_category_title', $title);
  } elseif ( is_tag() || is_tax()  ) {
	  dis_seo();
    return apply_filters('aioseop_tag_title', $title);
  }

  
  return $title;
}

function csmt_setup(){
  global $csmt_domain, $csmt_is_setup;

/*  if($csmt_is_setup) {
    return;
  }
*/
  if (function_exists('load_plugin_textdomain')) {
    //load_plugin_textdomain($csmt_domain, PLUGINDIR . '/' . dirname(plugin_basename(__FILE__)) . 'locale');
    load_plugin_textdomain($csmt_domain, false, dirname(plugin_basename(__FILE__)) . '/locale');
  }
}

register_activation_hook(__FILE__,'csmt_activation');

function csmt_activation(){
	global $csmt_domain;
	if(!get_option('csmt_options')){
		$csmt_options = get_option('csmt_options');
		$csmt_options['csmt_enabled'] = "1";
		$csmt_options['csmt_last_modified'] = "1";
		$csmt_options['csmt_all_seo_out'] = "0";
		$csmt_options['csmt_enabled'] = "1";
		$csmt_options['csmt_cat_title_format'] = ("%category_title%");
		$csmt_options['csmt_cat_paged_format'] = (" - Страница %page_num%");
		$csmt_options['csmt_tag_title_format'] = ("%tag_title%");
		$csmt_options['csmt_tag_paged_format'] = (" - Страница %page_num%");
		update_option('csmt_options',$csmt_options);
	}
}

function cat_seo_title_tag()
{
	show_category_meta_title();
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit'] and isset($_REQUEST['csmt_cat_title_format'])) {
		if(isset($_REQUEST['csmt_enabled'])) {
			$csmt_options['csmt_enabled'] = "1";
		} else {
			$csmt_options['csmt_enabled'] = "0";
		}
		$csmt_options['csmt_last_modified'] = $_REQUEST['csmt_last_modified'];
		$csmt_options['csmt_all_seo_out'] = $_REQUEST['csmt_all_seo_out'];
		$csmt_options['csmt_cat_title_format'] = $_REQUEST['csmt_cat_title_format'];
		$csmt_options['csmt_cat_paged_format'] = $_REQUEST['csmt_cat_paged_format'];
		$csmt_options['csmt_tag_title_format'] = $_REQUEST['csmt_tag_title_format'];
		$csmt_options['csmt_tag_paged_format'] = $_REQUEST['csmt_tag_paged_format'];
		$csmt_options['csmt_taxonomies'] = $_REQUEST['csmt_taxonomies'];
		update_option('csmt_options',$csmt_options);
}

if(isset($_POST['action']) && $_POST['action']=="editedtag" && $_POST['taxonomy']=="category") {
	if (empty ($_POST['cat_title'])){
		$_POST['cat_title']=get_cat_name($_POST['tagid']);
	}
    $cat_meta_setting['page_title']=$_POST['cat_title'];
    $cat_meta_setting['description']=$_POST['cat_desc'];
    $cat_meta_setting['metakey']=$_POST['cat_keywords'];
	if(!empty($cat_meta_setting['page_title'])) {
		 update_option('cat_meta_key_'.$_POST['tag_ID'],$cat_meta_setting);
	}
}

if(isset($_POST['action']) && $_POST['action']=="editedtag" && $_POST['taxonomy']=="post_tag") {
	if (empty ($_POST['tag_title'])){
			$_POST['tag_title']=$_POST['origname'];
		}
    $tag_meta_setting['page_title']=$_POST['tag_title'];
    $tag_meta_setting['description']=$_POST['tag_desc'];
    $tag_meta_setting['metakey']=$_POST['tag_keywords'];
	if(!empty($tag_meta_setting['page_title'])) {
		 update_option('tag_meta_key_'.$_POST['tag_ID'],$tag_meta_setting);
	}	 
}
$csmt_options = get_option('csmt_options');
$taxonomies = $csmt_options['csmt_taxonomies'];
if(is_array($taxonomies)) {
foreach ($taxonomies as $taxonomy ) {
	if(isset($_POST['action']) && $_POST['action']=="editedtag" && $_POST['taxonomy']==$taxonomy) {
		if (empty ($_POST['tag_title'])){
			$_POST['tag_title']=$_POST['origname'];
		}
		$tag_meta_setting['page_title']=$_POST['tag_title'];
		$tag_meta_setting['description']=$_POST['tag_desc'];
		$tag_meta_setting['metakey']=$_POST['tag_keywords'];
		if(!empty($tag_meta_setting['page_title'])) {
			 update_option($taxonomy.'_meta_key_'.$_POST['tag_ID'],$tag_meta_setting);
		}
	}
}
}
// Meta Placement for category and tag pages

function show_category_meta() {
	global $wp_query, $wpsc_query;
	$is_wpsc_bk = 0;
	$csmt_options = get_option('csmt_options');
	$cur_cat_id = get_cat_id( single_cat_title("",false) );
	if(is_category($cur_cat_id)) {
		get_current_cat_meta($cur_cat_id);
	}

	if(is_tag()) {
		$cur_tag_id = get_query_var('tag_id');
		get_current_tag_meta($cur_tag_id);
	}
	
	if (isset($wpsc_query->query_vars['wpsc_product_category']) && !isset($wpsc_query->query_vars['wpsc-product'])) {
		$current_taxonomy = 'wpsc_product_category';
		$tag = get_term_by('slug', $wpsc_query->query_vars['wpsc_product_category'], 'wpsc_product_category');
		$cur_tag_id = $tag->term_id;
		$tag_meta_data = get_option($current_taxonomy.'_meta_key_'.$cur_tag_id); 
		$current_taxonomy_val =	$wpsc_query->query_vars[$current_taxonomy];
		get_current_tax_meta($current_taxonomy,$cur_tag_id);	
	} else if(is_tax()) { // 4
		//echo "TAX TRUE";
		$taxonomies = $csmt_options['csmt_taxonomies'];
		if(is_array($taxonomies)) { // 3
			foreach ($taxonomies as $taxonomy ) { // 2
				$taxonomy_val =	get_query_var($taxonomy);
				if(is_tax($taxonomy,$taxonomy_val)) { // 1
					$tag = get_term_by('slug', $taxonomy_val, $taxonomy);
					$cur_tag_id = $tag->term_id;
					get_current_tax_meta($taxonomy,$cur_tag_id);	
				} // 1
			} // 2
		} // 3	
	} // 4
}

function show_category_meta_title() {
	$cur_cat_id = get_cat_id( single_cat_title("",false) );
	if(is_category($cur_cat_id)) {
		show_category_title($cur_cat_id);
	}
}

function show_category_title() {
	$cur_cat_id = get_cat_id( single_cat_title("",false) );
	$csmt_options = get_option('csmt_options');
	if(get_option('cat_meta_key_'.$cur_cat_id) && $csmt_options['csmt_enabled']) {
		$cat_meta_data = get_option('cat_meta_key_'.$cur_cat_id);
		$title = "";
		$title2 = "";
		$csmt_options = get_option('csmt_options');
		$title = str_replace('%category_title%', $cat_meta_data['page_title'], $csmt_options['csmt_cat_title_format']);
		$title = str_replace('%blog_title%', get_bloginfo('name'), $title);
		if(is_paged())
		{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$title2 = str_replace('%page_num%', $paged, $csmt_options['csmt_cat_paged_format']);
		}
		$title = $title.$title2;
	} else {
		$title = str_replace('%category_title%', single_cat_title("",false), $csmt_options['csmt_cat_title_format']);
		$title = str_replace('%blog_title%', get_bloginfo('name'), $title);
		if(is_paged())
		{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$title2 = str_replace('%page_num%', $paged, $csmt_options['csmt_cat_paged_format']);
		}
		$title = $title.$title2;
	}
	return $title;
}

function show_tag_title() {
	$csmt_options = get_option('csmt_options');
	$taxonomies = $csmt_options['csmt_taxonomies'];
	//echo "TAX TRUE";
	global $wp_query, $wpsc_query;
	$is_wpsc_bk = 0;
	if (isset($wpsc_query->query_vars['wpsc_product_category']) && !isset($wpsc_query->query_vars['wpsc-product'])) {
		$taxonomy = 'wpsc_product_category';
		$tag = get_term_by('slug', $wpsc_query->query_vars['wpsc_product_category'], 'wpsc_product_category');
		$cur_tag_id = $tag->term_id;
		$tag_meta_data = get_option($taxonomy.'_meta_key_'.$cur_tag_id); 
		$current_taxonomy = $taxonomy;
		//$current_taxonomy_val =	get_query_var($taxonomy); 	
		$current_taxonomy_val =	$wpsc_query->query_vars['wpsc_product_category'];
		$is_wpsc_bk = 1; 	
	} else if(is_tax()) {
		if(is_array($taxonomies)) {
			foreach ($taxonomies as $taxonomy ) {
				$taxonomy_val =	get_query_var($taxonomy);
				if(is_tax($taxonomy,$taxonomy_val)) {
					$tag = get_term_by('slug', $taxonomy_val, $taxonomy);
					$cur_tag_id = $tag->term_id;
					$tag_meta_data = get_option($taxonomy.'_meta_key_'.$cur_tag_id); 
					$current_taxonomy = $taxonomy;
					$current_taxonomy_val =	get_query_var($taxonomy); 	
				}
			}
		}	
	} else {
		$cur_tag_id = get_query_var('tag_id');
		$tag_meta_data = get_option('tag_meta_key_'.$cur_tag_id);
	}
	if($is_wpsc_bk && get_option($current_taxonomy.'_meta_key_'.$cur_tag_id) && $csmt_options['csmt_enabled']) {
		$title = "";
		$title2 = "";
		$title = str_replace('%tag_title%', $tag_meta_data['page_title'], $csmt_options['csmt_tag_title_format']);
		$title = str_replace('%blog_title%', get_bloginfo('name'), $title);
		if(is_paged())
		{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$title2 = str_replace('%page_num%', $paged, $csmt_options['csmt_tag_paged_format']);
		}
		$title = $title.$title2;
	} else if(is_tax() && get_option($current_taxonomy.'_meta_key_'.$cur_tag_id) && $csmt_options['csmt_enabled']) {
		$title = "";
		$title2 = "";
		$title = str_replace('%tag_title%', $tag_meta_data['page_title'], $csmt_options['csmt_tag_title_format']);
		$title = str_replace('%blog_title%', get_bloginfo('name'), $title);
		if(is_paged())
		{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$title2 = str_replace('%page_num%', $paged, $csmt_options['csmt_tag_paged_format']);
		}
		$title = $title.$title2;
	} else if(get_option('tag_meta_key_'.$cur_tag_id) && $csmt_options['csmt_enabled']) {
		$title = "";
		$title2 = "";
		$title = str_replace('%tag_title%', $tag_meta_data['page_title'], $csmt_options['csmt_tag_title_format']);
		$title = str_replace('%blog_title%', get_bloginfo('name'), $title);
		if(is_paged())
		{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$title2 = str_replace('%page_num%', $paged, $csmt_options['csmt_tag_paged_format']);
		}
		$title = $title.$title2;
	} else {
		$title = str_replace('%tag_title%', ucwords(single_tag_title("", false)), $csmt_options['csmt_tag_title_format']);
		$title = str_replace('%blog_title%', get_bloginfo('name'), $title);
		if(is_paged())
		{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$title2 = str_replace('%page_num%', $paged, $csmt_options['csmt_tag_paged_format']);
		}
		$title = $title.$title2;
	}
	//$title = $current_taxonomy." ".$current_taxonomy_val." ".$cur_tag_id." ".$title;
	//$title = $cur_tag_id." ".$title;
	return $title;
}


function get_current_cat_meta($cur_cat_id) {
	$csmt_options = get_option('csmt_options');
	global $csmt_version;
	if(get_option('cat_meta_key_'.$cur_cat_id) && $csmt_options['csmt_enabled']) {
		$cat_meta_data = get_option('cat_meta_key_'.$cur_cat_id);
		
		echo '<!-- Category SEO Meta Tags '.$csmt_version.' -->'."\r\n";
	  
			if ($csmt_options['csmt_all_seo_out']==1){
				echo '<!-- Включена заглушка для All In One SEO -->'."\r\n";
			}
			
			echo '<meta name="keywords" content="'.$cat_meta_data['metakey'].'" />'."\r\n";
			echo '<meta name="description" content="'.$cat_meta_data['description'].'" />'."\r\n";
		
		echo '<!-- Category SEO Meta Tags '.$csmt_version.' -->'."\r\n";
	}
}

function get_current_tag_meta($cur_tag_id) {
	$csmt_options = get_option('csmt_options');
	global $csmt_version;
	if(get_option('tag_meta_key_'.$cur_tag_id) && $csmt_options['csmt_enabled']) {
		$tag_meta_data = get_option('tag_meta_key_'.$cur_tag_id);
		
		echo '<!-- Category SEO Meta Tags '.$csmt_version.' -->'."\r\n";
		
			if ($csmt_options['csmt_all_seo_out']==1){
				echo '<!-- Включена заглушка для All In One SEO -->'."\r\n";
			}
			
			echo '<meta name="keywords" content="'.$tag_meta_data['metakey'].'" />'."\r\n";
			echo '<meta name="description" content="'.$tag_meta_data['description'].'" />'."\r\n";
			
		echo '<!-- Category SEO Meta Tags '.$csmt_version.' -->'."\r\n";
	}
}

function get_current_tax_meta_desc($taxonomy,$cur_tag_id) {
		$csmt_options = get_option('csmt_options');
	if(get_option($taxonomy.'_meta_key_'.$cur_tag_id) && $csmt_options['csmt_enabled']) {
		$tag_meta_data = get_option($taxonomy.'_meta_key_'.$cur_tag_id);
		return $tag_meta_data['description'];
	}
}
			
function get_current_tax_meta($taxonomy,$cur_tag_id) {
	$csmt_options = get_option('csmt_options');
	global $csmt_version;
	if(get_option($taxonomy.'_meta_key_'.$cur_tag_id) && $csmt_options['csmt_enabled']) {
	  $tag_meta_data = get_option($taxonomy.'_meta_key_'.$cur_tag_id);
	  
		echo '<!-- Category SEO Meta Tags '.$csmt_version.' -->'."\r\n";
	  
			if ($csmt_options['csmt_all_seo_out']==1){
				echo '<!-- Включена заглушка для All In One SEO -->'."\r\n";
			}
			
			echo '<meta name="keywords" content="'.$tag_meta_data['metakey'].'" />'."\r\n";
			echo '<meta name="description" content="'.$tag_meta_data['description'].'" />'."\r\n";
		
		echo '<!-- Category SEO Meta Tags '.$csmt_version.' -->'."\r\n";
	}
}

add_action('admin_menu', 'csmt_admin_menu');

function csmt_admin_menu() {
  global $csmt_domain;
  add_options_page(__('CSMT Settings', $csmt_domain), __('CSMT Settings', $csmt_domain), 'manage_options', 'csmt', 'csmt_admin_options');
  //add_options_page('CSMT Settings', 'CSMT Settings', 'manage_options', 'csmt', 'csmt_admin_options');

}

function csmt_admin_options() {
  global $csmt_domain;
	echo "<h1>Настройки CSMT</h1>";
  if (!current_user_can('manage_options'))  {
    wp_die( _e('You do not have sufficient permissions to access this page.', $csmt_domain) );
  }

  echo '<div class="wrap">';
  if(isset($_REQUEST['submit']) and $_REQUEST['submit']) {
  echo '<div class="updated fade" id="message">';
  echo '<p>' . _e("Настройки CSMT обновлены", $csmt_domai) . '</p>';
  echo '</div>';
  }
  echo '<div id="poststuff">';
  echo '<div id="postdiv" class="postarea">';

$csmt_options = get_option('csmt_options');
?>
<table>
<tbody>
<tr>
<td valign="top">

<form name="csmtform" id="csmtform" action="" method="post">
<input type="checkbox" name="csmt_enabled" value="1" id="csmt_enabled" <?php if($csmt_options['csmt_enabled']=='1') print " checked='checked'"; ?> />
<label for="<?php echo $option?>"> <?php echo _e("Enable CSMT", $csmt_domain); ?></label><br />

<input type="checkbox" name="csmt_last_modified" value="1" id="csmt_last_modified" <?php if($csmt_options['csmt_last_modified']=='1') print " checked='checked'"; ?> />
<label for="<?php echo $option?>"> <?php echo _e("Enable Last-Modified", $csmt_domain); ?> <span style="color:gray;">(Глючит с корзиной WooCommerce, поэтому стоит исключение для страниц /cart и /korzina)</span></label><br />

<input type="checkbox" name="csmt_all_seo_out" value="1" id="csmt_all_seo_out" <?php if($csmt_options['csmt_all_seo_out']=='1') print " checked='checked'"; ?> />
<label for="<?php echo $option?>"> <?php echo _e("Disable the output of meta tags in the category in the plugin All in one SEO", $csmt_domain); ?></label><br />

<br />
<?php echo _e("Формат заголовка категорий", $csmt_domain); ?> <br /><input name="csmt_cat_title_format" id="csmt_cat_title_format" value="<?php echo $csmt_options['csmt_cat_title_format']; ?>" style="width:290px;" /><br />
<em><span style="color:#F00"><?php echo _e("Формат тега для рубрик. Как надо: %category_title%", $csmt_domain); ?></span></em>
<br /><br />
<?php echo _e("Формат нумерации категорий", $csmt_domain); ?> <br /><input name="csmt_cat_paged_format" id="csmt_cat_paged_format" value="<?php echo $csmt_options['csmt_cat_paged_format']; ?>" style="width:290px;" /><br />
<em><span style="color:#F00"><?php echo _e("Формат нумерации страниц. Как надо: - Страница %page_num%", $csmt_domain); ?></span></em>
<br /><br />
<?php echo _e("Формат заголовка меток", $csmt_domain); ?> <br /><input name="csmt_tag_title_format" id="csmt_tag_title_format" value="<?php echo $csmt_options['csmt_tag_title_format']; ?>" style="width:290px;" /><br />
<em><span style="color:#F00"><?php echo _e("Формат тега для меток. Как надо: %tag_title%", $csmt_domain); ?></span></em>
<br /><br />
<?php echo _e("Формат нумерации меток", $csmt_domain); ?> <br /><input name="csmt_tag_paged_format" id="csmt_tag_paged_format" value="<?php echo $csmt_options['csmt_tag_paged_format']; ?>" style="width:290px;" /><br />
<em><span style="color:#F00"><?php echo _e("Формат нумерации страниц. Как надо: - Страница %page_num%", $csmt_domain); ?></span></em>
<br /><br />

<?php echo _e("Выберите произвольные таксономии", $csmt_domain); ?> <br />
<select name="csmt_taxonomies[]" MULTIPLE>
<?php 
$taxonomies=get_taxonomies('','names'); 
foreach ($taxonomies as $taxonomy ) {
  //echo '<p>'. $taxonomy. '</p>';
  	if($taxonomy=='category' || $taxonomy=='post_tag'  || $taxonomy=='nav_menu' || $taxonomy=='link_category' || $taxonomy=='post_format' ) { } else {
		echo "<option ";
		if(is_array($csmt_options['csmt_taxonomies']) && in_array($taxonomy,$csmt_options['csmt_taxonomies'])) echo "selected ";
		echo "name=\"taxonomies\">$taxonomy";
		echo "</option>";
	}
}
?>
</select>
<br /><br />
<input type="hidden" id="user-id" name="user_ID" value="<?php echo (int) $user_ID ?>" />
<span id="autosave"></span>
<input class="button-primary" type="submit" name="submit" value="<?php echo 'Сохранить настройки'; ?>" style="font-weight: bold;" />
</form>
</td>
</tr>
</tbody>
</table>


<?php 
  echo '</div>';
  echo '</div>';
  echo '</div>';
}

function category_meta_form() {
global $csmt_domain;
if(($_GET['post_type']=="post") or (isset($_GET['action']) && $_GET['action']=="edit")) {
?>
<div class="icon32" id="icon-edit"><br></div>
<h2><?php echo _e("Category Meta Setting", $csmt_domain); ?></h2>
<?php $cat_meta = get_option('cat_meta_key_'.$_GET['tag_ID']); //print_r( $cat_meta); ?>
<table class="form-table" >
<tbody>
  <tr class="form-field">
  <th valign="top" scope="row"><label for="cat_title"><?php echo _e("Category Title", $csmt_domain); ?>:</label></th>
    <td><input name="cat_title" type="text" size="40" value="<?php echo $cat_meta['page_title']; ?>" />
    <p class="description"><?php echo _e("Enter category title tag here.", $csmt_domain); ?>
	<?php echo "<input type='hidden' name='tagid' value='$_GET[tag_ID]'>"; ?>
</p>
    </td>
  </tr>
    <tr class="form-field">
  <th valign="top" scope="row"><label for="cat_title"><?php echo _e("Keywords", $csmt_domain); ?>:</label></th>
    <td><input name="cat_keywords" type="text" size="40" value="<?php echo $cat_meta['metakey']; ?>" />
    <p class="description"><?php echo _e("Enter category keywords here.", $csmt_domain); ?></p></td>
  </tr>
  <tr class="form-field">
  <th valign="top" scope="row"><label for="cat_title"><?php echo _e("Description", $csmt_domain); ?>:</label></th>
    <td><textarea name="cat_desc" size="40" rows="4"><?php echo $cat_meta['description']; ?></textarea>
    <p class="description"><?php echo _e("Enter category description text here.", $csmt_domain); ?></p>
    </td>
  </tr>
 </tbody> 
</table>
<?php
}
}

$_SESSION['pr_mass']=$csmt_options['csmt_taxonomies'];

function tag_meta_form() {
global $csmt_domain;
//if(isset($_GET['action']) && $_GET['action']=="edit") {
	//if(isset($_GET['taxonomy']) && ($_GET['taxonomy']=='post_tag')) $t="Tag"; else $t="Category";
	
	$proverka_pr=0;
	foreach($_SESSION['pr_mass'] as $pr_tax) {
		if($_GET['taxonomy']==$pr_tax) {$proverka_pr=1;}
	}
	if ($proverka_pr==1){
?>
<div class="icon32" id="icon-edit"><br></div>
<h2><?php echo _e("Category Meta Setting", $csmt_domain); ?></h2>
<?php 
if(isset($_GET['taxonomy']) && ($_GET['taxonomy']!='post_tag') ) { 
	$cat_meta = get_option($_GET['taxonomy'].'_meta_key_'.$_GET['tag_ID']); 
} else {
	$cat_meta = get_option('tag_meta_key_'.$_GET['tag_ID']); 
} 

$name_pr_tax = get_term($_GET['tag_ID'], $taxonomy);
$origname=$name_pr_tax->name;   
?>
<table class="form-table" >
<tbody>
  <tr class="form-field">
  <th valign="top" scope="row"><label for="tag_title"><?php echo _e("Category Title", $csmt_domain); ?></label></th>
    <td><input name="tag_title" type="text" size="40" value="<?php echo $cat_meta['page_title']; ?>" />
    <p class="description"><?php echo _e("Enter category title tag here.", $csmt_domain); ?><?php echo "<input type='hidden' name='origname' value='$origname'>"; ?></p>
	
    </td>
  </tr>
  <tr class="form-field">
  <th valign="top" scope="row"><label for="tag_keywords"><?php echo _e("Keywords", $csmt_domain); ?></label></th>
    <td><input name="tag_keywords" type="text" size="40" value="<?php echo $cat_meta['metakey']; ?>" />
    <p class="description"><?php echo _e("Enter category keywords here.", $csmt_domain); ?></p></td>
  </tr>
  <tr class="form-field">
  <th valign="top" scope="row"><label for="tag_desc"><?php echo _e("Description", $csmt_domain); ?></label></th>
    <td><textarea name="tag_desc" size="40" rows="4"><?php echo $cat_meta['description']; ?></textarea>
    <p class="description"><?php echo _e("Enter category description text here.", $csmt_domain); ?></p>
    </td>
  </tr>
 </tbody> 
</table>

<?php
}
}
add_filter('aioseop_title', 'theme_category_seo_title');
add_filter('aioseop_category_title','show_category_title');
add_filter('aioseop_tag_title','show_tag_title');
add_action('edit_category_form', 'category_meta_form');
add_action('edit_tag_form', 'tag_meta_form');
add_action('wp_head','show_category_meta'); 
add_action('plugins_loaded', 'csmt_setup');
add_action('template_redirect', 'Last_Modified_Aspect');



/**
 * Установка HTTP заголовка Last-Modified
*/
 
function Last_Modified_Aspect() {
	$csmt_options = get_option('csmt_options');
	if ($csmt_options['csmt_last_modified']==1 && $_SERVER['REQUEST_URI']!='/cart' && $_SERVER['REQUEST_URI']!='/korzina'){
		if ( ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) || ( is_admin() ) ) {
			return;
		}
	 
		$last_modified = '';

		// Для страниц и записей
		if ( is_singular() ) {
			global $post;
	 
			if ( !isset( $post -> post_modified_gmt ) ) {
				return;
			}
	 
			$post_time = strtotime( $post -> post_modified_gmt );
			$modified_time = $post_time;
	 
			// Если есть комментарий, обновляем дату
			if ( ( int ) $post -> comment_count > 0 ) {
				$comments = get_comments( array(
					'post_id' => $post -> ID,
					'number' => '1',
					'status' => 'approve',
					'orderby' => 'comment_date_gmt',
						) );
				if ( !empty( $comments ) && isset( $comments[0] ) ) {
					$comment_time = strtotime( $comments[0] -> comment_date_gmt );
					if ( $comment_time > $post_time ) {
						$modified_time = $comment_time;
					}
				}
			}
	 
			$last_modified = str_replace( '+0000', 'GMT', gmdate( 'r', $modified_time ) );
		}
	 
	 
		// Cтраницы архивов: рубрики, метки, даты и тому подобное
		if ( is_archive() || is_home() ) {
			global $posts;
	 
			if ( empty( $posts ) ) {
				return;
			}
	 
			$post = $posts[0];
	 
			if ( !isset( $post -> post_modified_gmt ) ) {
				return;
			}
			
			$post_time = strtotime( $post -> post_modified_gmt );
			$modified_time = $post_time;
			$cur_time=time();
			$cur_time_db=date('Y-m-d H:i:s');

			//Если пост у рубрики старее на месяц, обновим его
			if ($cur_time-$modified_time>2629743){
				global $wpdb;
				$wpdb->update('wp_posts',
					array('post_modified_gmt' => $cur_time_db),
					array('ID' => $post->ID)
				);
				$modified_time=$cur_time;
			}
	 
			$last_modified = str_replace( '+0000', 'GMT', gmdate( 'r', $modified_time ) );
		}
	 
	 
		// Если заголовки уже отправлены - ничего не делаем
		if ( headers_sent() ) {
			return;
		}
	 
		if ( !empty( $last_modified ) ) {
			header( 'Last-Modified: ' . $last_modified );
	 
			if ( !is_user_logged_in() ) {
				if ( isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) && strtotime( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) >= $modified_time ) {
					$protocol = (isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');
					header( $protocol . ' 304 Not Modified' );
				}
			}
		}
	}
}


?>