
<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

  // self::$pdo->exec("DROP TABLE IF EXISTS PASATIEMPO");
//  self::$pdo->exec("DROP TABLE IF EXISTS ELECTRONICO");
  

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS JUGUETE (
      JUG_ID INTEGER,
      JUG_NOMBRE TEXT NOT NULL,
      JUG_MARCA TEXT NOT NULL,
      JUG_MATERIAL TEXT NOT NULL,

      CONSTRAINT JUG_PK
       PRIMARY KEY(JUG_ID),

      CONSTRAINT JUG_NOM_UNIQ
       CHECK(LENGTH(JUG_NOMBRE) > 0),

      CONSTRAINT JUG_NOM_NV
       CHECK(LENGTH(JUG_NOMBRE) > 0),
       
      CONSTRAINT JUG_MAR_NV
       CHECK(LENGTH(JUG_MARCA) > 0),
       
      CONSTRAINT JUG_MAT_NV
       CHECK(LENGTH(JUG_MATERIAL) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
