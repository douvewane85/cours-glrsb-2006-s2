package entity;

/*
 En Java par defaut,toutes les classes héritent de la classe Object, 
 qui est la classe de base pour tous les objets en Java.
*/
public  class Utilisateur {
   protected String login;
   protected String password;
   protected Role role; 

    public Utilisateur() {
    }

    public Utilisateur(String login, String password, Role role) {
        this.login = login;
        this.password = password;
        this.role = role;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public Role getRole() {
        return role;
    }

    public void setRole(Role role) {
        this.role = role;
    }

    @Override
    public String toString() {
        return "login=" + login + ", password=" + password + ", role=" + role.name() ;
    }

    /*
        var user1=new Utilisateur("admin", "admin", Role.ADMIN);
        var user2=new Utilisateur("admin", "admin", Role.ADMIN);
        comparaison de reference
          user1==user2; // false 
        //Comparaison de valeur
           user1.getLogin().compareTo(user2.getLogin())==0;
           user1.getPassword().compareTo(user2.getPassword())==0;
           user1.getRole()==user2.getRole();
            //Affectation de reference
             var user3=user1; 
           //Affectation de Valeurs ==>clone()
                var user3=new Utilisateur();
                user3.setLogin(user1.getLogin());
                user3.setPassword(user1.getPassword());
                user3.setRole(user1.getRole());

    @Override:
             annotation qui indique que la méthode equals est une redéfinition 
             de la méthode equals de la classe Object.
    
    */
   //Comment faire la comparaison de valeur en utilisant la méthode equals
    @Override
    public boolean equals(Object obj) {
        Utilisateur utilisateur = (Utilisateur) obj;
       if(this.login.compareTo(utilisateur.getLogin())==0
                          && this.password.compareTo(utilisateur.getPassword())==0
                          && this.role == utilisateur.getRole()){
           return true;
       }
       return false;
    }
}
