<?php

function cryco_comment_form($cryco_comment_form_fields){

	$cryco_comment_form_fields['author'] = '
        <div class="row comment-form-wrap">
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="author" id="name-cmt" placeholder="'.esc_attr__('Name*', 'cryco').'">
            </div>
        </div>
    ';

	$cryco_comment_form_fields['email'] =  '
        <div class="col-lg-6">
            <div class="form-group">
                <input type="email" name="email" id="email-cmt" placeholder="'.esc_attr__('Email*', 'cryco').'">
            </div>
        </div>
    ';

	$cryco_comment_form_fields['url'] = '
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="url" id="website-cmt"  placeholder="'.esc_attr__('Website', 'cryco').'">
            </div>
        </div>
        </div>
        
    ';

	return $cryco_comment_form_fields;
}

add_filter('comment_form_default_fields', 'cryco_comment_form');

function cryco_comment_default_form($default_form){

	$default_form['comment_field'] = '
        <div class="row">
            <div class="col-sm-12">
                <div class="comment-message">
                    <textarea name="comment" id="message-cmt" rows="5" required="required"  placeholder="'.esc_attr__('Your Comment*', 'cryco').'"></textarea>
                </div>
            </div>
        </div>
    ';

	$default_form['submit_button'] = '
        <button type="submit" class="them-btn them-active w-100"><span>'.esc_html__('Post Comment', 'cryco').'</span><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                                                          </svg></button>
    ';

	$default_form['comment_notes_before'] = esc_html__('All fields marked with an asterisk (*) are required', 'cryco' );
	$default_form['title_reply'] = esc_html__('Leave A Comment', 'cryco');
	$default_form['title_reply_before'] = '<h4 class="comments-heading">';
	$default_form['title_reply_after'] = '</h4>';

	return $default_form;
}

add_filter('comment_form_defaults', 'cryco_comment_default_form');


function cryco_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'cryco_move_comment_field_to_bottom' );