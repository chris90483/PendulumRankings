DROP DATABASE PendulumRankingsDB;
CREATE DATABASE PendulumRankingsDB;

USE PendulumRankingsDB;

set FOREIGN_KEY_CHECKS = 1;

create table songs (
    id bigint not null auto_increment,
    link varchar(255),
    album varchar(255),
    name varchar(255),
    average_rank float,
    primary key (id)
);

create table votes (
    id bigint not null auto_increment,
    ip_address varchar(15),
    timestamp datetime,
    primary key (id)
);

DROP PROCEDURE IF EXISTS `createVoteTables`;
delimiter //
CREATE PROCEDURE `createVoteTables`()
BEGIN
    DECLARE count INT Default 0;
    simple_loop: LOOP
        SET @a := count + 1;
        SET @statement = CONCAT('CREATE TABLE `votes_song_', @a, '`(`id` bigint not null auto_increment,
                                                                    `rank` int,
                                                                    `vote` bigint,
                                                                    primary key (`id`),
                                                                    foreign key (`vote`) references votes(`id`))');
        PREPARE stmt FROM @statement;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
        SET count = count + 1;
        IF count=39 THEN
            LEAVE simple_loop;
        END IF;
    END LOOP simple_loop;
END//

CALL createVoteTables()