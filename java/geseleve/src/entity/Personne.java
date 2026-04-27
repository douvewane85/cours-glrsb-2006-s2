package entity;

import java.time.LocalDate;
import java.time.Period;

public class Personne {

    private static  int compteur = 0;
    private int id;
    private String nom;
    private String prenom;
    private LocalDate dateNaissance;

    private final TypePersonne typePersonne;
    

    public TypePersonne getTypePersonne() {
        return typePersonne;
    }

    public Personne(TypePersonne typePersonne) {
        this.typePersonne = typePersonne;
        this.id = ++compteur;
    }

    public Personne(TypePersonne typePersonne, String nom, String prenom, LocalDate dateNaissance) {
        this.typePersonne = typePersonne;
        this.id = ++compteur;
        this.nom = nom;
        this.prenom = prenom;
        this.dateNaissance = dateNaissance;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public LocalDate getDateNaissance() {
        return dateNaissance;
    }

    public void setDateNaissance(LocalDate dateNaissance) {
        this.dateNaissance = dateNaissance;
    }

    public int getAge() {
        //return LocalDate.now().getYear() - dateNaissance.getYear();
        return Period.between(dateNaissance, LocalDate.now()).getYears();
    }

    @Override
    public String toString() {
        return "Nom=" + nom + ", Prenom=" + prenom + ", Date Naissance=" + dateNaissance + ", Age=" + getAge() + ", Type=" + typePersonne.name();
    }
}
