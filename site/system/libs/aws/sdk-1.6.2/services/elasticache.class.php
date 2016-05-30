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
 * Amazon ElastiCache is a web service that makes it easier to set up, operate, and scale a
 * distributed cache in the cloud.
 *  
 * With Amazon ElastiCache, customers gain all of the benefits of a high-performance, in-memory
 * cache with far less of the administrative burden of launching and managing a distributed cache.
 * The service makes set-up, scaling, and cluster failure handling much simpler than in a
 * self-managed cache deployment.
 *  
 * In addition, through integration with Amazon CloudWatch, customers get enhanced visibility into
 * the key performance statistics associated with their cache and can receive alarms if a part of
 * their cache runs hot.
 *
 * @version 2013.01.14
 * @license See the included NOTICE.md file for complete information.
 * @copyright See the included NOTICE.md file for complete information.
 * @link http://aws.amazon.com/elasticache/ AWS ElastiCache
 * @link http://aws.amazon.com/elasticache/documentation/ AWS ElastiCache documentation
 */
class AmazonElastiCache extends CFRuntime
{
	/*%******************************************************************************************%*/
	// CLASS CONSTANTS

	/**
	 * Specify the queue URL for the United States East (Northern Virginia) Region.
	 */
	const REGION_US_E1 = 'elasticache.us-east-1.amazonaws.com';

	/**
	 * Specify the queue URL for the United States East (Northern Virginia) Region.
	 */
	const REGION_VIRGINIA = self::REGION_US_E1;

	/**
	 * Specify the queue URL for the United States West (Northern California) Region.
	 */
	const REGION_US_W1 = 'elasticache.us-west-1.amazonaws.com';

	/**
	 * Specify the queue URL for the United States West (Northern California) Region.
	 */
	const REGION_CALIFORNIA = self::REGION_US_W1;

	/**
	 * Specify the queue URL for the United States West (Oregon) Region.
	 */
	const REGION_US_W2 = 'elasticache.us-west-2.amazonaws.com';

	/**
	 * Specify the queue URL for the United States West (Oregon) Region.
	 */
	const REGION_OREGON = self::REGION_US_W2;

	/**
	 * Specify the queue URL for the Europe West (Ireland) Region.
	 */
	const REGION_EU_W1 = 'elasticache.eu-west-1.amazonaws.com';

	/**
	 * Specify the queue URL for the Europe West (Ireland) Region.
	 */
	const REGION_IRELAND = self::REGION_EU_W1;

	/**
	 * Specify the queue URL for the Asia Pacific Southeast (Singapore) Region.
	 */
	const REGION_APAC_SE1 = 'elasticache.ap-southeast-1.amazonaws.com';

	/**
	 * Specify the queue URL for the Asia Pacific Southeast (Singapore) Region.
	 */
	const REGION_SINGAPORE = self::REGION_APAC_SE1;

	/**
	 * Specify the queue URL for the Asia Pacific Northeast (Tokyo) Region.
	 */
	const REGION_APAC_NE1 = 'elasticache.ap-northeast-1.amazonaws.com';

	/**
	 * Specify the queue URL for the Asia Pacific Northeast (Tokyo) Region.
	 */
	const REGION_TOKYO = self::REGION_APAC_NE1;

	/**
	 * Specify the queue URL for the South America (Sao Paulo) Region.
	 */
	const REGION_SA_E1 = 'elasticache.sa-east-1.amazonaws.com';

	/**
	 * Specify the queue URL for the South America (Sao Paulo) Region.
	 */
	const REGION_SAO_PAULO = self::REGION_SA_E1;

	/**
	 * Default service endpoint.
	 */
	const DEFAULT_URL = self::REGION_US_E1;


	/*%******************************************************************************************%*/
	// CONSTRUCTOR

	/**
	 * Constructs a new instance of <AmazonElastiCache>.
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
		$this->api_version = '2012-11-15';
		$this->hostname = self::DEFAULT_URL;
		$this->auth_class = 'AuthV2Query';

		return parent::__construct($options);
	}


	/*%******************************************************************************************%*/
	// SETTERS

