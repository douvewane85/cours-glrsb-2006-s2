package services;

import java.util.ArrayList;

import entity.Personne;
import entity.TypePersonne;

public final class PersonneService {
    private static ArrayList<Personne>   personnes = new ArrayList<>();

    private PersonneService() {
    }

    public static void addPersonne(Personne p) {
          personnes.add(p);
    }
    public static ArrayList<Personne> getAllPersonnes() {
        return personnes;
    } 
    
     public static ArrayList<Personne> getAllPersonnes(TypePersonne type) {
        ArrayList<Personne> filteredPersonnes = new ArrayList<>();
        for (Personne p : personnes) {
            if (p.getTypePersonne() == type) {
                filteredPersonnes.add(p);
            }
        }
        return filteredPersonnes;
    } 

}
