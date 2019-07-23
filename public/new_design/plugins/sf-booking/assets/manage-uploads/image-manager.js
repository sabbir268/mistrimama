jQuery( function ( $ )
{
	'use strict';

	jQuery( '.RWMB-drag-drop' ).each( function ()
	{
		// Declare vars
		var $dropArea = jQuery( this ),
			$imageList = $dropArea.siblings( '.rwmb-uploaded' ),
			uploaderData = $dropArea.data( 'js_options' ),
			uploader = {};

		// Extend uploaderData
		uploaderData.multipart_params = $.extend(
			{
				_ajax_nonce: $dropArea.data( 'upload_nonce' ),
				post_id    : jQuery( '#post_ID' ).val()
			},
			uploaderData.multipart_params
		);
		
		// Create uploader
		uploader = new plupload.Uploader( uploaderData );
		uploader.init();
		uploader.refresh();
		jQuery('#identityCheck').on('shown.bs.modal',function(){
			uploader.refresh();													  
		})

		// Add files
		uploader.bind( 'FilesAdded', function ( up, files )
		{
			var maxFileUploads = $imageList.data( 'max_file_uploads' ),
				uploaded = $imageList.children().length,
				msg = maxFileUploads > 1 ? rwmbFile.maxFileUploadsPlural : rwmbFile.maxFileUploadsSingle;

			msg = msg.replace( '%d', maxFileUploads );

			// Remove files from queue if exceed max file uploads
			if ( maxFileUploads > 0 && ( uploaded + files.length ) > maxFileUploads )
			{
				if ( uploaded < maxFileUploads )
				{
					var diff = maxFileUploads - uploaded;
					up.splice( diff - 1, files.length - diff );
					files = up.files;
				}
			}

			// Hide drag & drop section if reach max file uploads
			if ( maxFileUploads > 0 && uploaded + files.length >= maxFileUploads )
			{
				$dropArea.addClass( 'hidden' );
			}

			var max = parseInt( up.settings.max_file_size, 10 );

			// Upload files
			plupload.each( files, function ( file )
			{
				insertLoadingClass( up, file, $imageList );
				addtoThrobber( file );
				if ( file.size >= max )
				{
					CleanError( file );
				}
			} );
			up.refresh();
			up.start();

		} );

		uploader.bind( 'Error', function ( up, e )
		{
			insertLoadingClass( up, e.file, $imageList );
			CleanError( e.file );
			up.removeFile( e.file );
		} );

		uploader.bind( 'FileUploaded', function ( up, file, r )
		{
			r = $.parseJSON( r.response );
			if ( r.success )
			{
				jQuery( 'li#' + file.id ).replaceWith( r.data );
			}
			else
			{
				CleanError( file );
			}
		} );
	} );

	/**
	 * Helper functions
	 */

	/**
	 * Removes li element if there is an error with the file
	 *
	 * @return void
	 */
	function CleanError( file )
	{
		jQuery( 'li#' + file.id )
			.addClass( 'rwmb-image-error' )
			.delay( 1600 )
			.fadeOut( 'slow', function ()
			{
				jQuery( this ).remove();
			}
		);
	}

	/**
	 * Adds loading li element
	 *
	 * @return void
	 */
	function insertLoadingClass( up, file, $ul )
	{
		$ul.removeClass( 'hidden' ).append( '<li id="' + file.id + '"><div class="rwmb-image-uploading-bar"></div><div id="' + file.id + '-throbber" class="rwmb-image-uploading-status"></div></li>' );
	}

	/**
	 * Adds loading throbber while waiting for a response
	 *
	 * @return void
	 */
	function addtoThrobber( file )
	{
		jQuery( '#' + file.id + '-throbber' ).html( '<img class="rwmb-loader" height="64" width="64" src="' + RWMB.url + '/loader.gif">' );
	}
} );
