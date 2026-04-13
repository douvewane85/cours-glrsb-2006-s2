package list.views;

import java.util.ArrayList;
import java.util.Scanner;

import list.entity.RendezVous;

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

    public static void afficherRV(ArrayList<RendezVous>rvs){
        for (RendezVous rv: rvs) {
       
                  System.out.println(rv);
        }
    }


}
