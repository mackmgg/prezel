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
			foreach($pages as $title) {
				echo "<a href='/".lcfirst($title['name'])."'>".$title['name']."</a> ";
			}
			echo "<hr />";
			foreach($posts as $post) {
				echo $post['name']." (".date("m/d/Y",$post['time'])."): ".$post['content']."<br />\n";
			}
		}
	}
?>