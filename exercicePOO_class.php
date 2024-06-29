<?php 

### remplir ici la class et les methodes qui deja cree dans un feuille
public function ajouterEmpolye(){
    $bdd=$GLOBALS["bd"];
    try{
        
    }catch(){
        $req=$bdd->prepare("INSERT INTO employe VALUES(?,?,?,?,?,?)");
        $req->execute([$this->$matricule,$this->nom,$this->prenom,$this->dateNaiss,$this->dateEmb,$this->salaire])
    }
}










?>