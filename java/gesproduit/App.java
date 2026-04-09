package gesproduit;

import java.util.Scanner;

import gesproduit.src.entity.Categorie;
import gesproduit.src.services.CategorieService;
import gesproduit.src.view.CategorieView;

public class App {

    public static void main(String[] args) {
          Scanner scanner=new Scanner(System.in);
          int choice;
          do {
              
            System.out.println("1-Ajouter Categorie");
            System.out.println("2-Lister Categorie");
            System.out.println("3-Ajouter Produit");
            System.out.println("4-Lister Produit");
            System.out.println("5-Quitter");
            System.out.println("Faites votre choix");
              choice=scanner.nextInt();
              switch (choice) {
                case 1:
                     Categorie categorie=CategorieView.saisieCategorie();
                     boolean result= CategorieService.addCategorie(categorie);
                    if (result) {
                        System.out.println("Categorie ajoutee avec success");
                    }else{
                          System.out.println("Tableau est plein");
                    }
                    break;
                case 2:
                     Categorie[] categories=CategorieService.getAllCategories();
                      int nbreCategorie=CategorieService.getNbreCat();
                      CategorieView.afficheCategorie(categories,nbreCategorie);
                      break;

                default:
                    break;
              }
          } while (choice!=3);

          scanner.close();
    }
    
}
