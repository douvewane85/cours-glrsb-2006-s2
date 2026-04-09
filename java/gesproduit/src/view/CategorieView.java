package gesproduit.src.view;

import java.util.Scanner;

import gesproduit.src.entity.Categorie;

public  final class CategorieView {
    private static  Scanner scanner=new Scanner(System.in);
    
    private CategorieView(){

    }

    public static Categorie saisieCategorie(){
         String  nom;
        do {
             System.out.println("Entrer le Nom de la Categorie");
             nom=scanner.nextLine();
        } while (nom.isEmpty());
        
        return new Categorie(nom);
    }

    public static void afficheCategorie(Categorie[] categories,int nbreCategorie){
      for (int index = 0; index < nbreCategorie; index++) {
        //Afficher la reference a la position index mais lorsque 
        //la methode toString est redefinie c'est elle qui sera executee
          System.out.println(categories[index]);
      }
    }
}
