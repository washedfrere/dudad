<?php
/**
 * This file is part of the evoCore framework - {@link http://evocore.net/}
 * See also {@link https://github.com/b2evolution/b2evolution}.
 *
 * @license GNU GPL v2 - {@link http://b2evolution.net/about/gnu-gpl-license}
 *
 * @copyright (c)2009-2016 by Francois Planque - {@link http://fplanque.com/}
 * Parts of this file are copyright (c)2009 by The Evo Factory - {@link http://www.evofactory.com/}.
 *
 * @package evocore
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

// Load Invitation class:
load_class( 'users/model/_invitation.class.php', 'Invitation' );

/**
 * @var User
 */
global $current_User;

// Check minimum permission:
$current_User->check_perm( 'users', 'view', true );

// Set options path:
$AdminUI->set_path( 'users', 'usersettings', 'invitations' );

// Get action parameter from request:
param_action();

if( param( 'ivc_ID', 'integer', '', true ) )
{ // Load invitation from cache:
	$InvitationCache = & get_InvitationCache();
	if( ( $edited_Invitation = & $InvitationCache->get_by_ID( $ivc_ID, false ) ) === false )
	{ // We could not find the invitation code to edit:
		unset( $edited_Invitation );
		forget_param( 'ivc_ID' );
		$Messages->add( sprintf( T_('Requested &laquo;%s&raquo; object does not exist any longer.'), T_('Invitation') ), 'error' );
		$action = 'nil';
	}
}


switch( $action )
{
	case 'new':
		// Check permission:
		$current_User->check_perm( 'users', 'edit', true );

		if( ! isset( $edited_Invitation ) )
		{ // We don't have a model to use, start with blank object:
			$edited_Invitation = new Invitation();
		}
		else
		{ // Duplicate object in order no to mess with the cache:
			$edited_Invitation = duplicate( $edited_Invitation ); // PHP4/5 abstraction
			$edited_Invitation->ID = 0;
		}
		break;

	case 'edit':
		// Check permission:
		$current_User->check_perm( 'users', 'edit', true );

		// Make sure we got an ivc_ID:
		param( 'ivc_ID', 'integer', true );
		break;

	case 'create': // Record new Invitation
	case 'create_new': // Record Invitation and create new
	case 'create_copy': // Record Invitation and create similar
		// Insert new invitation code...:
		$edited_Invitation = new Invitation();

		// Check that this action request is not a CSRF hacked request:
		$Session->assert_received_crumb( 'invitation' );

		// Check permission:
		$current_User->check_perm( 'users', 'edit', true );

		// load data from request
		if( $edited_Invitation->load_from_Request() )
		{	// We could load data from form without errors:

			// While inserting into DB, ID property of Invitation object will be set to autogenerated ID
			// So far as we set ID manualy, we need to preserve this value
			// When assignment of wrong value will be fixed, we can skip this
			$entered_invitation_id = $edited_Invitation->ID;

			// Insert in DB:
			$DB->begin();
			// Check if the entered invitation code is not assigned to other one:
			$duplicated_invitation_ID = $edited_Invitation->dbexists( 'ivc_code', $edited_Invitation->get( 'code' ) );
			if( $duplicated_invitation_ID )
			{	// Display error if we have a duplicate entry:
				param_error( 'ivc_ID',
					sprintf( T_('This invitation code already exists. Do you want to <a %s>edit the existing invitation code</a>?'),
						'href="?ctrl=invitations&amp;action=edit&amp;ivc_ID='.$duplicated_invitation_ID.'"' ) );
			}
			else
			{
				$edited_Invitation->dbinsert();
				$Messages->add( T_('New invitation code created.'), 'success' );
			}
			$DB->commit();

			if( empty( $duplicated_invitation_ID ) )
			{ // What next?
			switch( $action )
				{
					case 'create_copy':
						// Redirect so that a reload doesn't write to the DB twice:
						header_redirect( '?ctrl=invitations&action=new&ivc_ID='.$edited_Invitation->ID, 303 ); // Will EXIT
						// We have EXITed already at this point!!
						break;
					case 'create_new':
						// Redirect so that a reload doesn't write to the DB twice:
						header_redirect( '?ctrl=invitations&action=new', 303 ); // Will EXIT
						// We have EXITed already at this point!!
						break;
					case 'create':
						// Redirect so that a reload doesn't write to the DB twice:
						header_redirect( '?ctrl=invitations', 303 ); // Will EXIT
						// We have EXITed already at this point!!
						break;
				}
			}
		}
		break;

	case 'update':
		// Edit invitation code form...:

		// Check that this action request is not a CSRF hacked request:
		$Session->assert_received_crumb( 'invitation' );

		// Check permission:
		$current_User->check_perm( 'users', 'edit', true );

		// Make sure we got an ivc_ID:
		param( 'ivc_ID', 'integer', true );

		// load data from request
		if( $edited_Invitation->load_from_Request() )
		{ // We could load data from form without errors:

			// Update in DB:
			$DB->begin();

			$edited_Invitation->dbupdate();
			$Messages->add( T_('Invitation code updated.'), 'success' );

			$DB->commit();

			header_redirect( '?ctrl=invitations', 303 ); // Will EXIT
			// We have EXITed already at this point!!
		}
		break;

	case 'delete':
		// Delete invitation code:

		// Check that this action request is not a CSRF hacked request:
		$Session->assert_received_crumb( 'invitation' );

		// Check permission:
		$current_User->check_perm( 'users', 'edit', true );

		// Make sure we got an ivc_ID:
		param( 'ivc_ID', 'integer', true );

		if( param( 'confirm', 'integer', 0 ) )
		{ // confirmed, Delete from DB:
			$msg = sprintf( T_('Invitation code &laquo;%s&raquo; deleted.'), $edited_Invitation->dget( 'code' ) );
			$edited_Invitation->dbdelete();
			unset( $edited_Invitation );
			forget_param( 'ivc_ID' );
			$Messages->add( $msg, 'success' );
			// Redirect so that a reload doesn't write to the DB twice:
			header_redirect( '?ctrl=invitations', 303 ); // Will EXIT
			// We have EXITed already at this point!!

		}
		else
		{	// not confirmed, Check for restrictions:
			if( ! $edited_Invitation->check_delete( sprintf( T_('Cannot delete invitation code &laquo;%s&raquo;'), $edited_Invitation->dget( 'code' ) ) ) )
			{	// There are restrictions:
				$action = 'view';
			}
		}
		break;
}

