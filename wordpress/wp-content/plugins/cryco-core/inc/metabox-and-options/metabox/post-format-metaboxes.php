<?php
// Video Post Meta
$cryco_video_post_meta = 'cryco_video_post_format_meta';

CSF::createMetabox( $cryco_video_post_meta, array(
	'title'        => esc_html__('Video Post Format Options', 'cryco-core' ),
	'post_type'    => 'post',
	'post_formats' => array('video'),
) );

CSF::createSection( $cryco_video_post_meta, array(
	'fields' => array(

		array(
			'id'    => 'post_video_url',
			'type'  => 'text',
			'title' => esc_html__('Video URL', 'cryco-core' ),
			'desc'    => esc_html__( 'Paste video URL here', 'cryco-core' ),
		),

	)
));

// Audio Post Meta
$cryco_audio_post_meta = 'audio_post_format_meta';

CSF::createMetabox( $cryco_audio_post_meta, array(
	'title'        => esc_html__('Audio Post Format Options', 'cryco-core' ),
	'post_type'    => 'post',
	'post_formats' => array('audio'),
) );

CSF::createSection( $cryco_audio_post_meta, array(
	'fields' => array(

		array(
			'id'    => 'audio_embed_code',
			'type'  => 'code_editor',
			'settings' => array(
				'theme'  => 'monokai',
				'mode'   => 'htmlmixed',
			),
			'title' => esc_html__('Audio Embed Code', 'cryco-core' ),
			'desc'    => esc_html__( 'Paste sound cloud audio embed code here', 'cryco-core' ),
		),

	)
));


// Gallery Post Meta
$cryco_gallery_post_meta = 'gallery_post_format_meta';

CSF::createMetabox( $cryco_gallery_post_meta, array(
	'title'        => esc_html__('Gallery Post Format Options', 'cryco-core' ),
	'post_type'    => 'post',
	'post_formats' => array('gallery'),
) );

CSF::createSection( $cryco_gallery_post_meta, array(
	'fields' => array(

		array(
			'id'          => 'post_gallery_images',
			'type'        => 'gallery',
			'title' => esc_html__('Gallery Images', 'cryco-core' ),
			'add_title'   => esc_html__('Upload Gallery Images', 'cryco-core'),
			'edit_title'  => esc_html__('Edit Gallery Images', 'cryco-core'),
			'clear_title' => esc_html__('Remove Gallery Images', 'cryco-core'),
			'desc'    => esc_html__( 'Upload gallery images from here', 'cryco-core' ),
		),

	)
));