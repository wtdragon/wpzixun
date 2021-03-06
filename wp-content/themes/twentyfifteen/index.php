<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
 <div id="mainpic" class="content-mainpic"></div>
<main id="main" class="site-main" role="main">
	<div id="primary" class="content-area">
		
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
                        <div id="hp-newpost" class="new-post"></div>
<?php
$post_num = 10; // 设置调用条数
$args = array(
'post_password'=>'',
'post_status' => 'publish',// 只选公开的文章.
'post__not_in' => array($post->ID),//排除当前文章
'caller_get_posts' => 1,// 排除置顶文章.
'orderby' => 'comment_count',// 依评论数排序.
'posts_per_page' => $post_num
);
$query_posts = new WP_Query();
$query_posts->query($args);
while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
<?php get_template_part( 'content','home' );?>
<?php } wp_reset_query();?>
			<?php
			// Start the loop.
                    //	while ( have_posts() ) : get_archives('postbypost',10);

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
		//		get_template_part( 'content', 'home' );
//        $args = array(
  //          'parent'=>0
    //    );                  
      //  $categories=get_categories($args);
       // foreach($categories as $v) 
        //{ 
          //  echo "<h1 value=''>" . $v->name . "</h1>"; 
       // } 

			// End the loop.
//			endwhile;

			// Previous/next page navigation.
	//		the_posts_pagination( array(
	//			'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
	//			'next_text'          => __( 'Next page', 'twentyfifteen' ),
	//			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
	//		) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