if( in_array( $action, array( 'delete', 'new', 'create', 'create_new', 'create_copy', 'edit', 'update' ) ) )
{ // Initialize date picker for invitation form
	init_datepicker_js();
}

$AdminUI->breadcrumbpath_init( false );  // fp> I'm playing with the idea of keeping the current blog in the path here...
$AdminUI->breadcrumbpath_add( T_('Users'), '?ctrl=users' );
$AdminUI->breadcrumbpath_add( T_('Settings'), '?ctrl=usersettings' );
$AdminUI->breadcrumbpath_add( T_('Invitations'), '?ctrl=invitations' );

// Set an url for manual page:
switch( $action )
{
	case 'delete':
	case 'new':
	case 'create':
	case 'create_new':
	case 'create_copy':
	case 'edit':
	case 'update':
		$AdminUI->set_page_manual_link( 'user-settings-invitations-editing' );
		break;
	default:
		$AdminUI->set_page_manual_link( 'user-settings-invitations-tab' );
		break;
}

// Display <html><head>...</head> section! (Note: should be done early if actions do not redirect)
$AdminUI->disp_html_head();

// Display title, menu, messages, etc. (Note: messages MUST be displayed AFTER the actions)
$AdminUI->disp_body_top();

$AdminUI->disp_payload_begin();

/**
 * Display payload:
 */
switch( $action )
{
	case 'nil':
		// Do nothing
		break;


	case 'delete':
		// We need to ask for confirmation:
		$edited_Invitation->confirm_delete(
				sprintf( T_('Delete invitation code &laquo;%s&raquo;?'), $edited_Invitation->dget( 'code' ) ),
				'invitation', $action, get_memorized( 'action' ) );
		/* no break */
	case 'new':
	case 'create':
	case 'create_new':
	case 'create_copy':
	case 'edit':
	case 'update':	// we return in this state after a validation error
		$AdminUI->disp_view( 'users/views/_invitation.form.php' );
		break;


	default:
		// No specific request, list all invitation codes:
		// Cleanup context:
		forget_param( 'ivc_ID' );
		// Display invitation codes list:
		$AdminUI->disp_view( 'users/views/_invitation.view.php' );
		break;

}

$AdminUI->disp_payload_end();

// Display body bottom, debug info and close </html>:
$AdminUI->disp_global_footer();

?>