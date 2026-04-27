package entity;

import java.time.LocalDate;

public class Enseignant extends Personne {
    private Specialite specialite;

    public Enseignant( String nom, String prenom, LocalDate dateNaissance,Specialite specialite) {
             super(TypePersonne.ENSEIGNANT, nom, prenom, dateNaissance);
             this.specialite = specialite;
    }

    public Specialite getSpecialite() {
        return specialite;
    }

    public void setSpecialite(Specialite specialite) {
        this.specialite = specialite;
    }

    public Enseignant() {
        super(TypePersonne.ENSEIGNANT);
    }

    public Enseignant(String nom, String prenom, LocalDate dateNaissance) {
        super(TypePersonne.ENSEIGNANT, nom, prenom, dateNaissance);
       
    }

    @Override
    public String toString() {
        return super.toString() + "  Specialite=" + specialite.name() ;
    }
    
}
