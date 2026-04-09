package gesproduit.src.services;

import gesproduit.src.entity.Categorie;

/*
  Tableau ==> Array  sont des types Reference 
   A.Syntaxe: type[] ou [] type 
    Avec  type : peut etre :
      1-un type de valeurs  , on parle de tableau de valeurs
        Exemple : 
        //Declaration
        int[] tabEntier;  
        tabEntier=new int[5];  |0|0|0|0|0| 
        tabEntier[0]==>0
        tabEntier[0]=1  |1|0|0|0|0| 
        //Declaration + Instanciation
        double[] tabReel=new double[5] ; |0.0|0.0|0.0|0.0|0.0| 
         //Declaration + Instanciation
        boolean[] tabBool=new boolean[2] ; |false|false|

      2- un type de Reference(Classe) , on parle de tableau de Reference
        String[] tabChaine=new String[3]; | null| null | null |
        Categorie[] tabCategorie=new  Categorie[3]; | null| null | null |
        tabCategorie[0] ==>null;              Zone Reference.             Zone Valeur
        tabCategorie[0]=new Categorie("ALI") |4A| null | null |          |1|ALI| ==> Reference est 4A
        tabCategorie[0] ==> 4A
        tabCategorie[0].getId()//1
        tabCategorie[0].getNom()//ALI
  B. Parcours ]
     1-Taille 
        -Nbre Cellule nomTab.length Ex: tabCategorie.length ==>3
          Exemple
           tabEntier ==> |1|0|0|0|0| 
           for(int i=0;i<tabEntier.length;i++){
              if(tabEntier[i]!=0){
                 System.out.println(tabEntier[i]); // |1|0|0|0|0| 
              }
           }
        -Gerer la Taille reelle i.e nbre valeurs
         Exemple
           tabEntier ==> |1|0|0|0|0|  
           nbreValeur=1
           for(int i=0;i<nbreValeur;i++){
                 System.out.println(tabEntier[i]); // |1|0|0|0|0| 
           }
       1- Pour les tableau de Reference(Elle parcours le nombre de cellules)
          Syntaxe 
             for(ClasseObjetDuTableau objet:Tableau)
             {
               System.out.println(objet);
             }
         Exemple
           tabCategorie ==>|4A| null | null |          |1|ALI| ==> Reference est 4A
           for(Categorie cat :tabCategorie){
                 if(cat!=null){
                  System.out.println(tabEntier[i]); // |4A| null | null | 
                 }
           }
*/
public final class CategorieService {
      private static final int N=50;
      private static Categorie[] categories=new Categorie[N];
      private static int nbreCat;

      private CategorieService(){

      }

      public static Categorie[] getAllCategories(){
          return categories;
      }

      public static int getNbreCat(){
          return nbreCat;
      }

      public static boolean addCategorie(Categorie categorie){
        if (nbreCat<N) {
              CategorieService.categories[nbreCat]=categorie;
              CategorieService.nbreCat++;
              return true;
        }
        return false;
      }
    
}
