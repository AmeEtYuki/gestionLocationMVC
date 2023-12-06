DELIMITER $$


CREATE PROCEDURE getNombrePieceETSurface(idBien INT)
BEGIN
    SELECT COUNT(*) AS nbPiece, SUM(surface) AS surfaceTotale FROM piece WHERE id_bien = idBien;
END $$


DELIMITER ;





DELIMITER $$

CREATE PROCEDURE paginationBien(page INT, objetParPage INT)
BEGIN
    DECLARE off INT;
    Set off = page*objetParPage-objetParPage;
    SELECT * FROM bien LIMIT objetParPage OFFSET off ;
END $$


DELIMITER ;