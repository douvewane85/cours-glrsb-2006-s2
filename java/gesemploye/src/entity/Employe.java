package entity;

import java.util.ArrayList;

public class Employe extends Utilisateur {
    private String matricule;
     private String nom;
    private String prenom;
    private double salaire;
   private ArrayList<Tache> taches = new ArrayList<>();

     public ArrayList<Tache> getTaches() {
        return taches;
     }

     public void addTache(Tache tache) {
        this.taches.add(tache);
     }



    /*
       ArrayList<int>:Erreur de compilation, car les types génériques en Java ne peuvent pas être des types primitifs.
       Wrapper 
       int -> Integer.  ArrayList<Integer> est valide, car Integer est une classe wrapper pour le type primitif int.
       double -> Double 
       boolean -> Boolean
       char -> Character
       ...
    */
    private ArrayList<Employe> subordonnes = new ArrayList<>();
    /*
       Methodes d'instances d'une ArrayList:
       add(E e): Ajoute un élément à la fin de la liste.
       add(int index, E element): Insère un élément à une position spécifique dans la liste
       get(int index): Récupère l'élément à la position spécifiée.
       remove(int index): Supprime l'élément à la position spécifiée.
       size(): Retourne le nombre d'éléments dans la liste.
       clear(): Supprime tous les éléments de la liste.
       set(int index, E element): Remplace l'élément à la position spécifiée par l'élément donné.
         contains(Object o): Vérifie si la liste contient l'élément spécifié.
         isEmpty(): Vérifie si la liste est vide.
    */
     public ArrayList<Employe> getSubordonnes() {
        return subordonnes;
     }

      public Employe getSubordonne(String matricule) {
         for (Employe emp : this.subordonnes) {
            if (emp.getMatricule().equals(matricule)) {
                return emp;
            }
         }
         return null;
     }
     


     public void addSubordonne(Employe emp) {
        this.subordonnes.add(emp);
     }
     private Employe chef=null;
     public Employe getChef() {
        return chef;
     }
    public void setChef(Employe chef) {
        this.chef = chef;
    }
    public String getMatricule() {
        return matricule;
    }

    public void setMatricule(String matricule) {
        this.matricule = matricule;
    }

   

    public Employe() {
        //super() est utilisé pour appeler le constructeur de la classe parente (Utilisateur) et initialiser les attributs hérités.
        super();
    }

    public Employe(String login, String password, Role role, String nom, String prenom, double salaire) {
        super(login, password, role);
        this.nom = nom;
        this.prenom = prenom;
        this.salaire = salaire;
    }

    public String getNom() {
        return this.nom;
    }   

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return this.prenom;
    }
    
    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public double getSalaire() {
        return this.salaire;
    }

    public void setSalaire(double salaire) {
        this.salaire = salaire;
    }

    @Override
    public String toString() {
        return "Employe [matricule=" + matricule + ", nom=" + nom + ", prenom=" + prenom + ", salaire=" + salaire + ", " + super.toString() + "]";
    }

    @Override
    public boolean equals(Object obj) {
        var emp = (Employe) obj;
        return this.getMatricule().compareTo(emp.getMatricule()) == 0;
        
    }
    
}
