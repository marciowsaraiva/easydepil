<?php
/*
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

/**
 * This guide provides descriptions of the Identity and Access Management (IAM) API as well as
 * links to related content in the guide, <a href=
 * "http://docs.amazonwebservices.com/IAM/latest/UserGuide/" target="_blank">Using IAM</a>.
 *  
 * IAM is a web service that enables AWS customers to manage users and user permissions under
 * their AWS account. For more information about this product go to <a href=
 * "http://aws.amazon.com/iam/" target="_blank">AWS Identity and Access Management (IAM)</a>. For
 * information about setting up signatures and authorization through the API, go to <a href=
 * "http://docs.amazonwebservices.com/general/latest/gr/signing_aws_api_requests.html" target=
 * "_blank">Signing AWS API Requests</a> in the <em>AWS General Reference</em>. For general
 * information about using the Query API with IAM, go to <a href=
 * "http://docs.amazonwebservices.com/IAM/latest/UserGuide/IAM_UsingQueryAPI.html" target=
 * "_blank">Making Query Requests</a> in <em>Using IAM</em>.
 *  
 * If you're new to AWS and need additional technical information about a specific AWS product,
 * you can find the product'stechnical documentation at <a href=
 * "http://aws.amazon.com/documentation/" target=
 * "_blank">http://aws.amazon.com/documentation/</a>.
 *
 * @version 2013.01.14
 * @license See the included NOTICE.md file for complete information.
 * @copyright See the included NOTICE.md file for complete information.
 * @link http://aws.amazon.com/iam/ AWS Identity and Access Management
 * @link http://aws.amazon.com/iam/documentation/ AWS Identity and Access Management documentation
 */
class AmazonIAM extends CFRuntime
{
	/*%******************************************************************************************%*/
	// CLASS CONSTANTS

	/**
	 * Specify the queue URL for the United States East (Northern Virginia) Region.
	 */
	const REGION_US_E1 = 'iam.amazonaws.com';

	/**
	 * Specify the queue URL for the United States East (Northern Virginia) Region.
	 */
	const REGION_VIRGINIA = self::REGION_US_E1;

	/**
	 * Specify the queue URL for the United States GovCloud Region.
	 */
	const REGION_US_GOV1 = 'iam.us-gov.amazonaws.com';

	/**
	 * Default service endpoint.
	 */
	const DEFAULT_URL = self::REGION_US_E1;


	/*%******************************************************************************************%*/
	// CONSTRUCTOR

	/**
	 * Constructs a new instance of <AmazonIAM>.
	 *
	 * @param array $options (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>certificate_authority</code> - <code>boolean</code> - Optional - Determines which Cerificate Authority file to use. A value of boolean <code>false</code> will use the Certificate Authority file available on the system. A value of boolean <code>true</code> will use the Certificate Authority provided by the SDK. Passing a file system path to a Certificate Authority file (chmodded to <code>0755</code>) will use that. Leave this set to <code>false</code> if you're not sure.</li>
	 * 	<li><code>credentials</code> - <code>string</code> - Optional - The name of the credential set to use for authentication.</li>
	 * 	<li><code>default_cache_config</code> - <code>string</code> - Optional - This option allows a preferred storage type to be configured for long-term caching. This can be changed later using the <set_cache_config()> method. Valid values are: <code>apc</code>, <code>xcache</code>, or a file system path such as <code>./cache</code> or <code>/tmp/cache/</code>.</li>
	 * 	<li><code>key</code> - <code>string</code> - Optional - Your AWS key, or a session key. If blank, the default credential set will be used.</li>
	 * 	<li><code>secret</code> - <code>string</code> - Optional - Your AWS secret key, or a session secret key. If blank, the default credential set will be used.</li>
	 * 	<li><code>token</code> - <code>string</code> - Optional - An AWS session token.</li></ul>
	 * @return void
	 */
	public function __construct(array $options = array())
	{
		$this->api_version = '2010-05-08';
		$this->hostname = self::DEFAULT_URL;
		$this->auth_class = 'AuthV4Query';

		return parent::__construct($options);
	}


	/*%******************************************************************************************%*/
	// CONVENIENCE CONSTANTS

	const STANDARD_EC2_ASSUME_ROLE_POLICY = '{"Statement":[{"Principal":{"Service":["ec2.amazonaws.com"]},"Effect":"Allow","Action":["sts:AssumeRole"]}]}';


	/*%******************************************************************************************%*/
	// SETTERS

	/**
	 * This allows you to explicitly sets the region for the service to use.
	 *
	 * @param string $region (Required) The region to explicitly set. Available options are <REGION_US_E1>, <REGION_US_GOV1>.
	 * @return $this A reference to the current instance.
	 */
	public function set_region($region)
	{
		// @codeCoverageIgnoreStart
		$this->set_hostname($region);
		return $this;
		// @codeCoverageIgnoreEnd
	}


	/*%******************************************************************************************%*/
	// SERVICE METHODS

