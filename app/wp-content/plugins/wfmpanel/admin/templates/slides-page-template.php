<div class="wrap">
    <h1><?php _e("Slides management", 'wfmpanel') ?></h1>

    <h3><?php _e('Add slide', 'wfmpanel') ?></h3>


    <?php
    $errors = get_transient('wfmpanel_form_error');
    $success = get_transient('wfmpanel_form_success');
    ?>
    <?php if ($errors): ?>
        <div id="setting-error-settings_updated" class="notice notice-error settings-error is-dismissible">
            <p><strong><?= $errors ?></strong></p>
            <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span>
            </button>
        </div>
        <?php delete_transient(('wfmpanel_form_error')) ?>
    <?php endif; ?>

    <?php if ($success): ?>
        <div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible">
            <p><strong><?= $success ?></strong></p>
            <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span>
            </button>
        </div>
        <?php delete_transient(('wfmpanel_form_success')) ?>
    <?php endif; ?>


    <form action="<?= admin_url('admin-post.php') ?>" class="wfmpanel-add-slide" method="post">
        <?php wp_nonce_field('wfmpanel_action', 'wfmpanel_add_slide') ?>
        <input type="hidden" name="action" value="save_slide">
        <table class="form-table">
            <tbody>
            <tr>
                <th>
                    <label for="slide-title"> <?php _e('Slide title', 'wfmpanel') ?></label>
                </th>
                <td>
                    <input type="text" class="regular-text" name="slide-title" id="slide-title">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="slide_content"> <?php _e('Slide content', 'wfmpanel') ?></label>
                </th>
                <td>
                    <?php wp_editor('', 'wp_editor_main', array(
                        'textarea_name' => 'slide_content',
                        'textarea_rows' => 10,
                    )); ?>
                    <!--                    <textarea name="slide-slide_content" class="large-text code" cols="50" rows="10"-->
                    <!--                              id="slide_content"></textarea>-->
                </td>
            </tr>
            </tbody>

        </table>

        <p class="submit">
            <button class="button button-primary"><?php _e('Save slide', 'wfmpanel') ?></button>
        </p>
    </form>

    <p>
        <?php $wfm_slides = Wfmpanel_Admin::get_slides(true);
//        Wfmpanel_Admin::debug($wfm_slides);
        ?>

    <div id="accordion">
        <?php foreach ($wfm_slides as $wfm_slide): ?>

            <h3><?= $wfm_slide['title'] ?></h3>
            <div>
                <form action="<?= admin_url('admin-post.php') ?>" class="wfmpanel-add-slide" method="post">
                    <?php wp_nonce_field('wfmpanel_action', 'wfmpanel_add_slide') ?>

                    <input type="hidden" name="action" value="save_slide">
                    <input type="hidden" name="slide_id" value="<?= $wfm_slide['id'] ?>">

                    <table class="form-table">
                        <tbody>
                        <tr>
                            <th>
                                <label for="slide_title_<?= $wfm_slide['id'] ?>"> <?php _e('Slide title', 'wfmpanel') ?></label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" name="slide-title" id="slide-title" value="<?= esc_attr($wfm_slide['title'])?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="slide_content_<?= $wfm_slide['id'] ?>"> <?php _e('Slide content', 'wfmpanel') ?></label>
                            </th>
                            <td>
                                <?php wp_editor($wfm_slide['content'],  "slide_content_{$wfm_slide['id']}", array(
                                    'textarea_name' => 'slide_content',
                                    'textarea_rows' => 10,
                                )); ?>
<!--                                <textarea name="slide_content" class="large-text code" cols="50" rows="10" value="--><?php //= esc_attr($wfm_slide['content'])?>
<!--                                          id="slide_content_--><?php //= $wfm_slide['id'] ?><!--">--><?php //= esc_attr($wfm_slide['content'])?><!--</textarea>-->
                                <?php

                                ?>
                            </td>
                        </tr>
                        </tbody>

                    </table>

                    <p class="submit">
                        <button class="button button-primary"><?php _e('Save slide', 'wfmpanel') ?></button>
                    </p>
                </form>

            </div>
        <?php endforeach; ?>
    </div>
    </p>

</div>