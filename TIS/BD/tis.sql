-- MySQL Workbench Synchronization
-- Generated: 2019-04-07 16:36
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Miler

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `mydb`.`estudiante` 
DROP FOREIGN KEY `fk_estudiante_user1`;

ALTER TABLE `mydb`.`auxiliar` 
DROP FOREIGN KEY `fk_auxiliar_user1`;

ALTER TABLE `mydb`.`administrador` 
DROP FOREIGN KEY `fk_administrador_user1`;

ALTER TABLE `mydb`.`grupo` 
DROP FOREIGN KEY `fk_grupo_docente1`,
DROP FOREIGN KEY `fk_grupo_materia1`;

ALTER TABLE `mydb`.`reserva` 
DROP FOREIGN KEY `fk_reserva_horarios1`,
DROP FOREIGN KEY `fk_reserva_labo1`;

ALTER TABLE `mydb`.`poratafolio` 
DROP FOREIGN KEY `fk_poratafolio_gestion1`;

ALTER TABLE `mydb`.`estudiante_has_grupo` 
DROP FOREIGN KEY `fk_estudiante_has_grupo_estudiante1`,
DROP FOREIGN KEY `fk_estudiante_has_grupo_grupo1`;

ALTER TABLE `mydb`.`auxiliar_has_grupo` 
DROP FOREIGN KEY `fk_auxiliar_has_grupo_auxiliar1`,
DROP FOREIGN KEY `fk_auxiliar_has_grupo_grupo1`;

ALTER TABLE `mydb`.`estudiante` 
ADD CONSTRAINT `fk_estudiante_user1`
  FOREIGN KEY (`user_CodSIS`)
  REFERENCES `mydb`.`user` (`CodSIS`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `mydb`.`auxiliar` 
ADD CONSTRAINT `fk_auxiliar_user1`
  FOREIGN KEY (`user_Axu`)
  REFERENCES `mydb`.`user` (`CodSIS`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `mydb`.`administrador` 
ADD CONSTRAINT `fk_administrador_user1`
  FOREIGN KEY (`user_Adm`)
  REFERENCES `mydb`.`user` (`CodSIS`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `mydb`.`grupo` 
DROP FOREIGN KEY `fk_grupo_poratafolio1`;

ALTER TABLE `mydb`.`grupo` ADD CONSTRAINT `fk_grupo_poratafolio1`
  FOREIGN KEY (`poratafolio_idporatafolio` , `poratafolio_gestion_idgestion`)
  REFERENCES `mydb`.`poratafolio` (`idporatafolio` , `gestion_idgestion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_grupo_docente1`
  FOREIGN KEY (`docente_user_Doc`)
  REFERENCES `mydb`.`docente` (`user_Doc`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_grupo_materia1`
  FOREIGN KEY (`materia_IdMateria`)
  REFERENCES `mydb`.`materia` (`IdMateria`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `mydb`.`reserva` 
DROP FOREIGN KEY `fk_reserva_grupo1`;

ALTER TABLE `mydb`.`reserva` ADD CONSTRAINT `fk_reserva_horarios1`
  FOREIGN KEY (`horarios_idhorarios`)
  REFERENCES `mydb`.`horarios` (`idhorarios`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reserva_labo1`
  FOREIGN KEY (`labo_nombreLab`)
  REFERENCES `mydb`.`labo` (`nombreLab`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reserva_grupo1`
  FOREIGN KEY (`grupo_idgrupo` , `grupo_poratafolio_idporatafolio` , `grupo_poratafolio_gestion_idgestion` , `grupo_docente_user_Doc`)
  REFERENCES `mydb`.`grupo` (`idgrupo` , `poratafolio_idporatafolio` , `poratafolio_gestion_idgestion` , `docente_user_Doc`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `mydb`.`poratafolio` 
ADD CONSTRAINT `fk_poratafolio_gestion1`
  FOREIGN KEY (`gestion_idgestion`)
  REFERENCES `mydb`.`gestion` (`idgestion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `mydb`.`estudiante_has_grupo` 
ADD CONSTRAINT `fk_estudiante_has_grupo_estudiante1`
  FOREIGN KEY (`estudiante_user_CodSIS`)
  REFERENCES `mydb`.`estudiante` (`user_CodSIS`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_estudiante_has_grupo_grupo1`
  FOREIGN KEY (`grupo_idgrupo`)
  REFERENCES `mydb`.`grupo` (`idgrupo`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `mydb`.`auxiliar_has_grupo` 
ADD CONSTRAINT `fk_auxiliar_has_grupo_auxiliar1`
  FOREIGN KEY (`auxiliar_user_Axu`)
  REFERENCES `mydb`.`auxiliar` (`user_Axu`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_auxiliar_has_grupo_grupo1`
  FOREIGN KEY (`grupo_idgrupo` , `grupo_poratafolio_idporatafolio` , `grupo_poratafolio_gestion_idgestion`)
  REFERENCES `mydb`.`grupo` (`idgrupo` , `poratafolio_idporatafolio` , `poratafolio_gestion_idgestion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
