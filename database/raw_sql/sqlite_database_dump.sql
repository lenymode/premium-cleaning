PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DROP TABLE IF EXISTS cache;
CREATE TABLE cache (
    key TEXT NOT NULL PRIMARY KEY,
    value TEXT NOT NULL,
    expiration INTEGER NOT NULL
);
DROP TABLE IF EXISTS cache_locks;
CREATE TABLE cache_locks (
    key TEXT NOT NULL PRIMARY KEY,
    owner TEXT NOT NULL,
    expiration INTEGER NOT NULL
);
DROP TABLE IF EXISTS failed_jobs;
CREATE TABLE failed_jobs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    uuid TEXT NOT NULL UNIQUE,
    connection TEXT NOT NULL,
    queue TEXT NOT NULL,
    payload TEXT NOT NULL,
    exception TEXT NOT NULL,
    failed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);
DROP TABLE IF EXISTS job_batches;
CREATE TABLE job_batches (
    id TEXT NOT NULL PRIMARY KEY,
    name TEXT NOT NULL,
    total_jobs INTEGER NOT NULL,
    pending_jobs INTEGER NOT NULL,
    failed_jobs INTEGER NOT NULL,
    failed_job_ids TEXT NOT NULL,
    options TEXT NULL,
    cancelled_at INTEGER NULL,
    created_at INTEGER NOT NULL,
    finished_at INTEGER NULL
);
DROP TABLE IF EXISTS jobs;
CREATE TABLE jobs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    queue TEXT NOT NULL,
    payload TEXT NOT NULL,
    attempts INTEGER NOT NULL,
    reserved_at INTEGER NULL,
    available_at INTEGER NOT NULL,
    created_at INTEGER NOT NULL
);
DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    slug TEXT NOT NULL UNIQUE,
    county TEXT NULL,
    postcode_area TEXT NULL,
    description TEXT NULL,
    is_active INTEGER NOT NULL DEFAULT 1,
    sort_order INTEGER NOT NULL DEFAULT 0,
    created_at TEXT NULL,
    updated_at TEXT NULL,
    deleted_at TEXT NULL
);
DROP TABLE IF EXISTS password_reset_tokens;
CREATE TABLE password_reset_tokens (
    email TEXT NOT NULL PRIMARY KEY,
    token TEXT NOT NULL,
    created_at TEXT NULL
);
DROP TABLE IF EXISTS quote_requests;
CREATE TABLE quote_requests (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    company TEXT NULL,
    email TEXT NOT NULL,
    phone TEXT NOT NULL,
    service TEXT NOT NULL,
    property_type TEXT NULL,
    postcode TEXT NULL,
    message TEXT NULL,
    source TEXT NOT NULL DEFAULT 'website',
    status TEXT NOT NULL DEFAULT 'new',
    created_at TEXT NULL,
    updated_at TEXT NULL
);
DROP TABLE IF EXISTS services;
CREATE TABLE services (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    slug TEXT NOT NULL UNIQUE,
    excerpt TEXT NOT NULL,
    description TEXT NOT NULL,
    benefits TEXT NULL,
    faqs TEXT NULL,
    image TEXT NULL,
    meta_title TEXT NULL,
    meta_description TEXT NULL,
    sort_order INTEGER NOT NULL DEFAULT 0,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at TEXT NULL,
    updated_at TEXT NULL,
    deleted_at TEXT NULL
, icon_class TEXT NULL);
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('1', 'Commercial Cleaning', 'commercial-cleaning', 'Reliable scheduled cleaning for commercial premises, communal spaces and client-facing environments.', '<p>Professional commercial cleaning for offices, retail spaces, communal areas and managed properties. Crestwell builds practical cleaning routines that protect your workplace standards and brand presentation.</p>', '["Consistent cleaning standards","Flexible daily, weekly or periodic schedules","Suitable for offices, retail and shared facilities","Clear communication and service checks"]', '[{"question":"Do you offer Commercial Cleaning for commercial clients?","answer":"Yes. Crestwell is designed for commercial, property and facilities-led clients, with residential support available where appropriate."},{"question":"Can I request a recurring schedule?","answer":"Yes. We can quote for one-off, daily, weekly, fortnightly or custom recurring arrangements."},{"question":"How do I get a quote?","answer":"Use the quote form, call the team or send a WhatsApp enquiry with your property type, location and required service."}]', 'uploads/services/industrial-cleaning-20260517200813-3gemq7.webp', 'Commercial Cleaning | Crestwell Facilities', 'Commercial cleaning by Crestwell Facilities for offices, retail, communal areas and managed properties.', '10', '1', '2026-05-16 20:18:01', '2026-05-17 20:08:13', NULL, 'fa-solid fa-building');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('2', 'Office Cleaning', 'office-cleaning', 'Daily and periodic office cleaning for productive, presentable workplaces.', '<p>Office cleaning built around real working environments, from desks and meeting rooms to washrooms, kitchens, reception areas and high-touch surfaces.</p>', '["Early morning, evening or out-of-hours options","Workstation, washroom and kitchen care","Supports staff wellbeing and visitor confidence","Recurring plans for growing teams"]', '[{"question":"Do you offer Office Cleaning for commercial clients?","answer":"Yes. Crestwell supports commercial and office teams with flexible schedules."},{"question":"Can I request out-of-hours cleaning?","answer":"Yes. We can discuss early morning, evening or other practical timing options."},{"question":"How do I get a quote?","answer":"Send the quote form, call, or use WhatsApp with your office size, postcode and preferred frequency."}]', 'uploads/services/office-cleaning-20260517200658-Q2eice.jpg', 'Office Cleaning | Crestwell Facilities', 'Office cleaning by Crestwell Facilities for productive, professional workplaces.', '20', '1', '2026-05-16 20:18:01', '2026-05-17 20:06:58', NULL, 'fa-solid fa-broom');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('3', 'End of Tenancy Cleaning', 'end-of-tenancy-cleaning', 'Detailed handover cleaning for landlords, agents and tenants.', '<p>A thorough clean for rental property handovers, helping properties present professionally for inspections, new tenants and marketing.</p>', '["Kitchen and bathroom detail cleaning","Agent and landlord friendly service","Improves presentation before viewings","One-off booking availability"]', '[{"question":"Do you clean before tenant handover?","answer":"Yes. This service is designed for move-outs, landlord checks and agent handovers."},{"question":"Can landlords and agents book directly?","answer":"Yes. We support landlords, agents, tenants and property managers."},{"question":"How do I get a quote?","answer":"Share the property type, location and required timing through the quote form, phone or WhatsApp."}]', 'uploads/services/end-of-tenancy-cleaning-services-cardiff-20260517200937-IAYzUE.jpg', 'End of Tenancy Cleaning | Crestwell Facilities', 'End of tenancy cleaning for landlords, agents, tenants and managed properties.', '30', '1', '2026-05-16 20:18:01', '2026-05-17 20:09:37', NULL, 'fa-solid fa-spray-can-sparkles');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('4', 'Airbnb / Serviced Accommodation Cleaning', 'airbnb-serviced-accommodation-cleaning', 'Fast, reliable turnover cleaning for short-stay properties.', '<p>Guest-ready cleaning for Airbnb and serviced accommodation operators who need consistent standards, responsive scheduling and smooth changeovers.</p>', '["Turnaround cleaning between stays","Linen and presentation support ready","Reliable standards for guest reviews","Scalable for multiple units"]', '[{"question":"Can you support guest turnovers?","answer":"Yes. Crestwell can support short-stay and serviced accommodation changeovers."},{"question":"Can this scale across multiple units?","answer":"Yes. We can discuss repeat schedules for single or multiple properties."},{"question":"How do I get a quote?","answer":"Send your property count, location, turnover timing and service needs."}]', 'uploads/services/a-cleaner-is-cleaning-an-airbnb-and-performing-various-cleaning-tasks-20260517201029-8YkUMy.png', 'Airbnb Cleaning | Crestwell Facilities', 'Airbnb and serviced accommodation cleaning for reliable guest-ready turnovers.', '40', '1', '2026-05-16 20:18:01', '2026-05-17 20:10:29', NULL, 'fa-solid fa-house-chimney');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('5', 'Deep Cleaning', 'deep-cleaning', 'Intensive cleaning for neglected, high-use or priority spaces.', '<p>Deep cleaning for spaces needing more than routine maintenance, including detailed surface care, washrooms, kitchens, high-touch areas and hard-to-reach zones.</p>', '["Ideal before launches, inspections or reopenings","Targets built-up dirt and high-use areas","Supports hygiene and presentation goals","Available for commercial and residential spaces"]', '[{"question":"When should I book deep cleaning?","answer":"Deep cleaning is useful before inspections, reopenings, handovers or after heavy use."},{"question":"Can you deep clean commercial spaces?","answer":"Yes. Crestwell supports commercial, property and residential environments."},{"question":"How do I get a quote?","answer":"Share the space type, location and priority areas through the quote form."}]', 'uploads/services/deeepclr-20260517201145-siqWMa.png', 'Deep Cleaning | Crestwell Facilities', 'Deep cleaning for commercial, property and residential spaces needing detailed attention.', '50', '1', '2026-05-16 20:18:01', '2026-05-17 20:11:45', NULL, 'fa-solid fa-soap');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('6', 'Facilities Support', 'facilities-support', 'Practical support services for managed buildings and operations.', '<p>Facilities support for businesses, landlords and property managers needing dependable cleaning-led operational assistance as their portfolio grows.</p>', '["Scalable facilities service structure","Supports property managers and operators","Recurring and ad hoc support options","Professional reporting and communication"]', '[{"question":"Is this only cleaning?","answer":"The service is cleaning-led facilities support for managed buildings and operational spaces."},{"question":"Can you support property managers?","answer":"Yes. Crestwell is built for landlords, agents, operators and property management needs."},{"question":"How do I get a quote?","answer":"Send the building type, service requirement and coverage area."}]', 'uploads/services/industrial-facility-cleaning-services-atlanta-ga-640w-20260517201518-wo68iT.webp', 'Facilities Support | Crestwell Facilities', 'Facilities support for managed buildings, landlords, property managers and operators.', '60', '1', '2026-05-16 20:18:01', '2026-05-17 20:15:18', NULL, 'fa-solid fa-briefcase');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('7', 'Pressure Washing', 'pressure-washing', 'Exterior surface cleaning for entrances, paths and hardstanding areas.', '<p>Pressure washing for commercial frontages, paths, driveways, bin stores, courtyards and external surfaces that shape first impressions.</p>', '["Improves kerb appeal","Suitable for commercial and residential exteriors","Removes surface grime and weathering","Supports periodic property maintenance"]', '[{"question":"What areas can be pressure washed?","answer":"Common areas include entrances, paths, driveways, courtyards, bin stores and hardstanding areas."},{"question":"Can this be recurring?","answer":"Yes. We can quote one-off or periodic exterior cleaning."},{"question":"How do I get a quote?","answer":"Send photos, location and the approximate surface area where possible."}]', 'uploads/services/why-pressure-washing-is-essential-for-your-home-20260517201631-IqhVcl.webp', 'Pressure Washing | Crestwell Facilities', 'Pressure washing for entrances, paths, courtyards, driveways and exterior surfaces.', '70', '1', '2026-05-16 20:18:01', '2026-05-17 20:16:31', NULL, 'fa-solid fa-hand-sparkles');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('8', 'Emergency Cleaning', 'emergency-cleaning', 'Responsive cleaning for urgent incidents and short-notice needs.', '<p>Emergency cleaning support for spills, property issues, guest changeover pressure, event aftermath and urgent commercial presentation needs.</p>', '["Short-notice response","Useful for incidents and urgent handovers","Commercial and property-focused support","Clear scope before attendance"]', '[{"question":"Can I request urgent cleaning?","answer":"Yes. Availability depends on timing and location, but urgent enquiries are welcome."},{"question":"What situations can you support?","answer":"Spills, urgent handovers, event aftermath, guest turnover pressure and short-notice presentation needs."},{"question":"How do I get a quote?","answer":"Call or WhatsApp first for urgent needs, then send any supporting details."}]', 'uploads/services/emergency-20260517202026-GPOXae.jpg', 'Emergency Cleaning | Crestwell Facilities', 'Emergency cleaning support for urgent incidents, handovers and short-notice needs.', '80', '1', '2026-05-16 20:18:01', '2026-05-17 20:20:26', NULL, 'fa-solid fa-truck-fast');
INSERT INTO "services" ("id", "title", "slug", "excerpt", "description", "benefits", "faqs", "image", "meta_title", "meta_description", "sort_order", "is_active", "created_at", "updated_at", "deleted_at", "icon_class") VALUES ('9', 'Property Management Cleaning', 'property-management-cleaning', 'Cleaning support for landlords, agents and managed property portfolios.', '<p>Property management cleaning for communal areas, void properties, serviced accommodation, inspections and recurring maintenance routines.</p>', '["Designed for portfolios and managed sites","Supports inspections and tenant experience","Recurring communal cleaning options","One-off and ongoing plans"]', '[{"question":"Do you support managed portfolios?","answer":"Yes. Crestwell can support landlords, agents and property managers with repeat cleaning needs."},{"question":"Can you clean communal areas?","answer":"Yes. Communal spaces, void properties and inspection preparation can be discussed."},{"question":"How do I get a quote?","answer":"Share your portfolio type, location, property count and service frequency."}]', 'uploads/services/does-house-cleaning-cost-updated-2025-pricing-guide-scaled-20260517202126-CaBO2v.webp', 'Property Management Cleaning | Crestwell Facilities', 'Cleaning support for landlords, agents and managed property portfolios.', '90', '1', '2026-05-16 20:18:01', '2026-05-17 20:21:26', NULL, 'fa-solid fa-warehouse');
DROP TABLE IF EXISTS sessions;
CREATE TABLE sessions (
    id TEXT NOT NULL PRIMARY KEY,
    user_id INTEGER NULL,
    ip_address TEXT NULL,
    user_agent TEXT NULL,
    payload TEXT NOT NULL,
    last_activity INTEGER NOT NULL
);
DROP TABLE IF EXISTS site_settings;
CREATE TABLE site_settings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    key TEXT NOT NULL UNIQUE,
    value TEXT NULL,
    created_at TEXT NULL,
    updated_at TEXT NULL
);
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('1', 'name', 'CRESTWELL FACILITIES', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('2', 'tagline', 'Clean Spaces. Strong Impressions.', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('3', 'logo', 'uploads/company/logo-20260517164255-wK4scu.png', '2026-05-17 16:28:39', '2026-05-17 16:42:55');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('4', 'logo_white', 'uploads/company/logo-white-20260517164255-65Meot.png', '2026-05-17 16:28:39', '2026-05-17 16:42:55');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('5', 'footer_logo', 'logo-footer.svg', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('6', 'phone', '+44 0000 000000', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('7', 'phone_link', '+440000000000', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('8', 'email', 'info@crestwellfacilities.com', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('9', 'whatsapp', '+440000000000', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('10', 'address', 'United Kingdom', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('11', 'business_hours', 'Mon-Fri : 09.00 am-05.00 pm<br>Sunday Closed', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('12', 'footer_about', 'We''re your trusted cleaning company, dedicated to consistently delivering exceptional cleaning service.', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('13', 'newsletter_text', 'Subscribe to our latest articles, news resources, hints and product updates.', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('14', 'facebook_url', 'https://www.facebook.com/', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('15', 'twitter_url', 'https://www.twitter.com/', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('16', 'linkedin_url', 'https://www.linkedin.com/', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('17', 'instagram_url', 'https://www.instagram.com/', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('18', 'youtube_url', 'https://www.youtube.com/', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('19', 'google_maps_embed', 'https://www.google.com/maps?q=United%20Kingdom&output=embed', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('20', 'google_review_url', 'https://www.google.com/', '2026-05-17 16:28:39', '2026-05-17 16:37:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('21', 'analytics_id', NULL, '2026-05-17 16:28:39', '2026-05-17 16:28:39');
INSERT INTO "site_settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('22', 'lead_recipient', 'info@crestwellfacilities.com', '2026-05-17 16:28:39', '2026-05-17 16:28:39');
DROP TABLE IF EXISTS testimonials;
CREATE TABLE testimonials (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    role TEXT NULL,
    company TEXT NULL,
    quote TEXT NOT NULL,
    rating INTEGER NOT NULL DEFAULT 5,
    image TEXT NULL,
    is_active INTEGER NOT NULL DEFAULT 1,
    sort_order INTEGER NOT NULL DEFAULT 0,
    created_at TEXT NULL,
    updated_at TEXT NULL,
    deleted_at TEXT NULL
);
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    email_verified_at TEXT NULL,
    password TEXT NOT NULL,
    avatar_path TEXT NULL,
    remember_token TEXT NULL,
    created_at TEXT NULL,
    updated_at TEXT NULL
);
INSERT INTO "users" ("id", "name", "email", "email_verified_at", "password", "avatar_path", "remember_token", "created_at", "updated_at") VALUES ('1', 'Admin User', 'test@example.com', '2026-05-16 19:52:13', '$2y$12$DpSBjeuK1Tt3WnBSMTCWoeCrKoIFsbbaqypq6jpCXt8snW.4PTSru', NULL, NULL, '2026-05-16 19:52:13', '2026-05-17 16:43:25');
CREATE INDEX cache_expiration_index ON cache (expiration);
CREATE INDEX cache_locks_expiration_index ON cache_locks (expiration);
CREATE INDEX jobs_queue_index ON jobs (queue);
CREATE INDEX sessions_last_activity_index ON sessions (last_activity);
CREATE INDEX sessions_user_id_index ON sessions (user_id);
COMMIT;
PRAGMA foreign_keys=ON;
