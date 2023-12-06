DELIMITER $$


CREATE PROCEDURE getNombrePieceETSurface(idBien INT)
BEGIN
    SELECT COUNT(*) AS nbPiece, SUM(surface) AS surfaceTotale FROM piece WHERE id_bien = idBien;
END $$


DELIMITER ;


//////////////////////////////


DELIMITER $$

CREATE PROCEDURE paginationBien(page INT, objetParPage INT)
BEGIN
    DECLARE off INT;
    Set off = page*objetParPage-objetParPage;
    SELECT * FROM bien LIMIT objetParPage OFFSET off ;
END $$


DELIMITER ;


///////////////////////////////

DELIMITER $$

CREATE PROCEDURE searchBienDates(date1 DATE, date2 DATE)
BEGIN
    SELECT * FROM bien INNER JOIN periodedispo ON periodedispo.id_bien = bien.id INNER JOIN periodereserve ON periodereserve.id_periodeDispo = periodedispo.id 
    WHERE date1 BETWEEN periodedispo.dateDebut and periodedispo.dateFin
    AND date2 BETWEEN periodedispo.dateDebut and periodedispo.dateFin
    AND date1 NOT BETWEEN periodereserve.dateDebut and periodereserve.dateFin
    AND date2 NOT BETWEEN periodereserve.dateDebut and periodereserve.dateFin;
END $$

DELIMITER ;


/////////////////////////////


DROP TRIGGER IF EXISTS T_periodereserve_before_insert;
DELIMITER $$

CREATE TRIGGER T_periodereserve_before_insert
    BEFORE INSERT
    ON `periodereserve` FOR EACH ROW
BEGIN
    DECLARE cpt INT;
    DECLARE cpt2 INT;
    SELECT COUNT(*) FROM periodereserve WHERE NEW.dateDebut BETWEEN dateDebut and dateFin 
    AND NEW.dateFin BETWEEN dateDebut and dateFin 
    AND id_periodeDispo = NEW.id_periodeDispo INTO cpt;
    SELECT COUNT(*) FROM periodedispo INNER JOIN periodereserve ON periodedispo.id = periodereserve.id_periodeDispo WHERE periodedispo.id = NEW.id_periodeDispo
    AND NEW.dateDebut BETWEEN periodedispo.dateDebut and periodedispo.dateFin
    AND NEW.dateFin BETWEEN periodedispo.dateDebut and periodedispo.dateFin INTO cpt2;
    IF NOT cpt=0 THEN
      SIGNAL sqlstate '45001' set message_text = "Cette période est déjà prise.";
    ELSE
        IF cpt2 = 0 THEN
            SIGNAL sqlstate '45001' set message_text = "Cette période ne correspond pas aux dates indiquées.";
        END IF;
    END IF;
END$$    

DELIMITER ;