	/**
	 * This allows you to explicitly sets the region for the service to use.
	 *
	 * @param string $region (Required) The region to explicitly set. Available options are <REGION_US_E1>, <REGION_US_W1>, <REGION_US_W2>, <REGION_EU_W1>, <REGION_APAC_SE1>, <REGION_APAC_NE1>, <REGION_SA_E1>.
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
	 * Authorizes ingress to a CacheSecurityGroup using EC2 Security Groups as authorization
	 * (therefore the application using the cache must be running on EC2 clusters). This API requires
	 * the following parameters: EC2SecurityGroupName and EC2SecurityGroupOwnerId.
	 * 
	 * <p class="note">
	 * You cannot authorize ingress from an EC2 security group in one Region to an Amazon Cache
	 * Cluster in another.
	 * </p>
	 *
	 * @param string $cache_security_group_name (Required) The name of the Cache Security Group to authorize.
	 * @param string $ec2_security_group_name (Required) Name of the EC2 Security Group to include in the authorization.
	 * @param string $ec2_security_group_owner_id (Required) AWS Account Number of the owner of the security group specified in the EC2SecurityGroupName parameter. The AWS Access Key ID is not an acceptable value.
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return CFResponse A <CFResponse> object containing a parsed HTTP response.
	 */
	public function authorize_cache_security_group_ingress($cache_security_group_name, $ec2_security_group_name, $ec2_security_group_owner_id, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['CacheSecurityGroupName'] = $cache_security_group_name;
		$opt['EC2SecurityGroupName'] = $ec2_security_group_name;
		$opt['EC2SecurityGroupOwnerId'] = $ec2_security_group_owner_id;
		
		return $this->authenticate('AuthorizeCacheSecurityGroupIngress', $opt);
	}

	/**
	 * Creates a new Cache Cluster.
	 *
	 * @param string $cache_cluster_id (Required) The Cache Cluster identifier. This parameter is stored as a lowercase string. Constraints:<ul><li>Must contain from 1 to 20 alphanumeric characters or hyphens.</li><li>First character must be a letter.</li><li>Cannot end with a hyphen or contain two consecutive hyphens.</li></ul>Example: <code>mycachecluster</code>
	 * @param integer $num_cache_nodes (Required) The number of Cache Nodes the Cache Cluster should have.
	 * @param string $cache_node_type (Required) The compute and memory capacity of nodes in a Cache Cluster. Valid values: <code>cache.t1.micro</code> | <code>cache.m1.small</code> | <code>cache.m1.medium</code> | <code>cache.m1.large</code> | <code>cache.m1.xlarge</code> | <code>cache.m3.xlarge</code> | <code>cache.m3.2xlarge</code> | <code>cache.m2.xlarge</code> | <code>cache.m2.2xlarge</code> | <code>cache.m2.4xlarge</code> | <code>cache.c1.xlarge</code>
	 * @param string $engine (Required) The name of the cache engine to be used for this Cache Cluster. <p class="note">Currently, <em>memcached</em> is the only cache engine supported by the service.</p>
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>EngineVersion</code> - <code>string</code> - Optional - The version of the cache engine to be used for this cluster.</li>
	 * 	<li><code>CacheParameterGroupName</code> - <code>string</code> - Optional - The name of the cache parameter group to associate with this Cache cluster. If this argument is omitted, the default CacheParameterGroup for the specified engine will be used.</li>
	 * 	<li><code>CacheSubnetGroupName</code> - <code>string</code> - Optional - The name of the Cache Subnet Group to be used for the Cache Cluster. Use this parameter only when you are creating a cluster in an Amazon Virtual Private Cloud (VPC).</li>
	 * 	<li><code>CacheSecurityGroupNames</code> - <code>string|array</code> - Optional - A list of Cache Security Group Names to associate with this Cache Cluster. Use this parameter only when you are creating a cluster outside of an Amazon Virtual Private Cloud (VPC). Pass a string for a single value, or an indexed array for multiple values.</li>
	 * 	<li><code>SecurityGroupIds</code> - <code>string|array</code> - Optional - Specifies the VPC Security Groups associated with the Cache Cluster. Use this parameter only when you are creating a cluster in an Amazon Virtual Private Cloud (VPC). Pass a string for a single value, or an indexed array for multiple values.</li>
	 * 	<li><code>PreferredAvailabilityZone</code> - <code>string</code> - Optional - The EC2 Availability Zone that the Cache Cluster will be created in. All cache nodes belonging to a cache cluster are placed in the preferred availability zone. Default: System chosen (random) availability zone.</li>
	 * 	<li><code>PreferredMaintenanceWindow</code> - <code>string</code> - Optional - The weekly time range (in UTC) during which system maintenance can occur. 