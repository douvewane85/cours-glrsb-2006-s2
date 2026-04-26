package views;

import java.util.ArrayList;

import entity.Employe;
import entity.Tache;
import entity.Utilisateur;

public final class ChefView {
     private ChefView() {
     }

     public static void afficherMenuChef(Utilisateur user) {
        Employe chef = (Employe) user; // Cast de l'utilisateur en employé
         int choix;
    do {
        
   
        System.out.println("Menu Chef :");
        System.out.println("1. Lister ses employés");
        System.out.println("2. Affecter tache a un employé");
        System.out.println("3. Lister les  taches d'un employé");
        System.out.println("4. Se déconnecter");
         choix = ChefView.saisieEntier("Saisir votre choix : ");
            ArrayList<Employe> subordonnes = chef.getSubordonnes();
          switch (choix) {
            case 1:
                ChefView.afficherEmployes(subordonnes);
                break;
            case 2:
                String matricule = ChefView.saisieChaine("Saisir le matricule de l'employé : ");
                 Employe emp = chef.getSubordonne(matricule);
                if (emp != null) {
                    Tache tache = ChefView.saisirTache();
                    // Employe ves Tache
                      emp.addTache(tache);
                    // Tache vers Employe
                    tache.setEmploye(emp);
                    // Tache vers Service
                     services.TacheService.addTache(tache);
                  
                } else {
                    System.out.println("Employé non trouvé.");
                }
                break;
            case 3:
                   matricule = ChefView.saisieChaine("Saisir le matricule de l'employé : ");
                   emp = chef.getSubordonne(matricule);
                if (emp != null) {
                     ArrayList<Tache> taches = emp.getTaches();
                     ChefView.listerTachesEmploye(taches);
                } else {
                    System.out.println("Employé non trouvé.");
                }
                break;
            case 4:
                // Code pour se déconnecter
                break;
            default:
                System.out.println("Choix invalide. Veuillez réessayer.");
        }
         } while (choix != 4);

        
    }


    public static int saisieEntier(String message) {
        do {
            System.out.print(message);
            String input = System.console().readLine();
            return Integer.parseInt(input.trim());
           
        } while (true);
    }

    public static void afficherEmployes(ArrayList<Employe> employes) {
        if (employes.isEmpty()) {
            System.out.println("Aucun employé trouvé.");
        } else {
            System.out.println("Liste des employés :");
            for (Employe emp : employes) {
                System.out.println(emp);
            }
        }
    }

    public static String saisieChaine(String message) {
        do {
            System.out.print(message);
            String input = System.console().readLine();
            if (input != null && !input.trim().isEmpty()) {
                return input.trim();
            }
           
        }while(true);
    }

    public static Tache saisirTache() {
        String description = ChefView.saisieChaine("Saisir la description de la tâche : ");
        return new Tache(description);
    }
    
    public static void listerTachesEmploye(ArrayList<Tache> taches) {
        if (taches.isEmpty()) {
            System.out.println("Aucune tâche assignée à cet employé.");
        } else {
            for (Tache tache : taches) {
                System.out.println(tache);
            }
        }
    }
}
