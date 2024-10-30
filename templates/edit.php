<?php
    global $post;
    $criterions = get_post_meta($post->ID, 'criterions', true);
    $user_id = get_post_meta($post->ID, 'user_id', true);
    $user = get_userdata($user_id);
    wp_nonce_field('bp-user-reviews-edit-'.$post->ID, 'bp-user-reviews-edit');
    $users = get_users(array(
            'fields' => array('ID', 'display_name', 'user_login')
    ));

    if(empty($post->stars)) $post->stars = $this->settings['stars'];
    if(empty($post->average)) $post->average = 0;
    if(empty($post->type)) $post->type = $this->settings['criterion'];

?>
<table class="form-table drone-group review-form">
    <tbody>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('User', 'bp-user-reviews'); ?></label></th>
        <td class="user">
            <select name="user_id">
                <?php foreach($users as $user){ ?>
                <option <?php selected($user_id, $user->ID); ?> value="<?php echo $user->ID; ?>"><?php echo $user->display_name; ?> (<?php echo $user->user_login; ?>)</option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('Author', 'bp-user-reviews'); ?></label></th>
        <td class="user">
            <select name="post_author">
            <?php foreach($users as $user){ ?>
                <option <?php selected($post->post_author, $user->ID); ?> value="<?php echo $user->ID; ?>"><?php echo $user->display_name; ?> (<?php echo $user->user_login; ?>)</option>
            <?php } ?>
            </select>
        </td>
    </tr>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('Marks', 'bp-user-reviews'); ?></label></th>
        <td class="marks">
            <p>
                <b><?php _e('Total:', 'bp-user-reviews'); ?></b>
                <span>
                    <?php echo $this->calc_stars($post->average, $post->stars); ?> <?php _e('of', 'bp-user-reviews'); ?> <?php echo $post->stars; ?>
                </span>
                <span>
                    <?php $this->print_stars_admin($post->average, $post->stars); ?>
                </span>
                <input type="hidden" name="total" value="<?php echo esc_attr($post->average); ?>">
            </p>
            <?php if( ! empty( $criterions ) ) {
                foreach ($criterions as $name => $value){ ?>
                    <p>
                        <b><?php echo $name; ?>:</b>
                        <span>
                            <?php echo $this->calc_stars($value, $post->stars); ?> <?php _e('of', 'bp-user-reviews'); ?> <?php echo $post->stars; ?>
                        </span>
                        <span>
                            <?php $this->print_stars_admin($value, $post->stars); ?>
                        </span>
                        <input type="hidden" name="criterions[<?php echo esc_attr($name); ?>]" value="<?php echo esc_attr($value); ?>">
                    </p>
                <?php } } else if( empty( $criterions ) && $this->settings['criterion'] == 'multiple' ){
                    foreach($this->settings['criterions'] as $criterion){ ?>
                    <p>
                        <b><?php echo $criterion; ?>:</b>
                        <span>
                        <?php echo $this->calc_stars(0, $post->stars); ?> <?php _e('of', 'bp-user-reviews'); ?> <?php echo $post->stars; ?>
                        </span>
                        <span>
                            <?php $this->print_stars_admin(0, $post->stars); ?>
                        </span>
                        <input type="hidden" name="criterions[<?php echo esc_attr($criterion); ?>]" value="0">
                    </p>
                    <?php }
                } ?>
        </td>
    </tr>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('Review', 'bp-user-reviews'); ?></label></th>
        <td>
            <textarea name="review" style="width: 100%;height: 100px"><?php echo esc_attr($post->review); ?></textarea>
        </td>
    </tr>
    </tbody>
</table>