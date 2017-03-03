#### 数据库设置:      
CREATE DATABASE `crawler` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `edu` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_url` varchar(255) DEFAULT NULL,
`topic_title` varchar(255) DEFAULT NULL,
`topic_url` varchar(255) DEFAULT NULL,
`img_url` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19889 DEFAULT CHARSET=utf8;

CREATE TABLE `log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`page_num` int(11) DEFAULT NULL,
`time` datetime DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

