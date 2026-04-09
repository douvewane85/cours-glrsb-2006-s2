package gesproduit.src.entity;

/*
   Toute les classes Java herire d'une 
   classe de base de maniere implicite
    appele Object
    Categorie herite de Object ou 
    Categorie est classe Fille  de Object 
    //Convertion Objet
       Objet o=new Categorie();
       categorie cat=(Catgorie) o;

 //Initialiation des attributs 
   //En Java les attributs d'une classe sont initialises par defaut
     Regles Initialisation : 
        1-Numeriques 
        entier ou reel ==> Initialise a 0
        2-boolean ==> Initialise a false
        3-Objet ==> Initialise a null
*/
public class Categorie {
    private static int compteur;
    private int id;
    private String nom;

   public Categorie(){

     this.id=++ Categorie.compteur;
   }

    public Categorie(String nom){
     this.id=++ Categorie.compteur;
     this.nom=nom;
   }

   public int getId(){
    return this.id;
   }

   public String getNom(){
    return this.nom;
   }

   public void setNom(String nom){
    if (nom.isEmpty()) {
        throw new RuntimeException("Le nom est obligatoire");
    }
      this.nom=nom;
   }

 
   //Comparaison de valeurs
   @Override
   public boolean equals(Object o){
      Categorie categorie=(Categorie)o;
      return this.id==categorie.getId();
   }


}
