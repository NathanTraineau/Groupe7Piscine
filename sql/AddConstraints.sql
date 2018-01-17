ALTER TABLE `contact` ADD CONSTRAINT `FK_EditeurContact` FOREIGN KEY (`NumEditeur`) REFERENCES `editeur`(`NumEditeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `suivi` ADD CONSTRAINT `FK_EditeurSuivi` FOREIGN KEY (`NumEditeur`) REFERENCES `editeur`(`NumEditeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `jeux` ADD CONSTRAINT `FK_CategorieJeux` FOREIGN KEY (`CodeCategorie`) REFERENCES `categorie`(`CodeCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `jeux` ADD CONSTRAINT `FK_EditeurJeux` FOREIGN KEY (`NumEditeur`) REFERENCES `editeur`(`NumEditeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `zone` ADD CONSTRAINT `FK_FestivalZone` FOREIGN KEY (`AnneeZone`) REFERENCES `festival`(`AnneeFestival`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `regrouper` ADD CONSTRAINT `FK_EditeurRegrouper` FOREIGN KEY (`NumEditeur`) REFERENCES `editeur`(`NumEditeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `regrouper` ADD CONSTRAINT `FK_ZoneRegrouper` FOREIGN KEY (`NumZone`) REFERENCES `zone`(`NumZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `organiser` ADD CONSTRAINT `FK_CategorieOrganiser` FOREIGN KEY (`CodeCategorie`) REFERENCES `categorie`(`CodeCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `organiser` ADD CONSTRAINT `FK_ZoneOrganiser` FOREIGN KEY (`NumZone`) REFERENCES `zone`(`NumZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `localiser` ADD CONSTRAINT `FK_ReservationLocaliser` FOREIGN KEY (`NumReservation`) REFERENCES `reservation`(`NumReservation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `localiser` ADD CONSTRAINT `FK_ZoneLocaliser` FOREIGN KEY (`NumZone`) REFERENCES `zone`(`NumZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `loger` ADD CONSTRAINT `FK_LogementLoger` FOREIGN KEY (`NumLogement`) REFERENCES `logement`(`NumLogement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `loger` ADD CONSTRAINT `FK_ReservationLoger` FOREIGN KEY (`NumReservation`) REFERENCES `reservation`(`NumReservation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `concerner` ADD CONSTRAINT `FK_JeuConcerner` FOREIGN KEY (`NumJeux`) REFERENCES `jeux`(`NumJeux`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `concerner` ADD CONSTRAINT `FK_ReservationConcerner` FOREIGN KEY (`NumReservation`) REFERENCES `reservation`(`NumReservation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `concerner` ADD CONSTRAINT `FK_ZoneConcerner` FOREIGN KEY (`NumZone`) REFERENCES `zone`(`NumZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `reservation` ADD CONSTRAINT `FK_EditeurConcerner`FOREIGN KEY (`NumEditeurReservation`) REFERENCES `editeur`(`NumEditeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

 ALTER TABLE `reservation` ADD CONSTRAINT `FK_FestivalConcerner`FOREIGN KEY (`FestivalReservation`) REFERENCES `festival`(`AnneeFestival`) ON DELETE NO ACTION ON UPDATE NO ACTION;

