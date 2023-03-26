<?php
//Se campo form non attivo (postback) mostra form
if (!isset($_POST['invia']) && !isset($_POST['modificato'])) {
   echo "<FORM ACTION='".$_SERVER['PHP_SELF']."' METHOD='POST'>";
   echo "<TABLE><TR>";
   echo "<TD>ID_utente da modificare<TD><INPUT TYPE='text' NAME='id'>";
   echo "<TR><TD><INPUT TYPE='submit' VALUE='Cerca Record' NAME='invia'>";
   echo "</TABLE></FORM>";
}
else 
{
   //Verifica se si tratta di ricerca o modifica
   if (!isset($_POST['modificato'])) {
      $con = new mysqli("localhost","root","","utenti");
      if (mysqli_connect_errno()) {
         echo("Connessione non effettuata: ".mysqli_connect_error()."<BR>");
         exit();
      }
      $id=$_POST['id'];
      $sql = "SELECT * FROM users WHERE ID_utente=".$id.";";
      $ris = $con->query($sql) or die ("Query fallita!");
      echo "<FORM ACTION='".$_SERVER['PHP_SELF']."' METHOD='post'>";
      echo "<TABLE><TR><TH>ID utente<TH>Nome utente<TH>Password<TH>Contatore visite";
      //Ciclo foreach legge gli elementi del resultset $ris
      foreach($ris as $riga) {
         echo "<TR><TD>ID<TD>";
         echo "<INPUT TYPE='text' NAME='ID' VALUE=".$riga["ID_utente"].">";
         echo "<TD>Nome<TD>";
         echo "<INPUT TYPE='text' NAME='nome' VALUE=".$riga["nome_utente"].">";
         echo "<TD>Password<TD>";
         echo "<INPUT TYPE='text' NAME='password' VALUE=".$riga["password"].">";
         echo "<TD>Accessi<TD>";
         echo "<INPUT TYPE='text' NAME='pres' VALUE=".$riga["conta_pres"].">";
      }
      echo "<TR><TD><INPUT TYPE='submit' VALUE='MODIFICA' NAME='modificato'>";
      echo "</TABLE></FORM>";
   }
   else
   {  
      $con = new mysqli("localhost","root","","utenti");
      if (mysqli_connect_errno()) {
         echo("Connessione non effettuata: ".mysqli_connect_error()."<BR>");
         exit();
      }
      $id=$_POST['ID'];
      $n=$_POST['nome'];
      $pwd=$_POST['password'];
      $conta=$_POST['pres'];
      //Codice SQL per la modifica del record nella tabella
      $sql = "UPDATE users SET nome_utente='".$n."',password='".$pwd."',conta_pres=";
      $sql.= $conta." WHERE ID_utente=".$id.";";
      $ris = $con->query($sql) or die ("Query fallita!");
      $con->close();
      echo "<A HREF='".$_SERVER['PHP_SELF']."'>Aggiornamento effettuato</A>";
   }
}
?>