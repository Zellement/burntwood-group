		<?php $images = get_field('gallery'); if( $images ): ?>

			<div class="gallery">

				<h4 class="title">Gallery</h4>

			    <ul>
			        <?php foreach( $images as $image ): ?>
			            <li>
			                <a class="swipebox" href="<?php echo $image['sizes']['large']; ?>">
			                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php the_field('h1'); ?>" />
			                </a>
			            </li>
			        <?php endforeach; ?>
			    </ul>

			</div>

		<?php endif; ?>