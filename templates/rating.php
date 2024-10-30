<div class="bp-users-reviews-stars" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="ratingValue"  content="<?php echo $rating['result']; ?>"></span>
    <span itemprop="bestRating"   content="100"></span>
    <span itemprop="ratingCount"  content="<?php echo $rating['count']; ?>"></span>
    <span itemprop="itemReviewed" content="Person"></span>
    <span itemprop="name" content="<?php echo $this->get_username($user_id); ?>"></span>
    <span itemprop="url" content="<?php echo $this->get_user_link($user_id); ?>"></span>
    <?php echo $this->print_stars($this->settings['stars']); ?>
    <div class="active" style="width:<?php echo $rating['result']; ?>%">
        <?php echo $this->print_stars($this->settings['stars']); ?>
    </div>
</div>