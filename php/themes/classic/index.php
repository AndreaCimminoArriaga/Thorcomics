<?php
if( count($articles) < 1 ){
  echo "<h3>No articles found!</h3>";
}
else{
  foreach($articles as $article){
?>
<div class="blog-post">
    <h1><a href="<?php echo $article['url']; ?>"><?php echo $article['meta']['title']; ?></a></h1>
	<p class="blog-post-meta"><?php  echo date($global['date.format'],strtotime($article['meta']['date']));  ?> by <a href="#"><?php  echo isset($article['meta']['author'])
                        ? $article['meta']['author']
                        : $global['author.name'] ;  ?></a></p>
<hr>
    <?php echo preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($article['content']), 0, 250)); ?>...
<hr>
    <a href="<?php echo $article['url']; ?>">Read on &raquo;</a>
</div>
<?php
  }
}
?>