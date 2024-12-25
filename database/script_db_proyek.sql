-- MySQL Script generated by MySQL Workbench
-- Sat Oct 19 23:20:12 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`pengasuh`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pengasuh` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_pengasuh` VARCHAR(128) NOT NULL,
  `notelp_pengasuh` VARCHAR(14) NOT NULL,
  `pekerjaan_pengasuh` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`wali`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`wali` (
  `id` INT NOT NULL,
  `nama_wali` VARCHAR(128) NOT NULL,
  `alamat_wali` VARCHAR(128) NOT NULL,
  `notelp_wali` VARCHAR(14) NOT NULL,
  `hubungan` VARCHAR(45) NOT NULL,
  `pekerjaan` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`anak_asuh`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`anak_asuh` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_anak_asuh` VARCHAR(128) NOT NULL,
  `tgl_lahir` VARCHAR(45) NOT NULL,
  `jenis_kelamin` VARCHAR(45) NOT NULL,
  `tgl_masuk` DATE NOT NULL,
  `id_wali` INT NULL,
  `id_pengasuh` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_wali_UNIQUE` (`id_wali` ASC) VISIBLE,
  UNIQUE INDEX `id_pengasuh_UNIQUE` (`id_pengasuh` ASC) VISIBLE,
  CONSTRAINT `id_pengasuh`
    FOREIGN KEY (`id_pengasuh`)
    REFERENCES `mydb`.`pengasuh` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_wali`
    FOREIGN KEY (`id_pengasuh`)
    REFERENCES `mydb`.`wali` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`donatur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`donatur` (
  `id` INT NOT NULL,
  `nama_donatur` VARCHAR(128) NOT NULL,
  `notelp_donatur` VARCHAR(14) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`donasi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`donasi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `item_donasi` VARCHAR(45) NOT NULL,
  `tgl_donasi` VARCHAR(45) NOT NULL,
  `jumlah_donasi` VARCHAR(45) NOT NULL,
  `keterangan` VARCHAR(45) NULL,
  `id_donatur` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_donatur_UNIQUE` (`id_donatur` ASC) VISIBLE,
  CONSTRAINT `id_donatur`
    FOREIGN KEY (`id_donatur`)
    REFERENCES `mydb`.`donatur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`penanggung_jawab_kegiatan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`penanggung_jawab_kegiatan` (
  `id` INT NOT NULL,
  `nama_pj` VARCHAR(45) NOT NULL,
  `notelp_pj` VARCHAR(14) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`kegiatan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`kegiatan` (
  `id` INT NOT NULL,
  `nama_kegiatan` VARCHAR(45) NOT NULL,
  `tgl_kegiatan` VARCHAR(45) NOT NULL,
  `deskripsi_kegiatan` VARCHAR(45) NOT NULL,
  `id_penanggung_jawab` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `penanggung_jawab_UNIQUE` (`id_penanggung_jawab` ASC) VISIBLE,
  CONSTRAINT `id_penanggung_jawab`
    FOREIGN KEY (`id_penanggung_jawab`)
    REFERENCES `mydb`.`penanggung_jawab_kegiatan` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;