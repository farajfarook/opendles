SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `dles_db` ;
CREATE SCHEMA IF NOT EXISTS `dles_db` ;

-- -----------------------------------------------------
-- Table `dles_db`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`user` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`user` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(100) NOT NULL ,
  `password_hash` TEXT NOT NULL ,
  `first_name` VARCHAR(100) NOT NULL ,
  `last_name` VARCHAR(100) NOT NULL ,
  `sex` VARCHAR(1) NULL ,
  `birthday` DATE NOT NULL ,
  `phone_number` VARCHAR(15) NULL ,
  `activated` TINYINT(1)  NOT NULL DEFAULT true ,
  `profile_pic` BLOB NULL ,
  `thumb` BLOB NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `Email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`class_major`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`class_major` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`class_major` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`courseweb`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`courseweb` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`courseweb` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `discription` TEXT NULL ,
  `news` TEXT NULL ,
  `events` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`class` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`class` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `class_name` VARCHAR(100) NOT NULL ,
  `class_major_id` INT NOT NULL ,
  `date_created` DATE NOT NULL ,
  `class_owner_id` BIGINT UNSIGNED NOT NULL ,
  `courseweb_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `ClassOwner` (`class_owner_id` ASC) ,
  INDEX `fk_Class_ClassMajor1` (`class_major_id` ASC) ,
  INDEX `fk_Class_Courseweb1` (`courseweb_id` ASC) ,
  CONSTRAINT `ClassOwner`
    FOREIGN KEY (`class_owner_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Class_ClassMajor1`
    FOREIGN KEY (`class_major_id` )
    REFERENCES `dles_db`.`class_major` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Courseweb1`
    FOREIGN KEY (`courseweb_id` )
    REFERENCES `dles_db`.`courseweb` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`user_class_enrolment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`user_class_enrolment` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`user_class_enrolment` (
  `class_id` BIGINT UNSIGNED NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `student_confirmed` TINYINT(1)  NOT NULL DEFAULT false ,
  `lecturer_confirmed` TINYINT(1)  NOT NULL DEFAULT false ,
  INDEX `fk_UserClassEnrolment_Class1` (`class_id` ASC) ,
  INDEX `fk_UserClassEnrolment_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_UserClassEnrolment_Class1`
    FOREIGN KEY (`class_id` )
    REFERENCES `dles_db`.`class` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserClassEnrolment_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`friend`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`friend` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`friend` (
  `user_id1` BIGINT UNSIGNED NOT NULL ,
  `user_id2` BIGINT UNSIGNED NOT NULL ,
  `user1_confirmed` TINYINT(1)  NOT NULL ,
  `user2_confirmed` TINYINT(1)  NOT NULL ,
  INDEX `fk_Friends_User1` (`user_id1` ASC) ,
  INDEX `fk_Friends_User2` (`user_id2` ASC) ,
  PRIMARY KEY (`user_id1`, `user_id2`) ,
  CONSTRAINT `fk_Friends_User1`
    FOREIGN KEY (`user_id1` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Friends_User2`
    FOREIGN KEY (`user_id2` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`class_session`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`class_session` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`class_session` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `class_id` BIGINT UNSIGNED NOT NULL ,
  `start_date_time` DATETIME NOT NULL ,
  `finish_date_time` DATETIME NOT NULL ,
  `actual_start_time` DATETIME NOT NULL ,
  `actual_finish_time` DATETIME NOT NULL ,
  `session_video_location` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `ClassID` (`class_id` ASC) ,
  CONSTRAINT `ClassID`
    FOREIGN KEY (`class_id` )
    REFERENCES `dles_db`.`class` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`blog`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`blog` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`blog` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` TEXT NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `secured` TINYINT(1)  NOT NULL DEFAULT false ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Blog_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_Blog_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`group` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`group` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `blog_id` BIGINT UNSIGNED NULL ,
  `discription` TEXT NOT NULL ,
  `secured` TINYINT(1)  NOT NULL ,
  INDEX `fk_Group_Blog1` (`blog_id` ASC) ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Group_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_Group_Blog1`
    FOREIGN KEY (`blog_id` )
    REFERENCES `dles_db`.`blog` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Group_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`user_group_enrolment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`user_group_enrolment` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`user_group_enrolment` (
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `group_id` BIGINT UNSIGNED NOT NULL ,
  `user_confrmed` TINYINT(1)  NOT NULL ,
  `group_confirmed` TINYINT(1)  NOT NULL ,
  PRIMARY KEY (`user_id`, `group_id`) ,
  INDEX `fk_UserGroupEnrolment_User1` (`user_id` ASC) ,
  INDEX `fk_UserGroupEnrolment_Group2` (`group_id` ASC) ,
  CONSTRAINT `fk_UserGroupEnrolment_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserGroupEnrolment_Group2`
    FOREIGN KEY (`group_id` )
    REFERENCES `dles_db`.`group` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`blocked_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`blocked_user` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`blocked_user` (
  `blocker_id` BIGINT UNSIGNED NOT NULL ,
  `blockee_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`blocker_id`, `blockee_id`) ,
  INDEX `fk_BlockedUser_User1` (`blocker_id` ASC) ,
  INDEX `fk_BlockedUser_User2` (`blockee_id` ASC) ,
  CONSTRAINT `fk_BlockedUser_User1`
    FOREIGN KEY (`blocker_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BlockedUser_User2`
    FOREIGN KEY (`blockee_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`notifications` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`notifications` (
  `notification` TEXT NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `date` DATETIME NOT NULL ,
  `is_read` TINYINT(1)  NOT NULL DEFAULT false ,
  `link` VARCHAR(100) NULL ,
  `type` VARCHAR(45) NULL ,
  INDEX `fk_Notifications_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_Notifications_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`thread`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`thread` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`thread` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `subject` VARCHAR(200) NOT NULL DEFAULT 'no subject' ,
  `started_user_id` BIGINT UNSIGNED NOT NULL ,
  `start_date_time` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `StartedUserID` (`started_user_id` ASC) ,
  CONSTRAINT `StartedUserID`
    FOREIGN KEY (`started_user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`thread_follow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`thread_follow` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`thread_follow` (
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `thread_id` BIGINT UNSIGNED NOT NULL ,
  `is_new` TINYINT(1)  NULL DEFAULT 1 ,
  PRIMARY KEY (`user_id`, `thread_id`) ,
  INDEX `fk_ThreadFollow_User1` (`user_id` ASC) ,
  INDEX `fk_ThreadFollow_Thread1` (`thread_id` ASC) ,
  CONSTRAINT `fk_ThreadFollow_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ThreadFollow_Thread1`
    FOREIGN KEY (`thread_id` )
    REFERENCES `dles_db`.`thread` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`thread_reply`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`thread_reply` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`thread_reply` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `date_of_post` DATE NOT NULL ,
  `message` TEXT NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `thread_id` BIGINT UNSIGNED NOT NULL ,
  INDEX `fk_ThreadReplies_User1` (`user_id` ASC) ,
  INDEX `fk_ThreadReplies_Thread1` (`thread_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_ThreadReplies_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ThreadReplies_Thread1`
    FOREIGN KEY (`thread_id` )
    REFERENCES `dles_db`.`thread` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`blog_post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`blog_post` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`blog_post` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `content` TEXT NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `date` DATETIME NOT NULL ,
  `blog_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_BlogPost_User1` (`user_id` ASC) ,
  INDEX `fk_BlogPost_blog1` (`blog_id` ASC) ,
  CONSTRAINT `fk_BlogPost_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BlogPost_blog1`
    FOREIGN KEY (`blog_id` )
    REFERENCES `dles_db`.`blog` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`blog_post_reply`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`blog_post_reply` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`blog_post_reply` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `date_of_post` DATE NOT NULL ,
  `content` TEXT NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `blog_post_id` BIGINT UNSIGNED NOT NULL ,
  `date` DATETIME NOT NULL ,
  INDEX `fk_BlogPostReply_User1` (`user_id` ASC) ,
  INDEX `fk_BlogPostReply_BlogPost1` (`blog_post_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_BlogPostReply_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BlogPostReply_BlogPost1`
    FOREIGN KEY (`blog_post_id` )
    REFERENCES `dles_db`.`blog_post` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`material` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`material` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `content_name` VARCHAR(100) NOT NULL ,
  `resource` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Material_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_Material_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`courseweb_material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`courseweb_material` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`courseweb_material` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `material_id` BIGINT UNSIGNED NOT NULL ,
  `courseweb_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `material_id`) ,
  INDEX `fk_CoursewebMaterial_Material1` (`material_id` ASC) ,
  INDEX `fk_CoursewebMaterial_Courseweb1` (`courseweb_id` ASC) ,
  CONSTRAINT `fk_CoursewebMaterial_Material1`
    FOREIGN KEY (`material_id` )
    REFERENCES `dles_db`.`material` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CoursewebMaterial_Courseweb1`
    FOREIGN KEY (`courseweb_id` )
    REFERENCES `dles_db`.`courseweb` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`user_authenticate`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`user_authenticate` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`user_authenticate` (
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `key` TEXT NOT NULL ,
  INDEX `fk_UserAuthenticate_User1` (`user_id` ASC) ,
  PRIMARY KEY (`user_id`) ,
  CONSTRAINT `fk_UserAuthenticate_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`media_acl`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`media_acl` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`media_acl` (
  `name` VARCHAR(100) NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `acl_type` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`name`, `user_id`, `acl_type`) ,
  INDEX `fk_MediaAcl_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_MediaAcl_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`config` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`config` (
  `property` VARCHAR(100) NULL ,
  `value` VARCHAR(100) NULL )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`feed`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`feed` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`feed` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` TEXT NULL ,
  `content` TEXT NULL ,
  `link` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`online`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`online` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`online` (
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `time_stamp` VARCHAR(50) NULL ,
  INDEX `fk_online_User1` (`user_id` ASC) ,
  UNIQUE INDEX `UserID_UNIQUE` (`user_id` ASC) ,
  CONSTRAINT `fk_online_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`chat_archive`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`chat_archive` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`chat_archive` (
  `time_stamp` VARCHAR(100) NOT NULL ,
  `msg` TEXT NULL ,
  `is_read` TINYINT(1)  NULL ,
  `user_id1` BIGINT UNSIGNED NOT NULL ,
  `user_id2` BIGINT UNSIGNED NOT NULL ,
  INDEX `fk_chatarchive_User1` (`user_id1` ASC) ,
  INDEX `fk_chatarchive_User2` (`user_id2` ASC) ,
  CONSTRAINT `fk_chatarchive_User1`
    FOREIGN KEY (`user_id1` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_chatarchive_User2`
    FOREIGN KEY (`user_id2` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`doubt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`doubt` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`doubt` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `msg` VARCHAR(500) NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `class_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Doubt_User1` (`user_id` ASC) ,
  INDEX `fk_Doubt_Class1` (`class_id` ASC) ,
  CONSTRAINT `fk_Doubt_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Doubt_Class1`
    FOREIGN KEY (`class_id` )
    REFERENCES `dles_db`.`class` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`data_store`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`data_store` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`data_store` (
  `property` VARCHAR(100) NULL ,
  `value` VARCHAR(100) NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  INDEX `fk_datastore_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_datastore_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`exam`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`exam` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`exam` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `class_id` BIGINT UNSIGNED NOT NULL ,
  `name` VARCHAR(100) NULL ,
  `questions_per_paper` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_exam_class1` (`class_id` ASC) ,
  CONSTRAINT `fk_exam_class1`
    FOREIGN KEY (`class_id` )
    REFERENCES `dles_db`.`class` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`question_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`question_type` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`question_type` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`question`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`question` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`question` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `exam_id` INT NOT NULL ,
  `question_type_id` INT NULL ,
  `question` TEXT NULL ,
  `image` BLOB NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_question_exam1` (`exam_id` ASC) ,
  INDEX `fk_question_question_type1` (`question_type_id` ASC) ,
  CONSTRAINT `fk_question_exam1`
    FOREIGN KEY (`exam_id` )
    REFERENCES `dles_db`.`exam` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_question_type1`
    FOREIGN KEY (`question_type_id` )
    REFERENCES `dles_db`.`question_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`answer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`answer` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`answer` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `question_id` BIGINT NOT NULL ,
  `answer` TEXT NULL ,
  `is_answer` TINYINT(1)  NULL DEFAULT false ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_answer_question1` (`question_id` ASC) ,
  CONSTRAINT `fk_answer_question1`
    FOREIGN KEY (`question_id` )
    REFERENCES `dles_db`.`question` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`paper`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`paper` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`paper` (
  `question_id` BIGINT NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `exam_id` INT NOT NULL ,
  INDEX `fk_paper_question1` (`question_id` ASC) ,
  INDEX `fk_paper_user1` (`user_id` ASC) ,
  PRIMARY KEY (`question_id`, `user_id`, `exam_id`) ,
  INDEX `fk_paper_exam1` (`exam_id` ASC) ,
  CONSTRAINT `fk_paper_question1`
    FOREIGN KEY (`question_id` )
    REFERENCES `dles_db`.`question` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paper_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `dles_db`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paper_exam1`
    FOREIGN KEY (`exam_id` )
    REFERENCES `dles_db`.`exam` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dles_db`.`paper_answer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dles_db`.`paper_answer` ;

CREATE  TABLE IF NOT EXISTS `dles_db`.`paper_answer` (
  `answer_id` BIGINT NOT NULL ,
  `paper_question_id` BIGINT NOT NULL ,
  `paper_user_id` BIGINT UNSIGNED NOT NULL ,
  `paper_exam_id` INT NOT NULL ,
  INDEX `fk_paper_answer_answer1` (`answer_id` ASC) ,
  PRIMARY KEY (`paper_question_id`, `paper_user_id`, `paper_exam_id`, `answer_id`) ,
  INDEX `fk_paper_answer_paper1` (`paper_question_id` ASC, `paper_user_id` ASC, `paper_exam_id` ASC) ,
  CONSTRAINT `fk_paper_answer_answer1`
    FOREIGN KEY (`answer_id` )
    REFERENCES `dles_db`.`answer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paper_answer_paper1`
    FOREIGN KEY (`paper_question_id` , `paper_user_id` , `paper_exam_id` )
    REFERENCES `dles_db`.`paper` (`question_id` , `user_id` , `exam_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
