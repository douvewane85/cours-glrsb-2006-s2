import entity.Role;
import entity.Utilisateur;
import views.AuthView;
import views.ChefView;

public class App {
    public static void main(String[] args) throws Exception {
         Utilisateur user;
         services.UtilisateurService.initialiser();
     do {
        String login = AuthView.saisieChaine("Saisir votre login : ");
        String motDePasse = AuthView.saisieChaine("Saisir votre mot de passe : ");
         user = services.UtilisateurService.seConnecter(login, motDePasse);
        if (user == null) {
                System.out.println("Authentification échouée. Veuillez vérifier vos identifiants.");
        }
      } while (user == null);

      if (user.getRole()==Role.CHEF) {
         ChefView.afficherMenuChef(user);
      }
    
  }
}
