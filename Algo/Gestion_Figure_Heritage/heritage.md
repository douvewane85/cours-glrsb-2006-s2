# Entity
type  abstract Figure=Classe
Debut
   protected cote:reel
   prive static nbreCote:entier

      protected Figure()
      Debut 
      Fin
      protected Figure(D  cote)
      Debut 
         this.setCote(cote)
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

       public static fonction  getNbreCote():reel
        Debut 
            retourner  Figure.nbreCote
        Fin

         protected static procedure  setNbreCote(D nbreCote:entier):entier
            Debut 
                  Figure.nbreCote<--nbreCote
            Fin

         public fonction  toChaine():chaine
            Debut
               retourner "Cote :",this.cote
            Fin
         //Methode n'aura pas de definition
            public abstract fonction  surface():reel
            public abstract fonction  perimetre():reel
FinClasse




type Triangle=Classe Herite Figure
Debut
   prive  base,hauteur:reel

      public Triangle()
      Debut 
         super() // On Cree un objet de type Figure
         Figure.setNbreCote(3)
      Fin
      public Triangle(D  cote, base,hauteur:reel)
      Debut
        //Methode 1 : Constructeur surcharge 
          super(cote)
        //Methode 2 : Constructeur par defaut
             super()
             super.cote<-cote
          Figure.setNbreCote(3)
         this.setBase(base)
         this.setHauteur(hauteur)
      Fin

    public fonction  toChaine():chaine
        Debut
        retourner super.toChaine()," Hauteur :",this.hauteur," Base :",this.base
    Fin
FinClasse

type Carre=Classe Herite Figure
Debut
     public Carre()
      Debut 
          super() // On Cree un objet de type Figure
          Figure.setNbreCote(4)
      Fin

     public Carre(D cote:reel )
      Debut 
          super(cote)
          Figure.setNbreCote(4)
      Fin

       public fonction  toChaine():chaine
        Debut
          retourner super.toChaine()
        Fin

FinClasse



# Classe Principal
const N=100
type TabFigure=tableau [1..N]Figure

type App =classe
Debut 
    prive App()
     Debut
     Fin

  public static procedure  main()
  var 
   i, type,choix:entier
     cote, base,hauteur:reel
     figures: TabFigure nbreFigure:entier
     tran:Triangle
   Debut
      nbreFigure<--0
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
                          nbreFigure<-- nbreFigure+1
                          figures[nbreFigure]<--new Carre(cote)
                         
                 sinon 
                    si(type=2) alors
                         Ecrire("Entrer le cote du Triangle")
                         lire(cote)
                          Ecrire("Entrer la base du Triangle")
                         lire(base)
                         Ecrire("Entrer la hauteur du Triangle")
                         lire(hauteur)
                         nbreFigure<--nbreFigure+1
                           figures[nbreFigure]<--new Triangle()
                           figures[nbreFigure].setCode(code)
                           tran<--(Triangle)figures[nbreFigure]
                           tran.setHauteur(Hauteur)
                           tran.setBase(base)

                    Fsi
                 Fsi
              2:
                  pour (i<--1;i<=nbreFigure;i<--i+1) faire
                       Ecrire(figures[i].toChaine())
                  Fpour

                   
              3: 
                  Ecrire("Selectionner type de Figure")
                   Ecrire("1-Carre")
                   Ecrire("2-Triangle)
                   lire(type)
                 
                        pour (i<--1;i<=nbreFigure;i<--i+1) faire
                              si(type=1  et figures[i] instanceof Carre) alors
                                 Ecrire(figures[i].toChaine())
                              Fsi 
                               si(type=2  et figures[i] instanceof Triangle) alors
                                 Ecrire(figures[i].toChaine())
                              Fsi 
                                 
                            Fsi
                        Fpour 
                 
                    
              FinCas 

  
        Tantque(choix!=4)
   Fin
FinClasse
