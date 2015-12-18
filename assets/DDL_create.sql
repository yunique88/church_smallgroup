CREATE SCHEMA `church` ;

CREATE TABLE `church`.`memberInfo` (
  `id` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `department` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `lastName` VARCHAR(45) NULL,
  `nickName` VARCHAR(45) NULL,
  `gender` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `state` VARCHAR(45) NULL,
  `phoneNum` VARCHAR(45) NULL,
  `birthday` DATE NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `church`.`memberValue` (
  `id` INT NOT NULL,
  `attendance` INT NULL,
  `faith` INT NULL,
  `leadership` INT NULL,
  `hasCar` INT NULL,
  `isPraiseTeam` INT NULL,
  `isWorking` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id`
    FOREIGN KEY (`id`)
    REFERENCES `church`.`memberInfo` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);

select * from memberInfo
select * from memberValue

# insert sample data
insert into memberInfo values(0000001, 'president', 'young adult', 'Yunchang', 'Lee', 'Azu', 'm', 'somewhere', 'tacoma', 'WA', '206-619-7661', '1988-03-09')
insert into memberValue values(0000001, 10, 8, 10, 1, 1, 0)



