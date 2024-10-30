<?php
/**
 * Settings page
 */
defined( 'ABSPATH' ) || exit; ?>
<div class="wrap">
    <h1><?php _e('BP User Reviews Settings', 'bp-user-reviews'); ?></h1>
    <form action="" method="POST">
        <?php wp_nonce_field('bp-user-reviews-settings'); ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><?php _e('Who can leave reviews?', 'bp-user-reviews'); ?></th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Who can leave reviews?', 'bp-user-reviews'); ?></span></legend>
                        <label><input type="radio" name="access" value="registered" <?php checked($this->settings['access'], 'registered'); ?>> <?php _e('Logged in users', 'bp-user-reviews'); ?></label><br>
                        <label><input type="radio" name="access" value="all" <?php checked($this->settings['access'], 'all'); ?>> <?php _e('Anyone', 'bp-user-reviews'); ?></label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e('Auto approve new reviews?', 'bp-user-reviews'); ?></th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Auto approve new reviews?', 'bp-user-reviews'); ?></span></legend>
                        <label><input type="radio" name="autoApprove" value="yes" <?php checked($this->settings['autoApprove'], 'yes'); ?>> <?php _e('Yes', 'bp-user-reviews'); ?></label><br>
                        <label><input type="radio" name="autoApprove" value="no" <?php checked($this->settings['autoApprove'], 'no'); ?>> <?php _e('No', 'bp-user-reviews'); ?></label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e('Rating scale', 'bp-user-reviews'); ?>
                    <p style="font-size: 10px;"><?php _e('How many stars is the rating out of?', 'bp-user-reviews'); ?></p>
                </th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Stars', 'bp-user-reviews'); ?></span></legend>
                        <input type="number" name="stars" value="<?php echo esc_attr($this->settings['stars']); ?>" min="2">
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e('Min. Review Length', 'bp-user-reviews'); ?>
                </th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Min. Review Length', 'bp-user-reviews'); ?></span></legend>
                        <input type="number" name="min_length" value="<?php echo esc_attr($this->settings['min_length']); ?>" min="2">
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <?php _e('Date Format', 'bp-user-reviews'); ?>
                </th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Date Format', 'bp-user-reviews'); ?></span></legend>
                        <input type="text" name="date_format" value="<?php echo esc_attr($this->settings['date_format']); ?>" min="2">
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <?php _e('Stars color', 'bp-user-reviews'); ?>
                </th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Stars color', 'bp-user-reviews'); ?></span></legend>
                        <input type="text" name="starsColor" value="<?php echo esc_attr($this->settings['starsColor']); ?>" class="color-picker">
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e('Is a text review required alongside the rating?', 'bp-user-reviews'); ?>
                </th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Is a text review required alongside the rating?', 'bp-user-reviews'); ?></span></legend>
                        <label><input type="radio" name="review" value="yes" <?php checked($this->settings['review'], 'yes'); ?>> <?php _e('Yes', 'bp-user-reviews'); ?></label><br>
                        <label><input type="radio" name="review" value="no"  <?php checked($this->settings['review'], 'no'); ?>> <?php _e('No', 'bp-user-reviews'); ?></label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e('Multiple reviews allowed?', 'bp-user-reviews'); ?>
                </th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Multiple reviews allowed?', 'bp-user-reviews'); ?></span></legend>
                        <label><input type="radio" name="multiple" value="yes" <?php checked($this->settings['multiple'], 'yes'); ?>> <?php _e('Yes', 'bp-user-reviews'); ?></label><br>
                        <label><input type="radio" name="multiple" value="no"  <?php checked($this->settings['multiple'], 'no'); ?>> <?php _e('No', 'bp-user-reviews'); ?></label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e('Criteria', 'bp-user-reviews'); ?></th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Criteria', 'bp-user-reviews'); ?></span></legend>
                        <label><input type="radio" name="criterion" value="single" <?php checked($this->settings['criterion'], 'single'); ?>> <?php _e('Single', 'bp-user-reviews'); ?></label><br>
                        <label><input type="radio" name="criterion" value="multiple" <?php checked($this->settings['criterion'], 'multiple'); ?>> <?php _e('Multiple', 'bp-user-reviews'); ?></label><br>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e('Multiple criteria', 'bp-user-reviews'); ?></th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span><?php _e('Multiple criteria', 'bp-user-reviews'); ?></span></legend>
                        <?php if(isset($this->settings['criterions']) && !empty($this->settings['criterions'] )) {
                            foreach($this->settings['criterions'] as $index=>$criteria){ ?>
                            <p><input type="text" name="criterions[<?php echo esc_attr($index); ?>]" value="<?php echo esc_attr($criteria); ?>"></p>
                        <?php }
                        } ?>
                        <button class="button addCriterion"><?php _e('Add new', 'bp-user-reviews'); ?></button>
                    </fieldset>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'bp-user-reviews'); ?>">
        </p>
    </form>
</div>