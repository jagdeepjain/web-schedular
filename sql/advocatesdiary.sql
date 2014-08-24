CREATE
    TABLE
        IF NOT EXISTS `user`(
            `user_id` INT(11) NOT NULL auto_increment ,
            `active` VARCHAR(1) NOT NULL ,
            `group_id` INT(11) NOT NULL ,
            `username` VARCHAR(15) DEFAULT NULL ,
            `password` VARCHAR(50) DEFAULT NULL ,
            `email` VARCHAR(100) DEFAULT NULL ,
            `name` VARCHAR(64) DEFAULT NULL ,
            `creation_date` DATE ,
            `edit_date` DATE ,
            PRIMARY KEY(`user_id`) ,
            UNIQUE KEY `username`(`username`)
        ) ENGINE = MyISAM AUTO_INCREMENT = 1011 DEFAULT CHARSET = utf8; 

INSERT
    INTO
        `user`(
            `user_id` ,
            `active` ,
            `group_id` ,
            `username` ,
            `password` ,
            `email` ,
            `name`
        )
    VALUES(
        1011 ,
        'Y' ,
        1011 ,
        'admin' ,
        'password' ,
        'jagdeep.jain@gmail.com' ,
        'Administrator'
    );
    
CREATE
    TABLE
        IF NOT EXISTS `events`(
            `event_id` INT(11) NOT NULL auto_increment ,
            `user_id` INT(11) NOT NULL ,
            `start_date` DATETIME NOT NULL ,
            `end_date` DATETIME ,
            `title` VARCHAR(100) NOT NULL ,
            `description` VARCHAR(255) DEFAULT '' ,
            `location` VARCHAR(255) DEFAULT '' ,
            `all_day` boolean NOT NULL DEFAULT 0 ,
            FOREIGN KEY(user_id) REFERENCES USER(user_id) ,
            PRIMARY KEY(`event_id`)
        ) ENGINE = MyISAM AUTO_INCREMENT = 2001 DEFAULT CHARSET = utf8;
        
        
        
        
        
        
        
        
