<?php
	namespace pretzel\Views;
	class View {
		static function loadPage($page, $pages) {
			echo "<title>".$page['name']."</title>";
			foreach($pages as $title) {
				echo "<a href='/".lcfirst($title['name'])."'>".$title['name']."</a> ";
			}
			echo "<hr />";
			echo $page['content'];
		}
		static function loadBlog($posts, $pages) {
			echo "<title>Blog</title>";
			foreach($pages as $title) {
				echo "<a href='/".lcfirst($title['name'])."'>".$title['name']."</a> ";
			}
			echo "<hr />";
			foreach($posts as $post) {
				echo "<a href='/blog/".str_replace(" ","_",strtolower($post['name']))."/' >".$post['name']."</a> (".date("m/d/Y",$post['time'])."): ".$post['content']."<br />\n";
			}
		}
		static function loadPost($post, $pages) {
			echo "<title>Blog - ".$post['name']."</title>";
			foreach($pages as $title) {
				echo "<a href='/".lcfirst($title['name'])."'>".$title['name']."</a> ";
			}
			echo "<hr />";
			echo "<h1>".$post['name']."</h1>";
			echo "<h6>".date("m/d/Y",$post['time'])."</h6>";
			echo $post['content'];
		}
	}
?>