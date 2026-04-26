package services;

import java.util.ArrayList;

import entity.Employe;
import entity.Utilisateur;

public final class UtilisateurService {
    private static ArrayList<Utilisateur> utilisateurs = new ArrayList<>();
    private UtilisateurService() {
    }

    public static void initialiser() {
        Employe  chef=new Employe("chef", "chef", entity.Role.CHEF, "Chef", "Chef", 5000);
        chef.setMatricule("CHEF001");
        Employe empSimple1=new Employe(null, null, entity.Role.EMPLOYESIMPLE, "Emp", "Simple1", 3000);
        empSimple1.setMatricule("EMP001");
        Employe empSimple2=new Employe(null, null, entity.Role.EMPLOYESIMPLE, "Emp", "Simple2", 3000);
        empSimple2.setMatricule("EMP002");

        //Relation d'encadrement
            //Chef vers employe
               chef.addSubordonne(empSimple1);
               chef.addSubordonne(empSimple2);
            //Employe vers chef
               empSimple1.setChef(chef);
              empSimple2.setChef(chef);

        // Ajout des utilisateurs à la liste
        utilisateurs.add(chef);
        utilisateurs.add(empSimple1);
        utilisateurs.add(empSimple2);
    }

    public static Utilisateur seConnecter(String login, String password) {
        for (Utilisateur user : utilisateurs) {
            if (user.getLogin().compareTo(login) == 0 && user.getPassword().equals(password)==true) {
                return user;
            }
        }
        return null; // Authentification échouée
    }




}
