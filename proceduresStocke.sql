DELIMITER $$


CREATE PROCEDURE getNombrePieceETSurface(idBien INT)
BEGIN
    SELECT COUNT(*) AS nbPiece, SUM(surface) AS surfaceTotale FROM piece WHERE id_bien = idBien;
END $$


DELIMITER ;