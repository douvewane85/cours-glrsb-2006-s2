
import services.PersonneService;
import views.AdminView;

public class App {
    public static void main(String[] args) throws Exception {
        int choice;
      do {
            choice = AdminView.menu();
            switch (choice) {
                case 1:
                  var p = AdminView.saisiePersonne();
                   PersonneService.addPersonne(p);
                     System.out.println("Personne ajoutée avec succès !");
                    break;
                case 2:
                    var personnes= PersonneService.getAllPersonnes();
                    AdminView.afficherPersonnes(personnes);
                    break;
                case 3:
                      var type=AdminView.selectTypePersonne();
                      personnes= PersonneService.getAllPersonnes(type);
                    AdminView.afficherPersonnes(personnes);
                    break;
                case 4:
                    System.out.println("Au revoir!");
                    break;
                default:
                    System.out.println("Choix invalide. Veuillez réessayer.");
            }
        
      } while (choice != 5);
    }
}
