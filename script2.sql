
CREATE TABLE IF NOT EXISTS `Consumer` (
  `id_consumer` INT NOT NULL AUTO_INCREMENT,
  `Name_consumer` VARCHAR(45) NULL,
  `Phone_consumer` VARCHAR(45) NULL,
  PRIMARY KEY (`id_consumer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Object`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Object` (
  `id_object` INT NOT NULL AUTO_INCREMENT,
  `Owner_FIO` VARCHAR(45) NULL,
  `Renter_FIO` VARCHAR(45) NULL,
  `Name_object` VARCHAR(45) NULL,
  `Mailing_address` VARCHAR(45) NULL,
  `Phone_object` VARCHAR(45) NULL,
  `Source_of_power` VARCHAR(45) NULL,
  `Voltage_class` VARCHAR(45) NULL,
  `Date_instrumental_check` VARCHAR(45) NULL,
  `Obj_Cons_id` INT NOT NULL,
  PRIMARY KEY (`id_object`, `Obj_Cons_id`),
  INDEX `fk_Объект_Потребитель_idx` (`Obj_Cons_id` ASC),
  CONSTRAINT `fk_Объект_Потребитель`
    FOREIGN KEY (`Obj_Cons_id`)
    REFERENCES `Consumer` (`id_consumer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Transfor_vol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Transfor_vol` (
  `id_tr_vol` INT NOT NULL AUTO_INCREMENT,
  `Type_tr_vol` VARCHAR(45) NULL,
  `Mark_tr_vol` VARCHAR(45) NULL,
  `Denomin_tr_vol` VARCHAR(45) NULL,
  `Plomb_tr_vol` VARCHAR(45) NULL,
  `Date_gospr_tr_vol` VARCHAR(45) NULL,
  `Date_next_tr_vol` VARCHAR(45) NULL,
  PRIMARY KEY (`id_tr_vol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Counter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Counter` (
  `id_count` INT NOT NULL AUTO_INCREMENT,
  `Type_count` VARCHAR(45) NULL,
  `Mark_count` VARCHAR(45) NULL,
  `Year_release_count` VARCHAR(45) NULL,
  `Class_accur_count` VARCHAR(45) NULL,
  `Date_gospr_count` VARCHAR(45) NULL,
  `Date_next_pr_count` VARCHAR(45) NULL,
  `Kol_plomb_gospr` VARCHAR(45) NULL,
  `Kol_holog_stick` VARCHAR(45) NULL,
  `Plomb_netw_org` VARCHAR(45) NULL,
  `Antimag_plomb` VARCHAR(45) NULL,
  `Plomb_shu` VARCHAR(45) NULL,
  `Other_places_count` VARCHAR(45) NULL,
  `Obj_id_count` INT NOT NULL,
  `Obj_Cons_id_count` INT NOT NULL,
  PRIMARY KEY (`id_count`, `Obj_id_count`, `Obj_Cons_id_count`),
  INDEX `fk_Счетчик_Объект1_idx` (`Obj_id_count` ASC, `Obj_Cons_id_count` ASC),
  CONSTRAINT `fk_Счетчик_Объект1`
    FOREIGN KEY (`Obj_id_count` , `Obj_Cons_id_count`)
    REFERENCES `Object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Transfor_cur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Transfor_cur` (
  `id_tr_cur` INT NOT NULL AUTO_INCREMENT,
  `Type_tr_cur` VARCHAR(45) NULL,
  `Mark_tr_cur` VARCHAR(45) NULL,
  `Denomin_tr_cur` VARCHAR(45) NULL,
  `Year_release_tr_cur` VARCHAR(45) NULL,
  `Date_gospr_tr_cur` VARCHAR(45) NULL,
  `Date_next_tr_cur` VARCHAR(45) NULL,
  `Num_tr_cur_fa` VARCHAR(45) NULL,
  `Num_tr_cur_fb` VARCHAR(45) NULL,
  `Num_tr_cur_fc` VARCHAR(45) NULL,
  `Phase_tr_cur` VARCHAR(45) NULL,
  `Obj_id_tr_cur` INT NOT NULL,
  `Obj_Cons_id_tr_cur` INT NOT NULL,
  PRIMARY KEY (`id_tr_cur`),
  INDEX `fk_Трансформатор тока_Объект1_idx` (`Obj_id_tr_cur` ASC, `Obj_Cons_id_tr_cur` ASC),
  CONSTRAINT `fk_Трансформатор тока_Объект1`
    FOREIGN KEY (`Obj_id_tr_cur` , `Obj_Cons_id_tr_cur`)
    REFERENCES `Object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Plombs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Plombs` (
  `id_plomb` INT NOT NULL AUTO_INCREMENT,
  `L1` VARCHAR(45) NULL,
  `L2` VARCHAR(45) NULL,
  `I1` VARCHAR(45) NULL,
  `I2` VARCHAR(45) NULL,
  `Other_places_plomb` VARCHAR(45) NULL,
  `Tr_cur_id_plomb` INT NOT NULL,
  PRIMARY KEY (`id_plomb`, `Tr_cur_id_plomb`),
  INDEX `fk_Пломбы_Трансформатор тока1_idx` (`Tr_cur_id_plomb` ASC),
  CONSTRAINT `fk_Пломбы_Трансформатор тока1`
    FOREIGN KEY (`Tr_cur_id_plomb`)
    REFERENCES `Transfor_cur` (`id_tr_cur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Dimension`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Dimension` (
  `id_dimen` INT NOT NULL AUTO_INCREMENT,
  `Date_dimen` VARCHAR(45) NULL,
  `Alter_phase` VARCHAR(45) NULL,
  `Load_fa` VARCHAR(45) NULL,
  `Load_fb` VARCHAR(45) NULL,
  `Load_fc` VARCHAR(45) NULL,
  `Cos_fi` VARCHAR(45) NULL,
  `Kol_turn_disk` VARCHAR(45) NULL,
  `Power_consum` VARCHAR(45) NULL,
  `Obj_id_dimen` INT NOT NULL,
  `Obj_Cons_id_dimen` INT NOT NULL,
  PRIMARY KEY (`id_dimen`),
  INDEX `fk_Данные об измерениях_Объект1_idx` (`Obj_id_dimen` ASC, `Obj_Cons_id_dimen` ASC),
  CONSTRAINT `fk_Данные об измерениях_Объект1`
    FOREIGN KEY (`Obj_id_dimen` , `Obj_Cons_id_dimen`)
    REFERENCES `Object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Accounting_check`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Accounting_check` (
  `id_check` INT NOT NULL AUTO_INCREMENT,
  `Date_check` VARCHAR(45) NULL,
  `Type_verif` VARCHAR(45) NULL,
  `Conclusion_ac` VARCHAR(45) NULL,
  `Notes_ac` VARCHAR(45) NULL,
  PRIMARY KEY (`id_check`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Change_count`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Change_count` (
  `id_change` INT NOT NULL AUTO_INCREMENT,
  `Date_change` VARCHAR(45) NULL,
  `Cause_change` VARCHAR(45) NULL,
  `FIO_change` VARCHAR(45) NULL,
  PRIMARY KEY (`id_change`))
ENGINE = InnoDB;
