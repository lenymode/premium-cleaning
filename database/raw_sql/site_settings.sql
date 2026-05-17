CREATE TABLE IF NOT EXISTS site_settings (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(255) NOT NULL UNIQUE,
    value TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

INSERT INTO site_settings (`key`, value, created_at, updated_at) VALUES
('name', 'CRESTWELL FACILITIES', NOW(), NOW()),
('tagline', 'Clean Spaces. Strong Impressions.', NOW(), NOW()),
('logo', 'logo.svg', NOW(), NOW()),
('logo_white', 'logo-white.svg', NOW(), NOW()),
('footer_logo', 'logo-footer.svg', NOW(), NOW()),
('phone', '+44 0000 000000', NOW(), NOW()),
('phone_link', '+440000000000', NOW(), NOW()),
('email', 'info@crestwellfacilities.com', NOW(), NOW()),
('whatsapp', '+440000000000', NOW(), NOW()),
('address', 'United Kingdom', NOW(), NOW()),
('business_hours', 'Mon-Fri : 09.00 am-05.00 pm<br>Sunday Closed', NOW(), NOW()),
('footer_about', 'We''re your trusted cleaning company, dedicated to consistently delivering exceptional cleaning service.', NOW(), NOW()),
('newsletter_text', 'Subscribe to our latest articles, news resources, hints and product updates.', NOW(), NOW()),
('facebook_url', 'https://www.facebook.com/', NOW(), NOW()),
('twitter_url', 'https://www.twitter.com/', NOW(), NOW()),
('linkedin_url', 'https://www.linkedin.com/', NOW(), NOW()),
('instagram_url', 'https://www.instagram.com/', NOW(), NOW()),
('youtube_url', 'https://www.youtube.com/', NOW(), NOW()),
('google_maps_embed', 'https://www.google.com/maps?q=United%20Kingdom&output=embed', NOW(), NOW()),
('google_review_url', '#', NOW(), NOW()),
('analytics_id', NULL, NOW(), NOW()),
('lead_recipient', 'info@crestwellfacilities.com', NOW(), NOW())
ON DUPLICATE KEY UPDATE
    value = VALUES(value),
    updated_at = NOW();
