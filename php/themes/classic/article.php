<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $article['meta']['title']; ?></h2>
	<p class="blog-post-meta"><?php  echo date($global['date.format'],strtotime($article['meta']['date']));  ?> By <a href="#"><?php  echo isset($article['meta']['author']) ? $article['meta']['author'] : $global['author.name'] ;  ?></a></p>
<hr>
    <?php echo $article['content']; ?>
<hr>
    <div class="blog-post-meta-tags">
      Tags : 
      <?php
        foreach ($article['meta']['tag'] as $slug => $tag) {
          echo '<span class="tag-list"><a href="/tag/' . $slug .'">' . $tag->name . "</a></span>";
        }
        ?>
    </div>
<hr>
    <?php if($global['disqus.username']){?>
      <div id="disqus_thread"></div>
      <script type="text/javascript" src="http://disqus.com/forums/<?php echo $global['disqus.username']; ?>/embed.js"> </script>
    <?php }?>

</div>

