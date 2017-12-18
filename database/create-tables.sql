-- These are comments (lines starting with '--').

-- Drop table if it already exists so you can start fresh each time.
-- Drop child tables first.

DROP TABLE IF EXISTS resorts; 
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS topics;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;

-- Create a users table in your database. You may have different fields. This isn’t
-- necessarily the best design.
CREATE TABLE users (
user_id     INT(8) NOT NULL AUTO_INCREMENT,
user_name   VARCHAR(30) NOT NULL,
user_pass   VARCHAR(255) NOT NULL,
user_email  VARCHAR(255) NOT NULL,
user_date   DATETIME NOT NULL,
user_level  INT(8) NOT NULL,
UNIQUE INDEX user_name_unique (user_name),
PRIMARY KEY (user_id)
);

CREATE TABLE categories (
cat_id          INT(8) NOT NULL AUTO_INCREMENT,
cat_name        VARCHAR(255) NOT NULL,
cat_description     VARCHAR(255) NOT NULL,
UNIQUE INDEX cat_name_unique (cat_name),
PRIMARY KEY (cat_id)
);
	
CREATE TABLE topics (
topic_id        INT(8) NOT NULL AUTO_INCREMENT,
topic_subject       VARCHAR(255) NOT NULL,
topic_date      DATETIME NOT NULL,
topic_cat       INT(8) NOT NULL,
topic_by        INT(8) NOT NULL,
PRIMARY KEY (topic_id)
);
	
CREATE TABLE posts (
post_id         INT(8) NOT NULL AUTO_INCREMENT,
post_content        TEXT NOT NULL,
post_date       DATETIME NOT NULL,
post_topic      INT(8) NOT NULL,
post_by     INT(8) NOT NULL,
PRIMARY KEY (post_id)
);

CREATE TABLE resorts (
resort_id		INT(8) NOT NULL AUTO_INCREMENT,
resort_name		VARCHAR(255) NOT NULL,
new_snow		INT(8) NOT NULL,
ticket_price	INT(8) NOT NULL,
distance		INT(8) NOT NULL,
brewery			VARCHAR(255) NOT NULL,
resort_open		BIT,
weather			VARBINARY(255),
PRIMARY KEY (resort_id)
);

-- Adding all the resorts into the table. I don't know if this 
-- is the best way to do this, but it'll have to do for now. 
INSERT INTO resorts (resort_name)
 VALUES ('Anthony Lakes'),('Bogus Basin'),('Brundage'),
 ('Grand Targhee'),('Jackson Hole'),('Kelly Canyon'),
 ('Lookout Pass'),('Magic Mountain'),('Pebble Creek'),
 ('Pomerelle'),('Schweitzer'),('Silver Mountain'),
 ('Snowbird'),('Soldier Mountain'),('Sun Valley'),
 ('Tamarack');

 
-- Adding fake users for testing.
INSERT INTO users(user_name, user_pass, user_email, user_date, user_level)
 VALUES('username1', 'password', 'user@email.com', NOW(), 0),
		('username2', 'password2', 'user2@email.com', NOW(), 0),
		('username3', 'password3', 'user3@email.com', NOW(), 0),
		('username4', 'password4', 'user4@email.com', NOW(), 0),
		('username5', 'password5', 'user5@email.com', NOW(), 0),
		('username6', 'password6', 'user6@email.com', NOW(), 0);
 


-- This links the topics to the categories via topic_cat-> cat_id.
ALTER TABLE topics ADD FOREIGN KEY(topic_cat) REFERENCES 
categories(cat_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- This links the topics to the user via topic_by-> user_id
ALTER TABLE topics ADD FOREIGN KEY(topic_by) REFERENCES users(user_id)
 ON DELETE RESTRICT ON UPDATE CASCADE;

-- This links the posts to the topics via post_topic-> topic_id.
ALTER TABLE posts ADD FOREIGN KEY (post_topic) REFERENCES 
topics(topic_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- This links posts to users via post_by-> users.user_id.
ALTER TABLE posts ADD FOREIGN KEY(post_by) REFERENCES users(user_id) ON 
DELETE RESTRICT ON UPDATE CASCADE;
