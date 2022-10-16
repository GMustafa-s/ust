CREATE TABLE `users` (
`user_id` bigint unsigned NOT NULL AUTO_INCREMENT,
`email` varchar(320) NOT NULL,
`password` varchar(128) DEFAULT NULL,
`name` varchar(64) NOT NULL,
`billing` text,
`api_key` varchar(32) DEFAULT NULL,
`token_code` varchar(32) DEFAULT NULL,
`twofa_secret` varchar(16) DEFAULT NULL,
`anti_phishing_code` varchar(8) DEFAULT NULL,
`one_time_login_code` varchar(32) DEFAULT NULL,
`pending_email` varchar(128) DEFAULT NULL,
`email_activation_code` varchar(32) DEFAULT NULL,
`lost_password_code` varchar(32) DEFAULT NULL,
`type` tinyint NOT NULL DEFAULT '0',
`status` tinyint NOT NULL DEFAULT '0',
`plan_id` varchar(16) NOT NULL DEFAULT '',
`plan_expiration_date` datetime DEFAULT NULL,
`plan_settings` text,
`plan_trial_done` tinyint DEFAULT '0',
`plan_expiry_reminder` tinyint DEFAULT '0',
`payment_subscription_id` varchar(64) DEFAULT NULL,
`payment_processor` varchar(16) DEFAULT NULL,
`payment_total_amount` float DEFAULT NULL,
`payment_currency` varchar(4) DEFAULT NULL,
`referral_key` varchar(32) DEFAULT NULL,
`referred_by` varchar(32) DEFAULT NULL,
`referred_by_has_converted` tinyint DEFAULT '0',
`language` varchar(32) DEFAULT 'english',
`timezone` varchar(32) DEFAULT 'UTC',
`datetime` datetime DEFAULT NULL,
`ip` varchar(64) DEFAULT NULL,
`country` varchar(32) DEFAULT NULL,
`last_activity` datetime DEFAULT NULL,
`last_user_agent` varchar(256) DEFAULT NULL,
`total_logins` int DEFAULT '0',
`user_deletion_reminder` tinyint(4) DEFAULT '0',
`source` varchar(32) DEFAULT 'direct',
PRIMARY KEY (`user_id`),
KEY `plan_id` (`plan_id`),
KEY `api_key` (`api_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SEPARATOR --

INSERT INTO `users` (`user_id`, `email`, `password`, `api_key`, `referral_key`, `name`, `type`, `status`, `plan_id`, `plan_expiration_date`, `plan_settings`, `datetime`, `ip`, `last_activity`)
VALUES (1,'admin','$2y$10$uFNO0pQKEHSFcus1zSFlveiPCB3EvG9ZlES7XKgJFTAl5JbRGFCWy', md5(rand()), md5(rand()), 'SaivraTechnologies',1,1,'custom','2030-01-01 12:00:00', '{"teams_limit":0,"team_members_limit":0,"api_is_enabled":true,"affiliate_is_enabled":false,"no_ads":true,"enabled_tools":{"dns_lookup":true,"ip_lookup":true,"reverse_ip_lookup":true,"ssl_lookup":true,"whois_lookup":true,"ping":true,"http_headers_lookup":true,"safe_url_checker":true,"google_cache_checker":true,"url_redirect_checker":true,"password_strength_checker":true,"meta_tags_checker":true,"website_hosting_checker":true,"text_separator":true,"email_extractor":true,"url_extractor":true,"text_size_calculator":true,"duplicate_lines_remover":true,"text_to_speech":true,"idn_punnycode_converter":true,"case_converter":true,"character_counter":true,"base64_encoder":true,"base64_decoder":true,"base64_to_image":true,"image_to_base64":true,"url_encoder":true,"url_decoder":true,"color_converter":true,"binary_converter":true,"hex_converter":true,"ascii_converter":true,"decimal_converter":true,"octal_converter":true,"morse_converter":true,"paypal_link_generator":true,"signature_generator":true,"mailto_link_generator":true,"utm_link_generator":true,"whatsapp_link_generator":true,"youtube_timestamp_link_generator":true,"slug_generator":true,"lorem_ipsum_generator":true,"password_generator":true,"uuid_v4_generator":true,"bcrypt_generator":true,"md2_generator":true,"md4_generator":true,"md5_generator":true,"whirlpool_generator":true,"sha1_generator":true,"sha224_generator":true,"sha256_generator":true,"sha384_generator":true,"sha512_generator":true,"sha512_224_generator":true,"sha512_256_generator":true,"sha3_224_generator":true,"sha3_256_generator":true,"sha3_384_generator":true,"sha3_512_generator":true,"html_minifier":true,"css_minifier":true,"js_minifier":true,"json_validator_beautifier":true,"sql_beautifier":true,"html_entity_converter":true,"bbcode_to_html":true,"markdown_to_html":true,"html_tags_remover":true,"user_agent_parser":true,"url_parser":true,"youtube_thumbnail_downloader":true,"image_optimizer":true,"qr_code_reader":true,"exif_reader":true,"png_to_jpg":true,"png_to_webp":true,"png_to_bmp":true,"png_to_gif":true,"png_to_ico":true,"jpg_to_png":true,"jpg_to_webp":true,"jpg_to_gif":true,"jpg_to_ico":true,"jpg_to_bmp":true,"webp_to_jpg":true,"webp_to_gif":true,"webp_to_png":true,"webp_to_bmp":true,"webp_to_ico":true,"bmp_to_jpg":true,"bmp_to_gif":true,"bmp_to_png":true,"bmp_to_webp":true,"bmp_to_ico":true,"ico_to_jpg":true,"ico_to_gif":true,"ico_to_png":true,"ico_to_webp":true,"ico_to_bmp":true,"gif_to_jpg":true,"gif_to_ico":true,"gif_to_png":true,"gif_to_webp":true,"gif_to_bmp":true,"celsius_to_fahrenheit":true,"fahrenheit_to_celsius":true,"miles_to_kilometers":true,"kilometers_to_miles":true,"miles_per_hour_to_kilometers_per_hour":true,"kilometers_per_hour_to_miles_per_hour":true,"kilograms_to_pounds":true,"pounds_to_kilograms":true,"number_to_roman_numerals":true,"roman_numerals_to_number":true,"liters_to_gallons_us":true,"liters_to_gallons_imperial":true,"gallons_us_to_liters":true,"gallons_imperial_to_liters":true}}', NOW(),'',NOW());

-- SEPARATOR --

CREATE TABLE `users_logs` (
`id` bigint unsigned NOT NULL AUTO_INCREMENT,
`user_id` bigint unsigned DEFAULT NULL,
`type` varchar(64) DEFAULT NULL,
`ip` varchar(64) DEFAULT NULL,
`device_type` varchar(16) DEFAULT NULL,
`os_name` varchar(16) DEFAULT NULL,
`country_code` varchar(8) DEFAULT NULL,
`datetime` datetime DEFAULT NULL,
PRIMARY KEY (`id`),
KEY `users_logs_user_id` (`user_id`),
CONSTRAINT `users_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SEPARATOR --

CREATE TABLE `plans` (
`plan_id` int unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(256) NOT NULL DEFAULT '',
`description` varchar(256) NOT NULL DEFAULT '',
`monthly_price` float DEFAULT NULL,
`annual_price` float DEFAULT NULL,
`lifetime_price` float DEFAULT NULL,
`trial_days` int unsigned NOT NULL DEFAULT '0',
`settings` text NOT NULL,
`taxes_ids` text,
`codes_ids` text,
`color` varchar(16) DEFAULT NULL,
`status` tinyint NOT NULL,
`order` int unsigned DEFAULT '0',
`datetime` datetime NOT NULL,
PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SEPARATOR --

CREATE TABLE `pages_categories` (
`pages_category_id` bigint unsigned NOT NULL AUTO_INCREMENT,
`url` varchar(256) NOT NULL DEFAULT '',
`title` varchar(64) NOT NULL DEFAULT '',
`description` varchar(128) DEFAULT NULL,
`icon` varchar(32) DEFAULT NULL,
`order` int NOT NULL DEFAULT '0',
`language` varchar(32) DEFAULT NULL,
`datetime` datetime DEFAULT NULL,
`last_datetime` datetime DEFAULT NULL,
PRIMARY KEY (`pages_category_id`),
KEY `url` (`url`),
KEY `pages_categories_url_language_index` (`url`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- SEPARATOR --

CREATE TABLE `pages` (
`page_id` bigint unsigned NOT NULL AUTO_INCREMENT,
`pages_category_id` bigint unsigned DEFAULT NULL,
`url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
`title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
`description` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`editor` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`content` longtext COLLATE utf8mb4_unicode_ci,
`type` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT '',
`position` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
`language` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`open_in_new_tab` tinyint DEFAULT '1',
`order` int DEFAULT '0',
`total_views` int DEFAULT '0',
`datetime` datetime DEFAULT NULL,
`last_datetime` datetime DEFAULT NULL,
PRIMARY KEY (`page_id`),
KEY `pages_pages_category_id_index` (`pages_category_id`),
KEY `pages_url_index` (`url`),
KEY `pages_url_language_index` (`url`,`language`),
CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`pages_category_id`) REFERENCES `pages_categories` (`pages_category_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SEPARATOR --

INSERT INTO `pages` (`pages_category_id`, `url`, `title`, `description`, `content`, `type`, `position`, `order`, `total_views`, `datetime`, `last_datetime`) VALUES
(NULL, 'https://saivra.net/', 'Software by SaivraTechnologies', '', '', 'external', 'bottom', 1, 0, NOW(), NOW()),
(NULL, 'https://ultrasmarttools.com', 'Built with ultrasmarttools', '', '', 'external', 'bottom', 0, 0, NOW(), NOW());

-- SEPARATOR --

CREATE TABLE `blog_posts_categories` (
`blog_posts_category_id` bigint unsigned NOT NULL AUTO_INCREMENT,
`url` varchar(256) NOT NULL DEFAULT '',
`title` varchar(64) NOT NULL DEFAULT '',
`description` varchar(128) DEFAULT NULL,
`order` int NOT NULL DEFAULT '0',
`language` varchar(32) DEFAULT NULL,
`datetime` datetime DEFAULT NULL,
`last_datetime` datetime DEFAULT NULL,
PRIMARY KEY (`blog_posts_category_id`),
KEY `url` (`url`),
KEY `blog_posts_categories_url_language_index` (`url`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- SEPARATOR --

CREATE TABLE `blog_posts` (
`blog_post_id` bigint unsigned NOT NULL AUTO_INCREMENT,
`blog_posts_category_id` bigint unsigned DEFAULT NULL,
`url` varchar(128) NOT NULL,
`title` varchar(64) NOT NULL DEFAULT '',
`description` varchar(128) DEFAULT NULL,
`image` varchar(40) DEFAULT NULL,
`editor` varchar(16) DEFAULT NULL,
`content` longtext,
`language` varchar(32) DEFAULT NULL,
`total_views` int DEFAULT '0',
`datetime` datetime DEFAULT NULL,
`last_datetime` datetime DEFAULT NULL,
PRIMARY KEY (`blog_post_id`),
KEY `blog_post_id_index` (`blog_post_id`),
KEY `blog_post_url_index` (`url`),
KEY `blog_post_url_language_index` (`url`,`language`),
KEY `blog_posts_category_id` (`blog_posts_category_id`),
CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`blog_posts_category_id`) REFERENCES `blog_posts_categories` (`blog_posts_category_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SEPARATOR --

CREATE TABLE `settings` (
`id` int NOT NULL AUTO_INCREMENT,
`key` varchar(64) NOT NULL DEFAULT '',
`value` longtext NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SEPARATOR --

SET @cron_key = MD5(RAND());

-- SEPARATOR --

INSERT INTO `settings` (`key`, `value`) VALUES
('main', '{"title": "Your title", "index_url": "", "se_indexing": true, "not_found_url": "", "default_language": "english", "default_timezone": "UTC", "privacy_policy_url": "", "default_theme_style": "light", "terms_and_conditions_url": ""}'),
('users', '{"email_confirmation":false,"register_is_enabled":true,"auto_delete_inactive_users":0,"user_deletion_reminder":0}'),
('ads', '{\"header\":\"\",\"footer\":\"\"}'),
('captcha', '{\"type\":\"basic\",\"recaptcha_public_key\":\"\",\"recaptcha_private_key\":\"\",\"login_is_enabled\":0,\"register_is_enabled\":0,\"lost_password_is_enabled\":0,\"resend_activation_is_enabled\":0}'),
('cron', concat('{\"key\":\"', @cron_key, '\"}')),
('email_notifications', '{\"emails\":\"\",\"new_user\":\"\",\"new_payment\":\"\"}'),
('facebook', '{\"is_enabled\":\"0\",\"app_id\":\"\",\"app_secret\":\"\"}'),
('google', '{\"is_enabled\":\"0\",\"client_id\":\"\",\"client_secret\":\"\"}'),
('twitter', '{\"is_enabled\":\"0\",\"consumer_api_key\":\"\",\"consumer_api_secret\":\"\"}'),
('discord', '{\"is_enabled\":\"0\"}'),
('plan_custom', '{"plan_id":"custom","name":"Custom","description":"","price":":)","custom_button_url":"https:\/\/example.com\/","color":null,"status":2,"settings":{"teams_limit":0,"team_members_limit":0,"api_is_enabled":true,"affiliate_is_enabled":false,"no_ads":true,"enabled_tools":{"dns_lookup":true,"ip_lookup":true,"ssl_lookup":true,"whois_lookup":true,"ping":true,"md5_generator":true,"base64_converter":true,"base64_image_converter":true,"url_converter":true,"lorem_ipsum_generator":true,"markdown_to_html":true,"case_converter":true,"uuid_v4_generator":true,"bcrypt_generator":true,"password_generator":true,"password_strength_checker":true,"slug_generator":true,"html_minifier":true,"css_minifier":true,"js_minifier":true,"user_agent_parser":true,"website_hosting_checker":true,"character_counter":true,"url_parser":true,"color_converter":true,"http_headers_lookup":true,"duplicate_lines_remover":true,"text_to_speech":true,"idn_punnycode_converter":true,"json_validator_beautifier":true,"qr_code_reader":true,"meta_tags_checker":true,"exif_reader":true,"sql_beautifier":true,"html_entity_converter":true,"binary_converter":true,"hex_converter":true,"mailto_link_generator":true,"youtube_thumbnail_downloader":true,"safe_url_checker":true}}}'),
('plan_free', '{"plan_id":"free","name":"Free","description":"","price":"Free","color":null,"status":1,"settings":{"teams_limit":0,"team_members_limit":0,"api_is_enabled":true,"affiliate_is_enabled":false,"no_ads":true,"enabled_tools":{"dns_lookup":true,"ip_lookup":true,"ssl_lookup":true,"whois_lookup":true,"ping":true,"md5_generator":true,"base64_converter":true,"base64_image_converter":true,"url_converter":true,"lorem_ipsum_generator":true,"markdown_to_html":true,"case_converter":true,"uuid_v4_generator":true,"bcrypt_generator":true,"password_generator":true,"password_strength_checker":true,"slug_generator":true,"html_minifier":true,"css_minifier":true,"js_minifier":true,"user_agent_parser":true,"website_hosting_checker":true,"character_counter":true,"url_parser":true,"color_converter":true,"http_headers_lookup":true,"duplicate_lines_remover":true,"text_to_speech":true,"idn_punnycode_converter":true,"json_validator_beautifier":true,"qr_code_reader":true,"meta_tags_checker":true,"exif_reader":true,"sql_beautifier":true,"html_entity_converter":true,"binary_converter":true,"hex_converter":true,"mailto_link_generator":true,"youtube_thumbnail_downloader":true,"safe_url_checker":true}}}'),
('plan_guest', '{"plan_id":"guest","name":"Guest","description":"","price":"Free","color":null,"status":1,"settings":{"teams_limit":0,"team_members_limit":0,"api_is_enabled":true,"affiliate_is_enabled":false,"no_ads":true,"enabled_tools":{"dns_lookup":true,"ip_lookup":true,"ssl_lookup":true,"whois_lookup":true,"ping":true,"md5_generator":true,"base64_converter":true,"base64_image_converter":true,"url_converter":true,"lorem_ipsum_generator":true,"markdown_to_html":true,"case_converter":true,"uuid_v4_generator":true,"bcrypt_generator":true,"password_generator":true,"password_strength_checker":true,"slug_generator":true,"html_minifier":true,"css_minifier":true,"js_minifier":true,"user_agent_parser":true,"website_hosting_checker":true,"character_counter":true,"url_parser":true,"color_converter":true,"http_headers_lookup":true,"duplicate_lines_remover":true,"text_to_speech":true,"idn_punnycode_converter":true,"json_validator_beautifier":true,"qr_code_reader":true,"meta_tags_checker":true,"exif_reader":true,"sql_beautifier":true,"html_entity_converter":true,"binary_converter":true,"hex_converter":true,"mailto_link_generator":true,"youtube_thumbnail_downloader":true,"safe_url_checker":true}}}'),
('payment', '{\"is_enabled\":false,\"type\":\"both\",\"currency\":\"USD\",\"codes_is_enabled\":false,\"taxes_and_billing_is_enabled\":false,\"invoice_is_enabled\":false}'),
('paypal', '{\"is_enabled\":\"0\",\"mode\":\"sandbox\",\"client_id\":\"\",\"secret\":\"\"}'),
('stripe', '{\"is_enabled\":\"0\",\"publishable_key\":\"\",\"secret_key\":\"\",\"webhook_secret\":\"\"}'),
('offline_payment', '{\"is_enabled\":\"0\",\"instructions\":\"Your offline payment instructions go here..\"}'),
('coinbase', '{\"is_enabled\":\"0\"}'),
('payu', '{\"is_enabled\":\"0\"}'),
('paystack', '{\"is_enabled\":\"0\"}'),
('razorpay', '{\"is_enabled\":\"0\"}'),
('mollie', '{\"is_enabled\":\"0\"}'),
('yookassa', '{\"is_enabled\":\"0\"}'),
('crypto_com', '{\"is_enabled\":\"0\"}'),
('paddle', '{\"is_enabled\":\"0\"}'),
('smtp', '{\"host\":\"\",\"from\":\"\",\"from_name\":\"\",\"encryption\":\"tls\",\"port\":\"587\",\"auth\":\"1\",\"username\":\"\",\"password\":\"\"}'),
('custom', '{\"head_js\":\"\",\"head_css\":\"\"}'),
('socials', '{\"facebook\":\"\",\"instagram\":\"\",\"twitter\":\"\",\"youtube\":\"\"}'),
('announcements', '{\"id\":\"\",\"content\":\"\",\"show_logged_in\":\"\",\"show_logged_out\":\"\"}'),
('business', '{\"brand_name\":\"ultrasmarttools\",\"invoice_nr_prefix\":\"INVOICE-\",\"name\":\"\",\"address\":\"\",\"city\":\"\",\"county\":\"\",\"zip\":\"\",\"country\":\"AF\",\"email\":\"\",\"phone\":\"\",\"tax_type\":\"\",\"tax_id\":\"\",\"custom_key_one\":\"\",\"custom_value_one\":\"\",\"custom_key_two\":\"\",\"custom_value_two\":\"\"}'),
('webhooks', '{\"user_new\": \"\", \"user_delete\": \"\"}'),
('tools', '{"available_tools":{"dns_lookup":true,"ip_lookup":true,"reverse_ip_lookup":true,"ssl_lookup":true,"whois_lookup":true,"ping":true,"http_headers_lookup":true,"safe_url_checker":true,"google_cache_checker":true,"url_redirect_checker":true,"password_strength_checker":true,"meta_tags_checker":true,"website_hosting_checker":true,"text_separator":true,"email_extractor":true,"url_extractor":true,"text_size_calculator":true,"duplicate_lines_remover":true,"text_to_speech":true,"idn_punnycode_converter":true,"case_converter":true,"character_counter":true,"base64_encoder":true,"base64_decoder":true,"base64_to_image":true,"image_to_base64":true,"url_encoder":true,"url_decoder":true,"color_converter":true,"binary_converter":true,"hex_converter":true,"ascii_converter":true,"decimal_converter":true,"octal_converter":true,"morse_converter":true,"paypal_link_generator":true,"signature_generator":true,"mailto_link_generator":true,"utm_link_generator":true,"whatsapp_link_generator":true,"youtube_timestamp_link_generator":true,"slug_generator":true,"lorem_ipsum_generator":true,"password_generator":true,"uuid_v4_generator":true,"bcrypt_generator":true,"md2_generator":true,"md4_generator":true,"md5_generator":true,"whirlpool_generator":true,"sha1_generator":true,"sha224_generator":true,"sha256_generator":true,"sha384_generator":true,"sha512_generator":true,"sha512_224_generator":true,"sha512_256_generator":true,"sha3_224_generator":true,"sha3_256_generator":true,"sha3_384_generator":true,"sha3_512_generator":true,"html_minifier":true,"css_minifier":true,"js_minifier":true,"json_validator_beautifier":true,"sql_beautifier":true,"html_entity_converter":true,"bbcode_to_html":true,"markdown_to_html":true,"html_tags_remover":true,"user_agent_parser":true,"url_parser":true,"youtube_thumbnail_downloader":true,"image_optimizer":true,"qr_code_reader":true,"exif_reader":true,"png_to_jpg":true,"png_to_webp":true,"png_to_bmp":true,"png_to_gif":true,"png_to_ico":true,"jpg_to_png":true,"jpg_to_webp":true,"jpg_to_gif":true,"jpg_to_ico":true,"jpg_to_bmp":true,"webp_to_jpg":true,"webp_to_gif":true,"webp_to_png":true,"webp_to_bmp":true,"webp_to_ico":true,"bmp_to_jpg":true,"bmp_to_gif":true,"bmp_to_png":true,"bmp_to_webp":true,"bmp_to_ico":true,"ico_to_jpg":true,"ico_to_gif":true,"ico_to_png":true,"ico_to_webp":true,"ico_to_bmp":true,"gif_to_jpg":true,"gif_to_ico":true,"gif_to_png":true,"gif_to_webp":true,"gif_to_bmp":true,"celsius_to_fahrenheit":true,"fahrenheit_to_celsius":true,"miles_to_kilometers":true,"kilometers_to_miles":true,"miles_per_hour_to_kilometers_per_hour":true,"kilometers_per_hour_to_miles_per_hour":true,"kilograms_to_pounds":true,"pounds_to_kilograms":true,"number_to_roman_numerals":true,"roman_numerals_to_number":true,"liters_to_gallons_us":true,"liters_to_gallons_imperial":true,"gallons_us_to_liters":true,"gallons_imperial_to_liters":true},"google_safe_browsing_is_enabled":false,"google_safe_browsing_api_key":""}'),
('cookie_consent', '{}'),
('license', '{\"license\":\"licensed\",\"type\":\"Regular License\"}'),
('product_info', '{\"version\":\"7.0.0\", \"code\":\"700\"}');

-- SEPARATOR --

CREATE TABLE `tools_usage` (
`id` bigint unsigned NOT NULL AUTO_INCREMENT,
`tool_id` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`total_views` bigint unsigned DEFAULT '0',
PRIMARY KEY (`id`),
UNIQUE KEY `tools_usage_tool_id_idx` (`tool_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
