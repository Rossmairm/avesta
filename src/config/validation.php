<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Account Log In
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'account.login' => array(

		'account'	 => ['required'],
		'password'	 => ['required'],

	),

	/*
	|--------------------------------------------------------------------------
	| Account Creation
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'account.create' => array(

		'account'	 => ['required', 'digits_between:6,8', 'regex:/^([0-9]+)$/', 'unique:accounts,id'],
		'email'		 => ['required', 'email', 'unique:accounts,email'],
		'password'	 => ['required', 'confirmed', 'min:6'],
		'captcha'	 => ['required', 'captcha'],
		'terms'		 => ['accepted'],
		
	),

	/*
	|--------------------------------------------------------------------------
	| Account Email
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'account.email' => array(

		'email'		 => ['required', 'email', 'unique:accounts,email'],
		'password'	 => ['required', 'account_password'],

	),

	/*
	|--------------------------------------------------------------------------
	| Account Password
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'account.password' => array(

		'password'					=> ['required', 'confirmed', 'min:6'],
		'password_confirmation'		=> ['required'],
		'current'					=> ['required', 'account_password'],

	),

	/*
	|--------------------------------------------------------------------------
	| Player Creation
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'player.create' => array(

		'name'		 => ['required', 'between:3,20', 'nickname', 'blacklist:pandaac::server.blacklist', 'unique:players,name'],
		'gender'	 => ['required', 'in_config_key:pandaac::server.genders'],
		'vocation'	 => ['required', 'in_config:pandaac::app.vocations'],
		'town'		 => ['required', 'in_config:pandaac::app.towns'],

	),

	/*
	|--------------------------------------------------------------------------
	| Player Edit
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'player.edit' => array(

		'character' => ['required', 'account_character'],
		'hidden'	=> ['boolean'],
		'comment'	=> ['max:255'],

	),

	/*
	|--------------------------------------------------------------------------
	| Player Deletion
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'player.delete' => array(

		'character'	=> ['required', 'account_character'],
		'password'	=> ['required', 'account_password'],

	),

	/*
	|--------------------------------------------------------------------------
	| Guild Creation
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'guild.create' => array(

		'name'		 => ['required', 'between:3,30', 'nickname', 'blacklist:pandaac::server.blacklist', 'unique:guilds,name'],
		'leader'	 => ['required', 'account_character', 'premium', 'guildless', 'guild_influence'],
		'password'	 => ['required', 'account_password'],

	),

	/*
	|--------------------------------------------------------------------------
	| Guild Edit
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'guild.edit' => array(

		'description'	 => ['max:255'],
		'logo'			 => ['max:1000', 'mimes:jpg,jpeg,gif,png', 'image_size:64,64'],

	),

	/*
	|--------------------------------------------------------------------------
	| Guild Invite
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'guild.invite' => array(

		'character'	 => ['required', 'exists:players,name', 'guildless', 'level:1'],
		'cancel'	 => ['required', 'exists:players,id'],

	),

	/*
	|--------------------------------------------------------------------------
	| Guild Resignation
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'guild.resign' => array(

		'leader'	 => ['premium', 'guild_influence'],
		'password'	 => ['required', 'account_password'],

	),

	/*
	|--------------------------------------------------------------------------
	| Guild Disband
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'guild.disband' => array(

		'password'	 => ['required', 'account_password'],

	),

	/*
	|--------------------------------------------------------------------------
	| Edit Guild Member
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'guild.member.edit' => array(

		'member'	 => ['required', 'exists:players,id'],
		'action'	 => ['required', 'in:rank,title,exclude'],
		'rank'		 => ['required_if:action,rank'],
		'title'		 => ['max:25', 'nickname'],

	),

	/*
	|--------------------------------------------------------------------------
	| Edit Guild Rank
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'guild.rank.edit' => array(

		'total'		 => ['required', 'numeric', 'between:3,20'],
		'rank'		 => ['required'],
		'name'		 => ['nickname', 'between:3,30'],

	),

	/*
	|--------------------------------------------------------------------------
	| Create Forum Thread
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'forum.thread.create' => array(

		'title'		 => ['required', 'between:3,60'],
		'author'	 => ['required', 'account_character', 'level:2'],
		'content'	 => ['required', 'between:15,3000', 'max_images:3', 'forum_timer'],

	),

	/*
	|--------------------------------------------------------------------------
	| Create Forum Reply
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'forum.reply.create' => array(

		'author'	 => ['required', 'account_character', 'level:2'],
		'content'	 => ['required', 'between:15,3000', 'max_images:3', 'forum_timer'],

	),

	/*
	|--------------------------------------------------------------------------
	| Edit Forum Post
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'forum.post.edit' => array(

		'content'	 => ['required', 'between:15,3000', 'max_images:3'],

	),

	/*
	|--------------------------------------------------------------------------
	| Claim Store Product
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'store.claim' => array(

		'character'		 => ['account_character', 'offline'],

	),

);