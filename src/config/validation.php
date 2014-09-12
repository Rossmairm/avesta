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

		'account'	 => ['required', 'digits_between:6,8', 'numeric', 'unique:accounts,id'],
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
		'password'	 => ['required', 'is_account_password'],

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
		'current'					=> ['required', 'is_account_password'],

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

		'name'		 => ['required', 'between:3,20', 'alpha_space', 'blacklist:pandaac::server.blacklist', 'unique:players,name'],
		'gender'	 => ['required', 'in_config_key:pandaac::server.genders'],
		'vocation'	 => ['required', 'in_config_key:pandaac::server.vocations'],
		'town'		 => ['required', 'in_config_key:pandaac::server.towns'],

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

		'character' => ['required', 'is_account_character'],
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

		'character'	=> ['required', 'is_account_character'],
		'password'	=> ['required', 'is_account_password'],

	),

	/*
	|--------------------------------------------------------------------------
	| Guild Function, can_create_guild
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'function.guild.can-create' => array(

		'account'	 => ['is_premium', 'no_ranked_players'],
		'character'	 => ['level:50'],

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

		'name'		 => ['required', 'between:3,30', 'alpha_space', 'blacklist:pandaac::server.blacklist', 'unique:guilds,name'],
		'leader'	 => ['required', 'is_account_character', 'can_create_guild'],
		'password'	 => ['required', 'is_account_password'],

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

		'character'	 => ['required', 'exists:players,name', 'guild_free', 'level:1'],

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

		'leader'	 => ['can_lead_guild'],
		'password'	 => ['required', 'is_account_password'],

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

		'password'	 => ['required', 'is_account_password'],

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
		'title'		 => ['required_if:action,title', 'max:15', 'alpha_space'],

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
		'name'		 => ['alpha_space', 'between:3,30'],

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
		'author'	 => ['required', 'is_account_character', 'level:2'],
		'content'	 => ['required', 'between:15,3000'],

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

		'author'	 => ['required', 'is_account_character', 'level:2'],
		'content'	 => ['required', 'between:15,3000'],

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

		'content'	 => ['required', 'between:3,1000'],

	),

	/*
	|--------------------------------------------------------------------------
	| Claim Shop Product
	|--------------------------------------------------------------------------
	|
	| ...
	|
	*/

	'shop.claim' => array(

		'character'		 => ['is_account_character', 'is_offline'],

	),

);