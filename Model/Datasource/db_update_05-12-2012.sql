ALTER TABLE `rubriks` CHANGE `name` `name` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `comment` `comment` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `template` `template` VARCHAR( 250 ) CHARACTER SET ucs2 COLLATE ucs2_general_ci NOT NULL ;

-- Add new field
ALTER TABLE `rubriks` ADD `title2` VARCHAR( 150 ) NOT NULL AFTER `name` ;

-- change encoding to UTF-8
ALTER TABLE `rubriks` CHANGE `title2` `title2` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
