#
# TABLE STRUCTURE FOR: cm_admin
#

DROP TABLE IF EXISTS cm_admin;

CREATE TABLE `cm_admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `adminname` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `timevisit` varchar(50) DEFAULT NULL,
  `online` enum('YES','NO') DEFAULT 'NO',
  `role` enum('6','2') DEFAULT '2',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO cm_admin (`ID`, `username`, `password`, `adminname`, `email`, `timevisit`, `online`, `role`) VALUES (1, 'اسامة', '000', 'علي علي عبد', 'aliali@yahoo.com', '1316184873', 'NO', '2');
INSERT INTO cm_admin (`ID`, `username`, `password`, `adminname`, `email`, `timevisit`, `online`, `role`) VALUES (2, 'osama', 'c6f057b86584942e415435ffb1fa93d4', 'اسامة احمد سلامة', 'osama_eg@live.com', '1316441646', 'YES', '6');
INSERT INTO cm_admin (`ID`, `username`, `password`, `adminname`, `email`, `timevisit`, `online`, `role`) VALUES (3, 'mm', '', 'mm', '8mm', NULL, 'NO', '2');


#
# TABLE STRUCTURE FOR: cm_counters
#

DROP TABLE IF EXISTS cm_counters;

CREATE TABLE `cm_counters` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_counter` enum('normal','style1','style2','style3','custome','style4') DEFAULT 'normal',
  `code` text,
  `counter` varchar(40) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO cm_counters (`ID`, `type_counter`, `code`, `counter`) VALUES (1, 'style4', '      ', '5');


#
# TABLE STRUCTURE FOR: cm_setting
#

DROP TABLE IF EXISTS cm_setting;

CREATE TABLE `cm_setting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(60) DEFAULT NULL,
  `sitemail` varchar(100) DEFAULT NULL,
  `closesite` enum('YES','NO') DEFAULT 'NO',
  `msg_close` text,
  `keywords` text,
  `description` text,
  `Author` text,
  `welcome` enum('YES','NO') DEFAULT 'NO',
  `welcome_title` varchar(200) DEFAULT NULL,
  `welcome_msg` text,
  `admin_style` enum('blue.css','gray.css','yellow.css','red.css') DEFAULT 'gray.css',
  `editor` enum('0','1','2') DEFAULT '0',
  `mailserver` enum('smtp','sendmail','php') DEFAULT 'php',
  `frommail` varchar(50) DEFAULT NULL,
  `fromname` varchar(50) DEFAULT NULL,
  `path_sendmail` varchar(60) DEFAULT NULL,
  `smtphost` varchar(50) DEFAULT NULL,
  `smtpport` varchar(10) DEFAULT NULL,
  `smtpuser` varchar(25) DEFAULT NULL,
  `smtppass` varchar(25) DEFAULT NULL,
  `cache` enum('YES','NO') DEFAULT 'NO',
  `cache_time` varchar(30) DEFAULT NULL,
  `cache_dir` varchar(255) DEFAULT NULL,
  `popup` enum('YES','NO') DEFAULT 'NO',
  `popup_w` varchar(10) DEFAULT NULL,
  `popup_h` varchar(10) DEFAULT NULL,
  `popup_content` text,
  `bgsound` enum('YES','NO') DEFAULT 'NO',
  `bgsound_src` varchar(80) DEFAULT NULL,
  `bgsound_loop` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO cm_setting (`ID`, `sitename`, `sitemail`, `closesite`, `msg_close`, `keywords`, `description`, `Author`, `welcome`, `welcome_title`, `welcome_msg`, `admin_style`, `editor`, `mailserver`, `frommail`, `fromname`, `path_sendmail`, `smtphost`, `smtpport`, `smtpuser`, `smtppass`, `cache`, `cache_time`, `cache_dir`, `popup`, `popup_w`, `popup_h`, `popup_content`, `bgsound`, `bgsound_src`, `bgsound_loop`) VALUES (1, 'المتحكم', 'osama_eg@live.com', 'NO', ' الموقع مغلق مؤقتاً للصيانة والتحديث. تفضل بالزيارة في وقت لاحق، شكراً              ', '            المتحكم ,اخبار,', '      محرك بوابة ديناميكية و نظام إدارة المحتوى', '            osama salama', 'NO', 'مرحبا بكم  مع برنامج المتحكم', '        المتحكم هو برنامج متكامل لبناء المواقع الاحترافية والتحكم بها علي شبكة الانترنت وقد صمم خصيصا ليلبي احتياجات المواقع العربية للافراد والشركات . المتحكم يمكنك وبكل سهولة تركيب وبناء موقعك بنفسك بل والتحكم الكامل به دون الحاجة الي الإستعانه بخبراء . يتميز نظام المتحكم بدعمة لعدة لغات واستخدامه نظام القوالب في التصميمات مع لوحة تحكم سهله وقويه وذات كفاءة وأمان . صمم المتحكم خصيصاً لتقديم كل الإمكانيات اللازمة لصاحب الموقع لكى يتحكم فى موقعه بكل سهولة وبكل حرية وبدون أدنى تعقيد وستكتشف ذلك بنفسك بمجرد دخولك الى لوحة التحكم الخاصة بالمتحكم وقد وضعنا في الاعتبار أن فكرة المجلة الجاهزة تعتمد فى الأصل على التسهيل والمرونة للعميل فى ادارة موقعه وقد تحقق الحلم بفضل الله فى الجمع بين السهولة والمرونة والقوة فى أسلوب برنامج الإدارة والتعامل معه وان شاء الله سيستمر العمل على تطوير هذا المشروع العظيم آخذين فى الإعتبار ملاحظاتكم وتعليقاتكم على البرنامج حتى نصل معكم وبكم الى القمة .', 'gray.css', '1', 'php', 'mail@yahoo.com', 'باعت بريد', '/usr/sbin/sendmail', 'localhost', '25', 'admin', ' admin', 'NO', '10', NULL, 'NO', '300', '200', 'mmmmmmmmmm', 'NO', '1316206491.MP3', '1');


#
# TABLE STRUCTURE FOR: cm_vistors
#

DROP TABLE IF EXISTS cm_vistors;

CREATE TABLE `cm_vistors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `os` varchar(30) DEFAULT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `dat` datetime DEFAULT NULL,
  `timev` varchar(60) DEFAULT NULL,
  `session_id` varchar(90) DEFAULT NULL,
  `online` enum('online','offline') DEFAULT 'online',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

