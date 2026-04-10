package views;

import java.util.Scanner;

import entity.RendezVous;

public final  class MedecinView {
    private  static Scanner scanner=new Scanner(System.in);

    private MedecinView(){

    }
    public static  String  saisirTelephone(){
        String tel;
        do {
            System.out.println("Entrer le Telephone");
             tel=scanner.next();
        } while (tel.isEmpty());
        return tel;
    }

    public static void afficherRV(RendezVous[]rvs){
        for (RendezVous rv: rvs) {
            if (rv!=null) {
                  System.out.println(rv);
            }
        }
    }


}
