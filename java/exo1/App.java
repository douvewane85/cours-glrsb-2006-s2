/*
 1-La Classe "System" de Java qui contient des méthodes 
    et des champs pour interagir avec le système d'exploitation, 
    comme l'affichage de messages à la console, 
    la lecture de l'entrée utilisateur, etc.

    a. l'affichage de messages à la console, 
        System.out est un objet de type PrintStream qui représente la sortie standard (la console).
        System.out.println("Hello, World!"); // Affiche "Hello, World!" suivi d'un saut de ligne
        System.out.print("Hello, "); // Affiche "Hello, " sans saut de ligne
        System.out.printf("Hello, %s!", "Alice"); // Affiche "Hello,
            \n: saut de ligne
            \t: tabulation
            \": guillemet double
            \': guillemet simple
            \\: antislash
    b. la lecture de l'entrée utilisateur, 
           System.in est un objet de type InputStream qui représente l'entrée standard (le clavier).
           Scanner : une classe de la bibliothèque Java 
                qui permet de lire l'entrée utilisateur de manière plus pratique que System.in.
          Scanner scanner;
          scanner = new Scanner(System.in);
          Methodes de Scanner pour lire différents types de données :
            - nextInt() : lit un entier
            - nextDouble() : lit un nombre à virgule
              - nextLine() : lit une ligne de texte avec les espaces
                Exemple : 
                 Entrer console : Hello World. ==> Resultat de nextLine() : "Hello World"
             - next() : lit un mot (jusqu'à un espace)
               Exemple : 
                 Entrer console : Hello World. ==> Resultat de next() : "Hello"
            - hasNextInt() : vérifie s'il y a un entier à lire
            - hasNextDouble() : vérifie s'il y a un nombre à virgule à lire
            - hasNextLine() : vérifie s'il y a une ligne de texte à lire
            - hasNext() : vérifie s'il y a un mot à lire
            - close() : ferme le scanner pour libérer les ressources


    //Portee variable(domaine d'utilisation ou de visibilite) ==>scope
      En Java les variables ont une portee de bloc ==>{}
    Exemple
      class Test{
         //bloc classe 
           private int x;
           m1(){
             x=0;
               //bloc de la methode m1 
             int y=0;
             if(true){
               //bloc de la methode if 
                int z=0;
                x++;
                y++;
                z++;
               System.out.println(z);
              }
              
                System.out.println(x);
                System.out.println(y);
                System.out.println(z);//Erreur car z n'est pas visible dans ce bloc
          
          }

      }

*/

import java.util.Scanner;

class App{
    public static void main(String[] args) {
        int choice;
        Scanner scanner=new Scanner(System.in);
        do {
            // Afficher le menu
            System.out.println("Menu:");
            System.out.println("1. Addition");
            System.out.println("2. Soustraction");
            System.out.println("3. Multiplication");
            System.out.println("4. Division");
            System.out.println("5. Quitter");
            choice=scanner.nextInt();
            if (choice>=1 && choice<=4) {
                   System.out.println("Entrer un nombre");
                   int nbre1=scanner.nextInt();

                    System.out.println("Entrer un nombre");
                   int nbre2=scanner.nextInt();
                
                    switch (choice) {
                    case 1:
                        int result1 = CaculatriceService.add(nbre1, nbre2);
                        System.out.println("La somme est :  "+result1);
                        break;

                        case 2:
                            int result2 = CaculatriceService.subtract(nbre1, nbre2);
                            System.out.print("La Difference est :  "+result2+"\n");
                        break;

                        case 3:
                        int result3 = CaculatriceService.multiply(nbre1, nbre2);
                        System.out.printf("Le Produit est %d", result3);
                        break;

                        case 4:
                        double result4 = CaculatriceService.divide(nbre1, nbre2);
                            System.out.println("Le quotinet  est :  "+result4);
                        break;
                
                    default:
                        break;
                }
           }
            
        } while (choice!=5);
        
        scanner.close();
    }

  
}