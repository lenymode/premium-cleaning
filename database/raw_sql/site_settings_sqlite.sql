CREATE TABLE IF NOT EXISTS site_settings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    key TEXT NOT NULL UNIQUE,
    value TEXT NULL,
    created_at TEXT NULL,
    updated_at TEXT NULL
);

INSERT INTO site_settings (key, value, created_at, updated_at) VALUES
('name', 'CRESTWELL FACILITIES', datetime('now'), datetime('now')),
('tagline', 'Clean Spaces. Strong Impressions.', datetime('now'), datetime('now')),
('logo', 'logo.svg', datetime('now'), datetime('now')),
('logo_white', 'logo-white.svg', datetime('now'), datetime('now')),
('footer_logo', 'logo-footer.svg', datetime('now'), datetime('now')),
('phone', '+44 0000 000000', datetime('now'), datetime('now')),
('phone_link', '+440000000000', datetime('now'), datetime('now')),
('email', 'info@crestwellfacilities.com', datetime('now'), datetime('now')),
('whatsapp', '+440000000000', datetime('now'), datetime('now')),
('address', 'United Kingdom', datetime('now'), datetime('now')),
('business_hours', 'Mon-Fri : 09.00 am-05.00 pm<br>Sunday Closed', datetime('now'), datetime('now')),
('footer_about', 'We''re your trusted cleaning company, dedicated to consistently delivering exceptional cleaning service.', datetime('now'), datetime('now')),
('newsletter_text', 'Subscribe to our latest articles, news resources, hints and product updates.', datetime('now'), datetime('now')),
('facebook_url', 'https://www.facebook.com/', datetime('now'), datetime('now')),
('twitter_url', 'https://www.twitter.com/', datetime('now'), datetime('now')),
('linkedin_url', 'https://www.linkedin.com/', datetime('now'), datetime('now')),
('instagram_url', 'https://www.instagram.com/', datetime('now'), datetime('now')),
('youtube_url', 'https://www.youtube.com/', datetime('now'), datetime('now')),
('google_maps_embed', 'https://www.google.com/maps?q=United%20Kingdom&output=embed', datetime('now'), datetime('now')),
('google_review_url', '#', datetime('now'), datetime('now')),
('analytics_id', NULL, datetime('now'), datetime('now')),
('lead_recipient', 'info@crestwellfacilities.com', datetime('now'), datetime('now'))
ON CONFLICT(key) DO UPDATE SET
    value = excluded.value,
    updated_at = datetime('now');
