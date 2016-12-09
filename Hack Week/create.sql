DROP DATABASE IF EXISTS hackweek;
CREATE DATABASE hackweek;
use hackweek;

create table fortune (
  id int NOT NULL AUTO_INCREMENT,
  fortune varchar(200),
  PRIMARY KEY (id)
);

insert into fortune (fortune) values
  ('You will find a bushel of money.'),
  ('Your smile will tell you what makes you feel good.'),
  ('Don’t panic'),
  ('The best year-round temperature is a warm heart and a cool head'),
  ('It could be better, but it’s good enough.'),
  ('You will find a thing. It may be important'),
  ('Two days from now, tomorrow will be yesterday.'),
  ('You are cleverly disguised as responsible adult.'),
  ('Marriage lets you annoy one special person for the rest of your life'),
  ('I cannot help you, for I’m just a cookie'),
  ('Come back later... I’m sleeping (cookies need their sleep too)'),
  ('If you can read this, you are literate. Congratulations');
