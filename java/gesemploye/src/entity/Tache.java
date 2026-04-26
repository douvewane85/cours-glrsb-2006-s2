package entity;

public class Tache {
    private String description;

   private Employe employe; // Association avec la classe Employe
   public Tache(String description) {
    this.description = description;
}



   public Tache() {
    }

   

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

       public Employe getEmploye() {
    return employe;
}



   public void setEmploye(Employe employe) {
    this.employe = employe;
   }


    

    @Override
    public String toString() {
        return "Description=" + description ;
    }
    
}
