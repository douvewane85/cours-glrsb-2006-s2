# Entity
type Triangle=Classe
Debut
   prive cote, base,hauteur:reel
   private static nbreCote:entier

      public Triangle()
      Debut 
         Triangle.nbreCote<--3
      Fin
      public Triangle(D  cote, base,hauteur:reel)
      Debut 
         Triangle.nbreCote<--3
         this.setCote(cote)
         this.setBase(base)
         this.setHauteur(hauteur)
      Fin
## Getters and Setters
  public fonction  getCote():reel
      Debut 
       retourner   this.cote
      Fin

      public procedure  setCote(D cote:reel)
      Debut 
        si(cote>0) alors
         this.cote<--cote
       sinon 
        Exception("Le code doit etre positif")
       Fsi
      Fin

   public fonction  getBase():reel
      Debut 
       retourner   this.base
      Fin

      public procedure  setBase(D base:reel)
      Debut 
         this.base<--base
      Fin

      public fonction  getHauteur():reel
      Debut 
       retourner   this.hauteur
      Fin

      public procedure  setHauteur(D hauteur:reel)
      Debut 
         this.hauteur<--hauteur
      Fin

      public static fonction static getNbreCote():reel
      Debut 
         retourner  Triangle.nbreCote
      Fin
### Nbre de cote n'a pas de setters
### METHODES METIERS
    public fonction  toChaine():chaine
        Debut
        retourner "Cote :",this.cote," Hauteur :",this.hauteur," Base :",this.base
    Fin

    public fonction  surface():reel
        Debut
        retourner this.base*this.hauteur/2
    Fin 

     public fonction  perimetre():reel
     Debut
        retourner this.cote*Triangle.nbreCote
     Fin   

FinClasse

type Carre=Classe
Debut
   prive cote:reel
   private static nbreCote:entier

     public Carre()
      Debut 
         Carre.nbreCote<--4
      Fin

     public Carre(D cote:reel )
      Debut 
         Carre.nbreCote<--4
         this.setCote(cote)// this.cote<--cote
      Fin
## Getters and Setters
  public fonction  getCote():reel
      Debut 
       retourner   this.cote
      Fin

      public procedure  setCote(D cote:reel)
      Debut 
        si(cote>0) alors
         this.cote<--cote
       sinon 
        Exception("Le code doit etre positif")
       Fsi
      Fin

      public static fonction static getNbreCote():reel
      Debut 
         retourner  Carre.nbreCote
      Fin
### Nbre de cote n'a pas de setters

public fonction  surface():reel
        Debut
        retourner this.cote*this.cote
    Fin 

     public fonction  perimetre():reel
     Debut
        retourner this.cote*Carre.nbreCote
     Fin  

    public fonction  toChaine():chaine
        Debut
        retourner "Cote :",this.cote
        Fin
FinClasse

# Classe Principal
const N=100
type TabTriangle=tableau [1..N]Triangle
type TabCarre=tableau [1..N]Carre
type App =classe
Debut 
    prive App()
     Debut
     Fin

  public static procedure  main()
  var 
   i, type,choix:entier
     cote, base,hauteur:reel
     carres: TabCarre nbreCarre:entier
     triangles: TabTriangle nbreTriangle:entier
   Debut
      nbreCarre<--0
      nbreTriangle<--0
        faire
             Ecrire("1-Enregistrer un Figure")
             Ecrire("2-Lister les Figures")
             Ecrire("3-Lister les Figures par type")
             Ecrire("4-Quitter")
             Ecrire("Faites votre choix")
             lire(choix)
             cas (choix) vaut
              1:
                 Ecrire("Selectionner type de Figure")
                 Ecrire("1-Carre")
                 Ecrire("2-Triangle)
                 lire(type)
                 si(type=1) alors
                        Ecrire("Entrer le cote du carre")
                        lire(cote)
                         nbreCarre<--nbreCarre+1
                         carres[nbreCarre]<--new Carre()
                         carres[nbreCarre].setCote(cote)
                 sinon 
                    si(type=2) alors
                         Ecrire("Entrer le cote du Triangle")
                         lire(cote)
                          Ecrire("Entrer la base du Triangle")
                         lire(base)
                         Ecrire("Entrer la hauteur du Triangle")
                         lire(hauteur)
                         nbreTriangle<--nbreCarre+1
                         triangles[nbreTriangle]<--new Triangle(cote,base,hauteur)

                    Fsi
                 Fsi
              2:
                  pour (i<--1;i<=nbreCarre;i<--i+1) faire
                       Ecrire(carres[i].toChaine())
                  Fpour

                   pour (i<--1;i<=nbreTriangle;i<--i+1) faire
                       Ecrire(triangles[i].toChaine())
                   Fpour
              3: 
               Ecrire("Selectionner type de Figure")
                 Ecrire("1-Carre")
                 Ecrire("2-Triangle)
                 lire(type)
                 si(type=1) alors
                        pour (i<--1;i<=nbreCarre;i<--i+1) faire
                            Ecrire(carres[i].toChaine())
                        Fpour 
                 sinon 
                    si(type=2) alors 
                        pour (i<--1;i<=nbreTriangle;i<--i+1) faire
                            Ecrire(triangles[i].toChaine())
                        Fpour
                    Fsi
                 Fsi
              
              FinCas 

  
        Tantque(choix!=4)
   Fin
Fin
# Execution de la Classe Principal
App::main()