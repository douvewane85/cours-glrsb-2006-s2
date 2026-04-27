package views;

import java.lang.reflect.Array;
import java.time.LocalDate;
import java.util.ArrayList;

import entity.Eleve;
import entity.Enseignant;
import entity.Niveau;
import entity.Personne;
import entity.Specialite;
import entity.TypePersonne;

public final class AdminView {
    private AdminView() {
    }

public static Niveau selectNiveau() {
    System.out.println("Sélectionnez un niveau :");
    var niveaux = entity.Niveau.getAllNiveau();
     for (int i = 0; i < niveaux.length; i++) {
        System.out.println((i) + ". " + niveaux[i]);
     }
     int indexNiveau = Integer.parseInt(System.console().readLine("Entrez le numéro du niveau : "));
    return niveaux[indexNiveau];
}

public static Specialite selectSpecialite() {
    System.out.println("Sélectionnez une spécialité :");
    var specialites = entity.Specialite.getAllSpecialite();
     for (int i = 0; i < specialites.length; i++) {
        System.out.println((i) + ". " + specialites[i]);
     }
     int indexSpecialite = Integer.parseInt(System.console().readLine("Entrez le numéro de la spécialité : "));
    return specialites[indexSpecialite];
}
public static TypePersonne selectTypePersonne() {
    System.out.println("Sélectionnez un type de personne :");
    var types = entity.TypePersonne.getAllTypePersonne();
     for (int i = 0; i < types.length; i++) {
        System.out.println((i) + ". " + types[i]);
     }
     int indexType = Integer.parseInt(System.console().readLine("Entrez le numéro du type de personne : "));
    return types[indexType];
}

public static int menu() {
    System.out.println("Menu Admin :");
    System.out.println("1. Ajouter une personne");
    System.out.println("2. Afficher toutes les personnes");
    System.out.println("3. Afficher les élèves");
    System.out.println("4. Afficher les enseignants");
    System.out.println("5. Quitter");
   return Integer.parseInt(System.console().readLine("Entrez votre choix : "));
}

public static void afficherPersonnes(ArrayList<entity.Personne> personnes) {
    if (personnes.isEmpty()) {
        System.out.println("Aucune personne trouvée.");
    } else {
        for (var p : personnes) {
            System.out.println(p);
        }
    }
}

public static Personne saisiePersonne() {
   Personne p = null;
   //Attribuer les valeurs communes
     String nom = System.console().readLine("Entrez le nom : ");
     String prenom = System.console().readLine("Entrez le prénom : ");
     String dateNaissanceStr = System.console().readLine("Entrez la date de naissance    (YYYY-MM-DD) : ");
     var dateNaissance = LocalDate.parse(dateNaissanceStr);
   //Attribuer les valeurs spécifiques
     TypePersonne type = selectTypePersonne();
     if (type == TypePersonne.ELEVE) {
        Niveau niveau = selectNiveau();
        p = new Eleve(nom, prenom, dateNaissance);
        // var eleve= ((Eleve)p);
        //eleve.setNiveau(niveau);
        ((Eleve)p).setNiveau(niveau);
     }else if (type == TypePersonne.ENSEIGNANT) {
        Specialite specialite = selectSpecialite();
        p = new Enseignant(nom, prenom, dateNaissance, specialite);
       
     }
     return p;
}

}