	/**
	 * Adds the specified role to the specified instance profile. For more information about roles, go
	 * to <a href=
	 * "http://docs.amazonwebservices.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with
	 * Roles</a>. For more information about instance profiles, go to <a href=
	 * "http://docs.amazonwebservices.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About
	 * Instance Profiles</a>.
	 *
	 * @param string $instance_profile_name (Required) Name of the instance profile to update. [Constraints: The value must be between 1 and 128 characters, and must match the following regular expression pattern: <code>[\w+=,.@-]*</code>]
	 * @param string $role_name (Required) Name of the role to add. [Constraints: The value must be between 1 and 64 characters, and must match the following regular expression pattern: <code>[\w+=,.@-]*</code>]
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return CFResponse A <CFResponse> object containing a parsed HTTP response.
	 */
	public function add_role_to_instance_profile($instance_profile_name, $role_name, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['InstanceProfileName'] = $instance_profile_name;
		$opt['RoleName'] = $role_name;
		
		return $this->authenticate('AddRoleToInstanceProfile', $opt);
	}

	/**
	 * Adds the specified user to the specified group.
	 *
	 * @param string $group_name (Required) Name of the group to update. [Constraints: The value must be between 1 and 128 characters, and must match the following regular expression pattern: <code>[\w+=,.@-]*</code>]
	 * @param string $user_name (Required) Name of the user to add. [Constraints: The value must be between 1 and 128 characters, and must match the following regular expression pattern: <code>[\w+=,.@-]*</code>]
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return CFResponse A <CFResponse> object containing a parsed HTTP response.
	 */
	public function add_user_to_group($group_name, $user_name, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['GroupName'] = $group_name;
		$opt['UserName'] = $user_name;
		
		return $this->authenticate('AddUserToGroup', $opt);
	}

	/**
	 * Changes the password of the IAM user calling <code>ChangePassword</code>. The root account
	 * password is not affected by this action. For information about modifying passwords, see
	 * 	<a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/Using_ManagingLogins.html"
	 * target="_blank">Managing Passwords</a>.
	 *
	 * @param string $old_password (Required)  [Constraints: The value must be between 1 and 128 characters, and must match the following regular expression pattern: <code>[\u0009\u000A\u000D\u0020-\u00FF]+</code>]
	 * @param string $new_password (Required)  [Constraints: The value must be between 1 and 128 characters, and must match the following regular expression pattern: <code>[\u0009\u000A\u000D\u0020-\u00FF]+</code>]
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return CFResponse A <CFResponse> object containing a parsed HTTP response.
	 */
	public function change_password($old_password, $new_password, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['OldPassword'] = $old_password;
		$opt['NewPassword'] = $new_password;
		
		return $this->authenticate('ChangePassword', $opt);
	}

	/**
	 * Creates a new AWS Secret Access Key and corresponding AWS Access Key ID for the specified user.
	 * The default status for new keys is <code>Active</code>.
	 *  
	 * If you do not specify a user name, IAM determines the user name implicitly based on the AWS
	 * Access Key ID signing the request. Because this action works for access keys under the AWS
	 * account, you can use this API to manage root credentials even if the AWS account has no
	 * associated users.
	 *  
	 * For information about limits on the number of keys you can create, see <a href=
	 * "http://docs.amazonwebservices.com/IAM/latest/UserGuide/index.html?LimitationsOnEntities.html"
	 * target="_blank">Limitations on IAM Entities</a> in <em>Using AWS Identity and Access
	 * Management</em>.
	 * 
	 * <p class="important">
	 * To ensure the security of your AWS account, the Secret Access Key is accessible only during key
	 * and user creation. You must save the key (for example, in a text file) if you want to be able
	 * to access it again. If a secret key is lost, you can delete the access keys for the associated
	 * user and then create new keys.
	 * </p>
	 *
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>UserName</code> - <code>string</code> - Optional - The user name that the new key will belong to. [Constraints: The value must be between 1 and 128 characters, and must match the following regular expression pattern: <code>[\w+=,.@-]*</code>]</li>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return CFResponse A <CFResponse> object containing a parsed HTTP response.
	 */
	public function create_access_key($opt = null)
	{
		if (!$opt) $opt = array();
				
		return $this->authenticate('CreateAccessKey', $opt);
	}

	/**
	 * This action creates an alias for your AWS account. For information about using an AWS account
	 * alias, see <a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/AccountAlias.html"
	 * target="_blank">Using an Alias for Your AWS Account ID</a> in <em>Using AWS Identity and Access
	 * Management</em>.
	 *
	 * @param string $account_alias (Required) Name of the account alias to create. [Constraints: The value must be between 3 and 63 characters, and must match the following regular expression pattern: <code>^[a-z0-9](([a-z0-9]|-(?!-))*[a-z0-9])?$</code>]
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return CFResponse A <CFResponse> object containing a parsed HTTP response.
	 */
	public function create_account_alias($account_alias, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['AccountAlias'] = $account_alias;
		
		return $this->authenticate('CreateAccountAlias', $opt);
	}

	/**
	 * Creates a new group.
	 *  
	 * For information about the number of groups you can create, see <a href=
	 * "http://docs.amazonwebservices.com/IAM/latest/UserGuide/index.html?LimitationsOnEntities.html"
	 * ta