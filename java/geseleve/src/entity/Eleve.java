package entity;


import java.time.LocalDate;

public class Eleve  extends Personne {
    private Niveau niveau;//Null



    public Niveau getNiveau() {
        return niveau;
    }

    public void setNiveau(Niveau niveau) {
        this.niveau = niveau;
    }

    public Eleve() {
        super(TypePersonne.ELEVE);
    }

    public Eleve(String nom, String prenom, LocalDate dateNaissance) {
        super(TypePersonne.ELEVE, nom, prenom, dateNaissance);
       
    }

    @Override
    public String toString() {
        return super.toString() + "  Niveau=" + niveau.name() ;
    }

    
    
}
