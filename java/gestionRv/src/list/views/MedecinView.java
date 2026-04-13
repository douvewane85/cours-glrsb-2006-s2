package list.views;


import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Scanner;

import list.entity.Patient;
import list.entity.RendezVous;

public final  class MedecinView {
    private  static Scanner scanner=new Scanner(System.in);

    private MedecinView(){

    }
    public static  String  saisirTelephone(String message){
       return saisieChaine(message);
    }

    public static void afficherRV(ArrayList<RendezVous>rvs){
        for (RendezVous rv: rvs) {
       
                  System.out.println(rv);
        }
    }

    public static Patient saisirPatient(String tel){
        String nomPrenom=saisieChaine("Entrer le Nom et Prenom du Patient");
        String dateNaissanceString=saisieChaine("Entrer la Date de Naissance du Patient (dd/MM/yyyy)");
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
        LocalDate dateNaissance=LocalDate.parse(dateNaissanceString, formatter);
        return new Patient(nomPrenom, tel, dateNaissance);
    }

    private static String saisieChaine(String message){
        String chaine;
        do {
            System.out.println(message);
             chaine=scanner.nextLine();
        } while (chaine.isEmpty());
        return chaine;
    }

    public static RendezVous saisieRendezVous(){
        String dateHeureString=saisieChaine("Entrer la Date et l'heure du RendezVous (dd/MM/yyyy HH:mm)");
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");
        LocalDateTime dateHeure=LocalDateTime.parse(dateHeureString, formatter);
        return new RendezVous(dateHeure);
    }


}
