/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB : Database - go_life
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`go_life` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `go_life`;

/*Data for the table `biodata` */

insert  into `biodata`(`id`,`user_id`,`posisi`,`nama`,`ktp`,`dob`,`pob`,`jk`,`agama`,`gol`,`status`,`alamat`,`email`,`no_tlp`,`orang_dekat`,`skill`,`bersedia`,`expektasi_gaji`) values 
(1,4,'test','heizell','test','2021-03-03','test','Laki-laki','test','test','test','KP. PANGODOKAN KIDUL RT/RW 05/03 NO.20','hzl@vci.co.id','test','test','test','YA','100000'),
(2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin@gmail.com',NULL,NULL,NULL,NULL,NULL);

/*Data for the table `menumst` */

insert  into `menumst`(`id`,`name`,`module`,`slug`,`number`,`icon`,`parent`,`is_parent`,`show_menu`,`menu_allowed`,`status`,`add_date`,`add_user`,`edit_date`,`edit_user`) values 
(1,'Dashboard','dashboard','dashboard','1','entypo-gauge','0',0,'1','+1+2','Active',NULL,NULL,NULL,NULL),
(2,'Log out','logout','login/logout','7','entypo-login','0',0,'1','+1+2','Active',NULL,NULL,NULL,NULL),
(3,'Entry Data','biodata','biodata/entryData','2','entypo-plus','0',0,'1','+2','Active',NULL,NULL,NULL,NULL),
(4,'All Data','biodata','biodata/allData','3',NULL,'0',0,'1','+1',NULL,NULL,NULL,NULL,NULL);

/*Data for the table `pekerjaan` */

insert  into `pekerjaan`(`id`,`id_bio`,`perusahaan`,`posisi_terakhir`,`pendapatan`,`tahun_pekerjaan`) values 
(5,1,'test1 ','test1 ','test1 ','test 1');

/*Data for the table `pelatihan` */

insert  into `pelatihan`(`id`,`id_bio`,`nama_kursus`,`setifikat`,`tahun_pelatihan`) values 
(6,1,'test1 ','test1 ','test1 ');

/*Data for the table `pendidikan` */

insert  into `pendidikan`(`id`,`id_bio`,`jenjang`,`nama_institusi`,`jurusan`,`tahun_lulus`,`ipk`) values 
(6,1,'test 1','test1 ','test1 ','test1 ','test1 ');

/*Data for the table `user` */

insert  into `user`(`user_id`,`email`,`role_id`,`password`,`full_name`,`active`,`create_date`,`create_by`,`update_date`,`update_by`) values 
(3,'admin@gmail.com',1,'e69dc2c09e8da6259422d987ccbe95b5','admin',1,'2022-08-23 20:53:24',NULL,'2022-08-23 20:53:24',NULL),
(4,'hzl@vci.co.id',2,'e10adc3949ba59abbe56e057f20f883e','heizell',1,'2022-08-23 21:37:50',NULL,'2022-08-23 21:37:50',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
